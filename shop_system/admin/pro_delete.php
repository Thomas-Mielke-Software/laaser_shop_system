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
include LOCALE.LOCALESET."index.php";
include INCLUDES."comments_include.php";
if (!iSUPERADMIN){ redirect("../../../index.php"); };

include ("../xxxxconfig.php");

$conn_id = mysql_connect($HOST,$ID,$PW);
mysql_select_db($DB,$conn_id);

mysql_query("delete from ".$PREFIX."_Artikel where id= '".mysql_real_escape_string($_GET['id'])."'");

if ($_GET['bild'] == "ok")

	{ 

		if ($FTP == "1") 

			{
				$conn_ftp = ftp_connect($HOST1); 
				@ftp_login($conn_ftp,$ID1,$PW1);
				@ftp_chdir($conn_ftp,$PFAD1); 
				@ftp_delete($conn_ftp,"{$_GET['id']}.jpg");
				ftp_quit($conn_ftp);
			}

		else unlink("../images/artikel/{$_GET['id']}.jpg");
	}

mysql_close($conn_id);

header("Location: pro_show.php?kategorie={$_GET['kategorie']}&name_k={$_GET['name_k']}&main_name={$_GET['main_name']}&start=0&sort={$_GET['sort']}&action=erfolg");

?>
