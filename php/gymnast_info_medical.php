<?php
try {
    $gymnastId = clean_input($_GET['id']);
    if ($gymnastId == null) {
        return;
    }
    $url = API_BASE . "/medical?gymnastId=" . $gymnastId;

    $response = \Httpful\Request::get($url)->send();

    ?>

    <div class="container">
        <h1 id="medical">Medical</h1>
        <form action="../php/edit_gymnast_medical.php?gymnastId=<?php echo $gymnastId; ?>" method="post">
            <label>Medical Aid Name:</label>
            <input name="medicalAidName" placeholder="Medical Aid Name"
                   value="<?php echo $response->body->medicalAidName; ?>"><br/>

            <label>Medical Aid Number:</label>
            <input name="medicalAidNumber" placeholder="Medical Aid Number"
                   value="<?php echo $response->body->medicalAidNumber; ?>"><br/>

            <label>Physical Disabilities:</label>
            <input name="physicalDisabilities" placeholder="Physical Disabilities"
                   value="<?php echo $response->body->physicalDisabilities; ?>"><br/>

            <input type="submit" value="Apply">
        </form>
    </div>

    <?php
} catch (Exception $exception) {
    include_once(ROOT_DIR . '/php/error.php');
}
