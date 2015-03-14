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

$conn_id = mysql_connect($HOST,$ID,$PW); 
mysql_select_db($DB,$conn_id);

if (!isset($_GET['start'])) $_GET['start'] = 0;	
if (!isset($_GET['next_start'])) $_GET['next_start'] = "0";

if (!isset($search)) $search = "";

if (!isset($_GET['search'])) $_GET['search'] = "";
if (!isset($_POST['search'])) $_POST['search'] = "";

if ($_GET['search']) $search = $_GET['search'];
if ($_POST['search']) $search = $_POST['search'];

if (!$search OR strlen($search) < 3) header("Location: suche.php?action=error&nr={$_GET['nr']}");
else 
	{
opentable("Suchergebnisse");

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
    <td height="25" bgcolor="#CCCCCC" colspan="2">&nbsp;<b><font size="<? echo $FONTSIZE_TITLE3 ?>" color="#000000">Produkt 
      suchen</font></b></td>
  </tr>
  <? if ($_GET['action']) { ?>
  <tr> 
    <td bgcolor="<? echo $TABLE_COLOR2 ?>" height="40" valign="bottom" colspan="2"> 
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
  <? 
  } 
  
  if (!isset($az)) $az = "0";
  
  $result = mysql_query("select name , beschreibung , variante1 , variante2 , id , preis , status from ".$PREFIX."_Artikel where name like '%".strtolower($search)."%' OR beschreibung like '%".strtolower($search)."%' order by name"); 				
  while ($row = mysql_fetch_object($result))
  	{
		$id     		= $row->id;
		$name   		= $row->name;
		$beschreibung   = $row->beschreibung;
		$preis  		= $row->preis;
		$status 		= $row->status;
		$variante1	    = $row->variante1;
		$variante2	    = $row->variante2;
		
		if (!isset($id_a)) $id_a = array($id);
		else array_push($id_a,$id);
		
		if (!isset($name_a)) $name_a = array($name);
		else array_push($name_a,$name);
		
		if (!isset($beschreibung_a)) $beschreibung_a = array($beschreibung);
		else array_push($beschreibung_a,$beschreibung);
			
		if (!isset($preis_a)) $preis_a = array($preis);
		else array_push($preis_a,$preis);		
		
		if (!isset($status_a)) $status_a = array($status);
		else array_push($status_a,$status);
		
		if (!isset($variante1_a)) $variante1_a = array($variante1);
		else array_push($variante1_a,$variante1);		
		
		if (!isset($variante2_a)) $variante2_a = array($variante2);
		else array_push($variante2_a,$variante2);
		
		$az++;
	}

  if (!$az) 
  	{
	
	?>
  <tr> 
    <td bgcolor="<? echo $TABLE_COLOR2 ?>" height="50" colspan="2"><font size="<? echo $FONTSIZE_NORMAL ?>">&nbsp;&nbsp;Es 
      wurde kein Produkt gefunden</font> </td>
  </tr>
  <? 
  }	
  else 
  {
  ?>
  <tr> 
    <td bgcolor="<? echo $TABLE_COLOR2 ?>" height="20" colspan="2">&nbsp; 
      <table border="0" cellpadding="0" cellspacing="0" width="98%" align="center">
        <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
          <td height="40" colspan="2"><b><font size="<? echo $FONTSIZE_NORMAL ?>">Artikel</font></b></td>
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
		$ds_anzahl_plus = $_GET['start'] + $ds_anzahl;
		if ($ds_anzahl_plus > $az) $ds_anzahl_plus = $az;
  		for ($i=$_GET['start']; $i< $ds_anzahl_plus; $i++) 
  		{
  		?>
        <form name="form1" method="post" action="warenkorb_insert.php?id=<? echo $id_a[$i] ?>&search=<? echo $search ?>&start=<? echo $_GET['start'] ?>&nr=<? echo $_GET['nr'] ?>">
          <?php if ($IMAGE_KAT == 1) { ?>
          <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
            <td height="24" width="60"> <a href="details.php?id=<? echo $id_a[$i] ?>&search=<? echo $search ?>&start=<? echo $_GET['start'] ?>&nr=<? echo $_GET['nr'] ?>"> 
              <img src="images/artikel/<?php echo $id_a[$i] ?>.jpg" width="50" border="0"></a></td>
            <td height="24"> <font size="<? echo $FONTSIZE_NORMAL ?>"> <a href="details.php?id=<? echo $id_a[$i] ?>&search=<? echo $search ?>&start=<? echo $_GET['start'] ?>&nr=<? echo $_GET['nr'] ?>"> 
              <? echo $name_a[$i] ?>
              </a></font> </td>
            <td width="70" height="24"> 
              <div align="center"> 
                <? 
				if ($status_a[$i] == "1"): $status_img = "green";
				elseif ($status_a[$i] == "2"): $status_img = "yellow";
				else: $status_img = "red";
				endif;
				?>
                <a href="status.php?nr=<? echo $_GET['nr'] ?>"><img src="images/status_<? echo $status_img ?>.gif" border="0" alt="Status"></a> 
              </div>
            </td>
            <td width="120" height="24"> 
              <div align="right"> <font size="<? echo $FONTSIZE_NORMAL ?>"> 
                <input type="hidden" name="variante1" value="<? echo $variante1_a[$i]?>">
                <input type="hidden" name="variante2" value="<? echo $variante2_a[$i] ?>">
                <? echo number_format($preis_a[$i],2,",",".");?>
                <? echo $waehrung ?>
                &nbsp; &nbsp;&nbsp; </font></div>
            </td>
            <td width="60" height="24"> 
              <div align="center"> 
                <input type="text" name="menge" size="3" maxlength="3" value="1">
              </div>
            </td>
            <td width="45" height="24"> 
              <div align="center"> 
                <input type=image src="images/kaufen.gif" border ="0" alt="bestellen" name="image2">
              </div>
            </td>
          </tr>
          <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
            <td height="15" colspan="6">&nbsp;</td>
          </tr>
          <?php } else { ?>
          <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
            <td height="15" colspan="2"> <a href="details.php?id=<? echo $id_a[$i] ?>&search=<? echo $search ?>&start=<? echo $_GET['start'] ?>&nr=<? echo $_GET['nr'] ?>"> 
              </a> <font size="<? echo $FONTSIZE_NORMAL ?>"> <a href="details.php?id=<? echo $id_a[$i] ?>&search=<? echo $search ?>&start=<? echo $_GET['start'] ?>&nr=<? echo $_GET['nr'] ?>"> 
              <? echo $name_a[$i] ?>
              </a></font> </td>
            <td width="70" height="15"> 
              <div align="center"> 
                <? 
				if ($status_a[$i] == "1"): $status_img = "green";
				elseif ($status_a[$i] == "2"): $status_img = "yellow";
				else: $status_img = "red";
				endif;
				?>
                <a href="status.php?nr=<? echo $_GET['nr'] ?>"><img src="images/status_<? echo $status_img ?>.gif" border="0" alt="Status"></a> 
              </div>
            </td>
            <td width="120" height="15"> 
              <div align="right"> <font size="<? echo $FONTSIZE_NORMAL ?>"> 
                <input type="hidden" name="variante1" value="<? echo $variante1_a[$i]?>">
                <input type="hidden" name="variante2" value="<? echo $variante2_a[$i] ?>">
                <? echo number_format($preis_a[$i],2,",",".");?>
                <? echo $waehrung ?>
                &nbsp; &nbsp;&nbsp; </font></div>
            </td>
            <td width="60" height="15"> 
              <div align="center"> 
                <input type="text" name="menge" size="3" maxlength="3" value="1">
              </div>
            </td>
            <td width="45" height="15"> 
              <div align="center"> 
                <input type=image src="images/kaufen.gif" border ="0" alt="bestellen" name="image3">
              </div>
            </td>
          </tr>
          <?php } ?>
        </form>
        <?php } ?>
        <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
          <td height="10" colspan="6">&nbsp;</td>
        </tr>
        <tr bgcolor="<? echo $TABLE_COLOR2 ?>"> 
          <td height="10" colspan="4"> <font size="<? echo $FONTSIZE_NORMAL ?>">Seite: 
            <?php
			
			$num = $az;
			
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
				if ($i >= 2)  echo "<a href='suche_details.php?search=$search&start=0&nr={$_GET['nr']}'>1</a> &nbsp;...&nbsp; ";
		
					for ($i; $i<= $seiten1; $i++) 
					{
						if ($_GET['next_start'] == $_GET['start']) echo "<b><a href='suche_details.php?search=$search&start={$_GET['next_start']}&nr={$_GET['nr']}'>[ $i ]</a></b> ";
						else echo "<a href='suche_details.php?search=$search&start={$_GET['next_start']}&nr={$_GET['nr']}'>$i</a> ";
						$_GET['next_start'] = $_GET['next_start'] + $ds_anzahl;
					}
				$endstart = ($seiten - 1) * $ds_anzahl;
				if (($i-1) < $seiten)  echo " &nbsp;...&nbsp; <a href='suche_details.php?search=$search&start=$endstart&nr={$_GET['nr']}'>$seiten</a>";
		
			}
			else echo "<b><a href='suche_details.php?search=$search&start=0&nr={$_GET['nr']}'>[ 1 ]</a></b>";        
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
    </td>
  </tr>
  <? 
		}
		?>
  <tr> 
    <td height="20" bgcolor="#CCCCCC" width="100"><b><font size="<? echo $FONTSIZE_NORMAL ?>">&nbsp;<a class="zurueck" href="suche.php?nr=<? echo $_GET['nr'] ?>">zur&uuml;ck</a></font></b></td>
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
