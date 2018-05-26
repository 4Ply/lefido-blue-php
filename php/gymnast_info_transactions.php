<?php
try {
    $gymnastId = clean_input($_GET['id']);
    if ($gymnastId == null) {
        return;
    }
    $url = API_BASE . "/transactions?gymnastId=" . $gymnastId;
    $response = \Httpful\Request::get($url)->send();

    ?>

    <div class="container">
        <h1 id="transactions">Transactions</h1>

        <table style="width:100%">
            <tr>
                <th>Date</th>
                <th>Amount (ZAR)</th>
                <th>Type</th>
                <th>Method</th>
                <th>Extra Notes</th>
            </tr>

            <? foreach ($response->body as $transaction) {
                echo "<tr>
                <td>" . $transaction->date . "</td>
                <td>" . money_format("%.2n", $transaction->amount) . "</td>
                <td>" . $transaction->type . "</td>
                <td>" . $transaction->method . "</td>
                <td>" . $transaction->notes . "</td>
            </tr>
        ";
            } ?>
        </table>

        <br/>
        <form action='../add_transaction_form.php' method="post">
            <input type='hidden' name='gymnastId' value='<?php echo $gymnastId; ?>'/>
            <input type='submit' value='Add transaction'/>
        </form>
    </div>

    <?php
} catch (Exception $exception) {
    include_once(ROOT_DIR . '/php/error.php');
}
