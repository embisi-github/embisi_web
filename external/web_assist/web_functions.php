<?php

/*a General
 */
function insert_blank( $width, $height )
{
    echo "<img src=\"${toplevel}images/transparent.gif\" width=$width height=$height/>";
}

/*a Page/section functions
 */
function page_identifier( $type, $value )
{
    global $page_details;
    $page_details["header"][$type]=$value;
}

$page_details["header"]["title"] = "";

function page_header( $text )
{
    global $page_details;
    page_ep();
    echo "<tr><td>\n";
    echo "<div align=center><br><h1>$text</h1></div>\n";
    foreach ($page_details["header"] as $key=>$value) {
        if ($key!="title")
        {
            echo "<div align=center><b>$value</b></div>\n";
        }
    }
    echo "</td></tr>\n";
    page_sp();
}

function page_sp()
{
    global $page_details;
    if ($page_details["active"]==0)
    {
        echo "<tr><td>\n";
        $page_details["active"]=1;
    }
}

function page_ep()
{
    global $page_details;
    if ($page_details["active"])
    {
        echo "</td></tr>\n";
        $page_details["active"]=0;
    }
}

function page_section( $tag, $heading )
{
    page_ep();
    echo "<tr><td><div align=center><br><a name=$tag></a><h2>$heading</h2></div></td></tr>\n";
    page_sp();
}

function page_subsection( $tag, $heading )
{
    page_ep();
    echo "<tr><td><a name=$tag></a><h3 class=tobody>$heading</h3></div></td></tr>\n";
    page_sp();
}

function page_subsubsection( $tag, $heading )
{
    page_ep();
    echo "<tr><td><a name=$tag class=tobody></a><h4>$heading</h4></div></td></tr>\n";
    page_sp();
}

function page_link( $href, $text )
{
    return "<a href=\"$href\">$text</a>";
}

$page_details["active"] = 0;

/*a Navigation links
 */
/*f nav_link_start
 */
function nav_link_start( $text )
{
    global $nav_link;
    $nav_link["hier"] = 0;
    $nav_link["side"] = 0;
    echo "<table width=100%>\n";
    echo "<tr><td class=linkhdr>$text</td></tr>";
}

/*f nav_link_start_hierarchy
 */
function nav_link_start_hierarchy( $text )
{
    global $nav_link;
    $nav_link["hier"] = 1;
    $nav_link["first"] = 1;
    $nav_link["level"] = 0;
    echo "<table width=100%>\n";
    if ($text!="")
    {
        echo "<tr><td class=linkhdr>$text</td></tr>";
    }
    echo "<tr><td class=link align=left>";
}

/*f nav_link_end
 */
function nav_link_end()
{
    global $nav_link;
    if ($nav_link["hier"])
    {
        echo "</td></tr>";
    }
    else
    {
    }
    echo "</table>\n";
}

/*f nav_link_add
 */
function nav_link_add( $href, $text )
{
    global $nav_link, $toplevel;
    if (!strstr($href,"http:"))
    {
        $href= "$toplevel$href";
    }
    if ($nav_link["hier"])
    {
        if ($nav_link["first"]==0)
        {
            echo "<br>\n";
        }
        $nav_link["first"]=0;
        for ($i=0; $i<$nav_link["level"]; $i++)
        {
            echo "&nbsp;&nbsp;";
        }
        echo "<a class=nav href=\"$href\">$text</a>\n";
    }
    else
    {
        if ($nav_link["side"]==0)
        {
            echo "<tr><td class=link align=left><a class=nav href=\"$href\">$text</a></td></tr>\n";
        }
        else
        {
            echo "<tr><td class=link align=right><a class=nav href=\"$href\">$text</a></td></tr>\n";
        }
        echo "<tr><td>";
        insert_blank( $nav_width, 5 );
        echo "</td></tr>";
    }
    $nav_link["side"] = !$nav_link["side"];
}

/*f nav_link_push
 */
function nav_link_push()
{
    global $nav_link;
    $nav_link["level"] = $nav_link["level"]+1;
}

/*f nav_link_pop
 */
function nav_link_pop()
{
    global $nav_link;
    $nav_link["level"] = $nav_link["level"]-1;
}

/*a Site map
 */
/*v Variables
 */
$site_map["level"] = 0;
$site_map["tag"][0] = "";
$site_map["count"][0] = 0;

/*f site_map
 */
function site_map( $marker, $href, $text )
{
    global $site_map;
    $level = $site_map["level"];
    $site_map["count"][$level] = $site_map["count"][$level]+1;
    $count = $site_map["count"][$level];
    $tag = $site_map["tag"][$level].".".$count;
    $site_map["markers"][$tag] = $marker;
    if ($level>0)
    {
        $ptag = $site_map["tag"][$level-1].".".$site_map["count"][$level-1];;
        $site_map["hrefs"][$tag] = $site_map["path"][$ptag].$href;
    }
    else
    {
        $site_map["hrefs"][$tag] = $href;
    }
    $site_map["texts"][$tag] = $text;
}

/*f site_push
 */
function site_push( $path )
{
    global $site_map;
    $level = $site_map["level"];
    $count = $site_map["count"][$level];
    $tag = $site_map["tag"][$level].".".$count;
    if ($level>0)
    {
        $ptag = $site_map["tag"][$level-1].".".$site_map["count"][$level-1];;
        $site_map["path"][$tag] = $site_map["path"][$ptag].$path;
    }
    else
    {
        $site_map["path"][$tag] = $path;
    }
    $site_map["nsublinks"][$tag] = 0;
    $site_map["level"] = $site_map["level"]+1;
    $site_map["count"][$level+1] = 0;
    $site_map["tag"][$level+1] = $site_map["tag"][$level].".".$count;
}

/*f site_pop
 */
function site_pop()
{
    global $site_map;
    $level = $site_map["level"];
    $count = $site_map["count"][$level];
    $tag = $site_map["tag"][$level-1].".".$site_map["count"][$level-1];;
    $site_map["nsublinks"][$tag] = $count;
    $site_map["level"] = $site_map["level"]-1;
    if ($site_map["level"]<0)
    {
        echo "<h1>BUG IN SITE NAVIGATION - POPPED TOO FAR</h1>";
    }
}

/*f site_done
 */
function site_done()
{
    global $site_map;
    if ($site_map["level"]!=0)
    {
        echo "<h1>BUG IN SITE NAVIGATION - NOT AT TOPLEVEL AT COMPLETION</h1>";
    }
}

/*f site_set_location
 */
function site_set_location( $markers )
{
    global $site_depth, $site_position;
    $site_depth = 1;
    $site_position = ".".$markers;
}

/*a Done
 */
?>
