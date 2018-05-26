<br/>
<br/>

<form action="../php/add_contact.php" method="post">

    <div style="text-align: center;" class="contact_form">
        <input name="firstName" placeholder="First Name" required autocomplete="false">
        <input name="surname" placeholder="Surname" required autocomplete="false">

        <br/>
        <input name="phoneNumber" placeholder="Phone Number" autocomplete="false" type="tel">
        <input name="alternativePhoneNumber" placeholder="Alternative Phone Number" autocomplete="false" type="tel">

        <br/>
        <input name="emailAddress" placeholder="Email" autocomplete="false" type="email">
        <input name="alternativeEmailAddress" placeholder="Alternative Email" autocomplete="false" type="email">

        <br/>
        <input type="submit" value="Add Contact">
    </div>

</form>
