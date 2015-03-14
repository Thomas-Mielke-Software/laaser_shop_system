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

// MySQL-Zugangsdaten

$HOST 	 = "xxx";  		// localhost ist bei vielen Hostern der Standardwert
$ID   	 = "xxx";		// Nutzer/User-ID f�r die Datenbank
$PW   	 = "xxx";		// Passwort f�r die Datenbank
$DB   	 = "xxx";		// Datenbank-Name
$PREFIX  = "shop";		// NICHT VER�NDERN !


// Vorschaubilder

$IMAGE_KAT = "1";		// Anzeige von Bildern in der �bersicht ( 1 = aktiv / 0 = nicht aktiv)

// FTP-Upload - alternative Bild-Upload-Methode (wenn der Standard-Bilderupload nicht funktioniert)

$FTP   = "0";			// FTP-Upload ( 1 = aktiv / 0 = nicht aktiv)

$HOST1 = ""; 		// FTP Hostname
$ID1   = ""; 		// Nutzer/User-ID f�r den FTP-Zugang
$PW1   = ""; 		// Passwort f�r den FTP-Zugang
$PFAD  = "/infusions/shop_system/";			// Der Pfad zum Shopverzeichnis ("shop" , "www/shop" , "html/shop" oder "htdocs/shop")

// E-Mail-Versand - alternative E-Mail-Versand-Methode (wenn die Standard-Methode nicht funktioniert)

$SMTP 	     = "1";			// E-Mail-Versand ( 1 = aktiv / 0 = nicht aktiv)

$SMTP_SERVER = "XXX"; 			// SMTP-Server (z.B.: smtp.domain.de)
$SMTP_USER   = "XXX";			// Nutzer/User-ID f�r SMTP-Server
$SMTP_PW     = "XXX";			// Password f�r SMTP-Server

// Pfad zum Bilderverzeichnis
		
$PFAD1 = "$PFAD/images/artikel";	// NICHT VER�NDERN !
$PFAD2 = "$PFAD/images";		// NICHT VER�NDERN !

?>