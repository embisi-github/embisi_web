<?php

/*a Include the site map data
 */

include "${toplevel}web_assist/web_site_map.php";

/*a Now output the header with document title
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php

echo "<title>$page_title</title>\n";

/*a Include the CSS in the header*/
include "${toplevel}web_assist/web_css.php";

?>
</head>

<?php

/*a Now build the structure for the page
  The toplevel structure is a table with five rows, each with 4 columns:
    The top is the logo/general navigation bar
    The second is a horizontal bar
    The third is the links bar and contents of the page
    The fourth is a horizontal bar
    The fifth is the copyright bar and final footer
 */
echo "<body bgcolor=\"$page_background\" leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>";

echo "<table border=0 width=100% cellspacing=0 cellpadding=0 bgcolor=\"$body_background\">";

/*a First row: logo and general navigation bar
 */
echo "<tr height=$logo_height>";
echo "<td width=$nav_width bgcolor=\"$logo_background\" valign=top align=left ><img src=\"${toplevel}images/embisi_small.gif\" width=80 height=64 border=0/></td>";
echo "<td width=1 bgcolor=\"$logo_background\" valign=top align=center ></td>";
echo "<td bgcolor=\"$logo_background\" valign=center align=center class=logo height=\"64\">Embisi Inc</td>";
echo "<td width=1 bgcolor=\"$logo_background\" valign=top align=center ></td>";
echo "</tr>";

/*a Second row: horizontal bar
 */
echo "\n<tr class=nomargin height=1>";
echo "<td class=nomargin height=1 bgcolor=\"$nav_background\">";
  echo "<table class=nomargin cellspacing=0 width=100%>";
    echo "<tr class=nomargin>";
      echo "<td width=12 class=nomargin>";
      insert_blank(1,1);
      echo "</td>";
      echo "<td bgcolor=black class=nomargin>";
      insert_blank(1,1);
      echo "</td>";
    echo "</tr>";
  echo "</table>";
echo "</td>";
echo "<td colspan=3 bgcolor=black>";
insert_blank(1,1);
echo "</td></tr>\n";

/*a Third  row: links column, divider, main contents, divider
 */
?>

<tr>

<?php

/*b Navigation column
 */

echo "<td width=$nav_width bgcolor=\"$nav_background\" valign=top align=center >";
include "${toplevel}web_assist/web_navigation.php";
echo "</td>\n";

/*b Vertical bar between the columns
 */
echo "<td width=1 bgcolor=black>";
insert_blank(1,1);
echo "</td>";

/*b Main contents - full width, align top, start the main contents table (contents will be set up as rows of a table)
 */
?>

<td valign="top">
<table border=0 width=100%>

