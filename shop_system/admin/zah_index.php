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

if (!isset($_POST['neu_art'])) $_POST['neu_art'] = "";
if (!isset($_POST['neu_beschreibung'])) $_POST['neu_beschreibung'] = "";
if (!isset($_POST['neu_art_kosten'])) $_POST['neu_art_kosten'] = "";


if ($_GET['typ'] == "edit") 
	{

		$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
		//mysql_select_db($DB,$conn_id);

		mysqli_query($conn_id, "update ".$PREFIX."_Zahlarten set art ='".mysqli_real_escape_string($_POST['art'])."' where zahlartenid = '".mysqli_real_escape_string($_POST['zahlartenid'])."'");
		mysqli_query($conn_id, "update ".$PREFIX."_Zahlarten set beschreibung ='".mysqli_real_escape_string($_POST['beschreibung'])."' where zahlartenid = '".mysqli_real_escape_string($_POST['zahlartenid'])."'");
		mysqli_query($conn_id, "update ".$PREFIX."_Zahlarten set art_kosten ='".mysqli_real_escape_string($_POST['art_kosten'])."' where zahlartenid = '".mysqli_real_escape_string($_POST['zahlartenid'])."'");
		
		$action = "erfolg";
		
	}

if ($_GET['typ'] == "new")
	
	{

		if (!$_POST['neu_art']): $action = "error";
		elseif (!$_POST['neu_art_kosten']): $action = "error";
		else: $action = "erfolg";
		endif;

		if ($action == "erfolg") 
			{	

				$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
				//mysql_select_db($DB,$conn_id);
		
				mysqli_query($conn_id, "insert into ".$PREFIX."_Zahlarten (art,beschreibung,art_kosten) VALUES ('".mysqli_real_escape_string($_POST['neu_art'])."','".mysqli_real_escape_string($_POST['neu_beschreibung'])."','".mysqli_real_escape_string($_POST['neu_art_kosten'])."')"); 
								
				$_POST['neu_art'] = "";
				$_POST['neu_beschreibung'] = "";
				$_POST['neu_art_kosten'] = "";
		
				$action = "erfolg";
		
			}
		
		else $action = "error";
		
	}

if ($_GET['typ'] == "delete")
	
	{

		$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
		//mysql_select_db($DB,$conn_id);
		
		mysqli_query($conn_id, "delete from ".$PREFIX."_Zahlarten where zahlartenid = '".mysqli_real_escape_string($_GET['zahlartenid'])."'");
		
		$action = "erfolg";

	}

opentable("Zahlungsarten");
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td height="50" colspan="4"><b><font size="4">Shop - Administration - Zahlungsarten</font></b></td>
  </tr>

  <? if ($action == "erfolg") { ?>
  
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td height="50" colspan="4"><b><font color="#006600">Erfolg: Die &Auml;nderungen 
      wurden &uuml;bernommen!</font></b></td>
  </tr>
  
  <? } ?>
  
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td width="130" height="10" valign="top">&nbsp;</td>
    <td height="10" valign="top">&nbsp;</td>
    <td width="130" height="10" valign="top">&nbsp;</td>
    <td height="10" valign="top">&nbsp;</td>
  </tr>
  
  <?
  $conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
  //mysql_select_db($DB,$conn_id);

  $result = mysqli_query($conn_id, "select * from ".$PREFIX."_Zahlarten order by art");
  $num = mysqli_numrows($result);
	
  if ($num == 0) 
  	{
  ?>
  
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td height="30" colspan="4"><b><font color="#CC0000">Achtung: Es sind keine 
      Zahlungsarten vorhanden! Bitte legen Sie mind. eine an!</font></b></td>
  </tr>
  
  <?
  }
  else 
  {
  ?>
  
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td height="30" valign="top"><b>Zahlungsart:</b></td>
    <td height="30" valign="top"><b>Beschreibung (Auftragsbest&auml;tigung):</b></td>
    <td height="30" valign="top"><b>Versandkosten:</b></td>
    <td height="30" valign="top">&nbsp;</td>
  </tr>
  
  <?
  }
  $result = mysqli_query($conn_id, "select * from ".$PREFIX."_Zahlarten order by art");
  while ($row = mysqli_fetch_object($result))
  	{
	
		$zahlartenid  = $row->zahlartenid;
		$art          = $row->art;
		$beschreibung = $row->beschreibung;
		$art_kosten   = $row->art_kosten;
 ?>
 
  <form name="form1" method="post" action="<? echo $_SERVER['PHP_SELF'] ?>?typ=edit">
    <tr> 
      <td width="22" height="60">&nbsp;</td>
      <td height="60" valign="top"> 
        <input type="text" class="textbox" name="art" maxlength="50" size="14" value="<? echo htmlspecialchars($art) ?>">
      </td>
      <td height="60" valign="top"> 
        <textarea class="textbox" name="beschreibung" cols="30" rows="3"><? echo htmlspecialchars($beschreibung) ?></textarea>
        <input type="hidden" name="zahlartenid" value="<? echo $zahlartenid ?>">
      </td>
      <td height="60" valign="top"> 
        <input type="text" class="textbox" name="art_kosten" maxlength="6" size="6" value="<? echo htmlspecialchars($art_kosten) ?>">
        <? echo $waehrung ?>
      </td>
      <td height="60" valign="top"> 
        <div align="left"> 
          <input type="image" src="aendern.gif">
          <br>
          <a href="zah_index.php?typ=delete&zahlartenid=<? echo $zahlartenid ?>"><img src="loeschen.gif" width="69" height="27" border="0"></a></div>
      </td>
    </tr>
  </form>
 
  <?
  }
  ?>
  
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td height="30" colspan="4"><b></b></td>
  </tr>
  
  <? if ($action == "error") { ?>
  
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td height="50" colspan="4"><b><font color="#CC0000">Fehler: Die Zahlungsart 
      oder die Versandkosten sind leer!</font></b></td>
  </tr>
 
  <? } ?>
  
  <tr> 
    <td width="22" height="25">&nbsp;</td>
    <td height="25" colspan="4"> Zahlungsart anlegen:</td>
  </tr>
  <form name="form2" method="post" action="<? echo $_SERVER['PHP_SELF'] ?>?typ=new">
    <tr> 
      <td width="22" height="25">&nbsp;</td>
      <td height="60" valign="top"> 
        <input type="text" class="textbox" name="neu_art" maxlength="50" size="14" value="<? echo htmlspecialchars($_POST['neu_art']) ?>">
      </td>
      <td height="60" valign="top"> 
        <textarea class="textbox" name="neu_beschreibung" cols="30" rows="3"><? echo htmlspecialchars($_POST['neu_beschreibung']) ?></textarea>
      </td>
      <td height="60" valign="top"> 
        <input type="text" class="textbox" name="neu_art_kosten" maxlength="6" size="6" value="<? echo htmlspecialchars($_POST['neu_art_kosten']) ?>">
        <? echo $waehrung ?>
      </td>
      <td height="60" valign="top"> 
        <div align="left"> 
          <input type="image" src="anlegen.gif">
        </div>
      </td>
    </tr>
  </form>
  <tr> 
    <td width="22" height="25">&nbsp;</td>
    <td height="25" valign="top">&nbsp;</td>
    <td height="25" valign="top">&nbsp;</td>
    <td height="25" valign="top">&nbsp;</td>
    <td height="25" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="29">&nbsp;</td>
    <td height="29" colspan="4"><a href="hilfe.php#zahlungsarten">Online-Hilfe</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Hauptmen&uuml;</a></td>
  </tr>
</table>
<?

closetable();

require_once THEMES."templates/footer.php";
?>
