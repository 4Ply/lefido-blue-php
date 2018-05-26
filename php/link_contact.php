<?php
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    include_once('../config.php');
    include_once('../php/utils.php');

    $gymnastId = clean_input($_GET['gymnastId']);
    $contactId = clean_input($_POST['contactId']);

    if (empty($gymnastId) or empty($contactId)) {
        echo "Invalid input";
        exit;
    } else {
        $url = API_BASE . "/contactLink?gymnastId=" . $gymnastId . "&contactId=" . $contactId;

        $response = \Httpful\Request::put($url)->send();

        if ($response->code == 200) {
            header('Location: ../../gymnast_info.php?id=' . $gymnastId);
            exit;
        }
    }
}
