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
include ("../templates.php");


$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
//mysql_select_db($DB,$conn_id);

$result = mysqli_query($conn_id, "select * from ".$PREFIX."_Artikel where id = '".mysqli_real_escape_string($conn_id, $_GET['id'])."'"); 

while ($row = mysqli_fetch_object($result))
	{
		$id		       = $row->id;
		$artikelnummer = $row->artikelnummer;
		$name		   = $row->name;
		$beschreibung  = $row->beschreibung;
		$preis  	   = $row->preis;
		$bild	  	   = $row->bild;
		$kategorie	   = $row->kategorie;
		$variante1	   = $row->variante1;
		$variante2	   = $row->variante2;
	
	}

opentable("Artikel bearbeiten");

?>

<form name="form1" action="pro_edit_save.php" enctype="multipart/form-data" method="post">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td width="22" height="50"> </td>
      <td height="50" colspan="2"><b><font size="4">Shop - Administration - Produkte 
        - Unterkategorie: 
        <? 
		if ($_GET['main_name']) echo "{$_GET['main_name']}  / ";
		echo $_GET['name_k'];
		?>
        </font></b></td>
    </tr>
    <? if ($_GET['action'] == "erfolg") { ?>
    <tr> 
      <td width="22" height="50">&nbsp;</td>
      <td height="50" colspan="2"><b><font color="#006600">Erfolg: Die &Auml;nderungen 
        wurden &uuml;bernommen!</font></b></td>
    </tr>
    <?
	}
	if ($_GET['action'] == "error") 
	{ 
	?>
    <tr> 
      <td width="22" height="50">&nbsp;</td>
      <td height="50" colspan="2"><b><font color="#CC0000">Fehler: Sie haben Angaben 
        vergessen! (Bild ist optional)</font></b></td>
    </tr>
    <?
	}
	?>
    <tr> 
      <td width="22" height="10">&nbsp;</td>
      <td height="10" valign="top" colspan="2">&nbsp;</td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td height="30" colspan="2"><b>Produkt &auml;ndern:</b></td>
    </tr>
    <tr valign="top"> 
      <td width="22" height="28">&nbsp;</td>
      <td height="28" width="150">Art.nr.</td>
      <td height="28"> 
        <input type="text" class="textbox" name="neu_artikelnummer" size="10" maxlength="10" value="<? echo htmlspecialchars($artikelnummer) ?>">
      </td>
    </tr>
    <tr valign="top"> 
      <td width="22" height="28"> </td>
      <td height="28" width="150">Name:</td>
      <td height="28"> 
        <input type="text" class="textbox" name="neu_name" size="30" maxlength="100" value="<? echo htmlspecialchars($name) ?>">
      </td>
    </tr>
    <tr valign="top"> 
      <td width="22" height="74"></td>
      <td height="74" width="150">Beschreibung:</td>
      <td height="74"> 
        <textarea class="textbox" name="neu_beschreibung" cols="40" rows="4"><? echo htmlspecialchars($beschreibung) ?></textarea>
      </td>
    </tr>
    <tr valign="top"> 
      <td width="22" height="28"></td>
      <td height="28" width="150">neue Unterkategorie:</td>
      <td height="28"> 
        <select class="textbox" name="neu_kategorie">
          <?
	    $result = mysqli_query($conn_id, "select name , main_kat from ".$PREFIX."_Untergruppen where id = '$kategorie'");
		while ($row = mysqli_fetch_object($result))
			{
			
				$name2    = $row->name;
				$main_kat = $row->main_kat;
				
				$result1 = mysqli_query($conn_id, "select name from ".$PREFIX."_Hauptgruppen where id = '$main_kat'");
				while ($row1 = mysqli_fetch_object($result1))
					{
					
						$name3   = $row1->name;
					
					}
			}
			
		if ($name3) echo "<option value='$kategorie'>$name3 / $name2</option>";
		else echo "<option value='$kategorie'>$name2</option>";
		
		$result = mysqli_query($conn_id, "select * from ".$PREFIX."_Untergruppen order by name");
		while ($row = mysqli_fetch_object($result))
			{
			
				$name      = $row->name;
				$id1	   = $row->id;
				$main_kat1 = $row->main_kat;
				
				$name4 = "";
				
				$result1 = mysqli_query($conn_id, "select * from ".$PREFIX."_Hauptgruppen where id = '$main_kat1'");
				while ($row1 = mysqli_fetch_object($result1))
					{
					
						$name4   = $row1->name;
						
					}

				if ($name2 != $name) 
					{
			
						if ($name4) echo "<option value='$id1'>$name4 / $name</option>";
						else echo "<option value='$id1'>$name</option>";
						
					}
			}
	
		?>
        </select>
      </td>
    </tr>
    <tr valign="top"> 
      <td width="22" height="28"></td>
      <td height="28" width="150">Preis:</td>
      <td height="28"> 
        <input type="text" class="textbox" name="neu_preis" size="6" maxlength="10" value="<? echo htmlspecialchars($preis) ?>">
        <? echo $waehrung ?>
        (z.B.: 10.95)</td>
    </tr>
    <tr valign="top"> 
      <td width="22" height="28"></td>
      <td height="28" width="150">Bild:</td>
      <td height="28"> 
        <? if ($bild == "ok" ) echo "Bild vorhanden" ?>
        <input class="textbox" type="file" name="neu_bild" size="30">
        <input type="hidden" name="bild" value="<? echo $_GET['bild'] ?>">
        <input type="hidden" name="kategorie" value="<? echo $_GET['kategorie'] ?>">
        <input type="hidden" name="id" value="<? echo $_GET['id'] ?>">
        <input type="hidden" name="name_k" value="<? echo $_GET['name_k'] ?>">
        <input type="hidden" name="main_name" value="<? echo $_GET['main_name'] ?>">
        <input type="hidden" name="start" value="<? echo $_GET['start'] ?>">
        <input type="hidden" name="sort" value="<? echo $_GET['sort'] ?>">
      </td>
    </tr>
    <tr valign="top">
      <td width="22" height="28"></td>
      <td height="28" width="150">Variante 1:</td>
      <td height="28">
        <input type="text" class="textbox" name="neu_variante1" size="30" maxlength="255" value="<? echo htmlspecialchars($variante1) ?>">
        (z.B.: S|M|L|XL) </td>
    </tr>
    <tr valign="top">
      <td width="22" height="28"></td>
      <td height="28" width="150">Variante 2:</td>
      <td height="28">
        <input type="text" class="textbox" name="neu_variante2" size="30" maxlength="255" value="<? echo htmlspecialchars($variante2) ?>">
        (z.B.: wei&szlig;|blau|gr&uuml;n) </td>
    </tr>
    <tr valign="top"> 
      <td width="22" height="28"></td>
      <td height="28" width="150">Status:</td>
      <td height="28"> 
        <select class="textbox" name="neu_status">
          <option value="1">Gr&uuml;n</option>
          <option value="2">Gelb</option>
          <option value="3">Rot</option>
        </select>
      </td>
    </tr>
    <tr> 
      <td width="22" height="25">&nbsp;</td>
      <td height="25" width="150">&nbsp;</td>
      <td height="25"> 
        <input type="image" src="speichern.gif">
      </td>
    </tr>
    <tr> 
      <td width="22" height="25">&nbsp;</td>
      <td height="25" colspan="2">&nbsp;</td>
    </tr>
    <tr> 
      <td width="22" height="29">&nbsp;</td>
      <td height="29" colspan="2"><a href="hilfe.php#produkte">Online-Hilfe</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Hauptmen&uuml;</a>&nbsp;&nbsp;&nbsp;<a href="pro_show.php?kategorie=<? echo $_GET['kategorie'] ?>&name_k=<? echo $_GET['name_k'] ?>&main_name=<? echo $_GET['main_name'] ?>&start=<? echo $_GET['start'] ?>&sort=<? echo $_GET['sort'] ?>">zur&uuml;ck</a></td>
    </tr>
  </table>
</form>
<?
closetable();

require_once THEMES."templates/footer.php";
?>
