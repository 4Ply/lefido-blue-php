<!DOCTYPE html>
<html xmlns="">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Lefido Blue | Missing Registration Fees</title>
    <link rel="icon" type="image/png" href="favicon.png">
</head>

<?php
include_once('./config.php');
include_once('./php/utils.php');

try {
    $url = API_BASE . "/missingRegistrationFees";
    $response = \Httpful\Request::get($url)->send();

    ?>
    <h2>Gymnasts missing registration fees for <?php echo date("Y"); ?></h2>
    <table style="width:100%">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Surname</th>
            <th>Identification Number</th>
            <th>D.O.B</th>
        </tr>

        <? foreach ($response->body as $gymnast) {
            echo "<tr>
        <td><a href='gymnast_info.php?id=" . $gymnast->id . "'>" . $gymnast->id . "</a></td>
        <td>" . $gymnast->firstName . "</td>
        <td>" . $gymnast->surname . "</td>
        <td>" . $gymnast->identificationNumber . "</td>
        <td>" . $gymnast->dateOfBirth . "</td>
    </tr>
    ";
        } ?>

    </table>

    <?php
} catch (Exception $exception) {
    include_once('./php/error.php');
}
?>
