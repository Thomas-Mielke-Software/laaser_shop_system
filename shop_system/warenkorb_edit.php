<? 
/*---------------------------------------------------+
| PHP-Fusion 7 Content Management System
+----------------------------------------------------+
| Copyright � 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+----------------------------------------------------+
| Released under the terms & conditions of v2 of the
| GNU General Public License. For details refer to
| the included gpl.txt file or visit http://gnu.org
+------------------------------------------------------
| Laaser Shop System
| Copyright: J�rgen Laaser, 2002-2005
| angepasst f�r Fusion 5 von Carsten Pukass
| angepasst f�r Fusion 6 von firemike
| angepasst f�r Fusion 7 von Thomas Mielke
+-----------------------------------------------------*/

include ("xxxxconfig.php");


$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
//mysql_select_db($DB,$conn_id);

if ($_GET['nr'] != "" ) 
	{

		if ($_POST['menge'] == "0") mysqli_query($conn_id, "delete from ".$PREFIX."_Warenkorb where id = '".mysqli_real_escape_string($conn_id, $_GET['id'])."'");
		else mysqli_query($conn_id, "update ".$PREFIX."_Warenkorb set menge ='".mysqli_real_escape_string($conn_id, $_POST['menge'])."' where id = '".mysqli_real_escape_string($conn_id, $_GET['id'])."'");

		$result   = mysqli_query($conn_id, "SELECT nr FROM ".$PREFIX."_Warenkorb where nr = '".mysqli_real_escape_string($conn_id, $_GET['nr'])."'");
		$ergebnis = mysqli_num_rows($result);

		if ($ergebnis == 0) 
			{

				mysqli_query($conn_id, "delete from ".$PREFIX."_Session where id = '".mysqli_real_escape_string($conn_id, $_GET['nr'])."'");
				$_GET['nr'] = "";
	
			}
	}
	
mysqli_close($conn_id);
header("Location: warenkorb.php?nr={$_GET['nr']}");

?>
