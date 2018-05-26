<!DOCTYPE html>
<html xmlns="">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Lefido Blue</title>
    <link rel="icon" type="image/png" href="favicon.png">
</head>

<?php
include_once('./config.php');
include_once('./php/utils.php');

try {
    $url = API_BASE . "/gymnasts";
    $response = \Httpful\Request::get($url)->send();

    ?>
    <h2>Gymnasts</h2>
    <table style="width:100%">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Surname</th>
            <th>Identification Number</th>
            <th>D.O.B</th>
            <th>Gender</th>
        </tr>

        <? foreach ($response->body as $gymnast) {
            echo "<tr>
        <td><a href='gymnast_info.php?id=" . $gymnast->id . "'>" . $gymnast->id . "</a></td>
        <td>" . $gymnast->firstName . "</td>
        <td>" . $gymnast->surname . "</td>
        <td>" . $gymnast->identificationNumber . "</td>
        <td>" . $gymnast->dateOfBirth . "</td>
        <td>" . $gymnast->gender . "</td>
    </tr>
    ";
        } ?>

    </table>

    <?php
    include('./php/add_gymnast_form.php');


    $url = API_BASE . "/contacts";
    $response = \Httpful\Request::get($url)->send();

    ?>

    <br/>
    <br/>
    <br/>
    <br/>

    <form action="./missing_registration_fees.php" method="post">
        <input type="submit" value="Missing Registration Fees">
    </form>

    <br/>
    <br/>
    <br/>
    <h2>Contacts</h2>
    <table style="width:100%">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Surname</th>
            <th>Phone Number</th>
            <th>Alternative Phone Number</th>
            <th>Email</th>
            <th>Alternative Email</th>
        </tr>

        <? foreach ($response->body as $contact) {
            echo "<tr>
        <td><a href='contact_info.php?id=" . $contact->id . "'>" . $contact->id . "</a></td>
        <td>" . $contact->firstName . "</td>
        <td>" . $contact->surname . "</td>
        <td>" . $contact->phoneNumber . "</td>
        <td>" . $contact->alternativePhoneNumber . "</td>
        <td>" . $contact->emailAddress . "</td>
        <td>" . $contact->alternativeEmailAddress . "</td>
    </tr>
    ";
        } ?>

    </table>

    <?php
    include('./php/add_contact_form.php');

} catch (Exception $exception) {
    include_once('./php/error.php');
}
?>
