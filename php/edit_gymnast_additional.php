<?php
try {
    if ('POST' == $_SERVER['REQUEST_METHOD']) {
        include_once('../config.php');
        include_once('../php/utils.php');

        $id = clean_input($_GET['id']);
        $middleName = clean_input($_POST["middleName"]);
        $preferredName = clean_input($_POST["preferredName"]);
        $category = clean_input($_POST["category"]);
        $sagfNumber = clean_input($_POST["sagfNumber"]);

        if (empty($id)) {
            echo "Invalid input";
            exit;
        } else {
            $url = API_BASE . "/gymnast_additional?id=" . $id;

            $response = \Httpful\Request::post($url)
                ->body('{"middleName": "' . $middleName .
                    '", "preferredName": "' . $preferredName .
                    '", "category": "' . $category .
                    '", "sagfNumber": "' . $sagfNumber .
                    '"}')
                ->send();

            if ($response->code == 200) {
                header('Location: ../../gymnast_info.php?id=' . $id);
                exit;
            }
        }
    }
} catch (Exception $exception) {
    include_once(ROOT_DIR . '/php/error.php');
}
