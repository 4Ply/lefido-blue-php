<?php
try {
    if ('POST' == $_SERVER['REQUEST_METHOD']) {
        include_once('../config.php');
        include_once('../php/utils.php');

        $id = clean_input($_GET['id']);
        $firstName = clean_input($_POST["firstName"]);
        $surname = clean_input($_POST["surname"]);
        $identificationNumber = clean_input($_POST["identificationNumber"]);
        $dateOfBirth = clean_input($_POST["dateOfBirth"]);

        if (empty($id)) {
            echo "Invalid input";
            exit;
        } else {
            $url = API_BASE . "/gymnast?id=" . $id;

            $response = \Httpful\Request::post($url)
                ->body('{"firstName": "' . $firstName .
                    '", "surname": "' . $surname .
                    '", "identificationNumber": "' . $identificationNumber .
                    '", "dateOfBirth": "' . $dateOfBirth .
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
