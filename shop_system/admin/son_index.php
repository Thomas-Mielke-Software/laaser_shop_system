
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



require_once "../../../maincore.php";
require_once THEMES."templates/header.php";
require_once THEMES."templates/admin_header.php";

include LOCALE.LOCALESET."index.php";
include INCLUDES."comments_include.php";
if (!iSUPERADMIN){ redirect("../../../index.php"); };

//include FUSION_LANGUAGES.FUSION_LAN."admin/admin_main.php";
//if (!iSUPERADMIN) { header("Location:".FUSION_BASE."index.php"); exit; }

include ("../xxxxconfig.php");
include ("../templates.php");

$conn_id = mysql_connect($HOST,$ID,$PW);
mysql_select_db($DB,$conn_id);

if (!isset($_POST['header'])) $_POST['header'] = "";
if (!isset($POST['header_img'])) $_POST['header_img'] = "";

if (!isset($_GET['typ'])) $_GET['typ'] = "";

if ($_GET['typ'] == "edit") 
	{
		$conn_id = mysql_connect($HOST,$ID,$PW);
		mysql_select_db($DB,$conn_id);

		$name = "unternehmen";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['unternehmen'])."' where name = '$name'");
		
		$name = "footer";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['footer'])."' where name = '$name'");
		
		$name = "homepage";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['homepage'])."' where name = '$name'");
		
		$name = "mailadresse";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['mailadresse'])."' where name = '$name'");
		
		$name = "title1";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['title1'])."' where name = '$name'");
		
		$name = "title2";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['title2'])."' where name = '$name'");
		
		$name = "mindestbestellpreis";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['mindestbestellpreis'])."' where name = '$name'");
		
		$name = "mindermengenaufschlag";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['mindermengenaufschlag'])."' where name = '$name'");
		
		$name = "shopzeit";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['shopzeit'])."' where name = '$name'");
		
		$name = "mailheader";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['mailheader'])."' where name = '$name'");
		
		$name = "mailfooter";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['mailfooter'])."' where name = '$name'");
		
		$name = "shopmeldung";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['shopmeldung'])."' where name = '$name'");
		
		$name = "agbs";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['agbs'])."' where name = '$name'");
		
		$name = "mehrwertsteuer";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['mehrwertsteuer'])."' where name = '$name'");
		
		$name = "header";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['header'])."' where name = '$name'");
		
		$name = "header_text";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['header_text'])."' where name = '$name'");
		
		$name = "header_img";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['header_img'])."' where name = '$name'");
		
		$name = "status_green";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['status_green'])."' where name = '$name'");
		
		$name = "status_yellow";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['status_yellow'])."' where name = '$name'");
		
		$name = "status_red";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['status_red'])."' where name = '$name'");
		
		$name = "waehrung";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['waehrung'])."' where name = '$name'");
	
		$name = "variante_name1";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['variante_name1'])."' where name = '$name'");
	
		$name = "variante_name2";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['variante_name2'])."' where name = '$name'");

		$name = "mailadresse_mail";
		mysql_query("update ".$PREFIX."_Templates set inhalt ='".mysql_real_escape_string($_POST['mailadresse_mail'])."' where name = '$name'");
		if (is_uploaded_file($_FILES['neu_header_img']['tmp_name'])) 
			{

				$fotoname = "logo.gif";

				if ($FTP == "1") 

					{

						$conn_ftp = ftp_connect($HOST1); 
						@ftp_login($conn_ftp,$ID1,$PW1);
						@ftp_chdir($conn_ftp,$PFAD2);
					
						@ftp_delete($conn_ftp,$fotoname);
				
						$mode = FTP_BINARY;
					
						$file = fopen($_FILES['neu_header_img']['tmp_name'],"r");
						@ftp_fput($conn_ftp,$fotoname,$file,$mode);
						fclose($file);
						ftp_quit($conn_ftp);
					
					}
				
				else 
				
					{
				
						move_uploaded_file(($_FILES['neu_header_img']['tmp_name']),"../images/$fotoname");
						chmod ("../images/$fotoname", 0777);

					}
		
			}

		$action = "erfolg";
		opentable("Sonstige Einstellungen");
		echo "<br><br>Einstellungen wurden gespeichert.";
		closetable();
	}
