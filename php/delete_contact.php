<?php
include_once('../config.php');
include_once('../php/utils.php');

try {
    $gymnastId = clean_input($_POST['gymnastId']);
    $contactId = clean_input($_POST['contactId']);

    if (empty($gymnastId) or empty($contactId)) {
        echo "Invalid input";
        exit;
    } else {
        $url = API_BASE . "/contactLink?gymnastId=" . $gymnastId . "&contactId=" . $contactId;
        $response = \Httpful\Request::delete($url)->send();

        if ($response->code == 200) {
            header('Location: ../../gymnast_info.php?id=' . $gymnastId);
            exit;
        }
    }

} catch (Exception $exception) {
    include_once(ROOT_DIR . '/php/error.php');
}
