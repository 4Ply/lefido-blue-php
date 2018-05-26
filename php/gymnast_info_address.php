<?php
try {
    $gymnastId = clean_input($_GET['id']);
    if ($gymnastId == null) {
        return;
    }
    $url = API_BASE . "/address?gymnastId=" . $gymnastId;

    $response = \Httpful\Request::get($url)->send();

    ?>

    <div class="container">
        <h1 id="address">Address</h1>
        <form action="../php/edit_gymnast_address.php?gymnastId=<?php echo $gymnastId; ?>" method="post">
            <label>Address Line 1:</label>
            <input name="addressLine1" placeholder="Address Line 1"
                   value="<?php echo $response->body->addressLine1; ?>"><br/>

            <label>Address Line 2:</label>
            <input name="addressLine2" placeholder="Address Line 2"
                   value="<?php echo $response->body->addressLine2; ?>"><br/>

            <label>Address Line 3:</label>
            <input name="addressLine3" placeholder="Address Line 3"
                   value="<?php echo $response->body->addressLine3; ?>"><br/>

            <label>Address Code:</label>
            <input name="addressCode" placeholder="Address Code"
                   value="<?php echo $response->body->addressCode; ?>"><br/>

            <label>School:</label>
            <input name="school" placeholder="School" value="<?php echo $response->body->school; ?>"><br/>

            <input type="submit" value="Apply">
        </form>
    </div>

    <?php
} catch (Exception $exception) {
    include_once(ROOT_DIR . '/php/error.php');
}
