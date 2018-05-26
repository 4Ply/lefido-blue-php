<?php
try {
    if ('POST' == $_SERVER['REQUEST_METHOD']) {
        include_once('../config.php');
        include_once('../php/utils.php');

        $gymnastId = urlencode(clean_input($_POST["gymnastId"]));
        $transactionDate = urlencode(clean_input($_POST["transactionDate"]));
        $amount = urlencode(clean_input($_POST["amount"]));
        $type = urlencode(clean_input($_POST["type"]));
        $method = urlencode(clean_input($_POST["method"]));
        $notes = urlencode(clean_input($_POST["notes"]));

        if (empty($gymnastId) or empty($transactionDate) or empty($amount) or empty($type) or empty($method)) {
            echo "Invalid input";
            exit;
        } else {
            $url = API_BASE . "/transaction?gymnastId=" . $gymnastId
                . "&date=" . $transactionDate
                . "&amount=" . $amount
                . "&type=" . $type
                . "&method=" . $method
                . "&notes=" . $notes;

            $response = \Httpful\Request::put($url)->send();

            if ($response->code == 200) {
                header('Location: ../add_transaction_form.php?gymnastId=' . $gymnastId);
                exit;
            }
        }
    }
} catch (Exception $exception) {
    include_once(ROOT_DIR . '/php/error.php');
}
