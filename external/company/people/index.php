<?php

include "web_locals.php";
include "${toplevel}web_assist/web_globals.php";
site_set_location("company.people");

$page_title = "Embisi Inc. People";

include "${toplevel}web_assist/web_header.php";


page_header( "Embisi People" );

page_sp();

?>

The key technical personnel are <a href="gavin_stark">Gavin J Stark</a> and <a href="john_croft">John Croft</a>.

<?php page_section( "gavin", "<a href=gavin_stark>Gavin J Stark</a>" );?>

Gavin Stark is the Chief Technical Officer for Embisi Inc. He is responsible for all the technology
within the Embisi product line, and is a key figure in the development of the silicon platforms.

<?php page_section( "john", "<a href=john_croft>John Croft</a>" );?>

John Croft is the lead embedded software engineer for Embisi, building on years of experience
in embedded computing and operating system design and support.

<?php
page_ep();

include "${toplevel}web_assist/web_footer.php"; ?>

