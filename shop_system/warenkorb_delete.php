<? 
/*---------------------------------------------------+
| PHP-Fusion 7 Content Management System
+----------------------------------------------------+
| Copyright © 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+------------------------------------------------------
| Laaser Shop System
| Copyright: Jürgen Laaser, 2002-2005
| angepasst für Fusion 5 von Carsten Pukass
| angepasst für Fusion 6 von firemike
| angepasst für Fusion 7 von Thomas Mielke
+-----------------------------------------------------*/
include ("xxxxconfig.php");


$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
//mysql_select_db($DB,$conn_id);

mysqli_query($conn_id, "delete from ".$PREFIX."_Session where id = '".mysqli_real_escape_string($conn_id, $_GET['nr'])."'");
mysqli_query($conn_id, "delete from ".$PREFIX."_Warenkorb where nr = '".mysqli_real_escape_string($conn_id, $_GET['nr'])."'");

mysql_close($conn_id);

header("Location: warenkorb.php?nr=");

?>
