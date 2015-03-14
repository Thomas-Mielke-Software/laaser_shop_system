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

//error_reporting(E_ALL);
//ini_set("display_errors", 1); 
require_once "../../maincore.php";
require_once THEMES."templates/header.php";

include ("xxxxconfig.php");
include ("templates.php");

$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
//mysql_select_db($DB,$conn_id);

if (!$_GET['nr']) 

	{ 
		header("Location: warenkorb.php?nr={$_GET['nr']}");
		exit();
	
	}

if (!isset($name)) $name = "";
if (!isset($strasse)) $strasse = "";
if (!isset($plz)) $plz = "";
if (!isset($ort)) $ort = "";
if (!isset($telefon)) $telefon = "";
if (!isset($email)) $email = "";

if (!isset($check)) $check = "";
if (!isset($lief_name)) $lief_name = "";
if (!isset($lief_strasse)) $lief_strasse = "";
if (!isset($lief_plz)) $lief_plz = "";
if (!isset($lief_ort)) $lief_ort = "";

if(!isset($color0)) $color0 = $TEXT;
if(!isset($color1)) $color1 = $TEXT;
if(!isset($color2)) $color2 = $TEXT;
if(!isset($color3)) $color3 = $TEXT;
if(!isset($color4)) $color4 = $TEXT;


if (!isset($_POST['zahlungsart'])) $_POST['zahlungsart'] = "";

if (!isset($_POST['name'])) $_POST['name'] = "";
if (!isset($_POST['strasse'])) $_POST['strasse'] = "";
if (!isset($_POST['plz'])) $_POST['plz'] = "";
if (!isset($_POST['ort'])) $_POST['ort'] = "";
if (!isset($_POST['telefon'])) $_POST['telefon'] = "";
if (!isset($_POST['email'])) $_POST['email'] = "";

if (!isset($_POST['check'])) $_POST['check'] = "";
if (!isset($_POST['lief_name'])) $_POST['lief_name'] = "";
if (!isset($_POST['lief_strasse'])) $_POST['lief_strasse'] = "";
if (!isset($_POST['lief_plz'])) $_POST['lief_plz'] = "";
if (!isset($_POST['lief_ort'])) $_POST['lief_ort'] = "";


if (!isset($_GET['zahlungsart'])) $_GET['zahlungsart'] = "";

if (!isset($_GET['name'])) $_GET['name'] = "";
if (!isset($_GET['strasse'])) $_GET['strasse'] = "";
if (!isset($_GET['plz'])) $_GET['plz'] = "";
if (!isset($_GET['ort'])) $_GET['ort'] = "";
if (!isset($_GET['telefon'])) $_GET['telefon'] = "";
if (!isset($_GET['email'])) $_GET['email'] = "";

if (!isset($_GET['check'])) $_GET['check'] = "";
if (!isset($_GET['lief_name'])) $_GET['lief_name'] = "";
if (!isset($_GET['lief_strasse'])) $_GET['lief_strasse'] = "";
if (!isset($_GET['lief_plz'])) $_GET['lief_plz'] = "";
if (!isset($_GET['lief_ort'])) $_GET['lief_ort'] = "";


if ($_GET['name']) $name = $_GET['name'];
if ($_POST['name']) $name = $_POST['name'];
if ($_GET['strasse']) $strasse = $_GET['strasse'];
if ($_POST['strasse']) $strasse = $_POST['strasse'];
if ($_GET['ort']) $ort = $_GET['ort'];
if ($_POST['ort']) $ort = $_POST['ort'];
if ($_GET['plz']) $plz = $_GET['plz'];
if ($_POST['plz']) $plz = $_POST['plz'];
if ($_GET['telefon']) $telefon = $_GET['telefon'];
if ($_POST['telefon']) $telefon = $_POST['telefon'];
if ($_GET['email']) $email = $_GET['email'];
if ($_POST['email']) $email = $_POST['email'];

if ($_GET['check']) $check = $_GET['check'];
if ($_POST['check']) $check = $_POST['check'];

if ($_GET['lief_name']) $lief_name = $_GET['lief_name'];
if ($_POST['lief_name']) $lief_name = $_POST['lief_name'];
if ($_GET['lief_strasse']) $lief_strasse = $_GET['lief_strasse'];
if ($_POST['lief_strasse']) $lief_strasse = $_POST['lief_strasse'];
if ($_GET['lief_ort']) $lief_ort = $_GET['lief_ort'];
if ($_POST['lief_ort']) $lief_ort = $_POST['lief_ort'];
if ($_GET['lief_plz']) $lief_plz = $_GET['lief_plz'];
if ($_POST['lief_plz']) $lief_plz = $_POST['lief_plz'];

