<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form id="inputFormChangeEmail" method="post" action="changeEmail.php">
    <p>Change Email</p>
    <br/>
    <input type="text" id="Email" name="Email" placeholder="Enter a new email address">
    <br/>
    <input type="password" id="passwordForEmail" placeholder="Enter the password" name="passwordForEmail">
    <br/>
    <br/>
    <input type="submit" name="changeEmail" value="Change Email" class="executeButton">
</form>
<hr/>

<form id="inputFormChangeContact" method="post" action="changeContact.php">
    <p>Change Contact Number</p>
    <br/>
    <input type="text" id="Contact" name="Contact" placeholder="Enter a new contact number">
    <br/>
    <input type="password" id="passwordForContact" placeholder="Enter the password" name="passwordForContact">
    <br/>
    <br/>
    <input type="submit" name="changeContact" value="Change Contact Number" class="executeButton">
</form>
<hr/>
</body>
</html>