<?php

include "web_locals.php";
include "${toplevel}web_assist/web_globals.php";
site_set_location("technology");

$page_title = "Embisi Inc. Technology";

include "${toplevel}web_assist/web_header.php";


page_header( "Embisi Technology" );

page_sp();

?>

Embisi has developed the world's first microcontroller truly optimized
for embedded Internet systems. The technology does not consist of just
a small MCU with access to an Ethernet interface of some form; such
devices have existed for a while now, and it is plain from their
application rate that they are a very poor solution for real embedded
Internet systems - they are either too small to support an OS and the
associated stacks, so software engineering is a monumental task, or
they are designed to support an OS and then become bloated and fail to
support the hard realtime aspects of an embedded system.

<p>

Embisi started with a blank sheet of paper, with the aim of producing a simple to apply embedded Internet controller. The design remit stated:

<ol>

<li> A full protocol stack is required for Internet connectivity

<li> Programmability of applications with the protocol stack should be simple, and the talent pool of programmers for such applications should be large

<li> Hard real-time control should be supported with high-level programming tools (e.g. C-level or higher programming required, with libraries, rather than assembler or micro-C)

<li> The hard real-time control systems should be independent of the upper level applications and protocol stacks, so hard real-time constraints can be easily and obviously satisfied (e.g. even if the application gets stuck in an infinite loop, the hard real-time control must still continue)

<li> The hard real-time control systems should be supported with flexible hardware to offload the hardware signal interfacing from the software (e.g. the Ethernet MAC should not be written software)

</ol>

Embisi has achieved these aims, and exceeded most of the requirements, developing the technology slowly and wisely rather than rushing to production early. The slow-and-steady approach has led to an exceptional architecture, and dramatic improvements in the design time and simplicity of embedded Internet systems. For a demonstration, <a href="http://secure.embisi.com:1080/index.html"> it is worth trying this link.</a>

<h3>
Design notes
</h3>

<p>

Embisi uses the <a
href="http://cyclicity-cdl.sourceforge.net">Cyclicity cycle design
language</a> created by Gavin Stark, to develop its silicon devices
with software C models, FPGA emulation, and synthesisable RTL coming
from a single, GUI browsable source code. This language is somewhat of
a cross between C and verilog; it is similar in aim to SystemVerilog,
but designed from a modern ASIC point of view for hardware development
and not testbench development. As such it supports constructs for
constructing devices, with test mechanisms suchs as assertions
(sequential and immediate), code coverage, and full visibility of
signals values; but it does not (in the CDL language itself) support
more behavioural items such as file I/O, arbitrary clock/timed
processes, etc. The Cyclicity cycle design language is released under
the GPL and the LGPL, and is available at <a
href="http://sourceforge.net/projects/cyclicity-cdl">SourceForge.net</a>.

<?php
page_ep();

include "${toplevel}web_assist/web_footer.php"; ?>


