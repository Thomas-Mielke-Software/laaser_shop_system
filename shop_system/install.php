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

$db_test = @mysql_connect($HOST,$ID,$PW);
if ($db_test) {

 mysql_select_db($DB,$db_test);

 $result = mysql_query("select name,inhalt from ".$PREFIX."_Templates");
 if ($result) 
 {
	echo "<p><b>Bitte löschen Sie diese Datei aus dem Verzeichnis!</b></p>";
	exit();
 }


 $db_select = @mysql_select_db($DB,$db_test);
 if ($db_select) {

	$conn_id = mysql_connect($HOST,$ID,$PW);
	mysql_select_db($DB,$conn_id);
	
	$sql = "CREATE TABLE ".$PREFIX."_Session (
	  id varchar(50) NOT NULL default '',
	  datum varchar(30) NOT NULL default '',
	  PRIMARY KEY  (id)
	) TYPE=MyISAM";
	
	$result = mysql_query($sql,$conn_id); 
	

	$sql = "CREATE TABLE ".$PREFIX."_Warenkorb (
	  id int(11) NOT NULL auto_increment,
	  nr varchar(50) NOT NULL default '',
	  artikelnummer varchar(50) default NULL,
	  name varchar(100) default NULL,
	  menge int(10) default NULL,
	  preis varchar(10) default NULL,
	  variante1 varchar(255) default NULL,
	  variante2 varchar(255) default NULL,
	  PRIMARY KEY  (id)
	) TYPE=MyISAM";

	$result = mysql_query($sql,$conn_id); 
	

	$sql = "CREATE TABLE ".$PREFIX."_Untergruppen (
	  id int(11) NOT NULL auto_increment,
	  main_kat varchar(5) default NULL,
	  anzeige varchar(5) default NULL,
	  name varchar(50) default NULL,
	  PRIMARY KEY  (id)
	) TYPE=MyISAM";
	
	$result = mysql_query($sql,$conn_id); 
	

	$sql = "CREATE TABLE ".$PREFIX."_Hauptgruppen (
	  id int(11) NOT NULL auto_increment,
	  anzeige varchar(5) default NULL,
	  name varchar(50) default NULL,
	  PRIMARY KEY  (id)
	) TYPE=MyISAM";
	
	$result = mysql_query($sql,$conn_id); 


	$sql = "CREATE TABLE ".$PREFIX."_Templates (
	  templateid int(11) NOT NULL auto_increment,
	  name varchar(50) NOT NULL default '',
	  inhalt text NOT NULL,
	  PRIMARY KEY  (templateid)
	) TYPE=MyISAM";
	
	$result = mysql_query($sql,$conn_id); 
	
	
	$sql = "INSERT INTO ".$PREFIX."_Templates (templateid, name, inhalt) VALUES 
	(2, 'mailadresse', 'ihre@email.de'),
	(3, 'mailfooter', 'MfG\r\nFirma XYZ\r\n--\r\nInternet: http://www.test.de\r\ne-mail: test@test.de'),
	(4, 'mailheader', 'Vielen Dank für Ihren Auftrag!\r\n\r\nIhre Bestellung wurde erfolgreich bei uns gespeichert.\r\nIm folgenden erhalten Sie nochmal eine genaue Auflistung\r\naller von Ihnen bestellter Artikel. Bei Fragen oder\r\nProblemen können Sie direkt auf diese E-Mail antworten.'),
	(33, 'shopzeit', '1'),
	(5, 'mindestbestellpreis', '0.00'),
	(6, 'shop', 'enable'),
	(7, 'mindermengenaufschlag', '5.00'),
	(8, 'shopmeldung', 'Der Online-Shop ist z.Z. nicht verfügbar.'),
	(9, 'title1', 'Online-Shop'),
	(10, 'title2', 'Firma XYZ - Online-Shop'),
	(11, 'bgcolor', '#FFFFFF'),
	(12, 'fontsize_title2', '2'),
	(13, 'fontcolor_title2', '#330099'),
	(30, 'agbs', '1. Vertragsschluss\r\n\r\n2. Zahlung und Preise\r\n\r\n3. Lieferung\r\n\r\n4. Rückgaberecht\r\n\r\n5. Eigentumsvorbehalt\r\n\r\n6. Gewährleistung\r\n\r\n7. Datenschutz\r\n\r\n8. Anwendbares Recht'),
	(15, 'fontsize_title3', '2'),
	(16, 'fontcolor_title3', '#FFFFFF'),
	(17, 'footer', 'Ihre Adresse'),
	(18, 'footer_size', '2'),
	(19, 'footer_color', '#000000'),
	(20, 'homepage', 'http://www.url.de'),
	(21, 'style2', 'A:link {text-decoration: none;color : #000066;}\r\nA:visited { text-decoration: none; color : #000066; }\r\nA:active { text-decoration: none; color : #F50000; }\r\nA:hover { text-decoration: none; color :  #F50000; }\r\n\r\n.zurueck:link {text-decoration: none; color : #FFFFFF; }\r\n.zurueck:visited { text-decoration: none; color : #FFFFFF; }\r\n.zurueck:active { text-decoration: none; color : #DDDDDD; }\r\n.zurueck:hover { text-decoration: none; color : #DDDDDD; }'),
	(22, 'text', '#000000'),
	(23, 'link', '#000000'),
	(24, 'vlink', '#000000'),
	(25, 'alink', '#000000'),
	(26, 'style1', 'font {font-family: Verdana, Arial, Helvetica, sans-serif;}'),
	(27, 'fontsize_normal', '2'),
	(28, 'table_color1', '#260DBA'),
	(29, 'table_color2', '#F3F2F8'),
	(31, 'error_color', '#CC0000'),
	(32, 'unternehmen', 'Firma XYZ'),
	(34, 'mehrwertsteuer', '16'),
	(35, 'header', 'ok'),
	(36, 'header_img', 'ok'),
	(37, 'header_text', 'Testme GbR'),
	(38, 'fontsize_header', '2'),
	(39, 'fontcolor_header', '#000000'),
	(40, 'status_green', 'Die Ware ist sofort lieferbar.'),
	(41, 'status_yellow', 'Die Ware ist bestellt.'),
	(42, 'status_red', 'Die Ware ist zur Zeit nicht lieferbar.'),
	(43, 'erfolg_color', '#339933'),
	(44, 'waehrung', 'EUR'),
	(45, 'variante_name1', 'Größe'),
	(46, 'variante_name2', 'Farbe'),
	(47, 'ds_anzahl', '10'),
	(48, 'table_align', ''),
	(49, 'table_width', '600'),
	(50, 'mailadresse_mail', 'deine_email@dein_provider.de')";

	$result = mysql_query($sql,$conn_id); 
	
	
	$sql = "CREATE TABLE ".$PREFIX."_Artikel (
	  id int(11) NOT NULL auto_increment,
	  kategorie varchar(10) default NULL,
	  artikelnummer varchar(30) default NULL,
	  name varchar(100) default NULL,
	  beschreibung text,
	  preis varchar(10) default NULL,
	  bild varchar(30) default NULL,
	  status varchar(5) default NULL,
	  variante1 varchar(255) default NULL,
	  variante2 varchar(255) default NULL,
	  PRIMARY KEY  (id)
	) TYPE=MyISAM";
	
	$result = mysql_query($sql,$conn_id); 
	
	
	$sql = "CREATE TABLE ".$PREFIX."_Zahlarten (
	  zahlartenid int(11) NOT NULL auto_increment,
	  art varchar(50) NOT NULL default '',
	  beschreibung mediumtext,
	  art_kosten varchar(30) NOT NULL default '',
	  PRIMARY KEY  (zahlartenid)
	) TYPE=MyISAM";
	
	
	$result = mysql_query($sql,$conn_id); 
	
	
	$sql = "INSERT INTO ".$PREFIX."_Zahlarten (zahlartenid, art, beschreibung, art_kosten) VALUES (1, 'Nachnahme', 'Bitte beachten Sie, dass die Post eine zusätzliche Gebühr von 1,53 EUR verlangt!', '5.00')";
	
	$result = mysql_query($sql,$conn_id); 
	
	
	$sql = "CREATE TABLE ".$PREFIX."_Bestellungen (
	  nr int(11) NOT NULL auto_increment,
	  datum varchar(50) default NULL,
	  name varchar(50) default NULL,
	  email varchar(50) default NULL,
	  telefon varchar(50) default NULL,
	  r_adresse varchar(200) default NULL,
	  l_adresse varchar(200) default NULL,
	  produkte text,
	  PRIMARY KEY  (nr)
	) TYPE=MyISAM";
	
	$result = mysql_query($sql,$conn_id); 
	$mysql = "ok";
	
	mysql_close($conn_id);
 }
