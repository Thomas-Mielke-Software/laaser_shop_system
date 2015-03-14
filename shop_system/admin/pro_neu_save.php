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

if (!$_POST['artikelnummer']): $action = "error";
elseif (!$_POST['name']): $action = "error";
elseif (!$_POST['beschreibung']): $action = "error";
elseif (!$_POST['preis']): $action = "error";
else: $action = "erfolg";
endif;

if ($action == "erfolg") 
	{
	
		if (is_uploaded_file($_FILES['bild']['tmp_name'])) $bild1 = "ok";

		if (!isset($bild1)) $bild1 = "";
	
		$conn_id = mysql_connect($HOST,$ID,$PW);
		mysql_select_db($DB,$conn_id);
		
		mysql_query("insert into ".$PREFIX."_Artikel (kategorie,artikelnummer,name,beschreibung,preis,bild,variante1,variante2,status) VALUES ('".mysql_real_escape_string($_POST['nkategorie'])."','".mysql_real_escape_string($_POST['artikelnummer'])."','".mysql_real_escape_string($_POST['name'])."','".mysql_real_escape_string($_POST['beschreibung'])."','".mysql_real_escape_string($_POST['preis'])."','$bild1','".mysql_real_escape_string($_POST['variante1'])."','".mysql_real_escape_string($_POST['variante2'])."','".mysql_real_escape_string($_POST['status'])."')"); 
	
		if ($bild1 == "ok") 
			{
	
				$result = mysql_query("select id from ".$PREFIX."_Artikel where name = '".mysql_real_escape_string($_POST['name'])."'"); 
				while ($row = mysql_fetch_object($result))
					{
					
					$id     = $row->id;
					
					}
				$fotoname = "$id.jpg";

				if ($FTP == "1") 
					{
				
						$conn_ftp = ftp_connect($HOST1); 
						@ftp_login($conn_ftp,$ID1,$PW1);
						@ftp_chdir($conn_ftp,$PFAD1); 
						$mode = FTP_BINARY;
				
						$file = fopen($_FILES['bild']['tmp_name'],"r");
						@ftp_fput($conn_ftp,$fotoname,$file,$mode);
						fclose($file);
						ftp_quit($conn_ftp);
					}
				else
					{

						move_uploaded_file(($_FILES['bild']['tmp_name']),"../images/artikel/$fotoname");
						chmod ("../images/artikel/$fotoname", 0777);
					}
			
				mysql_close($conn_id);
			
			}
		
	header("Location: pro_index.php?action=$action");
	}

else header("Location: pro_neu.php?artikelnummer={$_POST['artikelnummer']}&name={$_POST['name']}&beschreibung={$_POST['beschreibung']}&preis={$_POST['preis']}&variante1={$_POST['variante1']}&variante2={$_POST['variante2']}&action=$action");

?>
