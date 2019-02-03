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
| Copyright: J¸rgen Laaser, 2002-2005
| angepasst f¸r Fusion 5 von Carsten Pukass
| angepasst f¸r Fusion 6 von firemike
| angepasst f¸r Fusion 7 von Thomas Mielke
+-----------------------------------------------------*/

//error_reporting(E_ALL);
//ini_set("display_errors", 1); 
// search/replace: (\$_GET\['[a-zA-Z0-9_]*'\]) -> mysql_real_escape_string\($1\)
// search/replace: (\$_POST\['[a-zA-Z0-9_]*'\]) -> mysql_real_escape_string\($1\)
// search/replace: \{(mysql_real_escape_string\(\$_[A-Z][A-Z][A-Z][A-Z]?\['[a-zA-Z0-9_]*'\]\))\} -> ".$1."


include ("xxxxconfig.php");
include ("templates.php");
;

if (!$_GET['nr']) 

	{ 
		header("Location: warenkorb.php?nr={$_GET['nr']}");
		exit();
	
	}


$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
//mysql_select_db($DB,$conn_id);
	
if (!isset($bestellung)) $bestellung = "";
if (!isset($bestellpreis)) $bestellpreis = "";
if (!isset($bestell_db)) $bestell_db = "";
if (!isset($zahlung)) $zahlung = "";
if (!isset($zahlung1)) $zahlung1 = "";
if (!isset($adressen)) $adressen = "";
if (!isset($r_adresse)) $r_adresse = "";
if (!isset($l_adresse)) $l_adresse = "";

if (!isset($action1)) $action1 = "";

if (!isset($_POST['agbs']))$_POST['agbs'] = "";
if (!isset($_POST['kontoinhaber'])) $_POST['kontoinhaber'] = "";
if (!isset($_POST['kontonr'])) $_POST['kontonr'] = "";
if (!isset($_POST['blz'])) $_POST['blz'] = "";
if (!isset($_POST['bank'])) $_POST['bank'] = "";
if (!isset($_POST['check'])) $_POST['check'] = "";


