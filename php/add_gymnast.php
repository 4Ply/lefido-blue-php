<?php
try {
    if ('POST' == $_SERVER['REQUEST_METHOD']) {
        include_once('../config.php');
        include_once('../php/utils.php');

        $firstName = clean_input($_POST["firstName"]);
        $surname = clean_input($_POST["surname"]);
        $identificationNumber = clean_input($_POST["identificationNumber"]);
        $dateOfBirth = clean_input($_POST["dateOfBirth"]);
        $gender = clean_input($_POST["gender"]);

        if (empty($firstName) or empty($surname)) {
            echo "Invalid input";
            exit;
        } else {
            $url = API_BASE . "/gymnast?firstName=" . $firstName
                . "&surname=" . $surname
                . "&identificationNumber=" . $identificationNumber
                . "&dateOfBirth=" . $dateOfBirth
                . "&gender=" . $gender;

            $response = \Httpful\Request::put($url)->send();

            if ($response->code == 200) {
                header('Location: ./index.php');
                exit;
            }
        }
    }
} catch (Exception $exception) {
    include_once(ROOT_DIR . '/php/error.php');
}
