<?php
try {
    if ('POST' == $_SERVER['REQUEST_METHOD']) {
        include_once('../config.php');
        include_once('../php/utils.php');

        $gymnastId = clean_input($_GET['gymnastId']);
        $addressLine1 = clean_input($_POST["addressLine1"]);
        $addressLine2 = clean_input($_POST["addressLine2"]);
        $addressLine3 = clean_input($_POST["addressLine3"]);
        $addressCode = clean_input($_POST["addressCode"]);
        $school = clean_input($_POST["school"]);

        if (empty($gymnastId)) {
            echo "Invalid input";
            exit;
        } else {
            $url = API_BASE . "/address?gymnastId=" . $gymnastId;

            $response = \Httpful\Request::post($url)
                ->body('{"addressLine1": "' . $addressLine1 .
                    '", "addressLine2": "' . $addressLine2 .
                    '", "addressLine3": "' . $addressLine3 .
                    '", "addressCode": "' . $addressCode .
                    '", "school": "' . $school .
                    '"}')
                ->send();

            if ($response->code == 200) {
                header('Location: ../../gymnast_info.php?id=' . $gymnastId);
                exit;
            }
        }
    }
} catch (Exception $exception) {
    include_once(ROOT_DIR . '/php/error.php');
}
