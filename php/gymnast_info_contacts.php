<?php
try {
    $gymnastId = clean_input($_GET['id']);
    if ($gymnastId == null) {
        return;
    }
    $url = API_BASE . "/contacts?gymnastId=" . $gymnastId;
    $response = \Httpful\Request::get($url)->send();

    ?>

    <div class="container">
        <h1 id="contacts">Contacts</h1>

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
                <td><a href='../contact_info.php?id=" . $contact->id . "'>" . $contact->id . "</a></td>
                <td>" . $contact->firstName . "</td>
                <td>" . $contact->surname . "</td>
                <td>" . $contact->phoneNumber . "</td>
                <td>" . $contact->alternativePhoneNumber . "</td>
                <td>" . $contact->emailAddress . "</td>
                <td>" . $contact->alternativeeEmailAddress . "</td>
                <td class='button'>
                    <form action='../php/delete_contact.php' method='post'>
                        <input type='hidden' name='gymnastId' value='" . $gymnastId . "'/>
                        <input type='hidden' name='contactId' value='" . $contact->id . "'/>
                        <input type='submit' value='Delete'/>
                    </form>
                </td>
            </tr>
        ";
            } ?>
        </table>

        <br/>

        <?php
        $url = API_BASE . "/contacts";
        $response = \Httpful\Request::get($url)->send();
        ?>
        <form action="../php/link_contact.php?gymnastId=<?php echo $gymnastId; ?>" method="post">
            <select id="contact" name="contactId" style="width: 50%;" title="">
                <? foreach ($response->body as $contact) {
                    echo "<option value='" . $contact->id . "'>" . $contact->firstName . " " . $contact->surname . "</option>";
                } ?>
            </select>

            <input type="submit" value="Link Contact"/>
        </form>

    </div>

    <?php
} catch (Exception $exception) {
    include_once(ROOT_DIR . '/php/error.php');
}
