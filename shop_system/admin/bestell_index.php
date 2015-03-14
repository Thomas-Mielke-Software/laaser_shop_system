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
//if (!iSUPERADMIN) { header("Location:".FUSION_BASE."index.php"); exit; }

include ("../xxxxconfig.php");

if (!isset($_GET['typ'])) $_GET['typ'] = "";
if (!isset($action )) $action = "";

if ($_GET['typ'] == "delete") 
	{

		$conn_id = mysql_connect($HOST,$ID,$PW);
		mysql_select_db($DB,$conn_id);
		
		mysql_query("delete from ".$PREFIX."_Bestellungen where nr= '".mysql_real_escape_string($_GET['nr'])."'");
		
		mysql_close($conn_id);
	
		$action = "erfolg";
		
	}

if ($_GET['typ']== "detail") {

opentable("Offene Bestellungen");

?>
 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td height="50" colspan="2"><b><font size="4">Shop - Administration - Offene 
      Bestellungen</font></b></td>
  </tr>
  <? 
  $conn_id = mysql_connect($HOST,$ID,$PW);
  mysql_select_db($DB,$conn_id);

  $result = mysql_query("select * from ".$PREFIX."_Bestellungen where nr = '".mysql_real_escape_string($_GET['nr'])."'");

  while ($row = mysql_fetch_object($result))
  	{
	
		$datum     = $row->datum;
		$name      = $row->name;
		$email     = $row->email;
		$telefon   = $row->telefon;
		$r_adresse = $row->r_adresse;
		$l_adresse = $row->l_adresse;
		$produkte  = $row->produkte;
	?>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="160" height="10" valign="top">&nbsp;</td>
    <td height="10" valign="top" width="518">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td width="160" height="30" valign="top"><b>Datum:</b></td>
    <td height="30" valign="top" width="518"> 
      <? echo $datum ?>
      Uhr </td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td width="160" height="30" valign="top"><b>Name:</b></td>
    <td height="30" valign="top" width="518"> 
      <? echo $name?>
    </td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td width="160" height="30" valign="top"><b>E-Mail:</b></td>
    <td height="30" valign="top" width="518"><a href="mailto:<? echo $email ?>?subject=Ihre Online Bestellung vom <? echo $datum ?>"> 
      <? echo $email ?>
      </a> </td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td width="160" height="30" valign="top"><b>Telefon:</b></td>
    <td height="30" valign="top" width="518"> 
      <? echo $telefon?>
    </td>
  </tr>
  <tr> 
    <td width="22" height="5">&nbsp;</td>
    <td width="160" height="5" valign="top">&nbsp;</td>
    <td height="5" valign="top" width="518">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td width="160" height="30" valign="top"><b>Rech.adresse:</b></td>
    <td height="30" valign="top" width="518"> 
      <? echo nl2br($r_adresse)?>
    </td>
  </tr>
  <tr> 
    <td width="22" height="5">&nbsp;</td>
    <td width="160" height="5" valign="top">&nbsp;</td>
    <td height="5" valign="top" width="518">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td width="160" height="30" valign="top"><b>Lief.adresse:</b></td>
    <td height="30" valign="top" width="518"> 
      <? echo nl2br($l_adresse)?>
    </td>
  </tr>
  <tr> 
    <td width="22" height="5">&nbsp;</td>
    <td width="160" height="5" valign="top">&nbsp;</td>
    <td height="5" valign="top" width="518">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="60">&nbsp;</td>
    <td width="160" height="60" valign="top"><b>bestellte Produkte:</b></td>
    <td height="60" valign="top" width="518"> 
      <div align="left"> 
        <? echo nl2br($produkte)?>
      </div>
    </td>
  </tr>
  <tr> 
    <td width="22" height="25">&nbsp;</td>
    <td height="10" valign="top" width="160">&nbsp;</td>
    <td height="10" valign="top" width="518">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="25">&nbsp;</td>
    <td height="25" valign="top" width="160">&nbsp;</td>
    <td height="25" valign="top" width="518"> 
      <div align="left"><a href="bestell_index.php?typ=delete&nr=<? echo mysql_real_escape_string($_GET['nr']) ?>"><img src="loeschen.gif" width="80" height="17" border="0"></a></div>
    </td>
  </tr>
  <tr> 
    <td width="22" height="29">&nbsp;</td>
    <td height="29" width="160">&nbsp;</td>
    <td height="29" width="518">&nbsp;</td>
  </tr>
  <?
  }
  ?>
  <tr> 
    <td width="22" height="29">&nbsp;</td>
    <td height="29" colspan="2"><a href="hilfe.php">Online-Hilfe</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Hauptmen&uuml;</a>&nbsp;&nbsp;&nbsp;<a href="bestell_index.php">zur&uuml;ck</a></td>
  </tr>
</table>

<? 
} 
else 
{

  opentable("Offene Bestellungen");

?>
  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td height="50" colspan="3"><b><font size="4">Shop - Administration - Offene 
      Bestellungen</font></b></td>
  </tr>
  
  <? if ($action == "erfolg") {	?>
  
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td height="50" colspan="4"><b><font color="#006600">Erfolg: Die &Auml;nderungen 
      wurden &uuml;bernommen!</font></b></td>
  </tr>
  <tr> 
    <td width="22">&nbsp;</td>
    <td width="180" valign="top">&nbsp;</td>
    <td valign="top" width="120">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  
  <? } ?>
  
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td width="180" height="30" valign="top"><b>Datum:</b></td>
    <td height="30" valign="top" width="120"><b>Name:</b></td>
    <td height="30" valign="top"><b>Details:</b></td>
  </tr> 
  
  <? 
  $conn_id = mysql_connect($HOST,$ID,$PW);
  mysql_select_db($DB,$conn_id);

  $result = mysql_query("select nr , datum , name from ".$PREFIX."_Bestellungen order by nr desc");

  while ($row = mysql_fetch_object($result))
  	{
	
		$nr        = $row->nr;
		$datum     = $row->datum;
		$name      = $row->name;
	?>
 
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td width="180" height="30" valign="top"> 
      <? echo $datum ?>
      Uhr </td>
    <td height="30" valign="top" width="120"> 
      <? echo $name?>
    </td>
    <td height="30" valign="top"><a href="bestell_index.php?typ=detail&nr=<? echo $nr ?>">hier</a></td>
  </tr>

  <?
  }
  ?>
  
  <tr> 
    <td width="22" height="29">&nbsp;</td>
    <td height="29" colspan="3"><a href="hilfe.php">Online-Hilfe</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Hauptmen&uuml;</a></td>
  </tr>
</table>

<?
}

closetable();

require_once THEMES."templates/footer.php";
?>
