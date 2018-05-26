<!DOCTYPE html>
<html xmlns="">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Lefido Blue | Gymnast Info</title>
    <link rel="icon" type="image/png" href="favicon.png">
</head>

<body>

<?php
include_once('./config.php');
include_once('./php/utils.php');
?>

<div class="container2">
    <h2>
        <a class="back" href="../index.php">back</a>
        <a class="delete" href="#" onclick="{
                if (confirm('Are you sure you want to delete this gymnast?')) {
                window.location.href ='../php/delete_gymnast.php?id=<?php echo clean_input($_GET["id"]); ?>'
                }
                }">delete</a>
    </h2>
    <center>
        <h1>Gymnast Overview</h1>
    </center>
</div>

<?php
include_once('./php/gymnast_info_general.php');
include_once('./php/gymnast_info_additional.php');
include_once('./php/gymnast_info_address.php');
include_once('./php/gymnast_info_medical.php');
include_once('./php/gymnast_info_contacts.php');
include_once('./php/gymnast_info_events.php');
include_once('./php/gymnast_info_transactions.php');
?>

<br/>
<br/>
<br/>
<br/>
<br/>

</body>
</html>
