<?php

include "web_locals.php";
include "${toplevel}web_assist/web_globals.php";
site_set_location("company.contacts");

$page_title = "Embisi contacts";

include "${toplevel}web_assist/web_header.php";


page_header( "Email us" );

page_sp();

if ($_POST["reason"] == "sendit")
{
	$to = "gavin@embisi.com";
	mail ($to, "message from ".$_POST["email"], $_POST["body"]);
	?>
	Thank you for your message
	<?php
}
else
{
	?>

	<form method="post" action="contacts.php">
	<input type="hidden" name="reason" value="sendit"/>
	Your E-mail address:<input type="text" name="email"/><br/>
	<textarea name="body" cols="90" rows="10"></textarea><br/>
	<input type="submit" value="Send"/>
	</form>
	<?php
}

page_ep();

include "${toplevel}web_assist/web_footer.php"; ?>