if ($_GET['zahlungsart']) $zahlungsart = $_GET['zahlungsart'];
if ($_POST['zahlungsart']) $zahlungsart = $_POST['zahlungsart'];

if (!isset($bestellpreis)) $bestellpreis = "";
if (!isset($_GET['agbs'])) $_GET['agbs'] = "";
if (!isset($_GET['action1'])) $_GET['action1'] = "";
if (!isset($_GET['kontonr'])) $_GET['kontonr'] = "";
if (!isset($_GET['blz'])) $_GET['blz'] = "";
if (!isset($_GET['bank'])) $_GET['bank'] = "";

if (!$name): $action = "error";
elseif (!$strasse): $action = "error";
elseif (!$plz): $action = "error";
elseif (!$ort): $action = "error";
elseif (!$telefon): $action = "error";
elseif (!$email): $action = "error";
elseif ($check AND !$lief_name): $action = "error";
elseif ($check AND !$lief_strasse): $action = "error";
elseif ($check AND !$lief_plz): $action = "error";
elseif ($check AND !$lief_ort): $action = "error";
else: $action = "";
endif;

if ($action == "error") {

	if ($check == "") header("Location: warenkorb_senden_1.php?action=error&name=$name&strasse=$strasse&plz=$plz&ort=$ort&telefon=$telefon&email=$email&nr={$_GET['nr']}");
	else header("Location: warenkorb_senden_1.php?action=error&name=$name&strasse=$strasse&plz=$plz&ort=$ort&telefon=$telefon&email=$email&checked=checked&lief_name=$lief_name&lief_strasse=$lief_strasse&lief_plz=$lief_plz&lief_ort=$lief_ort&nr={$_GET['nr']}");
}
else {
	  
$result = mysqli_query($conn_id, "select menge, preis from ".$PREFIX."_Warenkorb where nr = '".mysqli_real_escape_string($conn_id, $_GET['nr'])."'");

while ($row=mysqli_fetch_object($result))
	{
	
	$menge  = $row->menge;
	$preis  = $row->preis;

	$gesamtpreis  = $menge * $preis;
	$bestellpreis = $bestellpreis + $gesamtpreis;
	
	}

$result = mysqli_query($conn_id, "select art_kosten from ".$PREFIX."_Zahlarten where art = '$zahlungsart'");

while ($row = mysqli_fetch_object($result))
	{
	
		$art_kosten = $row->art_kosten;		

	}


$endsumme = $art_kosten + $bestellpreis;
if ($mindestbestellpreis > $bestellpreis) $endsumme = $endsumme + $mindermengenaufschlag;

opentable("Bestellung");

if ($shop == "enable") {
if ($header == "ok") {
}

?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="40" colspan="2"> <b><font size="<? echo $FONTSIZE_TITLE2 ?>" color="#000000"> 
      <? echo $TITLE2 ?>
      </font></b></td>
  </tr>
  <tr>
		<td height="50" colspan="0"><a href="index.php?nr=<? echo $_GET['nr'] ?>"><img src="images/uebersicht.gif" alt="&Uuml;bersicht" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="suche.php?nr=<? echo $_GET['nr'] ?>"><img src="images/suchen.gif" border="0" alt="Suchen"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="agbs.php?nr=<? echo $_GET['nr'] ?>"><img src="images/agbs.gif" alt="Allgemeine Gesch&auml;ftsbedingungen" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="warenkorb.php?nr=<? echo $_GET['nr'] ?>"><img src="images/warenkorb.gif" alt="Warenkorb" border="0"></a> 
    </td>
	</tr>
  <tr> 
    <td height="25" bgcolor="#CCCCCC" colspan="2"><b><font size="<? echo $FONTSIZE_TITLE3 ?>" color="#000000">&nbsp;Warenkorb 
      bestellen 2 von 2</font></b></td>
  </tr>
  <? if ($_GET['action1'] == "error") {?>
  <tr>
		<td bgcolor="<? echo $TABLE_COLOR2 ?>" height="40" valign="bottom" colspan="0"> 
      <div align="center"><b><font color="<? echo $ERROR_COLOR ?>" size="<? echo $FONTSIZE_NORMAL ?>">Fehler: 
        Bitte alle markierten Felder ausf&uuml;llen!</font></b></div>
    </td>
	</tr>
  <? } ?>
  <tr>
		<td bgcolor="<? echo $TABLE_COLOR2 ?>" height="20" colspan="0"> 
      <form name="form1" method="post" action="warenkorb_senden_3.php?nr=<? echo $_GET['nr'] ?>">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr> 
            <td> 
              <table border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td height="10" colspan="2">&nbsp;</td>
                  <td height="10" width="1">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="35" colspan="2"><b><font size="<? echo $FONTSIZE_NORMAL ?>">Bestellung 
                    abschlie&szlig;en</font></b> 
                    <input type="hidden" name="name" value="<? echo $name ?>">
                    <input type="hidden" name="strasse" value="<? echo $strasse ?>">
                    <input type="hidden" name="plz" value="<? echo $plz ?>">
                    <input type="hidden" name="ort" value="<? echo $ort ?>">
                    <input type="hidden" name="telefon" value="<? echo $telefon ?>">
                    <input type="hidden" name="email" value="<? echo $email ?>">
                    <input type="hidden" name="lief_name" value="<? echo $lief_name ?>">
                    <input type="hidden" name="lief_strasse" value="<? echo $lief_strasse ?>">
                    <input type="hidden" name="lief_plz" value="<? echo $lief_plz ?>">
                    <input type="hidden" name="lief_ort" value="<? echo $lief_ort ?>">
                    <input type="hidden" name="check" value="<? echo $check ?>">
                    <input type="hidden" name="art_kosten" value="<? echo $art_kosten ?>">
                    <input type="hidden" name="zahlungsart" value="<? echo $zahlungsart ?>">
                  </td>
                  <td height="35" width="1">&nbsp;</td>
                </tr>
                <tr> 
                  <td width="180" height="26"><font size="<? echo $FONTSIZE_NORMAL ?>">Gesamtpreis:</font></td>
                  <td height="26"><font size="<? echo $FONTSIZE_NORMAL ?>"> 
                    <? echo number_format($bestellpreis,2,",",".") ?>
                    <? echo $waehrung ?>
                    </font></td>
                  <td height="26" width="1">&nbsp;</td>
                </tr>
                <? if ($mindestbestellpreis > $bestellpreis) { ?>
                <tr> 
                  <td width="180" height="26"><font size="<? echo $FONTSIZE_NORMAL ?>">Mindermengenaufschlag:</font></td>
                  <td height="26"><font size="<? echo $FONTSIZE_NORMAL ?>"> 
                    <? echo "" , number_format($mindermengenaufschlag,2,",",".") , " $waehrung (Mindestbestellpreis: " , number_format($mindestbestellpreis,2,",",".") ," $waehrung)" ?>
                    </font></td>
                  <td height="26" width="1">&nbsp;</td>
                </tr>
                <? } ?>
                <tr> 
                  <td width="180" height="26"><font size="<? echo $FONTSIZE_NORMAL ?>">Versandkosten:</font></td>
                  <td height="26"> <font size="<? echo $FONTSIZE_NORMAL ?>"> 
                    <? echo number_format($art_kosten,2,",",".")?>
                    <? echo $waehrung ?>
                    </font></td>
                  <td height="26" width="1">&nbsp;</td>
                </tr>
                <tr> 
                  <td width="180" height="26"><b><font size="<? echo $FONTSIZE_NORMAL ?>">Endsumme:</font></b></td>
                  <td height="26"> <b> <font size="<? echo $FONTSIZE_NORMAL ?>"> 
                    <? echo number_format($endsumme,2,",",".") ?>
                    <? echo $waehrung ?>
                    </font></b></td>
                  <td height="26" width="1">&nbsp;</td>
                </tr>
                <? 
		  if($_GET['action1'] == "error")
		  	{
	
			  if($zahlungsart != "Lastschrift") $color0 = "$ERROR_COLOR";
			  if($_GET['agbs'] == "") $color0 = "$ERROR_COLOR";
			  
			}
		  ?>
                <tr> 
                  <td height="26" colspan="2"> <font color="<?echo $color0 ?>" size="<? echo $FONTSIZE_NORMAL ?>"> 
                    Ich habe die <a href="agbs.php?nr=<? echo $_GET['nr'] ?>">AGB&acute;s</a> 
                    gelesen und akzeptiere diese: </font> 
                    <input type="checkbox" name="agbs" value="ok" <? if ($_GET['agbs'] == "ok" ) echo "checked=checked" ?>>
                  </td>
                  <td height="26" width="1">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="10" colspan="2">&nbsp;</td>
                  <td height="10" width="1">&nbsp;</td>
                </tr>
                <? 
		  if($zahlungsart == "Lastschrift") 
		  	{ 
				
				if ($_GET['action1'] == "error")
					{
					
						if ($_GET['kontoinhaber'] == "") $color4 = "$ERROR_COLOR";					
						if ($_GET['kontonr'] == "") $color1 = "$ERROR_COLOR";
						if ($_GET['blz'] == "") $color2 = "$ERROR_COLOR";
						if ($_GET['bank'] == "") $color3 = "$ERROR_COLOR";
					
					}
			
			?>
                <tr> 
                  <td height="35" colspan="2"><font size="<? echo $FONTSIZE_NORMAL ?>"><b>Lastschrift-Kontodaten</b></font></td>
                  <td height="35" width="1">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="26" width="180"><font color="<?echo $color4 ?>" size="<? echo $FONTSIZE_NORMAL ?>">Kontoinhaber:</font></td>
                  <td height="26"> 
                    <input type="text" name="kontoinhaber" size="16" maxlength="50" value="<? echo htmlspecialchars($_GET['kontoinhaber']) ?>">
                  </td>
                  <td height="26" width="1">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="26" width="180"><font color="<?echo $color1 ?>" size="<? echo $FONTSIZE_NORMAL ?>">Kontonummer:</font></td>
                  <td height="26"> 
                    <input type="text" name="kontonr" size="16" maxlength="20" value="<? echo htmlspecialchars($_GET['kontonr']) ?>">
                  </td>
                  <td height="26" width="1">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="26" width="180"><font color="<?echo $color2 ?>" size="<? echo $FONTSIZE_NORMAL ?>">Bankleitzahl: 
                    </font></td>
                  <td height="26"> 
                    <input type="text" name="blz" size="16" maxlength="8" value="<? echo htmlspecialchars($_GET['blz']) ?>">
                  </td>
                  <td height="26" width="1">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="26" width="180"><font color="<?echo $color3 ?>" size="<? echo $FONTSIZE_NORMAL ?>">Kreditinstitut: 
                    </font></td>
                  <td height="26"> 
                    <input type="text" name="bank" size="16" maxlength="50" value="<? echo htmlspecialchars($_GET['bank']) ?>">
                  </td>
                  <td height="26" width="1">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="26" colspan="2"><font size="<? echo $FONTSIZE_NORMAL ?>">(wichtige 
                    Hinweise - siehe <a href="agbs.php?nr=<? echo $_GET['nr'] ?>">AGB&acute;s</a>)</font></td>
                  <td height="26" width="1">&nbsp;</td>
                </tr>
                <tr> 
                  <td height="10" colspan="2">&nbsp;</td>
                  <td height="10" width="1">&nbsp;</td>
                </tr>
                <? } ?>
              </table>
            </td>
          </tr>
          <tr> 
            <td> 
              <div align="right">&nbsp;&nbsp;<a href="warenkorb_delete.php?nr=<? echo $_GET['nr'] ?>"><img src="images/loeschen.gif" border="0" alt="Warenkorb l&ouml;schen"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <input type=image src="images/bestellen.gif" border ="0" alt="Bestellung abschicken" name="image">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            </td>
          </tr>
          </table>
      </form>
    </td>
	</tr>
  <tr> 
    <td height="20" bgcolor="#CCCCCC" width="100">&nbsp;<b><font size="<? echo $FONTSIZE_NORMAL ?>"><a class="zurueck" href="javascript:history.back();">zur&uuml;ck</a></font></b></td>
    <td height="20" bgcolor="#CCCCCC"></td>
  </tr>
  <tr>
		<td height="20" colspan="0"> 
      <div align="center"><font size="<? echo $FOOTER_SIZE ?>" color="<? echo $FOOTER_COLOR ?>"><br>
        <? echo "$FOOTER <br> <a href='$HOMEPAGE' target='_blank'>$HOMEPAGE</a> &nbsp; <a href='mailto:$EMAIL'>$EMAIL</a>"; ?>
        </font></div>
    </td>
	</tr>
</table>

<?

}
else {

?>
		  
      
<p>&nbsp;</p><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20">&nbsp;</td>
    <td><b> 
      <? echo $shopmeldung ?>
      </b> </td>
  </tr>
</table>

<? 
} 
}

closetable();

echo "<br><span class='small'>PHP-Fusion Shop system, based on the web shop by <a href='http://www.laaser.net/shop_index.php' target='blank'>J&uuml;rgen Laaser</a></span>\n";
require_once THEMES."templates/footer.php";
?>
