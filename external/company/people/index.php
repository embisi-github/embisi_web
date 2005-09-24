<?php

include "web_locals.php";
include "${toplevel}web_assist/web_globals.php";
site_set_location("company.people");

$page_title = "Embisi Inc. People";

include "${toplevel}web_assist/web_header.php";


page_header( "Embisi People" );

page_sp();

?>

Embisi is headed up by <a href="gavin_stark">Gavin J Stark</a> and <a href="john_croft">John Croft</a>.

<?php page_section( "gavin", "<a href=gavin_stark>CEO - Gavin J Stark</a>" );?>

Gavin Stark is the CEO of Embisi Inc. Gavin was previously an architect for Network Processors at Intel, where he arrived at after their acquisition of Basis Communications, at which he was CTO. Gavin has a PhD and BA from Cambridge University, England.

<?php page_section( "john", "<a href=john_croft>Software - John Croft</a>" );?>

John Croft is the embedded software lead for Embisi, building on years
of experience in embedded computing and operating system design and
support. John's previous experience is at Cisco, Calista (acquired by
Cisco), and Madge Networks. John holds a BA from Cambridge University,
England.

<?php
page_ep();

include "${toplevel}web_assist/web_footer.php"; ?>

