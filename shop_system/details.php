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

require_once "../../maincore.php";
require_once THEMES."templates/header.php";


include ("xxxxconfig.php");
include ("templates.php");


if (!isset($_GET['kategorie'])) $_GET['kategorie'] = "";
if (!isset($_GET['main_kat'])) $_GET['main_kat'] = "";
if (!isset($_GET['search'])) $_GET['search'] = "";

$conn_id = mysql_connect($HOST,$ID,$PW);
mysql_select_db($DB,$conn_id);

$result = mysql_query("select * from ".$PREFIX."_Artikel where id = '".mysql_real_escape_string($_GET['id'])."'"); 

while ($row = mysql_fetch_object($result))
	{
	
		$artikelnummer = $row->artikelnummer;
		$name  		   = $row->name;
		$beschreibung  = $row->beschreibung;
		$bild		   = $row->bild;
		$preis		   = $row->preis;
		$variante1	   = $row->variante1;
		$variante2	   = $row->variante2;
		
		$preis 		  = number_format($preis,2,",",".");
		$beschreibung = nl2br($beschreibung);
		
	}

opentable("Artikel Details");

if ($shop == "enable") {
if ($header == "ok") {
}

?>
<table width="100%" border="0" cellpadding="0" cellspacing="0"">
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
    <td height="25" bgcolor="#CCCCCC" colspan="2"><b><font size="<? echo $FONTSIZE_TITLE3 ?>" color="#000000">&nbsp;Produkt: 
      <? echo $name ?>
      </font></b></td>
  </tr>
  <tr> 
    <td bgcolor="<? echo $TABLE_COLOR2 ?>" height="20" colspan="0"> 
      <form name="form1" method="post" action="warenkorb_insert.php?id=<? echo $_GET['id'] ?>&kategorie=<? echo $_GET['kategorie'] ?>&main_kat=<? echo $_GET['main_kat'] ?>&search=<? echo $_GET['search'] ?>&start=<? echo $_GET['start'] ?>&typ_d=details&nr=<? echo $_GET['nr'] ?>">
        <table width="98%" border="0" cellpadding="0" cellspacing="0" align="center">
          <? if ($_GET['action']) {?>
          <tr valign="bottom"> 
            <td height="40" colspan="2"> 
              <div align="center"><b> 
                <? 
				if ($_GET['action'] == "error")  echo "<font size='$FONTSIZE_NORMAL' color='$ERROR_COLOR'>Fehler: Sie haben keine Menge eingegeben!</font>";
				if ($_GET['action'] == "erfolg") echo "<font size='$FONTSIZE_NORMAL' color='$ERFOLG_COLOR'>Erfolg: Die Ware wurde in den Warenkorb gelegt!</font>";
				?>
                </b></div>
            </td>
          </tr>
          <? 
		  } 
		  if ($bild != "") 
		  { 
		  ?>
          <tr> 
            <td colspan="0"> <br>
              <img src="images/artikel/<? echo $_GET['id'] ?>.jpg" border="0"> 
            </td>
          </tr>
          <tr> 
            <td colspan="0">&nbsp;</td>
          </tr>
          <? } else {?>
          <tr> 
            <td height="25" colspan="0">&nbsp;</td>
          </tr>
          <? } ?>
          <tr> 
            <td colspan="0"> <font size="<? echo $FONTSIZE_NORMAL ?>"><b>Beschreibung:</b><br>
              <? echo $beschreibung ?>
              </font> </td>
          </tr>
          <? if ($variante1 OR $variante2) { ?>
          <tr> 
            <td height="30" colspan="0">&nbsp;</td>
          </tr>
          <tr> 
            <td height="10" colspan="0"><font size="<? echo $FONTSIZE_NORMAL ?>"><b> 
              <? 
			if ($variante1) 
				{
					$variante1_array = explode("|",$variante1);
					$anzahl_elemente = substr_count($variante1,"|");
					$anzahl_elemente = $anzahl_elemente + 1;
					
					echo "$variante_name1:&nbsp;";
					echo "<select name='variante1' class='textbox'>"; 
					for ($i=0; $i< $anzahl_elemente; $i++)
						{
		
				           echo "<option value='$variante1_array[$i]'>$variante1_array[$i]</option>";
						   
            			}
								
					echo "</select>&nbsp;&nbsp;&nbsp;";
					
				}
			if ($variante2) 
				{	
					
					$variante2_array = explode("|",$variante2);
					$anzahl_elemente = substr_count($variante2,"|");
					$anzahl_elemente = $anzahl_elemente + 1;
					
					echo "$variante_name2:&nbsp;";
					echo "<select name='variante2' class='textbox'>"; 
					for ($i=0; $i< $anzahl_elemente; $i++)
						{
		
				           echo "<option value='$variante2_array[$i]'>$variante2_array[$i]</option>";
						   
            			}
								
					echo "</select>&nbsp;&nbsp;&nbsp;";
				
				}
			?>
              </b></font></td>
          </tr>
          <? } ?>
          <tr> 
            <td height="10" colspan="0">&nbsp;</td>
          </tr>
          <tr> 
            <td height="10" width="46%"><font size="<? echo $FONTSIZE_NORMAL ?>"><b>Einzelpreis:</b> 
              <? echo "$preis $waehrung" ?>
              </font></td>
            <td height="10" width="54%"> 
              <div align="right"> <font size="<? echo $FONTSIZE_NORMAL ?>"><b>Menge:&nbsp; 
                <input type="text" class="textbox" name="menge" size="3" maxlength="3" value="1">
                &nbsp; 
                <input type=image src="images/kaufen.gif" border ="0" alt="bestellen" name="image">
                &nbsp;&nbsp;&nbsp; </b></font> </div>
            </td>
          </tr>
          </table>
      </form>
    </td>
  </tr>
  <tr> 
    <td height="20" bgcolor="#CCCCCC" width="100"><b><font size="<? echo $FONTSIZE_NORMAL ?>"> 
      <? 
	if ($_GET['search']) echo "<a class='zurueck' href='suche_details.php?search={$_GET['search']}&start={$_GET['start']}&nr={$_GET['nr']}'>&nbsp;zur&uuml;ck</a> ";
	if ($_GET['kategorie']) echo "<a class='zurueck' href='show.php?kategorie={$_GET['kategorie']}&main_kat={$_GET['main_kat']}&start={$_GET['start']}&nr={$_GET['nr']}'>&nbsp;zur&uuml;ck</a>";
	?>
      </font></b> </td>
    <td height="20" bgcolor="#CCCCCC"></td>
  </tr>
  <tr> 
    <td height="20" colspan="2"> 
      <div align="center"><font size="<? echo $FOOTER_SIZE ?>" color="<? echo $FOOTER_COLOR ?>"><br>
        <? echo "$FOOTER <br> <a href='$HOMEPAGE' target='_blank'>$HOMEPAGE</a> &nbsp; <a href='mailto:$EMAIL'>$EMAIL</a>"; ?>
        </font></div>
    </td>
  </tr>
</table>

<?
}
else 
{
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0"">
  <tr> 
    <td><b> 
      <? echo $shopmeldung ?>
      </b></td>
  </tr>
</table>

<? 
} 

closetable();
echo "<br><span class='small'>PHP-Fusion Shop system, based on the web shop by <a href='http://www.laaser.net/shop_index.php' target='blank'>J&uuml;rgen Laaser</a></span>\n";


require_once THEMES."templates/footer.php";
?>
