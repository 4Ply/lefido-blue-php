<?php
try {
    $gymnastId = clean_input($_GET['id']);
    if ($gymnastId == null) {
        return;
    }
    $url = API_BASE . "/events?gymnastId=" . $gymnastId;
    $response = \Httpful\Request::get($url)->send();

    ?>

    <div class="container">
        <h1 id="events">Events</h1>

        <table style="width:100%">
            <tr>
                <th>Date</th>
                <th>Type</th>
            </tr>

            <? foreach ($response->body as $event) {
                echo "<tr>
                        <td>" . $event->date . "</td>
                        <td>" . $event->type . "</td>
                    </tr>
                ";
            } ?>
        </table>

        <br/>
<!--        <form action='../add_transaction_form.php' method="post">-->
<!--            <input type='hidden' name='gymnastId' value='--><?php //echo $gymnastId; ?><!--'/>-->
<!--            <input type='submit' value='Add transaction'/>-->
<!--        </form>-->
    </div>

    <?php
} catch (Exception $exception) {
    include_once(ROOT_DIR . '/php/error.php');
}
