<?php
try {
    $id = clean_input($_GET['id']);
    if ($id == null) {
        return;
    }
    $url = API_BASE . "/gymnast?id=" . $id;

    $response = \Httpful\Request::get($url)->send();

    ?>

    <div class="container">
        <h1 id="general">General</h1>
        <form action="../php/edit_gymnast.php?id=<?php echo $id; ?>" method="post">
            <label>First Name:</label>
            <input name="firstName" placeholder="First Name" value="<?php echo $response->body->firstName; ?>"><br/>

            <label>Surname: </label>
            <input name="surname" placeholder="Surname" value="<?php echo $response->body->surname; ?>"><br/>

            <label>ID Number: </label>
            <input name="identificationNumber" placeholder="ID Number"
                   value="<?php echo $response->body->identificationNumber; ?>"><br/>

            <label>Date of Birth: </label>
            <input name="dateOfBirth" placeholder="Date of Birth" type="date"
                   value="<?php echo $response->body->dateOfBirth; ?>"><br/>

            <input type="submit" value="Apply">
        </form>
    </div>

    <?php
} catch (Exception $exception) {
    include_once(ROOT_DIR . '/php/error.php');
}
