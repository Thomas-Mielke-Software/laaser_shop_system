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

// MySQL-Zugangsdaten

$HOST 	 = "xxx";  		// localhost ist bei vielen Hostern der Standardwert
$ID   	 = "xxx";		// Nutzer/User-ID für die Datenbank
$PW   	 = "xxx";		// Passwort für die Datenbank
$DB   	 = "xxx";		// Datenbank-Name
$PREFIX  = "shop";		// NICHT VERÄNDERN !


// Vorschaubilder

$IMAGE_KAT = "1";		// Anzeige von Bildern in der Übersicht ( 1 = aktiv / 0 = nicht aktiv)

// FTP-Upload - alternative Bild-Upload-Methode (wenn der Standard-Bilderupload nicht funktioniert)

$FTP   = "0";			// FTP-Upload ( 1 = aktiv / 0 = nicht aktiv)

$HOST1 = ""; 		// FTP Hostname
$ID1   = ""; 		// Nutzer/User-ID für den FTP-Zugang
$PW1   = ""; 		// Passwort für den FTP-Zugang
$PFAD  = "/infusions/shop_system/";			// Der Pfad zum Shopverzeichnis ("shop" , "www/shop" , "html/shop" oder "htdocs/shop")

// E-Mail-Versand - alternative E-Mail-Versand-Methode (wenn die Standard-Methode nicht funktioniert)

$SMTP 	     = "1";			// E-Mail-Versand ( 1 = aktiv / 0 = nicht aktiv)

$SMTP_SERVER = "XXX"; 			// SMTP-Server (z.B.: smtp.domain.de)
$SMTP_USER   = "XXX";			// Nutzer/User-ID für SMTP-Server
$SMTP_PW     = "XXX";			// Password für SMTP-Server

// Pfad zum Bilderverzeichnis
		
$PFAD1 = "$PFAD/images/artikel";	// NICHT VERÄNDERN !
$PFAD2 = "$PFAD/images";		// NICHT VERÄNDERN !

?>