<?php
try {
    if ('POST' == $_SERVER['REQUEST_METHOD']) {
        include_once('../config.php');
        include_once('../php/utils.php');

        $firstName = urlencode(clean_input($_POST["firstName"]));
        $surname = urlencode(clean_input($_POST["surname"]));
        $phoneNumber = urlencode(clean_input($_POST["phoneNumber"]));
        $alternativePhoneNumber = urlencode(clean_input($_POST["alternativePhoneNumber"]));
        $emailAddress = urlencode(clean_input($_POST["emailAddress"]));
        $alternativeEmailAddress = urlencode(clean_input($_POST["alternativeEmailAddress"]));

        if (empty($firstName) or empty($surname)) {
            echo "Invalid input";
            exit;
        } else {
            $url = API_BASE . "/contact?firstName=" . $firstName .
                "&surname=" . $surname .
                "&phoneNumber=" . $phoneNumber .
                "&alternativePhoneNumber=" . $alternativePhoneNumber .
                "&emailAddress=" . $emailAddress .
                "&alternativeEmailAddress=" . $alternativeEmailAddress;

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
