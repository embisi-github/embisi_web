<?php

include "web_locals.php";
include "${toplevel}web_assist/web_globals.php";
site_set_location("technology");

$page_title = "Embisi Inc. Technology";

include "${toplevel}web_assist/web_header.php";


page_header( "Embisi Technology" );

page_sp();

?>

Embisi&lsquo;s technology is under development, but the track record of the technologists involved runs from silicon design through embedded systems, servers, graphical interfaces to web applications. More of these skills are being put to use in the first truly integrated embedded communications controller.

<p>

Embisi uses the <a href="http://cyclicity-cdl.sourceforge.net">Cyclicity cycle design language</a> created by Gavin Stark, to develop its silicon devices with software C models, FPGA emulation, and synthesisable RTL coming from a single, GUI browsable source code. This language is somewhat of a cross between C and verilog; it is similar in aim to SystemVerilog, but designed from a modern ASIC point of view for hardware development and not testbench development. As such it supports constructs for constructing devices, with test mechanisms suchs as assertions (sequential and immediate), code coverage, and full visibility of signals values; but it does not (in the CDL language itself) support more behavioural items such as file I/O, arbitrary clock/timed processes, etc. The Cyclicity cycle design language is released under the GPL and the LGPL, and is available at <a href="http://sourceforge.net/projects/cyclicity-cdl">SourceForge.net</a>.

<?php
page_ep();

include "${toplevel}web_assist/web_footer.php"; ?>


