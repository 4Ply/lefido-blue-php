<?php
try {
    if ('POST' == $_SERVER['REQUEST_METHOD']) {
        include_once('../config.php');
        include_once('../php/utils.php');

        $gymnastId = clean_input($_GET['gymnastId']);
        $medicalAidName = clean_input($_POST["medicalAidName"]);
        $medicalAidNumber = clean_input($_POST["medicalAidNumber"]);
        $physicalDisabilities = clean_input($_POST["physicalDisabilities"]);

        if (empty($gymnastId)) {
            echo "Invalid input";
            exit;
        } else {
            $url = API_BASE . "/medical?gymnastId=" . $gymnastId;

            $response = \Httpful\Request::post($url)
                ->body('{"medicalAidName": "' . $medicalAidName .
                    '", "medicalAidNumber": "' . $medicalAidNumber .
                    '", "physicalDisabilities": "' . $physicalDisabilities .
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
