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

$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
//mysql_select_db($DB,$conn_id);

if ($action == "erfolg") {

	if ($_POST['bild'] == "ok" AND !is_uploaded_file($_FILES['neu_bild']['tmp_name'])) 
		{

			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set kategorie ='".mysqli_real_escape_string($conn_id, $_POST['neu_kategorie'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set artikelnummer ='".mysqli_real_escape_string($conn_id, $_POST['neu_artikelnummer'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set name ='".mysqli_real_escape_string($conn_id, $_POST['neu_name'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set beschreibung ='".mysqli_real_escape_string($conn_id, $_POST['neu_beschreibung'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set preis ='".mysqli_real_escape_string($conn_id, $_POST['neu_preis'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set variante1 ='".mysqli_real_escape_string($conn_id, $_POST['neu_variante1'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set variante2 ='".mysqli_real_escape_string($conn_id, $_POST['neu_variante2'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set status ='".mysqli_real_escape_string($conn_id, $_POST['neu_status'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
		
		}


	if ($_POST['bild'] != "ok" AND !is_uploaded_file($_FILES['neu_bild']['tmp_name'])) 
		{
	
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set kategorie ='".mysqli_real_escape_string($conn_id, $_POST['neu_kategorie'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set artikelnummer ='".mysqli_real_escape_string($conn_id, $_POST['neu_artikelnummer'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set name ='".mysqli_real_escape_string($conn_id, $_POST['neu_name'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set beschreibung ='".mysqli_real_escape_string($conn_id, $_POST['neu_beschreibung'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set preis ='".mysqli_real_escape_string($conn_id, $_POST['neu_preis'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set variante1 ='".mysqli_real_escape_string($conn_id, $_POST['neu_variante1'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set variante2 ='".mysqli_real_escape_string($conn_id, $_POST['neu_variante2'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set status ='".mysqli_real_escape_string($conn_id, $_POST['neu_status'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
		
		}


	if ($_POST['bild'] == "ok" AND is_uploaded_file($_FILES['neu_bild']['tmp_name'])) 
		{

			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set kategorie ='".mysqli_real_escape_string($conn_id, $_POST['neu_kategorie'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set artikelnummer ='".mysqli_real_escape_string($conn_id, $_POST['neu_artikelnummer'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set name ='".mysqli_real_escape_string($conn_id, $_POST['neu_name'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set beschreibung ='".mysqli_real_escape_string($conn_id, $_POST['neu_beschreibung'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set preis ='".mysqli_real_escape_string($conn_id, $_POST['neu_preis'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set variante1 ='".mysqli_real_escape_string($conn_id, $_POST['neu_variante1'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set variante2 ='".mysqli_real_escape_string($conn_id, $_POST['neu_variante2'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set status ='".mysqli_real_escape_string($conn_id, $_POST['neu_status'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");

			$fotoname = "".mysqli_real_escape_string($conn_id, $_POST['id']).".jpg";		

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
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set kategorie ='".mysqli_real_escape_string($conn_id, $_POST['neu_kategorie'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set artikelnummer ='".mysqli_real_escape_string($conn_id, $_POST['neu_artikelnummer'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set name ='".mysqli_real_escape_string($conn_id, $_POST['neu_name'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set beschreibung ='".mysqli_real_escape_string($conn_id, $_POST['neu_beschreibung'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set preis ='".mysqli_real_escape_string($conn_id, $_POST['neu_preis'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set variante1 ='".mysqli_real_escape_string($conn_id, $_POST['neu_variante1'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set variante2 ='".mysqli_real_escape_string($conn_id, $_POST['neu_variante2'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set bild ='$bild' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
			mysqli_query($conn_id, "update ".$PREFIX."_Artikel set status ='".mysqli_real_escape_string($conn_id, $_POST['neu_status'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
		
		
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
