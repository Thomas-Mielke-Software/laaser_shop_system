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


if (!$_GET['nr']) 

	{ 
		header("Location: warenkorb.php?nr={$_GET['nr']}");
		exit();
	
	}

if(!isset($_GET['name'])) $_GET['name'] = "";
if(!isset($_GET['strasse'])) $_GET['strasse'] = "";
if(!isset($_GET['plz'])) $_GET['plz'] = "";
if(!isset($_GET['ort'])) $_GET['ort'] = "";
if(!isset($_GET['telefon'])) $_GET['telefon'] = "";
if(!isset($_GET['email'])) $_GET['email'] = "";
if(!isset($_GET['lief_name'])) $_GET['lief_name'] = "";
if(!isset($_GET['lief_strasse'])) $_GET['lief_strasse'] = "";
if(!isset($_GET['lief_plz'])) $_GET['lief_plz'] = "";
if(!isset($_GET['lief_ort'])) $_GET['lief_ort'] = "";
if(!isset($_GET['checked'])) $_GET['checked'] = "";

if(!isset($color1)) $color1 = $TEXT;
if(!isset($color2)) $color2 = $TEXT;
if(!isset($color3)) $color3 = $TEXT;
if(!isset($color4)) $color4 = $TEXT;
if(!isset($color5)) $color5 = $TEXT;
if(!isset($color6)) $color6 = $TEXT;
if(!isset($color7)) $color7 = $TEXT;
if(!isset($color8)) $color8 = $TEXT;
if(!isset($color9)) $color9 = $TEXT;
if(!isset($color10)) $color10 = $TEXT;

$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
//mysql_select_db($DB,$conn_id);

opentable("Bestellung");

