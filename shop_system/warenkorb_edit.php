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


$conn_id = mysql_connect($HOST,$ID,$PW);
mysql_select_db($DB,$conn_id);

if ($_GET['nr'] != "" ) 
	{

		if ($_POST['menge'] == "0") mysql_query("delete from ".$PREFIX."_Warenkorb where id = '".mysql_real_escape_string($_GET['id'])."'");
		else mysql_query("update ".$PREFIX."_Warenkorb set menge ='".mysql_real_escape_string($_POST['menge'])."' where id = '".mysql_real_escape_string($_GET['id'])."'");

		$result   = mysql_query("SELECT nr FROM ".$PREFIX."_Warenkorb where nr = '".mysql_real_escape_string($_GET['nr'])."'");
		$ergebnis = mysql_num_rows($result);

		if ($ergebnis == 0) 
			{

				mysql_query("delete from ".$PREFIX."_Session where id = '".mysql_real_escape_string($_GET['nr'])."'");
				$_GET['nr'] = "";
	
			}
	}
	
mysql_close($conn_id);
header("Location: warenkorb.php?nr={$_GET['nr']}");

?>