else echo "<p><b>Datenbank-Auswahl nicht erfolgreich, bitte überprüfen Sie die Zugangsdaten (DB)!</b></p>";
}
else echo "<p><b>Datenbank-Connect nicht erfolgreich, bitte überprüfen Sie die Zugangsdaten (HOST,ID,PW)!</b></p>";


if (!isset($ftp)) $ftp = "";

if ($FTP == 1) 

	{

		$conn_ftp = ftp_connect($HOST1); 

			if ($conn_ftp) 
			
				{
	
					$ftp_login = @ftp_login($conn_ftp,$ID1,$PW1);

					if ($ftp_login) 
				
						{	

					 		$ftp_chdir = @ftp_chdir($conn_ftp,$PFAD1);
	
							if ($ftp_chdir)
					
								 {
		
									$ftp = "ok";
									ftp_quit($conn_ftp);
								 }
		
							else echo "<b>FTP-Verzeichniswechsel nicht erfolgreich, bitte überprüfen Sie die Pfadangabe zum Shop-Verzeichnis (PFAD)!</b>";

						}
						else echo "<b>FTP-Login nicht erfolgreich, bitte überprüfen Sie die Login-Daten (ID1,PW1)!</b>";

				}
				else echo "<b>FTP-Connect nicht erfolgreich, bitte überprüfen Sie den Hostnamen (HOST1)!</b>";

	}

else $ftp = "ok";

if ($mysql == "ok" AND $ftp == "ok") echo "<p><b>Installation erfolgreich, diese Datei muß nun aus dem Verzeichnis gelöscht werden!</b></p>";

?>
