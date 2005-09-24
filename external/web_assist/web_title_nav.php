<?php

/*a Insert global navigation area
 */
/*f title_link_add
 */
function title_link_add( $href, $text )
{
    global $nav_link, $toplevel;
    if (!strstr($href,"http:"))
    {
        $href= "$toplevel$href";
    }
    echo "<td class=link align=center><a class=titlenav href=\"$href\">$text</a></td>";
}

title_link_add( "index.php", "Home" );
title_link_add( "company", "Company" );
title_link_add( "technology", "Technology" );
title_link_add( "company/people", "People" );
title_link_add( "background", "Background" );
