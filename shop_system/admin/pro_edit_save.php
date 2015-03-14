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

if (!$_POST['neu_artikelnummer']): $action = "error";
elseif (!$_POST['neu_name']): $action = "error";
elseif (!$_POST['neu_beschreibung']): $action = "error";
elseif (!$_POST['neu_preis']): $action = "error";
else: $action = "erfolg";
endif;

$conn_id = mysql_connect($HOST,$ID,$PW);
mysql_select_db($DB,$conn_id);

if ($action == "erfolg") {

	if ($_POST['bild'] == "ok" AND !is_uploaded_file($_FILES['neu_bild']['tmp_name'])) 
		{

			mysql_query("update ".$PREFIX."_Artikel set kategorie ='".mysql_real_escape_string($_POST['neu_kategorie'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set artikelnummer ='".mysql_real_escape_string($_POST['neu_artikelnummer'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set name ='".mysql_real_escape_string($_POST['neu_name'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set beschreibung ='".mysql_real_escape_string($_POST['neu_beschreibung'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set preis ='".mysql_real_escape_string($_POST['neu_preis'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set variante1 ='".mysql_real_escape_string($_POST['neu_variante1'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set variante2 ='".mysql_real_escape_string($_POST['neu_variante2'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set status ='".mysql_real_escape_string($_POST['neu_status'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
		
		}


	if ($_POST['bild'] != "ok" AND !is_uploaded_file($_FILES['neu_bild']['tmp_name'])) 
		{
	
			mysql_query("update ".$PREFIX."_Artikel set kategorie ='".mysql_real_escape_string($_POST['neu_kategorie'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set artikelnummer ='".mysql_real_escape_string($_POST['neu_artikelnummer'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set name ='".mysql_real_escape_string($_POST['neu_name'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set beschreibung ='".mysql_real_escape_string($_POST['neu_beschreibung'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set preis ='".mysql_real_escape_string($_POST['neu_preis'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set variante1 ='".mysql_real_escape_string($_POST['neu_variante1'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set variante2 ='".mysql_real_escape_string($_POST['neu_variante2'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set status ='".mysql_real_escape_string($_POST['neu_status'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
		
		}


	if ($_POST['bild'] == "ok" AND is_uploaded_file($_FILES['neu_bild']['tmp_name'])) 
		{

			mysql_query("update ".$PREFIX."_Artikel set kategorie ='".mysql_real_escape_string($_POST['neu_kategorie'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set artikelnummer ='".mysql_real_escape_string($_POST['neu_artikelnummer'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set name ='".mysql_real_escape_string($_POST['neu_name'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set beschreibung ='".mysql_real_escape_string($_POST['neu_beschreibung'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set preis ='".mysql_real_escape_string($_POST['neu_preis'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set variante1 ='".mysql_real_escape_string($_POST['neu_variante1'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set variante2 ='".mysql_real_escape_string($_POST['neu_variante2'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set status ='".mysql_real_escape_string($_POST['neu_status'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");

			$fotoname = "".mysql_real_escape_string($_POST['id']).".jpg";		

			if ($FTP == "1")

				{
	
					$conn_ftp = ftp_connect($HOST1); 
					ftp_login($conn_ftp,$ID1,$PW1);
					ftp_chdir($conn_ftp,$PFAD1);
							
					@ftp_delete($conn_ftp,$fotoname);
		
					$mode = FTP_BINARY;
					
					$file = fopen($_FILES['neu_bild']['tmp_name'],"r");
						@ftp_fput($conn_ftp,$fotoname,$file,$mode);
					fclose($file);
				}

			else

				{
					unlink("../images/artikel/$fotoname");
					move_uploaded_file(($_FILES['neu_bild']['tmp_name']),"../images/artikel/$fotoname");
					chmod ("../images/artikel/$fotoname", 0777);

				}

	
		}
	
	if ($_POST['bild']!= "ok" AND is_uploaded_file($_FILES['neu_bild']['tmp_name'])) 
		{

			$bild = "ok";
			mysql_query("update ".$PREFIX."_Artikel set kategorie ='".mysql_real_escape_string($_POST['neu_kategorie'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set artikelnummer ='".mysql_real_escape_string($_POST['neu_artikelnummer'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set name ='".mysql_real_escape_string($_POST['neu_name'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set beschreibung ='".mysql_real_escape_string($_POST['neu_beschreibung'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set preis ='".mysql_real_escape_string($_POST['neu_preis'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set variante1 ='".mysql_real_escape_string($_POST['neu_variante1'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set variante2 ='".mysql_real_escape_string($_POST['neu_variante2'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set bild ='$bild' where id = '".mysql_real_escape_string($_POST['id'])."'");
			mysql_query("update ".$PREFIX."_Artikel set status ='".mysql_real_escape_string($_POST['neu_status'])."' where id = '".mysql_real_escape_string($_POST['id'])."'");
		
		
			$fotoname = "{$_POST['id']}.jpg";

			if ($FTP == "1")

				{
					$conn_ftp = ftp_connect($HOST1); 
					@ftp_login($conn_ftp,$ID1,$PW1);
					@ftp_chdir($conn_ftp,$PFAD1); 
					$mode = FTP_BINARY;
			
					$file = fopen($_FILES['neu_bild']['tmp_name'],"r");
					@ftp_fput($conn_ftp,$fotoname,$file,$mode);
					fclose($file);

				}

			else

				{
	
					move_uploaded_file(($_FILES['neu_bild']['tmp_name']),"../images/artikel/$fotoname");
					chmod ("../images/artikel/$fotoname", 0777);

				}

	
		}

mysql_close($conn_id);

header("Location: pro_show.php?kategorie={$_POST['kategorie']}&id={$_POST['id']}&action=$action&name_k={$_POST['name_k']}&main_name={$_POST['main_name']}&start={$_POST['start']}&sort={$_POST['sort']}");
}

else header("Location: pro_edit.php?kategorie={$_POST['kategorie']}&id={$_POST['id']}&action=$action&name_k={$_POST['name_k']}&main_name={$_POST['main_name']}&start={$_POST['start']}&sort={$_POST['sort']}");

?>
