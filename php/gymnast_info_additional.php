<?php
try {
    $id = clean_input($_GET['id']);
    if ($id == null) {
        return;
    }
    $url = API_BASE . "/gymnast_additional?id=" . $id;

    $response = \Httpful\Request::get($url)->send();

    ?>

    <div class="container">
        <h1 id="additional">Additional</h1>
        <form action="../php/edit_gymnast_additional.php?id=<?php echo $id; ?>" method="post">
            <label>Middle Name:</label>
            <input name="middleName" placeholder="Middle Name" value="<?php echo $response->body->middleName; ?>"><br/>

            <label>Preferred Name:</label>
            <input name="preferredName" placeholder="Preferred Name"
                   value="<?php echo $response->body->preferredName; ?>"><br/>

            <label>Category:</label>
            <input name="category" placeholder="Category" value="<?php echo $response->body->category; ?>"><br/>

            <label>SAGF Number:</label>
            <input name="sagfNumber" placeholder="SAGF Number" value="<?php echo $response->body->sagfNumber; ?>"><br/>

            <input type="submit" value="Apply">
        </form>
    </div>

    <?php
} catch (Exception $exception) {
    include_once(ROOT_DIR . '/php/error.php');
}