else
{
	opentable("Sonstige Einstellungen");
	echo $_SERVER['PHP_SELF'];
	?></p>
	<form name="form1" action="<? echo $_SERVER['REQUEST_URI'] ?>?typ=edit" enctype="multipart/form-data" method="post">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr> 
		  <td width="22" height="50">&nbsp;</td>
		  <td height="50" colspan="2"><b><font size="4">Shop - Administration - Sonstige 
			Einstellungen </font></b></td>
		</tr>
		<? if ($action == "erfolg") { ?>
		<tr> 
		  <td width="22" height="50">&nbsp;</td>
		  <td height="50" colspan="2"><b><font color="#006600">Erfolg: Die &Auml;nderungen 
			wurden &uuml;bernommen!</font></b></td>
		</tr>
		<? } ?>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">Firmenadresse (Footer):</td>
		  <td width="481" height="30" valign="top">
			<input type="text" class="textbox" name="footer" maxlength="100" size="50" value="<? echo $FOOTER ?>">
			</td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">Homepage (Footer):</td>
		  <td width="481" height="30" valign="top"> 
			<input type="text" class="textbox" name="homepage" maxlength="100" size="50" value="<? echo $HOMEPAGE ?>">
			</td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">E-Mail-Adresse (Footer):</td>
		  <td width="481" height="30" valign="top">
			<input type="text" class="textbox" name="mailadresse" maxlength="100" size="50" value="<? echo $EMAIL ?>">
			</td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">&nbsp;</td>
		  <td width="481" height="30" valign="top">&nbsp;</td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">Seitentitel: (im Browserkopf)</td>
		  <td width="481" height="30" valign="top"> 
			<input type="text" class="textbox" name="title1" maxlength="100" size="50" value="<? echo $TITLE1 ?>">
		  </td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">Seiten&uuml;berschrift:</td>
		  <td width="481" height="30" valign="top"> 
			<input type="text" class="textbox" name="title2" maxlength="100" size="50" value="<? echo $TITLE2 ?>">
		  </td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">&nbsp;</td>
		  <td width="481" height="30" valign="top">&nbsp;</td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">W&auml;hrung:</td>
		  <td width="481" height="30" valign="top"> 
			<input type="text" class="textbox" name="waehrung" maxlength="6" size="6" value="<? echo $waehrung ?>">
		  </td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">Mindestbestellpreis</td>
		  <td width="481" height="30" valign="top"> 
			<input type="text" class="textbox" name="mindestbestellpreis" maxlength="6" size="6" value="<? echo $mindestbestellpreis ?>">
			<? echo $waehrung ?>
			(z.B.: 6.95)</td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">Mindermengenaufschlag:</td>
		  <td width="481" height="30" valign="top"> 
			<input type="text" class="textbox" name="mindermengenaufschlag" maxlength="6" size="6" value="<? echo $mindermengenaufschlag ?>">
			<? echo $waehrung ?>
			(z.B.: 6.95)</td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">Mehrwertsteuer:</td>
		  <td width="481" height="30" valign="top"> 
			<input type="text" class="textbox" name="mehrwertsteuer" maxlength="6" size="6" value="<? echo $mehrwertsteuer ?>">
			Prozent </td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">Shop-Deakivierungszeit:</td>
		  <td width="481" height="30" valign="top"> 
			<input type="text" class="textbox" name="shopzeit" maxlength="6" size="6" value="<? echo $shopzeit ?>">
			Minuten </td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">&nbsp;</td>
		  <td width="481" height="30" valign="top">&nbsp;</td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">E-Mail-Adresse (E-Mail):</td>
		  <td width="481" height="30" valign="top"> 
			<input type="text" class="textbox" name="mailadresse_mail" maxlength="100" size="50" value="<? echo $mailadresse_mail ?>">
		  </td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">Firmenname (E-Mail):</td>
		  <td width="481" height="30" valign="top"> 
			<input type="text" class="textbox" name="unternehmen" maxlength="100" size="50" value="<? echo $unternehmen ?>">
		  </td>
		</tr>
		<tr> 
		  <td width="22" height="93">&nbsp;</td>
		  <td width="193" height="93" valign="top">Bestellkopfzeile (E-Mail):</td>
		  <td width="481" height="93" valign="top"> 
			<textarea class="textbox" name="mailheader" rows="5" cols="50"><? echo $mailheader ?></textarea>
		  </td>
		</tr>
		<tr> 
		  <td width="22" height="93">&nbsp;</td>
		  <td width="193" height="93" valign="top">Bestellfusszeile (E-Mail):</td>
		  <td width="481" height="93" valign="top"> 
			<textarea class="textbox" name="mailfooter" rows="5" cols="50"><? echo $mailfooter ?></textarea>
		  </td>
		</tr>
		<tr> 
		  <td width="22" height="105">&nbsp;</td>
		  <td width="193" height="105" valign="top">Shopmeldung (wenn deaktiv):</td>
		  <td width="481" height="105" valign="top"> 
			<textarea class="textbox" name="shopmeldung" rows="5" cols="50"><? echo $shopmeldung1 ?></textarea>
		  </td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">Statusmeldung - gr&uuml;n:</td>
		  <td width="481" height="30" valign="top"> 
			<input type="text" class="textbox" name="status_green" maxlength="100" size="50" value="<? echo $status_green ?>">
		  </td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">Statusmeldung - gelb:</td>
		  <td width="481" height="30" valign="top"> 
			<input type="text" class="textbox" name="status_yellow" maxlength="100" size="50" value="<? echo $status_yellow ?>">
		  </td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">Statusmeldung - rot:</td>
		  <td width="481" height="30" valign="top"> 
			<input type="text" class="textbox" name="status_red" maxlength="100" size="50" value="<? echo $status_red ?>">
		  </td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">Variante 1 (Name):</td>
		  <td width="481" height="30" valign="top"> 
			<input type="text" class="textbox" name="variante_name1" maxlength="100" size="50" value="<? echo $variante_name1 ?>">
		  </td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30" valign="top">Variante 2 (Name):</td>
		  <td width="481" height="30" valign="top"> 
			<input type="text" class="textbox" name="variante_name2" maxlength="100" size="50" value="<? echo $variante_name2 ?>">
		  </td>
		</tr>
		<tr> 
		  <td width="22" height="93">&nbsp;</td>
		  <td width="193" height="93" valign="top">AGB&acute;s</td>
		  <td width="481" height="93" valign="top"> 
			<textarea class="textbox" name="agbs" rows="25" cols="50"><? echo $AGBS ?></textarea>
		  </td>
		</tr>
		<tr> 
		  <td width="22" height="40">&nbsp;</td>
		  <td height="40" valign="top">&nbsp; </td>
		  <td height="40"> 
			<input type="image" src="speichern.gif" name="image">
		  </td>
		</tr>
		<tr> 
		  <td width="22" height="30">&nbsp;</td>
		  <td width="193" height="30">&nbsp;</td>
		  <td width="481" height="30">&nbsp;</td>
		</tr>
		<tr> 
		  <td width="22" height="25">&nbsp;</td>
		  <td height="25" colspan="2"><a href="hilfe.php#sonstige">Online-Hilfe</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Hauptmen&uuml;</a></td>
		</tr>
	  </table>
	</form>
	<?

	closetable();
}

require_once THEMES."templates/footer.php";
?>
