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

if (!isset($_GET['start'])) $_GET['start'] = 0;
if (!isset($_GET['next_start'])) $_GET['next_start'] = "0";
if (!isset($_GET['sort'])) $_GET['sort'] = "";

opentable("Artikel &Uuml;bersicht");

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td height="50" colspan="3"><b><font size="4">Shop - Administration - Produkte 
      - Unterkategorie: 
      <? 
	  if ($_GET['main_name']) echo "{$_GET['main_name']} / ";
	  echo $_GET['name_k'];
	  ?>
      </font></b></td>
  </tr>
  <? if ($_GET['action'] == "erfolg") {	?>
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td height="50" colspan="3"><b><font color="#006600">Erfolg: Die &Auml;nderungen 
      wurden &uuml;bernommen!</font></b></td>
  </tr>
  <? } 
  if (!$_GET['sort']) $sortby = "name";
  if ($_GET['sort'] == "name") $sortby = "name";
  if ($_GET['sort'] == "artikelnummer") $sortby = "artikelnummer";
  ?>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td height="10" valign="top" colspan="3">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td height="30" width="80"><b><a href="pro_show.php?kategorie=<? echo $_GET['kategorie'] ?>&name_k=<? echo $_GET['name_k'] ?>&main_name=<? echo $_GET['main_name'] ?>&start=<? echo $_GET['start'] ?>&sort=artikelnummer">Art.Nr.</a></b></td>
    <td height="30" width="226"><b><a href="pro_show.php?kategorie=<? echo $_GET['kategorie'] ?>&name_k=<? echo $_GET['name_k'] ?>&main_name=<? echo $_GET['main_name'] ?>&start=<? echo $_GET['start'] ?>&sort=name">Name</a></b></td>
    <td height="30" width="372">&nbsp;</td>
  </tr>
  <?
  $conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
  //mysql_select_db($DB,$conn_id);
  
  $result = mysqli_query($conn_id, "select * from ".$PREFIX."_Artikel where kategorie = '".mysqli_real_escape_string($conn_id, $_GET['kategorie'])."' order by $sortby LIMIT ".mysqli_real_escape_string($conn_id, $_GET['start']).", $ds_anzahl");
  while ($row = mysqli_fetch_object($result))
 	{
		
		$kategorie1    = $row->kategorie;
		$id     	   = $row->id;
		$artikelnummer = $row->artikelnummer;
		$name   	   = $row->name;
		$bild   	   = $row->bild;
		
  ?>
  <tr> 
    <td width="22" height="30"> </td>
    <td height="30" width="80"> 
      <? echo $artikelnummer?>
    </td>
    <td height="30" width="226"> 
      <? echo $name ?>
      <input type="hidden" name="bild" value="<? echo $bild ?>">
    </td>
    <td height="30" width="372"> 
      <div align="center"> <a href="pro_edit.php?kategorie=<? echo $kategorie1 ?>&id=<? echo $id ?>&name_k=<? echo $_GET['name_k'] ?>&main_name=<? echo $_GET['main_name'] ?>&start=<? echo $_GET['start'] ?>&sort=<? echo $_GET['sort'] ?>"><img src="aendern.gif" width="69" height="27" border="0"></a> 
        &nbsp;&nbsp; <a href="pro_delete.php?kategorie=<? echo $kategorie1 ?>&bild=<? echo $bild ?>&id=<? echo $id ?>&name_k=<? echo $_GET['name_k'] ?>&main_name=<? echo $_GET['main_name'] ?>&start=<? echo $_GET['start'] ?>&sort=<? echo $_GET['sort'] ?>"><img src="loeschen.gif" width="69" height="27" border="0"></a></div>
    </td>
  </tr>
  <?
  }
  ?>
  <tr> 
    <td width="22" height="30"></td>
    <td height="30" colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="22" height="30"></td>
    <td height="30" colspan="3">Seite: 
	
	<?php
	
	$result = mysqli_query($conn_id, "select id from ".$PREFIX."_Artikel where kategorie = ".mysqli_real_escape_string($conn_id, $_GET['kategorie'])."");
	$num = mysql_numrows($result);
	
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
		if ($i >= 2)  echo "<a href='pro_show.php?kategorie={$_GET['kategorie']}&main_name={$_GET['main_name']}&name_k={$_GET['name_k']}&start=0&sort={$_GET['sort']}'>1</a> &nbsp;...&nbsp; ";

			for ($i; $i<= $seiten1; $i++) 
			{
				if ($_GET['next_start'] == $_GET['start']) echo "<b><a href='pro_show.php?kategorie={$_GET['kategorie']}&main_name={$_GET['main_name']}&name_k={$_GET['name_k']}&start={$_GET['next_start']}&sort={$_GET['sort']}'>[ $i ]</a></b> ";
				else echo "<a href='pro_show.php?kategorie={$_GET['kategorie']}&main_name={$_GET['main_name']}&name_k={$_GET['name_k']}&start={$_GET['next_start']}&sort={$_GET['sort']}'>$i</a> ";
				$_GET['next_start'] = $_GET['next_start'] + $ds_anzahl;
			}
		$endstart = ($seiten - 1) * $ds_anzahl;
		if (($i-1) < $seiten)  echo " &nbsp;...&nbsp; <a href='pro_show.php?kategorie={$_GET['kategorie']}&main_name={$_GET['main_name']}&name_k={$_GET['name_k']}&start=$endstart&sort={$_GET['sort']}'>$seiten</a>";

	}
    
	else echo "<b><a href='pro_show.php?kategorie={$_GET['kategorie']}&main_name={$_GET['main_name']}&name_k={$_GET['name_k']}&start=0&sort={$_GET['sort']}'>[ 1 ]</a></b>";        
	?>
	</td>
  </tr>
  <tr> 
    <td width="22" height="25">&nbsp;</td>
    <td height="25" colspan="3">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="29">&nbsp;</td>
    <td height="29" colspan="3"><a href="hilfe.php#produkte">Online-Hilfe</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Hauptmen&uuml;</a>&nbsp;&nbsp;&nbsp;<a href="pro_index.php">zur&uuml;ck</a></td>
  </tr>
</table>
<?
closetable();

require_once THEMES."templates/footer.php";
?>
