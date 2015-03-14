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

include ("../xxxxconfig.php");

$conn_id = mysql_connect($HOST,$ID,$PW);
mysql_select_db($DB,$conn_id);

opentable("Artikel hinzuf&uuml;gen");

?>

<form name="form1" action="pro_neu_save.php" enctype="multipart/form-data" method="post">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td width="22" height="50"> </td>
      <td height="50" colspan="3"><b><font size="4">Shop - Administration - Produkte 
        - Produkt anlegen</font></b></td>
    </tr>
    <? if ($_GET['action'] == "error") { ?>
    <tr> 
      <td width="22" height="50">&nbsp;</td>
      <td height="50" colspan="3"><b><font color="#CC0000">Fehler: Sie haben Angaben 
        vergessen! (Bild ist optional)</font></b></td>
    </tr>
    <? } 
	
	if (!isset($_GET['artikelnummer'])) $_GET['artikelnummer'] = "";
	if (!isset($_GET['name'])) $_GET['name'] = "";
	if (!isset($_GET['beschreibung'])) $_GET['beschreibung'] = "";
	if (!isset($_GET['preis'])) $_GET['preis'] = "";
	if (!isset($_GET['variante1'])) $_GET['variante1'] = "";
	if (!isset($_GET['variante2'])) $_GET['variante2'] = "";
	
	?>
    <tr> 
      <td width="22" height="10">&nbsp;</td>
      <td height="10" valign="top" colspan="3">&nbsp;</td>
    </tr>
    <tr valign="top"> 
      <td width="22" height="28">&nbsp;</td>
      <td height="28" width="132">Art.nr.</td>
      <td height="28">&nbsp;</td>
      <td height="28"> 
        <input type="text" class="textbox" name="artikelnummer" size="10" maxlength="10" value="<? echo htmlspecialchars($_GET['artikelnummer']) ?>">
      </td>
    </tr>
    <tr valign="top"> 
      <td width="22" height="28"> </td>
      <td height="28" width="132">Name:</td>
      <td height="28">&nbsp;</td>
      <td height="28"> 
        <input type="text" class="textbox" name="name" size="30" maxlength="100" value="<? echo htmlspecialchars($_GET['name']) ?>">
      </td>
    </tr>
    <tr valign="top"> 
      <td width="22" height="74"></td>
      <td height="74" width="132">Beschreibung:</td>
      <td height="74">&nbsp;</td>
      <td height="74"> 
        <textarea class="textbox" name="beschreibung" cols="40" rows="4"><? echo htmlspecialchars($_GET['beschreibung']) ?></textarea>
      </td>
    </tr>
    <tr valign="top"> 
      <td width="22" height="28"></td>
      <td height="28" width="132">Unterkategorie:</td>
      <td height="28">&nbsp;</td>
      <td height="28"> 
        <select class="textbox" name="nkategorie">
          <?
		$result = mysql_query("select * from ".$PREFIX."_Untergruppen order by name");
		while ($row = mysql_fetch_object($result))
			{
			
				$name      = $row->name;
				$id1	   = $row->id;
				$main_kat1 = $row->main_kat;
				
				$name4 = "";
				
				$result1 = mysql_query("select name from ".$PREFIX."_Hauptgruppen where id = '$main_kat1'");
				while ($row1 = mysql_fetch_object($result1))
					{
					
						$name4   = $row1->name;
						
					}

				if ($name4) echo "<option value='$id1'>$name4 / $name</option>";
				else echo "<option value='$id1'>$name</option>";	

			}
		?>
        </select>
      </td>
    </tr>
    <tr valign="top"> 
      <td width="22" height="28"></td>
      <td height="28" width="132">Preis:</td>
      <td height="28">&nbsp;</td>
      <td height="28"> 
        <input type="text" class="textbox" name="preis" size="6" maxlength="10" value="<? echo htmlspecialchars($_GET['preis']) ?>">
        <? echo $waehrung ?>
        (z.B.: 10.95)</td>
    </tr>
    <tr valign="top"> 
      <td width="22" height="28"></td>
      <td height="28" width="132">Bild:</td>
      <td height="28">&nbsp;</td>
      <td height="28"> 
        <input class="textbox" type="file" name="bild" size="30">
      </td>
    </tr>
    <tr valign="top">
      <td width="22" height="28"></td>
      <td height="28" width="132">Variante 1:</td>
      <td height="28">&nbsp;</td>
      <td height="28">
        <input type="text" class="textbox" name="variante1" size="30" maxlength="255" value="<? echo htmlspecialchars($_GET['variante1']) ?>">
        (z.B.: S|M|L|XL) </td>
    </tr>
    <tr valign="top">
      <td width="22" height="28"></td>
      <td height="28" width="132">Variante 2:</td>
      <td height="28">&nbsp;</td>
      <td height="28">
        <input type="text" class="textbox" name="variante2" size="30" maxlength="255" value="<? echo htmlspecialchars($_GET['variante2']) ?>">
        (z.B.: wei&szlig;|blau|gr&uuml;n) </td>
    </tr>
    <tr valign="top"> 
      <td width="22" height="28"></td>
      <td height="28" width="132">Status:</td>
      <td height="28">&nbsp;</td>
      <td height="28"> 
        <select class="textbox" name="status">
          <option value="1">Gr&uuml;n</option>
          <option value="2">Gelb</option>
          <option value="3">Rot</option>
        </select>
      </td>
    </tr>
    <tr> 
      <td width="22" height="25">&nbsp;</td>
      <td height="25" width="132">&nbsp;</td>
      <td height="25">&nbsp;</td>
      <td height="25"> 
        <input type="image" src="speichern.gif" name="image">
      </td>
    </tr>
    <tr> 
      <td width="22" height="25">&nbsp;</td>
      <td height="25" colspan="3">&nbsp;</td>
    </tr>
    <tr> 
      <td width="22" height="29">&nbsp;</td>
      <td height="29" colspan="3"><a href="hilfe.php#produkte">Online-Hilfe</a>&nbsp;&nbsp;&nbsp;<a href="index.php">Hauptmen&uuml;</a>&nbsp;&nbsp;&nbsp;<a href="pro_index.php">zur&uuml;ck</a></td>
    </tr>
  </table>
</form>
<?
closetable();

require_once THEMES."templates/footer.php";
?>
