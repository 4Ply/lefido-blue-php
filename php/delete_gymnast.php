<?php
include_once('../config.php');
include_once('../php/utils.php');

try {
    $id = clean_input($_GET['id']);

    if (empty($id)) {
        echo "Invalid input";
        exit;
    } else {
        $url = API_BASE . "/gymnast?id=" . $id;

        $response = \Httpful\Request::delete($url)
            ->send();

        if ($response->code == 200) {
            header('Location: ../../index.php');
            exit;
        }
    }
} catch (Exception $exception) {
    include_once(ROOT_DIR . '/php/error.php');
}
