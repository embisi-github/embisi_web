<?php

include "web_locals.php";
include "${toplevel}web_assist/web_globals.php";
site_set_location("company.people.john_croft");

$page_title = "Embisi Inc. People";

include "${toplevel}web_assist/web_header.php";

page_header( "John Croft" );

page_sp();

?>

John is a Briton in Britain. A college classmate of <a href="../gavin_stark">Gavin Stark</a>, he went on
to work at Madge Networks, once the leader in token ring networks, and
left them to form part of Calista.

<p>

Here he was involved in development of embedded OS, VOIP firmware and
reverse-engineering of digital PBX protocols.  Calista&lsquo;s life ended when
it was acquired by Cisco Systems. John is taking the lead in investigating
the tools, operating system and libraries for Embisi.

<?php
page_ep();

include "${toplevel}web_assist/web_footer.php"; ?>


