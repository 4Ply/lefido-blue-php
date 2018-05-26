<!DOCTYPE html>
<html xmlns="">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Lefido Blue - Add Transaction</title>
    <link rel="icon" type="image/png" href="favicon.png">
</head>


<?php
include_once('./config.php');
include_once('./php/utils.php');

try {
$url = API_BASE . "/gymnasts";
$gymnastsResponse = \Httpful\Request::get($url)->send();

$url = API_BASE . "/transactionTypes";
$transactionTypesResponse = \Httpful\Request::get($url)->send();

$url = API_BASE . "/transactionMethods";
$transactionMethodsResponse = \Httpful\Request::get($url)->send();
?>

<div class="container">
    <h1>Add Transaction</h1>
    <?php
    $gymnastId = clean_input($_GET['gymnastId']);
    if (empty($gymnastId)) {
        $gymnastId = clean_input($_POST['gymnastId']);
    }
    if (empty($gymnastId)) {
        ?>
        <form action='./add_transaction_form.php' method="post">
            <label>Gymnast:</label>
            <select name="gymnastId" title=""
                    onchange="this.form.submit()">
                <? foreach ($gymnastsResponse->body as $gymnast) {
                    echo "<option value='" . $gymnast->id . "'>" . $gymnast->firstName . " " . $gymnast->surname . " (" . $gymnast->identificationNumber . ")" . "</option>";
                } ?>
            </select>
        </form>

        <?php
        return;
    } else {
        $url = API_BASE . "/gymnast?id=" . $gymnastId;
        $gymnastResponse = \Httpful\Request::get($url)->send();

        if ($gymnastResponse->code != 200) {
            return;
        }
        $gymnastName = clean_input($gymnastResponse->body->firstName) . " " . clean_input($gymnastResponse->body->surname);
        ?>
        <form action="./php/add_transaction.php" method="post">
            <h2>Gymnast:
                <a href="./gymnast_info.php?id=<?php echo $gymnastId; ?>#transactions"><?php echo $gymnastName; ?></a>
            </h2>
            <input name="gymnastId" type="hidden" value="<?php echo $gymnastId; ?>"/>
            <input name="contactId" type="hidden" value="<?php echo $contactId; ?>"/>

            <label>Transaction Date:</label>
            <input name="transactionDate" placeholder="Transaction Date" value="" type="date" min="2000-01-01" max="2025-12-30" required>

            <label>Amount (ZAR):</label>
            <input name="amount" placeholder="Amount (ZAR)" value="" type="number" min="1" max="10000" required>

            <label>Transaction Type:</label>
            <select name="type" title="" required>
                <? foreach ($transactionTypesResponse->body as $transactionType) {
                    echo "<option value='" . $transactionType->value . "'>" . $transactionType->name . "</option>";
                } ?>
            </select>

            <label>Transaction Method:</label>
            <select name="method" title="" required>
                <? foreach ($transactionMethodsResponse->body as $transactionMethod) {
                    echo "<option value='" . $transactionMethod->value . "'>" . $transactionMethod->name . "</option>";
                } ?>
            </select>

            <label>Extra Notes (Optional):</label>
            <input name="notes" placeholder="Extra Notes" autocomplete="false">

            <input type="submit" value="Add Gymnast">
        </form>
        <?php
    }
    ?>
</div>

<?php
} catch (Exception $exception) {
    include_once(ROOT_DIR . '/php/error.php');
}
