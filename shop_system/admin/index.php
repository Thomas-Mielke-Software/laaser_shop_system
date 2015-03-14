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
include ("../templates.php");

$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
//mysql_select_db($DB,$conn_id);

if (!isset($_GET['typ'])) $_GET['typ'] = "";

if ($_GET['typ'] == "shop")
	{

		$shopzeit = $shopzeit*60;
		
		$result = mysqli_query($conn_id, "select id , datum from ".$PREFIX."_Session order by id");
		
		$datum1 = time();
		$anzahl_WK = "0";
			
		while ($row = mysqli_fetch_object($result))
			{
		
				$id    = $row->id;
				$datum = $row->datum;
		
				if ($datum > $datum1 - $shopzeit) $anzahl_WK++;
		
			}
		
		if ($anzahl_WK == "0") 
			{
		
				$name = "shop";
		
				mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='".mysqli_real_escape_string($conn_id, $_GET['option'])."' where name = '$name'");
				
				header("Location: index.php");
		
			}
			
		$action = "error";
	
	}

if ($shop == "enable") 
	{

		$shop = "aktiviert";
		$option = "disable";
		
	}

else 
	{
		
		$shop = "deaktiviert";
		$option = "enable";
		
	}

opentable("Shop Administration");
	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td width="674" height="50"><b><font size="4">Shop - Administration</font></b></td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td width="674" height="30"> 
      <ul>
        <li><a href="mainkat_index.php">Hauptkategorien verwalten</a></li>
        <li><a href="kat_index.php">Unterkategorien verwalten</a></li>
        <li><a href="pro_index.php">Produkte verwalten</a></li>
        <li><a href="zah_index.php">Zahlungsarten verwalten</a></li>
        <li><a href="son_index.php">Sonstige Einstellungen</a></li>
				<li><a href="lay_index.php">Shop Layout</a>
				<li><a href="index.php?typ=shop&option=<? echo $option ?>">Shop de-/ 
          aktivieren</a></li>
        <li><a href="bestell_index.php">Offene Bestellungen</a><br>
        </li>
        <li><a href="hilfe.php">Online-Hilfe</a></li>
      </ul>
      </td>
  </tr>
  <tr> 
    <td width="22" height="25">&nbsp;</td>
    <td width="674" height="25">&nbsp;</td>
  </tr>
  
  <? if ($action == "error") { ?>
  
  <tr> 
    <td width="22" height="25">&nbsp;</td>
    <td width="674" height="25"><b><font color="#CC0000">Fehler: Es befinden sich 
      Artikel im Warenkorb, <br>
      bitte warten Sie Ihre voreingestellte Shop-Deaktivierungszeit ab!</font></b></td>
  </tr>
  
  <? } ?>
  
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td width="674" height="50"><b><i>Status: Shop ist 
      <? echo $shop ?>
      <font face="Verdana, Arial, Helvetica, sans-serif" size="1"><a href="shop.php?option=<? echo $option ?>"> 
      </a></font> </i></b> </td>
  </tr>
</table>

<?
closetable();

require_once THEMES."templates/footer.php";

?>