if ($shop == "enable") {
if ($header == "ok") {
}

?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="40" colspan="0"> <b><font size="<? echo $FONTSIZE_TITLE2 ?>" color="#000000"> 
      <? echo $TITLE2 ?>
      </font></b></td>
  </tr>
  <tr> 
    <td height="50" colspan="0"><a href="index.php?nr=<? echo $_GET['nr'] ?>"><img src="images/uebersicht.gif" alt="&Uuml;bersicht" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="suche.php?nr=<? echo $_GET['nr'] ?>"><img src="images/suchen.gif" border="0" alt="Suchen"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="agbs.php?nr=<? echo $_GET['nr'] ?>"><img src="images/agbs.gif" alt="Allgemeine Gesch&auml;ftsbedingungen" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="warenkorb.php?nr=<? echo $_GET['nr'] ?>"><img src="images/warenkorb.gif" alt="Warenkorb" border="0"></a> 
    </td>
  </tr>
  <tr> 
    <td height="25" bgcolor="#CCCCCC" colspan="0"><b><font size="<? echo $FONTSIZE_TITLE3 ?>" color="#000000">&nbsp;Warenkorb 
      bestellen 1 von 2</font></b></td>
  </tr>
  <? if ($_GET['action'] == "error") {?>
  <tr> 
    <td bgcolor="<? echo $TABLE_COLOR2 ?>" height="40" valign="bottom" colspan="0"> 
      <div align="center"><b><font color="<? echo $ERROR_COLOR ?>" size="<? echo $FONTSIZE_NORMAL ?>">Fehler: 
        Bitte alle markierten Felder ausfüllen!</font></b> </div>
    </td>
  </tr>
  <? } ?>
  <tr> 
    <td bgcolor="<? echo $TABLE_COLOR2 ?>" height="20" colspan="0"> 
      <? 
	if ($_GET['action'] == "error") 
		{
				   
			if (!$_GET['name']) 	    $color1 = "$ERROR_COLOR";
			if (!$_GET['strasse']) 	    $color2 = "$ERROR_COLOR";
			if (!$_GET['plz']) 		$color3 = "$ERROR_COLOR";
			if (!$_GET['ort']) 		$color4 = "$ERROR_COLOR";
			if (!$_GET['telefon']) 	$color10 = "$ERROR_COLOR";
			if (!$_GET['email']) 	    $color5 = "$ERROR_COLOR";
			if ($_GET['checked'] AND !$_GET['lief_name']) 	$color6 = "$ERROR_COLOR";
			if ($_GET['checked'] AND !$_GET['lief_strasse'])	$color7 = "$ERROR_COLOR";
			if ($_GET['checked'] AND !$_GET['lief_plz']) 	    $color8 = "$ERROR_COLOR";
			if ($_GET['checked'] AND !$_GET['lief_ort'])		$color9 = "$ERROR_COLOR";				   
	
		}
	  ?>
      <form name="form1" method="post" action="warenkorb_senden_2.php?nr=<? echo $_GET['nr'] ?>">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td> 
              <table border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td colspan="4" height="10">&nbsp;</td>
                </tr>
                <tr> 
                  <td colspan="4" height="35"><b><font size="<? echo $FONTSIZE_NORMAL ?>">Rechnungs- 
                    und Lieferadresse</font></b></td>
                </tr>
                <tr> 
                  <td width="20%" height="26"><font color="<?echo $color1 ?>" size="<? echo $FONTSIZE_NORMAL ?>">Name:</font></td>
                  <td height="26" width="30%"> 
                    <input type="text" class="textbox" name="name" size="25" maxlength="50" value="<? echo htmlspecialchars($_GET['name']) ?>">
                  </td>
                  <td colspan="0" height="26"><font size="<? echo $FONTSIZE_NORMAL ?>">separate 
                    Lieferadresse verwenden: </font> 
                    <input type="checkbox"name="check" value="ok" <? echo $_GET['checked'] ?>>
                  </td>
                </tr>
                <tr> 
                  <td width="20%" height="26"><font color="<?echo $color2 ?>" size="<? echo $FONTSIZE_NORMAL ?>">Stra&szlig;e 
                    &amp; Nr:</font></td>
                  <td height="26" width="30%"> 
                    <input type="text" class="textbox" size="25" maxlength="50" name="strasse" value="<? echo htmlspecialchars($_GET['strasse']) ?>">
                  </td>
                  <td width="20%" height="26"><font color="<?echo $color6 ?>" size="<? echo $FONTSIZE_NORMAL ?>">Name:</font></td>
                  <td height="26" width="30%"> 
                    <input type="text" class="textbox" name="lief_name" size="25" maxlength="50" value="<? echo htmlspecialchars($_GET['lief_name']) ?>">
                  </td>
                </tr>
                <tr> 
                  <td width="20%" height="26"> 
                    <p><font color="<?echo $color3 ?>" size="<? echo $FONTSIZE_NORMAL ?>">PLZ:</font></p>
                  </td>
                  <td height="26" width="30%"> 
                    <input type="text" class="textbox" name="plz" size="5" maxlength="5" value="<? echo htmlspecialchars($_GET['plz']) ?>">
                  </td>
                  <td width="20%" height="26"><font color="<?echo $color7 ?>" size="<? echo $FONTSIZE_NORMAL ?>">Stra&szlig;e 
                    &amp; Nr:</font></td>
                  <td height="26" width="30%"> 
                    <input type="text" class="textbox" name="lief_strasse" size="25" maxlength="50" value="<? echo htmlspecialchars($_GET['lief_strasse']) ?>">
                  </td>
                </tr>
                <tr> 
                  <td width="20%" height="26"><font color="<?echo $color4 ?>" size="<? echo $FONTSIZE_NORMAL ?>">Ort:</font></td>
                  <td height="26" width="30%"> 
                    <input type="text" class="textbox" name="ort" size="25" maxlength="50" value="<? echo htmlspecialchars($_GET['ort']) ?>">
                  </td>
                  <td width="20%" height="26"><font color="<?echo $color8 ?>" size="<? echo $FONTSIZE_NORMAL ?>">PLZ:</font></td>
                  <td height="26" width="30%"> 
                    <input type="text" class="textbox" name="lief_plz" size="5" maxlength="5" value="<? echo htmlspecialchars($_GET['lief_plz']) ?>">
                  </td>
                </tr>
                <tr> 
                  <td width="20%" height="26"><font color="<?echo $color10 ?>" size="<? echo $FONTSIZE_NORMAL ?>">Telefon:</font></td>
                  <td height="26" width="30%"> 
                    <input type="text" class="textbox" name="telefon" size="25" maxlength="50" value="<? echo htmlspecialchars($_GET['telefon']) ?>">
                  </td>
                  <td width="20%" height="26"><font color="<?echo $color9 ?>" size="<? echo $FONTSIZE_NORMAL ?>">Ort:</font></td>
                  <td height="26" width="30%"> 
                    <input type="text" class="textbox" name="lief_ort" size="25" maxlength="50" value="<? echo htmlspecialchars($_GET['lief_ort']) ?>">
                  </td>
                </tr>
                <tr> 
                  <td width="20%" height="26"><font color="<?echo $color5 ?>" size="<? echo $FONTSIZE_NORMAL ?>">E-Mail:</font></td>
                  <td height="26" width="30%"> 
                    <input type="text" class="textbox" name="email" size="25" maxlength="50" value="<? echo htmlspecialchars($_GET['email']) ?>">
                  </td>
                  <td width="20%" height="26">&nbsp;</td>
                  <td height="26" width="30%">&nbsp;</td>
                </tr>
                <tr> 
                  <td width="20%" height="26">&nbsp;</td>
                  <td height="26" width="30%">&nbsp;</td>
                  <td width="20%" height="26">&nbsp;</td>
                  <td height="26" width="30%">&nbsp;</td>
                </tr>
                <tr> 
                  <td colspan="4" height="35"><b><font size="<? echo $FONTSIZE_NORMAL ?>">Zahlungsart</font></b></td>
                </tr>
                <tr> 
                  <td width="20%" height="26"><font size="<? echo $FONTSIZE_NORMAL ?>">Bitte 
                    w&auml;hlen:</font></td>
                  <td height="26" colspan="3"> 
                    <select name="zahlungsart" class="textbox">
                      <?
				$result = mysqli_query($conn_id, "select art, art_kosten from ".$PREFIX."_Zahlarten order by art");
				
				while ($row = mysqli_fetch_object($result))	
					{ 
					
					echo "<option value='$row->art'>$row->art (Versandkosten: " , number_format($row->art_kosten,2,",",".") , " $waehrung) </option>";
	                
					}	
				
				?>
                    </select>
                  </td>
                </tr>
                <tr> 
                  <td colspan="0" height="26"> 
                    <div align="center"></div>
                  </td>
                  <td width="20%" height="26">&nbsp;</td>
                  <td height="26" width="30%">&nbsp;</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr> 
            <td> 
              <div align="right">&nbsp;&nbsp;<a href="warenkorb_delete.php?nr=<? echo $_GET['nr'] ?>"><img src="images/loeschen.gif" border="0" alt="Warenkorb l&ouml;schen"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                <input type=image src="images/bestellen.gif" border ="0" alt="weiter" name="image">
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
<table width="100%" border="0" cellspacing="0" cellpadding="0"">
  <tr> 
    <td> <b> 
      <? echo $shopmeldung ?>
      </b> </td>
  </tr>
</table>
<? 
}

closetable();
echo "<br><span class='small'>PHP-Fusion Shop system, based on the web shop by <a href='http://www.laaser.net/shop_index.php' target='blank'>J&uuml;rgen Laaser</a></span>\n";

require_once THEMES."templates/footer.php";
?>
