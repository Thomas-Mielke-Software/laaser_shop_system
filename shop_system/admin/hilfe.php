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

//include LOCALE.LOCALESET."index.php";
echo LOCALE.LOCALESET."index.php";
include INCLUDES."comments_include.php";
if (!iSUPERADMIN){ redirect("../../../index.php"); };

//include FUSION_LANGUAGES.FUSION_LAN."admin/admin_main.php";
//if (!iSUPERADMIN) { header("Location:".FUSION_BASE."index.php"); exit; }

opentable("Online Hilfe");

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td colspan="2" height="50"><b><font size="4">Shop - Administration - Online-Hilfe</font><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#CCCCCC"><a name="allgemein"></a></font><font size="4"> 
      </font><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#CCCCCC"><a name="top"></a></font><font size="4"> 
      </font></b></td>
  </tr>
  <tr> 
    <td width="22" height="50"><b></b></td>
    <td colspan="2" height="50"> 
      <p><b><font size="4"><i>1.Allgemein</i></font> </b></p>
    </td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="221" height="10" valign="top">Hauptkategorie verwalten: </td>
    <td width="457" height="10" valign="top">anlegen, &auml;ndern und l&ouml;schen 
      von Hauptkategorien</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="221" height="10" valign="top">&nbsp;</td>
    <td width="457" height="10" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="221" height="10" valign="top">Unterkategorie verwalten: </td>
    <td width="457" height="10" valign="top">anlegen, &auml;ndern und l&ouml;schen 
      von Unterkategorien</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="221" height="10" valign="top">&nbsp;</td>
    <td width="457" height="10" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="221" height="10" valign="top">Produkte verwalten:</td>
    <td width="457" height="10" valign="top">anlegen, &auml;ndern und l&ouml;schen 
      von Produkten</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="221" height="10" valign="top">&nbsp;</td>
    <td width="457" height="10" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="221" height="10" valign="top">Zahlungsarten verwalten:</td>
    <td width="457" height="10" valign="top">anlegen, &auml;ndern und l&ouml;schen 
      von Zahlungsarten</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="221" height="10" valign="top">&nbsp;</td>
    <td width="457" height="10" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="221" height="10" valign="top">Sonstige Einstellungen: </td>
    <td width="457" height="10" valign="top">Versandkosten, Mindestbestellmenge 
      und- preis, E-Mail-Adresse, Mailtexte, Shopmeldung bei Inaktivit&auml;t, 
      Adressen, E-Mail, Homepage, Mehrwertsteuer</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="221" height="10" valign="top">&nbsp;</td>
    <td width="457" height="10" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="221" height="10" valign="top">Shop de-/ aktivieren: </td>
    <td width="457" height="10" valign="top">Shop an- und ausschalten: wenn etwas 
      gr&ouml;&szlig;eres ver&auml;ndert werden soll (z.B. neue Preise, neue Kategorien), 
      vorher den Shop deaktivieren. Die Status-Meldung im Hauptmen&uuml; zeigt 
      den aktuellen Stand, sollten sich Warenk&ouml;rbe in der Datenbank befinden, 
      dann kann der Shop erst nach einer von Ihnen gew&auml;hlten Deaktivierungszeit 
      deaktiviert werden (siehe Sonstige Einstellungen).</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td colspan="2" height="10" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="221" height="10" valign="top">Offene Bestellungen:</td>
    <td width="457" height="10" valign="top">Hier haben Sie einen &Uuml;berblick 
      &uuml;ber die von Kunden bestellten Artikel Dies kann z.B. n&uuml;tzlich 
      sein, wenn sie eine Auftragsmail mal nicht erhalten haben. Der Botton &quot;L&ouml;schen&quot; 
      entfernt eine Bestellung.</td>
  </tr>
  <tr> 
    <td height="10" width="22">&nbsp;</td>
    <td colspan="2" height="10">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="221" height="10" valign="top">Navigation:</td>
    <td width="457" height="10" valign="top">mit dem Punkt &quot;Hauptmen&uuml;&quot; 
      gelangen Sie immer auf die Startseite, der Punkt &quot;zur&uuml;ck&quot; 
      bringt Sie zur vorherigen Seite</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="221" height="10" valign="top">&nbsp;</td>
    <td width="457" height="10" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="221" height="10" valign="top">Preisangaben:</td>
    <td width="457" height="10" valign="top">Alle Preise m&uuml;ssen im folgenden 
      Format angegeben werden: xx.xx (z.B.: 20.95) Dabei ist zu beachten, dass 
      immer ein <font color="#CC0000">&quot;Punkt&quot; als &quot;Komma&quot;</font> 
      verwendet wird, da die Datenbank nur Punkte als Komma interpretiert, Desweiteren 
      <font color="#CC0000">immer</font> die <font color="#CC0000">2 Nachkommastellen 
      </font>mit<font color="#CC0000"> angeben</font>, auch wenn es ein glatter 
      Preis ist (z.B.: 20.00). Eine <font color="#CC0000">W&auml;hrung</font> 
      darf <font color="#CC0000">nicht </font>mit <font color="#CC0000">angegeben</font> 
      werden! Es wird im Shop immer ein EUR am Ende einer Preisangabe angef&uuml;gt!</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="221" height="10" valign="top">&nbsp;</td>
    <td width="457" height="10" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td height="70" width="22"> 
      <div align="right"></div>
    </td>
    <td colspan="2" height="70"><a href="javascript:history.back();">zur&uuml;ck</a><b><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#CCCCCC"><a name="mainkategorie"></a></font></b></td>
  </tr>
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td colspan="2" height="50"><b><i><font size="4">2.Hauptkategorien verwalten</font></i> 
      </b></td>
  </tr>
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td colspan="2" height="50">Hauptkategorien sind dazu da, um bei einem gr&ouml;&szlig;eren 
      Produktsortiment Unterkategorien unter einer Hauptkategorie zusammenfassen 
      zu k&ouml;nnen. <font color="#CC0000">Hauptkategorien sind keine Bedingung.</font> 
      Sie m&uuml;ssen keine Anlegen. Wenn keine vorhanden sind, werden auf der 
      Shop-&Uuml;bersichtsseite sofort die Unterkategorien angezeigt. Sollten 
      Sie jedoch Hauptkategorien anlegen, so ordnen Sie diesen ihre Unterkategorien 
      zu (siehe Punkt 3: Unterkategorien verwalten). Mit dem Punkt &quot;&Auml;ndern&quot; 
      k&ouml;nnen Sie den Namen und die Sortierung (Anzeige) &auml;ndern. Der 
      Punkt <font color="#CC0000">&quot;L&ouml;schen</font>&quot; l&ouml;scht 
      <font color="#CC0000">nur die Hauptkategorie</font>, es werden keine Unterkategorien 
      und Produkte gel&ouml;scht!.</td>
  </tr>
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td colspan="2" height="50"><a href="javascript:history.back();">zur&uuml;ck</a><b><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#CCCCCC"><a name="kategorie"></a></font></b></td>
  </tr>
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td colspan="2" height="50"><b><i><font size="4">3.Unterkategorien verwalten</font></i> 
      </b></td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td colspan="2" height="30"> 
      <p>Hier k&ouml;nnen die Unterkategorien angelegt werden, in denen dann einzelne 
        Produkte hinzugef&uuml;gt werden k&ouml;nnen (siehe Punkt: Produkte verwalten). 
        Das Feld &quot;Anzeige&quot; ist f&uuml;r die Sortierung der Unterkategorien 
        (auf der Haupt&uuml;bersichtsseite) notwendig (z.B.: die Unterkategorie 
        &quot;B&uuml;cher&quot; soll zu Beginn erscheinen, dann geben Sie einfach 
        ein &quot;a&quot; in das Anzeige-Feld ein, die zweite Kategorie &quot;Teller&quot; 
        erh&auml;lt eine &quot;b&quot;, sodass diese erst nach der ersten Kategorie 
        angezeigt wird). Im Auswahlmen&uuml; - Hauptkategorie k&ouml;nnen Sie 
        der Unterkategorie eine Hauptkategorie zuweisen. Wenn Sie keine Hauptkategorie 
        angelegt haben, bleibt das Feld leer. Sollten jedoch Hauptkategorien vorhanden 
        sein, dann wird die Unterkategorie im Shop erst sichtbar, wenn diese einer 
        Hauptkategorie zugeordnet ist. Weiterhin k&ouml;nnen die Namen der bereits 
        angelegten Unterkategorien und die Zuordnung der Hauptkategorien jederzeit 
        ver&auml;ndert werden durch den Button &quot;&Auml;ndern&quot;. Beim <font color="#CC0000">L&ouml;schen 
        von Kategorien</font>, durch den Button &quot;L&ouml;schen&quot;, beachten 
        Sie bitte, dass dies nur funktioniert, wenn vorher alle Produkte aus dieser 
        Kategorie gel&ouml;scht wurden.</p>
      <p>Die Sortierung der Unterkategorien auf der &Uuml;bersichtsseite erfolgt 
        nach folgenden Kriterien:<br>
        1. Sortierung nach Hauptkategorie: es werden zuerst alle Unterkategorien 
        einer Hauptkategorie angezeigt<br>
        2. Sortierung nach Anzeige: dann erfolgt eine Sortierung, nach der von 
        Ihnen vorher angelegten Anzeigefolge<br>
        3. Sortierung nach Name: sollten Sie z.B. 2 Kategorien den gleichen Anzeigenamen 
        gegeben haben (beide &quot;a&quot;), dann wird nach dem Namen sortiert</p>
    </td>
  </tr>
  <tr> 
    <td height="70" width="22"> 
      <div align="right"></div>
    </td>
    <td colspan="2" height="70"><a href="javascript:history.back();">zur&uuml;ck</a><b><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#CCCCCC"><a name="produkte"></a></font></b></td>
  </tr>
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td colspan="2" height="50"><b><i><font size="4">4.Produkte verwalten </font></i></b></td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td colspan="2" height="30">Hier k&ouml;nnen Produkte angelegt, ver&auml;ndert 
      und gel&ouml;scht werden. Die &Uuml;bersicht enth&auml;lt alle angelegten 
      Kategorien mit der aktuellen Anzahl der darin befindlichen Produkte. Weiter 
      unten ist ein Link mit dem man ein neues Produkt anlegen kann.</td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td colspan="2" height="30">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td colspan="2" height="30"> 
      <p><b>4.1. Neues Produkt anlegen:</b><br>
        <font color="#CC0000">Plichtangaben</font>: Artikelnummer, Name,Beschreibung, 
        Unterkategorie, Preis (bitte Preisangabe beachten, siehe Punkt 1.Allgemein), 
        Status </p>
      <p>Optionale Angaben: Bild, Variante 1 Variante 2</p>
      <p>Varianten sind Zusatzfelder, die z.B. notwendig sind, wenn ein Produkt 
        mehrere Ausf&uuml;hrungen hat (Farbe, Gr&ouml;&szlig;e,etc.). Angelegt 
        werden diese nach folgendem Schema:</p>
      <p>z.B.: Variante 1: S M L XL XXL -&gt; das Feld muss so gef&uuml;llt werden: 
        S|M|L|XL|XXL<br>
        z.B.: Variante 2: schwarz gelb rot -&gt; das Feld muss so gef&uuml;llt 
        werden: schwarz|gelb|rot<br>
        Zwischen den Arten muss immer eine &quot;|&quot; stehen (Tastenkombination: 
        &quot;ALT-GR&quot; +&quot;&lt;&quot;)</p>
      <p>Beim Bildfeld dr&uuml;cken Sie bitte auf den Button &quot;Durchsuchen&quot; 
        und w&auml;hlen Sie auf Ihrer Festplatte ein entsprechendes zum jeweiligen 
        Artikel passendes Bild aus. Bitte beachten Sie, dass das <font color="#CC0000">Bild</font> 
        im sogenannten<font color="#CC0000"> JPG Format</font> abgespeichert ist 
        (z.B.: Artikel.jpg). (Breite: max. 550 Pixel)</p>
    </td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td colspan="2" height="30">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td colspan="2" height="30"><b>4.2. Produkt ver&auml;ndern:<br>
      </b>Wenn Sie im Produktmen&uuml; eine Unterkategorie anklicken, gelangen 
      Sie auf eine Seite, die alle in der Unterkategorie befindlichen Produkte 
      untereinander anzeigt. Rechts sind 2 <font color="#CC0000">Buttons</font> 
      mit dem Namen: <font color="#CC0000">&quot;&auml;ndern&quot; </font>und 
      &quot;l&ouml;schen&quot;. Beim Dr&uuml;cken des &quot;&Auml;ndern-Buttons&quot; 
      gelangen Sie auf eine Seite wo Sie Produktangaben nachtr&auml;glich ver&auml;ndern 
      k&ouml;nnen. Dabei sind wieder alle Angaben bis auf das Bild und die Varianten 
      Pflichtangaben (bitte Preisangabe beachten, siehe Punkt 1 Allgemein). Wenn 
      bei einem Produkt schon ein Bild vorhanden ist, wird dies durch &quot;Bild 
      vorhanden&quot; in der Zeile &quot;Bild&quot; angezeigt. Wenn Sie dann kein 
      neues Bild ausw&auml;hlen, wird das alte beibehalten, wenn Sie ein neues 
      ausw&auml;hlen, wird das alte automatisch gel&ouml;scht und das neue Bild 
      hochgeladen.</td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td colspan="2" height="30">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td colspan="2" height="30"><b>4.3. Produkt l&ouml;schen:<br>
      </b>Wenn Sie im Produktmen&uuml; eine Kategorie anklicken, gelangen Sie 
      auf eine Seite, die alle in der Kategorie befindlichen Produkte untereinander 
      anzeigt. Rechts sind 2 <font color="#CC0000">Buttons</font> mit dem Namen: 
      &quot;&auml;ndern&quot; und <font color="#CC0000">&quot;l&ouml;schen&quot;</font>. 
      Beim bet&auml;tigen des &quot;L&ouml;sch-Buttons&quot; wird das Produkt 
      und das dazugeh&ouml;rige Bild gel&ouml;scht.</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td colspan="2" height="10">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="70">&nbsp;</td>
    <td colspan="2" height="70"><a href="javascript:history.back();">zur&uuml;ck</a><b><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#CCCCCC"><a name="zahlungsarten"></a></font></b></td>
  </tr>
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td colspan="2" height="50"><b><i><font size="4">5.Zahlungsarten verwalten</font></i> 
      </b></td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td colspan="2" height="30"> 
      <p>Hier k&ouml;nnen verschiedene Zahlungsarten verwaltet werden, die der 
        Kunde beim Bestellen ausw&auml;hlen kann. Sie k&ouml;nnen zus&auml;tzlich 
        noch einen kleinen Text (<font color="#CC0000">Beschreibung</font>) dazuschreiben, 
        der dann in jeder Auftragsbest&auml;tigung (die der Kunde beim Bestellen 
        erh&auml;lt) steht, dieser Text ist jedoch <font color="#CC0000">kein 
        Pflichtfeld</font> und kann demnach auch leer sein. Das Versandkosten-Feld 
        muss hingegen ausgef&uuml;llt werden (bitte Preisangabe beachten, siehe 
        Punkt 1.Allgemein).</p>
      <p>Ein Beispiel f&uuml;r die sinnvolle Verwendung dieses Textes w&auml;re 
        die Zahlungsart &quot;Vorkasse&quot;: Sie k&ouml;nnen dann in diesem Feld 
        ihre Bankverbindung angeben und diese wird dann in der Auftragsbest&auml;tigung, 
        die der Kunde bekommt, mit angegeben, sodass dieser sofort den Betrag 
        anhand der Daten &uuml;berweisen kann.</p>
      <p>Bitte beachten Sie, dass zumindest <font color="#CC0000">immer eine Zahlungsart 
        vorhanden</font> sein muss! </p>
      <p><b>Sonderform - Lastschrift:<br>
        </b>Wenn Sie Lastschrift / Bankeinzug anbieten wollen, dann m&uuml;ssen 
        Sie eine neue Zahlungsart mit dem Namen &quot;Lastschrift&quot; anlegen. 
        Beachten Sie bitte, dass der <font color="#CC0000">Name unbedingt &quot;Lastschrift&quot;</font> 
        heissen muss, da die Zusatzfelder (Kontonummer, BLZ, Bank) sonst nicht 
        angezeigt werden k&ouml;nnen. </p>
     </td>
  </tr>
  <tr> 
    <td width="22" height="70">&nbsp;</td>
    <td colspan="2" height="70"><a href="javascript:history.back();">zur&uuml;ck</a><b><font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#CCCCCC"><a name="layout"></a></font></b></td>
  </tr>
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td colspan="2" height="50"><b><font size="4"><i>6.Sonstige Einstellungen</i></font> 
      </b></td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td valign="top" height="10" width="221">Firmenadresse (Footer):</td>
    <td valign="top" height="10" width="457">diese Adresse erscheint am Ende einer 
      jeden Seite, kann auch leer sein</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td valign="top" height="10" width="221">Homepage (Footer):</td>
    <td valign="top" height="10" width="457">diese Adresse erscheint am Ende einer 
      jeden Seite, kann auch leer sein</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td valign="top" height="10" width="221">E-Mail-Adresse (Footer):</td>
    <td valign="top" height="10" width="457"> 
      <p>diese Adresse erscheint am Ende einer jeden Seite, kann auch leer sein</p>
    </td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td valign="top" height="10" width="221">&nbsp;</td>
    <td valign="top" height="10" width="457">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td valign="top" height="10" width="221">Seitentitel: (im Browserkopf):</td>
    <td valign="top" height="10" width="457">Dieser Titel wird direkt im Browserkopf 
      angezeigt.</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td valign="top" height="10" width="221"> Seiten&uuml;berschrift:</td>
    <td valign="top" height="10" width="457">&Uuml;berschrift auf jeder Seite, 
      z.B. Firma XYZ - Shop</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td valign="top" height="10" width="221">&nbsp;</td>
    <td valign="top" height="10" width="457">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td valign="top" height="10" width="221">W&auml;hrung:</td>
    <td valign="top" height="10" width="457">W&auml;hrung des Shops (z.B.: EUR 
      oder SFR)</td>
  </tr>
  <tr> 
    <td width="22" height="74">&nbsp;</td>
    <td height="74" valign="top" width="221">Mindestbestellpreis:</td>
    <td height="74" valign="top" width="457">Festlegen des Mindestbestellpreises 
      (bitte Preisangabe beachten, siehe Punkt 1.Allgemein), wird eine Bestellung 
      unter diesem Mindestpreis aufgegeben, wird ein Mindermengenaufschlag f&auml;llig, 
      den Sie im nachfolgenden Punkt festlegen k&ouml;nnen. Wenn Sie keinen Mindestbestellpreis 
      haben m&ouml;chten, tragen Sie einfach &quot;0.00&quot; ein.</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td height="10" valign="top" width="221">Mindermengenaufschlag:</td>
    <td height="10" valign="top" width="457">Festlegen des Mindermengenaufschlag 
      (bitte Preisangabe beachten, siehe Punkt 1.Allgemein) (siehe Punkt: Mindestbestellpreis)</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td height="10" valign="top" width="221">Mehrwertsteuer</td>
    <td height="10" valign="top" width="457">Festlegen des Mehrwertsteuersatzes 
      (in Prozent), diese Steuer wird nur in der Auftragbest&auml;tigung brechnet 
      und angezeigt, deshalb geben sie alle anderen Preise (Versandkosten, Produktpreise, 
      etc.) immer als Inklusiv-Preise an. Wenn Sie in der Auftragbest&auml;tigung 
      keine Mehrwertsteuer angeben wollen, dann tragen sie im Feld &quot;Mehrwertsteuer&quot; 
      eine &quot;0&quot; (Null) ein.</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td height="10" valign="top" width="221">Shop-Deakivierungszeit:</td>
    <td height="10" valign="top" width="457">Hier legen Sie fest, ab wann Sie 
      selber den Shop deaktivieren k&ouml;nnen. Bei einem geplanten Update, k&ouml;nnen 
      Sie den Shop erst dann aktivieren, wenn die Shop-Deakivierungszeit: abgelaufen 
      ist, die z.B. notwendig ist, wenn gerade ein Kunde einkauft.</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td height="10" valign="top" width="221">&nbsp;</td>
    <td height="10" valign="top" width="457">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td height="10" valign="top" width="221">E-Mail-Adresse (E-Mail):</td>
    <td height="10" valign="top" width="457">an diese Adresse werden s&auml;mtliche 
      Bestellungen der Kunden geschickt</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td height="10" valign="top" width="221">Firmenname (E-Mail):</td>
    <td height="10" valign="top" width="457">dieser Name erscheint in der Bestell-E-Mails</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td height="10" valign="top" width="221">Bestellkopfzeile (E-Mail):</td>
    <td height="10" valign="top" width="457">Diese Zeilen werden jeder Auftragsbest&auml;tigung, 
      die die Kunden nach einem erfolgreichem Kauf erhalten, angef&uuml;gt und 
      zwar als Kopfzeile (Beginn der Mail)</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td height="10" valign="top" width="221">&nbsp;</td>
    <td height="10" valign="top" width="457">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td height="10" valign="top" width="221">Bestellfu&szlig;zeile (E-Mail):</td>
    <td height="10" valign="top" width="457">Diese Zeilen werden jeder Auftragsbest&auml;tigung, 
      die die Kunden nach einem erfolgreichem Kauf erhalten, angef&uuml;gt und 
      zwar als Fusszeile (Ende der Mail)</td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td height="10" width="221">&nbsp;</td>
    <td height="10" width="457">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td height="30" valign="top" width="221">Shopmeldung:</td>
    <td height="30" valign="top" width="457">Diese Meldung erscheint beim Betreten 
      des Online-Shops, wenn Sie diesen deaktiviert haben.</td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td height="30" valign="top" width="221">Statusmeldungen:</td>
    <td height="30" valign="top" width="457">Hier k&ouml;nnen Sie f&uuml;r die 
      3 Zust&auml;nde (Lieferzeiten) Texte einf&uuml;gen, die beim Klick auf das 
      Statussymbol angezeigt werden. </td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td height="30" valign="top" width="221">Variante 1/2 (Name):</td>
    <td height="30" valign="top" width="457">Name der Varianten, die bei der Detailseite 
      angezeigt werden</td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td height="30" valign="top" width="221">AGB&acute;s:</td>
    <td height="30" valign="top" width="457">Hier k&ouml;nnen Sie Ihre AGB&acute;s 
      festlegen, die auf jeder Seite einfach aufgerufen werden k&ouml;nnen.</td>
  </tr>
  <tr> 
    <td width="22" height="70">&nbsp;</td>
    <td colspan="2" height="70"><a href="javascript:history.back();">zur&uuml;ck</a></td>
  </tr>
</table>
<?

closetable();

require_once THEMES."templates/footer.php";
?>