if ($shop == "enable")
	
	{

	if ($_POST['zahlungsart'] == "Lastschrift") 
		{
	
			if (!$_POST['agbs']): $action1 = "error";
			elseif (!$_POST['kontoinhaber']): $action1 = "error";
			elseif (!$_POST['kontonr']): $action1 = "error";
			elseif (!$_POST['blz']): $action1 = "error";
			elseif (!$_POST['bank']): $action1 = "error";
			else: $action1 = "";
			endif;
			
		}
	
	else if (!$_POST['agbs']) $action1 = "error";
	
	if ($action1 == "error" AND $_POST['zahlungsart'] != "Lastschrift"): 
		{

			mysqli_close($conn_id);
			if ($_POST['check'] == "") header("Location: warenkorb_senden_2.php?action1=error&agbs={$_POST['agbs']}&name={$_POST['name']}&strasse={$_POST['strasse']}&plz={$_POST['plz']}&ort={$_POST['ort']}&telefon={$_POST['telefon']}&email={$_POST['email']}&zahlungsart={$_POST['zahlungsart']}&nr={$_GET['nr']}");
			else header("Location: warenkorb_senden_2.php?action1=error&agbs={$_POST['agbs']}&name={$_POST['name']}&strasse={$_POST['strasse']}&plz={$_POST['plz']}&ort={$_POST['ort']}&telefon={$_POST['telefon']}&email={$_POST['email']}&check={$_POST['check']}&lief_name={$_POST['lief_name']}&lief_strasse={$_POST['lief_strasse']}&lief_plz={$_POST['lief_plz']}&lief_ort={$_POST['lief_ort']}&zahlungsart={$_POST['zahlungsart']}&nr={$_GET['nr']}");
		
		}
		
	elseif ($action1 == "error" AND $_POST['zahlungsart'] == "Lastschrift"): 
		{

			mysqli_close($conn_id);
			if ($_POST['check'] == "") header("Location: warenkorb_senden_2.php?action1=error&agbs={$_POST['agbs']}&name={$_POST['name']}&strasse={$_POST['strasse']}&plz={$_POST['plz']}&ort={$_POST['ort']}&telefon={$_POST['telefon']}&email={$_POST['email']}&zahlungsart={$_POST['zahlungsart']}&kontoinhaber={$_POST['kontoinhaber']}&kontonr={$_POST['kontonr']}&blz={$_POST['blz']}&bank={$_POST['bank']}&nr={$_GET['nr']}");
			else header("Location: warenkorb_senden_2.php?action1=error&agbs={$_POST['agbs']}&name={$_POST['name']}&strasse={$_POST['strasse']}&plz={$_POST['plz']}&ort={$_POST['ort']}&telefon={$_POST['telefon']}&email={$_POST['email']}&check={$_POST['check']}&lief_name={$_POST['lief_name']}&lief_strasse={$_POST['lief_strasse']}&lief_plz={$_POST['lief_plz']}&lief_ort={$_POST['lief_ort']}&zahlungsart={$_POST['zahlungsart']}&kontoinhaber={$_POST['kontoinhaber']}&kontonr={$_POST['kontonr']}&blz={$_POST['blz']}&bank={$_POST['bank']}&nr={$_GET['nr']}");
		
		}
		
	else: 
		{

		$versandkosten = $_POST['art_kosten'];

		if (!$_POST['lief_name']) $bestellung .= "2. bestellte Artikel: ";
		else $bestellung .= "3. bestellte Artikel: ";
		$bestellung .= "\r\n";
		$bestellung .= "\r\n";

		$result = mysqli_query($conn_id, "select * from ".$PREFIX."_Warenkorb where nr = '".mysqli_real_escape_string($conn_id, $_GET['nr'])."' order by name");
		
		while ($row = mysqli_fetch_object($result))
			{

				$artikelnummer 	= $row->artikelnummer;
				$produktname   	= $row->name;
				$menge         	= $row->menge;
				$preis	       	= $row->preis;
				$variante1	    = $row->variante1;
				$variante2	    = $row->variante2;
				
				if ($variante1 OR $variante2)
					{
			
						$produktname .= " (Typ: $variante1 $variante2)";
					
					}
				
				$gesamtpreis  	= $menge * $preis;
				$bestellpreis 	= $bestellpreis + $gesamtpreis;
				
				$gesamtpreis2 = number_format($gesamtpreis,2,",",".");
				
				$bestellung .= "(Art.Nr.: $artikelnummer) $menge x $produktname = $gesamtpreis2 $waehrung" ;
				$bestellung .= "\r\n";
				$bestellung .= "\r\n";
				
				$bestell_db .= "(Art.Nr.: $artikelnummer) $menge x $produktname = $gesamtpreis2 $waehrung" ;
				$bestell_db .= "\r\n";
				$bestell_db .= "\r\n";
			
			}
		
		if ($mindestbestellpreis > $bestellpreis) $bestellpreis = $bestellpreis + $mindermengenaufschlag;
	
		$endsumme 		 = $versandkosten + $bestellpreis;
		$mehrwertsteuer1 = $mehrwertsteuer + 100;
		$mehrwertbetrag  = $endsumme / $mehrwertsteuer1;
		$mehrwertbetrag  = $mehrwertbetrag * $mehrwertsteuer;
		$mehrwertbetrag  = number_format($mehrwertbetrag,2,",",".");
	
		$result = mysqli_query($conn_id, "select beschreibung from ".$PREFIX."_Zahlarten where art = '{$_POST['zahlungsart']}'"); 
		
		while ($row = mysqli_fetch_object($result))
			{
			
				$zahlhinweise = $row->beschreibung;
	
			}
			
		$mindermengenaufschlag2 = number_format($mindermengenaufschlag,2,",",".");
		$versandkosten2 		= number_format($versandkosten,2,",",".");
		$endsumme2 				= number_format($endsumme,2,",",".");
		
		
		// Bestellung
		
		if ($mindestbestellpreis > $bestellpreis) 
			{
			
				$bestellung .= "\r\n";
				$bestellung .= "Mindermengenaufschlag: $mindermengenaufschlag2 $waehrung";
				
				$bestell_db .= "\r\n";
				$bestell_db .= "Mindermengenaufschlag: $mindermengenaufschlag2 $waehrung";
			
			}
			$bestellung .= "\r\n";
			$bestellung .= "Versandkosten: $versandkosten2 $waehrung";
			$bestellung .= "\r\n";
			
			$bestell_db .= "\r\n";
			$bestell_db .= "Versandkosten: $versandkosten2 $waehrung";
			$bestell_db .= "\r\n";
		
		if ($mehrwertsteuer != "0") 
			{
			
				$bestellung .= "Mehrwertsteuer: $mehrwertbetrag $waehrung";
				$bestellung .= "\r\n";
				
				$bestell_db .= "Mehrwertsteuer: $mehrwertbetrag $waehrung";
				$bestell_db .= "\r\n";
				
			}
	
		$bestellung .= "Endsumme: $endsumme2 $waehrung";
		$bestellung .= "\r\n";
		
		$bestell_db .= "Endsumme: $endsumme2 $waehrung";
		$bestell_db .= "\r\n";
	
	
		// Zahlungsart
		
		$zahlung .= "Zahlungsart: ".mysqli_real_escape_string($conn_id, $_POST['zahlungsart']);
		
		if ($zahlhinweise) 
			{
				$zahlung .= "\r\n";
				$zahlung .= "\r\n";
				$zahlung .= $zahlhinweise;
			}
		
			
		$zahlung1 .= "Zahlungsart: ".mysqli_real_escape_string($conn_id, $_POST['zahlungsart']);
		
		if ($_POST['zahlungsart'] == "Lastschrift")
			{
			
				$zahlung1 .= "\r\n";
				$zahlung1 .= "\r\n";
				$zahlung1 .= "Kontoinhaber: ".mysqli_real_escape_string($conn_id, $_POST['kontoinhaber']);

				$zahlung1 .= "\r\n";
				$zahlung1 .= "Kontonummer: ".mysqli_real_escape_string($conn_id, $_POST['kontonr']);

				$zahlung1 .= "\r\n";
				$zahlung1 .= "Bankleitzahl: ".mysqli_real_escape_string($conn_id, $_POST['blz']);

				$zahlung1 .= "\r\n";
				$zahlung1 .= "Kreditinstitut: ".mysqli_real_escape_string($conn_id, $_POST['bank']);
				
			}
			
		
		// Adressen
		
		if (!$_POST['lief_name']) 
			{
		
				$adressen .= "1. Rechnungs- und Lieferadresse:";
				$adressen .= "\r\n";
				$adressen .= "\r\n";
				$adressen .= "Name: ";
				$adressen .= mysqli_real_escape_string($conn_id, $_POST['name']);
				$adressen .= "\r\n";
				$adressen .= "Straﬂe und Nr.: ";
				$adressen .= mysqli_real_escape_string($conn_id, $_POST['strasse']);
				$adressen .= "\r\n";
				$adressen .= "Plz und Ort: ";
				$adressen .= mysqli_real_escape_string($conn_id, $_POST['plz'])." ".mysqli_real_escape_string($conn_id, $_POST['ort']);
				$adressen .= "\r\n";
				$adressen .= "Telefon: ";
				$adressen .= mysqli_real_escape_string($conn_id, $_POST['telefon']);
				$adressen .= "\r\n";
				$adressen .= "E-Mail: ";
				$adressen .= mysqli_real_escape_string($conn_id, $_POST['email']);
				$adressen .= "\r\n";
				
			}
			else 
			{
	
				$adressen .= "1. Rechnungsadresse:";
				$adressen .= "\r\n";
				$adressen .= "\r\n";
				$adressen .= "Name: ";
				$adressen .= mysqli_real_escape_string($conn_id, $_POST['name']);
				$adressen .= "\r\n";
				$adressen .= "Straﬂe und Nr.: ";
				$adressen .= mysqli_real_escape_string($conn_id, $_POST['strasse']);
				$adressen .= "\r\n";
				$adressen .= "Plz / Ort: ";
				$adressen .= mysqli_real_escape_string($conn_id, $_POST['plz'])." ".mysqli_real_escape_string($conn_id, $_POST['ort']);
				$adressen .= "\r\n";
				$adressen .= "Telefon: ";
				$adressen .= mysqli_real_escape_string($conn_id, $_POST['telefon']);
				$adressen .= "\r\n";
				$adressen .= "E-Mail: ";
				$adressen .= mysqli_real_escape_string($conn_id, $_POST['email']);
				$adressen .= "\r\n";
				$adressen .= "\r\n";
				$adressen .= "\r\n";
				$adressen .= "2. Lieferadresse:";
				$adressen .= "\r\n";
				$adressen .= "\r\n";
				$adressen .= "Name: ";
				$adressen .= mysqli_real_escape_string($conn_id, $_POST['lief_name']);
				$adressen .= "\r\n";
				$adressen .= "Straﬂe / Nr.: ";
				$adressen .= mysqli_real_escape_string($conn_id, $_POST['lief_strasse']);
				$adressen .= "\r\n";
				$adressen .= "Plz / Ort: ";
				$adressen .= mysqli_real_escape_string($conn_id, $_POST['lief_plz'])." ".mysqli_real_escape_string($conn_id, $_POST['lief_ort']);
				$adressen .= "\r\n";
				
			}
	
		// Mail an den Besteller

		$datum = date("d.m.Y");

		require 'class.phpmailer-lite.php';

		try {
		  $mail = new PHPMailerLite(true); //New instance, with exceptions enabled

		  $body             = "$mailheader\n\r\n\r\n\r$adressen

$bestellung
$zahlung


$mailfooter
";
		  $body             = preg_replace('/\\\\/','', $body); //Strip backslashes

		  $htmlbody = $body;
		  $htmlbody = preg_replace('/\r\n/','<br>', $htmlbody); // Primitiver Umlautkonverter
		  $htmlbody = preg_replace('/‰/','&auml;', $htmlbody); 
		  $htmlbody = preg_replace('/ˆ/','&ouml;', $htmlbody);  
		  $htmlbody = preg_replace('/¸/','&uuml;', $htmlbody); 
		  $htmlbody = preg_replace('/ƒ/','&Uuml;', $htmlbody); 
		  $htmlbody = preg_replace('/÷/','&Ouml;', $htmlbody); 
		  $htmlbody = preg_replace('/‹/','&Uuml;', $htmlbody); 
		  $htmlbody = preg_replace('/ﬂ/','&szlig;', $htmlbody); 


		  $mail->AddReplyTo($mailadresse_mail,$unternehmen);

		  $mail->SetFrom($mailadresse_mail, $unternehmen);

		  $to = $_POST['email'];

		  $mail->AddAddress($to);

		  $mail->Subject  = "Ihre Bestellung bei $unternehmen vom $datum";

		  $mail->WordWrap   = 0; // set word wrap
		  $mail->CharSet = "utf-8";

          $mail->AltBody = $body;
		  $mail->MsgHTML($htmlbody);

		  $mail->IsHTML(true); // send as html

		  //$mail->Mailer = "mail";
		  $mail->Send();
		  echo 'Nachricht wurde versendet.';
		} catch (phpmailerException $e) {
		  echo $e->errorMessage();
		}

	
		// Mail an die Firma

		try {
		  $mail = new PHPMailerLite(true); //New instance, with exceptions enabled

			$message = "Es liegt eine neue Bestellung vor:";
			$message .= "\r\n";
			$message .= "\r\n";
			$message .= $adressen;
			$message .= "\r\n";
			$message .= "\r\n";
			$message .= $bestellung;
			$message .= $zahlung1;

		  $message             = preg_replace('/\\\\/','', $message); //Strip backslashes

		  $htmlbody = $message;
		  $htmlbody = preg_replace('/\r\n/','<br>', $htmlbody); // Primitiver Umlautkonverter
		  $htmlbody = preg_replace('/‰/','&auml;', $htmlbody); 
		  $htmlbody = preg_replace('/ˆ/','&ouml;', $htmlbody);  
		  $htmlbody = preg_replace('/¸/','&uuml;', $htmlbody); 
		  $htmlbody = preg_replace('/ƒ/','&Uuml;', $htmlbody); 
		  $htmlbody = preg_replace('/÷/','&Ouml;', $htmlbody); 
		  $htmlbody = preg_replace('/‹/','&Uuml;', $htmlbody); 
		  $htmlbody = preg_replace('/ﬂ/','&szlig;', $htmlbody); 

		  $mail->AddReplyTo($mailadresse_mail,$unternehmen);

		  $mail->SetFrom($mailadresse_mail, $unternehmen);

		  $to = $mailadresse_mail;

		  $mail->AddAddress($to);

		  $mail->Subject  = "Ihre Bestellung bei $unternehmen vom $datum";

		  $mail->WordWrap   = 0; // set word wrap
		  $mail->CharSet = "utf-8";

		  $mail->AltBody = $message;
		  $mail->MsgHTML($htmlbody);

		  $mail->IsHTML(true); // send as text

		  //$mail->Mailer = "mail";
		  $mail->Send();
		  echo 'Nachricht wurde versendet.';
		} catch (phpmailerException $e) {
		  echo $e->errorMessage();
		}

	
		// ‹bertrag in die Kundentabelle
	
		$datum = date("d.m.Y - H:i");
	
		$r_adresse .= $_POST['name'];
		$r_adresse .= "\r\n";
		$r_adresse .= $_POST['strasse'];
		$r_adresse .= "\r\n";
		$r_adresse .= "{$_POST['plz']} {$_POST['ort']}";
		$r_adresse .= "\r\n";
		
		if ($_POST['lief_name']) 
			{
			
				$l_adresse .= $_POST['lief_name'];
				$l_adresse .= "\r\n";
				$l_adresse .= $_POST['lief_strasse'];
				$l_adresse .= "\r\n";
				$l_adresse .= "{$_POST['lief_plz']} {$_POST['lief_ort']}";
				
			}
	
		$produkte = $bestell_db;
		$produkte .= "\r\n";
		$produkte .= $zahlung1;
	
		mysqli_query($conn_id, "insert into ".$PREFIX."_Bestellungen (datum,name,email,telefon,r_adresse,l_adresse,produkte) VALUES ('$datum','".mysqli_real_escape_string($conn_id, $_POST['name'])."','".mysqli_real_escape_string($conn_id, $_POST['email'])."','".mysqli_real_escape_string($conn_id, $_POST['telefon'])."','".mysqli_real_escape_string($conn_id, $r_adresse)."','".mysqli_real_escape_string($conn_id, $l_adresse)."','".mysqli_real_escape_string($conn_id, $produkte)."')"); 
	

		// Warenkorb lˆschen
	
		mysqli_query($conn_id, "delete from ".$PREFIX."_Session where id= '".mysqli_real_escape_string($conn_id, $_GET['nr'])."'");
		mysqli_query($conn_id, "delete from ".$PREFIX."_Warenkorb where nr= '".mysqli_real_escape_string($conn_id, $_GET['nr'])."'");
	
		// Weiterleitung mit Danksagung
	
		header("Location: danke.php?nr=");

	}
	endif;

}

else header("Location: index.php?nr=");
?>
