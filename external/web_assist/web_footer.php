<?php

/*a End the main column
 */

page_ep();

echo "</table></td>";

/*a Final vertical divider
 */
echo "<td width=1 bgcolor=black>";
insert_blank(1,1);
echo "</td>";
echo "<td bgcolor=\"$logo_background\" valign=top align=center ></td>";
echo "</tr>\n";

/*a Fourth row: dividing black line
 */
echo "<tr height=1><td bgcolor=\"$nav_background\"></td><td colspan=3 bgcolor=black>";
insert_blank(1,1);
echo "</td>";
echo "<td bgcolor=\"$logo_background\" valign=top align=center ></td>";
echo "</tr>\n";

/*a Fifth row: copyright
 */
echo "<tr><td colspan=4 bgcolor=\"$footer_background\"";

?>
<p class=footer>
This web page copyright &copy; Embisi Inc. 2004, 2005
<br>
<a href="mailto:info@embisi.com">For more information please contact us by email</a>
</td>

<?php
echo "<td bgcolor=\"$logo_background\" valign=top align=center ></td>";
echo "</tr>\n";

/*a End table, end page
 */
?>
</table>
</body>
</html>
