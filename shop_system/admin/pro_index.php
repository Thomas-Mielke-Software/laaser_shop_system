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

opentable("Artikel Verwaltung");

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td height="50" colspan="2"><b><font size="4">Shop - Administration - Produkte</font></b></td>
  </tr>
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td height="10" valign="top" colspan="2">&nbsp;</td>
  </tr>
  
  <? if ($_GET['action'] == "erfolg") {	?>
  
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td height="50" colspan="3"><b><font color="#006600">Erfolg: Die &Auml;nderungen 
      wurden &uuml;bernommen!</font></b></td>
  </tr>
  
  <? } ?>
  
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td height="30" colspan="2"><b>Unterkategorie w&auml;hlen:</b></td>
  </tr>
  
  <?
  $conn_id = mysql_connect($HOST,$ID,$PW);
  mysql_select_db($DB,$conn_id);

  $result = mysql_query("select id , name , main_kat from ".$PREFIX."_Untergruppen order by main_kat desc, anzeige , name");
  while ($row = mysql_fetch_object($result))
  	{
		$id       = $row->id;
		$name     = $row->name;
		$main_kat = $row->main_kat;
		
		if ($main_kat) 
			{	
			
				$result1 = mysql_query("select name from ".$PREFIX."_Hauptgruppen where id = '$main_kat'");
				while ($row1 = mysql_fetch_object($result1))
					{
					
						$main_name = $row1->name;

					}
				
			}
		
		$anzahl = "0";
		$result2 = mysql_query("SELECT * FROM ".$PREFIX."_Artikel where kategorie = '$id'");
		$anzahl = mysql_num_rows($result2);
		if (!isset($main_name)) $main_name = "";
	?>
	
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td height="30"> <a href="pro_show.php?kategorie=<? echo $id ?>&name_k=<? echo $name ?>&main_name=<? echo $main_name ?>"> 
      <? if ($main_kat != "") echo "$main_name / " ?>
      <? echo $name ?>
      </a> </td>
    <td height="30" width="250">[ 
      <? echo $anzahl ?>
      Produkt(e) vorhanden]</td>
  </tr>

  <?
  }
  ?>
  
  <tr> 
    <td width="22" height="25">&nbsp;</td>
    <td height="25" colspan="2">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="25">&nbsp;</td>
    <td height="25" colspan="2"><b>Produkt hinzuf&uuml;gen:</b></td>
  </tr>
  <tr> 
    <td width="22" height="25">&nbsp;</td>
    <td height="25" colspan="2"><a href="pro_neu.php">neues Produkt anlegen</a></td>
  </tr>
  <tr> 
    <td width="22" height="25">&nbsp;</td>
    <td height="25" colspan="2">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="29">&nbsp;</td>
    <td height="29" colspan="2"><a href="hilfe.php#produkte">Online-Hilfe</a>&nbsp;&nbsp;&nbsp;<a href="index.php">Hauptmen&uuml;</a></td>
  </tr>
</table>
<?
closetable();

require_once THEMES."templates/footer.php";
?>
