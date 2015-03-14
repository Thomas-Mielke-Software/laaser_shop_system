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

$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
//mysql_select_db($DB,$conn_id);

if (!isset($_GET['start'])) $_GET['start'] = 0;
if (!isset($_GET['next_start'])) $_GET['next_start'] = "0";

opentable("Artikel &Uuml;bersicht");

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
  <?
  $result = mysqli_query($conn_id, "select * from ".$PREFIX."_Untergruppen where id = '".mysqli_real_escape_string($conn_id, $_GET['kategorie'])."'"); 
  while ($row = mysqli_fetch_object($conn_id, $result))
  	 {
	 
	  $name   = $row->name;
	  
	 }
  ?>
  <tr> 
    <td height="25" bgcolor="#CCCCCC" colspan="0"><b><font size="<? echo $FONTSIZE_TITLE3 ?>" color="#000000">&nbsp;Kategorie: 
      <? echo $name ?>
      </font></b></td>
  </tr>
  <? if ($_GET['action']) {?>
  <tr> 
    <td bgcolor="<? echo $TABLE_COLOR2 ?>" height="40" valign="bottom" colspan="0"> 
      <div align="center"><b> 
        <? 
	  if ($_GET['action'] == "error" AND $_GET['menge'] == 0):  echo "<font size='$FONTSIZE_NORMAL' color='$ERROR_COLOR'>Fehler: Sie haben keine Menge eingegeben!</font>";
	  elseif ($_GET['action'] == "error"):  echo "<font size='$FONTSIZE_NORMAL' color='$ERROR_COLOR'>Fehler: Artikel hat Varianten, bitte in Detailansicht wechseln!</font>";
	  else: echo "<font size='$FONTSIZE_NORMAL' color='$ERFOLG_COLOR'>Erfolg: Die Ware wurde in den Warenkorb gelegt!</font>";
	  endif;
	  ?>
        </b></div>
    </td>
  </tr>
  <? } ?>
  <tr> 
    <td bgcolor="<? echo $TABLE_COLOR2 ?>" height="20" colspan="0"> 
      <?
	$result = mysqli_query($conn_id, "select id from ".$PREFIX."_Artikel where kategorie = ".mysqli_real_escape_string($conn_id, $_GET['kategorie'])."");
	$num = mysqli_num_rows($result);
	if ($num == "0") 
		{
	?>
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
          <td height="10">&nbsp;</td>
        </tr>
        <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
          <td height="25"><font size="<? echo $FONTSIZE_NORMAL ?>">Kein Produkt 
            vorhanden!</font></td>
        </tr>
        <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
          <td height="10">&nbsp;</td>
        </tr>
      </table>
      <? } else { ?>
      <table border="0" cellpadding="0" cellspacing="0" width="98%" align="center">
        <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
          <td height="10" colspan="6">&nbsp;</td>
        </tr>
        <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
          <td colspan="2" height="40"><b><font size="<? echo $FONTSIZE_NORMAL ?>"> 
            Artikel</font></b></td>
          <td width="70" height="40"> 
            <div align="center"><b><font size="<? echo $FONTSIZE_NORMAL ?>">Status</font></b></div>
          </td>
          <td width="120" height="40"> 
            <div align="right"><b><font size="<? echo $FONTSIZE_NORMAL ?>">Einzelpreis&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></b></div>
          </td>
          <td width="60" height="40"> 
            <div align="center"><b><font size="<? echo $FONTSIZE_NORMAL ?>">Menge</font></b></div>
          </td>
          <td width="45" height="40"> 
            <div align="center"><b></b></div>
          </td>
        </tr>
        <?
		$result = mysqli_query($conn_id, "select * from ".$PREFIX."_Artikel where kategorie = ".mysqli_real_escape_string($conn_id, $_GET['kategorie'])." order by name LIMIT ".mysqli_real_escape_string($conn_id, $_GET['start']).", $ds_anzahl");
		while ($row = mysqli_fetch_object($result))
			{
				$id		        = $row->id;
				$kategorie1     = $row->kategorie;
				$artikelnummer  = $row->artikelnummer;
				$name           = $row->name;
				$beschreibung   = $row->beschreibung;
				$bild		    = $row->bild;
				$preis		    = $row->preis;
				$status		    = $row->status;
				$variante1	    = $row->variante1;
				$variante2	    = $row->variante2;
										
				$preis 			= number_format($preis,2,",",".");
		?>
        <form name="form1" method="post" action="warenkorb_insert.php?id=<? echo $id ?>&kategorie=<? echo $kategorie1 ?>&main_kat=<? echo $_GET['main_kat'] ?>&start=<? echo $_GET['start'] ?>&nr=<? echo $_GET['nr'] ?>">
		  <?php if ($IMAGE_KAT == "1") { ?>
          <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
            <td width="240" valign="top"><a href="details.php?id=<? echo $id ?>&kategorie=<? echo $_GET['kategorie'] ?>&main_kat=<? echo $_GET['main_kat'] ?>&start=<? echo $_GET['start'] ?>&nr=<? echo $_GET['nr'] ?>"> 
			<a name='<? echo $id ?>'>
                      <img src="images/artikel/<?php echo $id ?>.jpg" width="200" border="0"></a></td>
            <td height="24"> <font size="<? echo $FONTSIZE_NORMAL ?>"> <a href="details.php?id=<? echo $id ?>&kategorie=<? echo $_GET['kategorie'] ?>&main_kat=<? echo $_GET['main_kat'] ?>&start=<? echo $_GET['start'] ?>&nr=<? echo $_GET['nr'] ?>"> 
              <? echo $name ?>
              </a> </font> <font size="<? echo $FONTSIZE_NORMAL ?>"> </font> </td>
            <td width="70" height="24"> 
              <div align="center"> 
                <? 
			  if ($status == "1"): $status_img = "green";
			  elseif ($status == "2"): $status_img = "yellow";
			  else: $status_img = "red";
			  endif;
			  ?>
                <a href="status.php?nr=<? echo $_GET['nr'] ?>"><img src="images/status_<? echo $status_img ?>.gif" border="0" alt="Status"></a> 
              </div>
            </td>
            <td width="120" height="24"> 
              <div align="right"> <font size="<? echo $FONTSIZE_NORMAL ?>"> 
                <input type="hidden" name="variante1" value="<? echo $variante1 ?>">
                <input type="hidden" name="variante2" value="<? echo $variante2 ?>">
                <? echo "$preis $waehrung" ?>
                &nbsp; &nbsp;&nbsp; </font></div>
            </td>
            <td width="60" height="24"> 
              <div align="center"> 
                <input type="text" class="textbox" name="menge" size="3" maxlength="3" value="1">
              </div>
            </td>
            <td width="45" height="24"> 
              <div align="center"> 
                <input type=image src="images/kaufen.gif" border ="0" alt="bestellen" name="image2">
              </div>
            </td>
          </tr>
		  <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
            <td colspan="6" height="15" valign="top">&nbsp;</td>
          </tr>
          <?php } else {?> 
          <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
            <td colspan="2" height="15"><a href="details.php?id=<? echo $id ?>&kategorie=<? echo $_GET['kategorie'] ?>&main_kat=<? echo $_GET['main_kat'] ?>&start=<? echo $_GET['start'] ?>&nr=<? echo $_GET['nr'] ?>"> 
              </a> <font size="<? echo $FONTSIZE_NORMAL ?>"> <a href="details.php?id=<? echo $id ?>&kategorie=<? echo $_GET['kategorie'] ?>&main_kat=<? echo $_GET['main_kat'] ?>&start=<? echo $_GET['start'] ?>&nr=<? echo $_GET['nr'] ?>"> 
              <? echo $name ?>
              </a> </font> <font size="<? echo $FONTSIZE_NORMAL ?>"> </font> </td>
            <td width="70" height="15"> 
              <div align="center"> 
                <? 
			  if ($status == "1"): $status_img = "green";
			  elseif ($status == "2"): $status_img = "yellow";
			  else: $status_img = "red";
			  endif;
			  ?>
                <a href="status.php?nr=<? echo $_GET['nr'] ?>"><img src="images/status_<? echo $status_img ?>.gif" border="0" alt="Status"></a> 
              </div>
            </td>
            <td width="120" height="15"> 
              <div align="right"> <font size="<? echo $FONTSIZE_NORMAL ?>"> 
                <input type="hidden" name="variante1" value="<? echo $variante1 ?>">
                <input type="hidden" name="variante2" value="<? echo $variante2 ?>">
                <? echo "$preis $waehrung" ?>
                &nbsp; &nbsp;&nbsp; </font></div>
            </td>
            <td width="60" height="15"> 
              <div align="center"> 
                <input type="text" class="textbox" name="menge" size="3" maxlength="3" value="1">
              </div>
            </td>
            <td width="45" height="15"> 
              <div align="center"> 
                <input type=image src="images/kaufen.gif" border ="0" alt="bestellen" name="image3">
              </div>
            </td>
          </tr>
          <? } ?>
        </form>
        <? } ?>
        <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
          <td height="10" colspan="6">&nbsp;</td>
        </tr>
        <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
          <td height="10" colspan="4"> <font size="<? echo $FONTSIZE_NORMAL ?>">Seite: 
            <?php
			
			if ($num > $ds_anzahl) 
			{
				$seiten = $num / $ds_anzahl;
				$seiten = ceil($seiten);
		
				$i = ($_GET['start'] / $ds_anzahl) -1;
				if ($i < 1) 
				{
					$i = 1;
					$_GET['next_start'] = 0;
				}
				else $_GET['next_start'] = $_GET['start'] - (2 * $ds_anzahl);
				
				if (($seiten - $i) >= 5) $seiten1 = $i + 4 ;
				else $seiten1 = $seiten;
				if ($i >= 2)  echo "<a href='show.php?main_kat={$_GET['main_kat']}&kategorie=$kategorie1&start=0&nr={$_GET['nr']}'>1</a> &nbsp;...&nbsp; ";
		
					for ($i; $i<= $seiten1; $i++) 
					{
						if ($_GET['next_start'] == $_GET['start']) echo "<b><a href='show.php?main_kat={$_GET['main_kat']}&kategorie=$kategorie1&start={$_GET['next_start']}&nr={$_GET['nr']}'>[ $i ]</a></b> ";
						else echo "<a href='show.php?main_kat={$_GET['main_kat']}&kategorie=$kategorie1&start={$_GET['next_start']}&nr={$_GET['nr']}'>$i</a> ";
						$_GET['next_start'] = $_GET['next_start'] + $ds_anzahl;
					}
				$endstart = ($seiten - 1) * $ds_anzahl;
				if (($i-1) < $seiten)  echo " &nbsp;...&nbsp; <a href='show.php?main_kat={$_GET['main_kat']}&kategorie=$kategorie1&start=$endstart&nr={$_GET['nr']}'>$seiten</a>";
		
			}
			else echo "<b><a href='show.php?main_kat={$_GET['main_kat']}&kategorie=$kategorie1&start=0&nr={$_GET['nr']}'>[ 1 ]</a></b>";        
			?>
            </font> </td>
          <td height="10" colspan="2"> 
            <div align="right"><font size="<? echo $FONTSIZE_NORMAL ?>"> 
              <? echo $num ?>
              Artikel</font></div>
          </td>
        </tr>
        <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
          <td height="10" colspan="6">&nbsp;</td>
        </tr>
      </table>
      <? } ?>
    </td>
  </tr>
  <tr> 
    <td height="20" bgcolor="#CCCCCC" width="100"><b><font size="<? echo $FONTSIZE_NORMAL ?>"> 
      <? 
	  if ($_GET['main_kat']) echo "&nbsp;<a class='zurueck' href='index.php?main_kat={$_GET['main_kat']}&nr={$_GET['nr']}'>zur&uuml;ck</a>";
	  else echo "&nbsp;<a class='zurueck' href='index.php?nr={$_GET['nr']}'>zur&uuml;ck</a>";
	  ?>
      </font></b></td>
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
else
{
?>
		  
      
<table width="100%" border="0" cellspacing="0" cellpadding="0">
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


//require_once ADMIN."navigation.php";
require_once THEMES."templates/footer.php";
?>
