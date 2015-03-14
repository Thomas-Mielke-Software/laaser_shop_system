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


if (!isset($_POST['typ'])) $_POST['typ'] = "";
if (!isset($_GET['typ'])) $_GET['typ'] = "";
if (!isset($_POST['main_kat'])) $_POST['main_kat'] = "";
if (!isset($_GET['sort'])) $_GET['sort'] = "";
if (!isset($action1)) $action1 = "";

if ($_POST['typ'] == "edit")
	{

		$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
		//mysql_select_db($DB,$conn_id);
		
		mysqli_query($conn_id, "update ".$PREFIX."_Untergruppen set anzeige ='".mysqli_real_escape_string($conn_id, $_POST['anzeige'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
		mysqli_query($conn_id, "update ".$PREFIX."_Untergruppen set name ='".mysqli_real_escape_string($conn_id, $_POST['kategorie'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
		mysqli_query($conn_id, "update ".$PREFIX."_Untergruppen set main_kat ='".mysqli_real_escape_string($conn_id, $_POST['main_kat'])."' where id = '".mysqli_real_escape_string($conn_id, $_POST['id'])."'");
		
		mysql_close($conn_id);
		
		$action = "erfolg";

	}

if (mysqli_real_escape_string($conn_id, $_POST['typ']) == "new")
	{

		if (!$_POST['neu_kategorie']): $action = "error";
		elseif (!$_POST['neu_anzeige']): $action = "error";
		else: $action = "erfolg";
		endif;
	
		if ($action == "erfolg") 
			{
	
				$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
				//mysql_select_db($DB,$conn_id);
				
				mysqli_query($conn_id, "insert into ".$PREFIX."_Untergruppen (anzeige,name,main_kat) VALUES ('".mysqli_real_escape_string($conn_id, $_POST['neu_anzeige'])."','".mysqli_real_escape_string($conn_id, $_POST['neu_kategorie'])."','".mysqli_real_escape_string($conn_id, $_POST['main_kat'])."')"); 
			
				mysql_close($conn_id);
				
				$_POST['neu_anzeige'] = "";
				$_POST['neu_kategorie'] = "";
							
			}
		
		else $action = "error";	
			
	}

if ($_GET['typ'] == "delete")
	{
		
		$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
		//mysql_select_db($DB,$conn_id);
	
		$result = mysqli_query($conn_id, "select id from ".$PREFIX."_Artikel where kategorie = '".mysqli_real_escape_string($conn_id, $_GET['id'])."'");
		$num = mysql_numrows($result);
		
		if ($num == "0") 
			{
			
				mysqli_query($conn_id, "delete from ".$PREFIX."_Untergruppen where id = '".mysqli_real_escape_string($conn_id, $_GET['id'])."'");
				$action = "erfolg";
			
			}

		else $action1 = "error";
		
		mysql_close($conn_id);

	}
	
$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
//mysql_select_db($DB,$conn_id);

opentable("Unterkategorien Verwaltung");

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td height="50" colspan="4"><b><font size="4">Shop - Administration - Unterkategorien</font></b></td>
  </tr>
  
  <? if ($action == "erfolg") {	?>
  
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td height="50" colspan="4"><b><font color="#006600">Erfolg: Die &Auml;nderungen 
      wurden &uuml;bernommen!</font></b></td>
  </tr>
  
  <? 
  } 
  if ($action1 == "error") {	
  ?>
  
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td height="50" colspan="4"><b><font color="#CC0000">Fehler: Die Unterkategorie 
      enth&auml;lt noch Produkte!</font></b></td>
  </tr>
  
  <? } ?>
  
  <tr> 
    <td width="22" height="10">&nbsp;</td>
    <td colspan="4" height="10" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td width="90" height="30"><b><a href="kat_index.php?sort=anzeige">Anzeige:</a></b></td>
    <td height="30" width="200"><b><a href="kat_index.php?sort=kat">Unterkategorie:</a></b></td>
    <td height="30"><b><a href="kat_index.php?sort=main">Hauptkategorie:</a></b></td>
    <td height="30">&nbsp;</td>
  </tr>
  
  <?
  if (!$_GET['sort']) $sortby = "main_kat desc, anzeige , name";
  if ($_GET['sort'] == "main") $sortby = "main_kat desc, anzeige , name";
  if ($_GET['sort'] == "anzeige") $sortby = "anzeige ,main_kat desc, name";
  if ($_GET['sort'] == "kat") $sortby = "name, main_kat desc, anzeige";
  
  $result = mysqli_query($conn_id, "select * from ".$PREFIX."_Untergruppen order by $sortby");
  
  while ($row = mysqli_fetch_object($result))
  	{
	
		$id 	  = $row->id;
		$anzeige  = $row->anzeige;
		$name 	  = $row->name;
		$main_kat = $row->main_kat;
  ?>
		
  <form name="form1" method="post" action="<? echo $_SERVER['PHP_SELF'] ?>">
    <tr> 
      <td width="22" height="28">&nbsp;</td>
      <td width="90" height="28">
        <input type="text" class="textbox" name="anzeige" size="3" value="<? echo htmlspecialchars($anzeige) ?>" maxlength="3">
      </td>
      <td height="28" width="200"> 
        <input type="text" class="textbox" name="kategorie" size="25" value="<? echo htmlspecialchars($name) ?>" maxlength="50">
        <input type="hidden" name="id" value="<? echo $id ?>">
		<input type="hidden" name="typ" value="edit">
      </td>
      <td height="28"> 
        <select class="textbox" name="main_kat">
		
		<?
		$result1 = mysqli_query($conn_id, "select * from ".$PREFIX."_Hauptgruppen where id = '$main_kat'");
		while ($row1 = mysqli_fetch_object($result1))
			{
			
				$name2   = $row1->name;
			
			}
		if ($main_kat) echo "<option value='$main_kat'>$name2</option>";
		else echo "<option value=''>nicht vorhanden</option>";

		$result2 = mysqli_query($conn_id, "select * from ".$PREFIX."_Hauptgruppen order by name");
		while ($row2 = mysqli_fetch_object($result2))
			{

				$id1   = $row2->id;
				$name1 = $row2->name;

				if ($id1 != $main_kat) echo "<option value='$id1'>$name1</option>";
			}
		?>
		
        </select>
      </td>
      <td height="28"> 
        <div align="left"> &nbsp;&nbsp;&nbsp;&nbsp; 
          <input type="image" src="aendern.gif" width="69" height="27">
          &nbsp;&nbsp;<a href="kat_index.php?typ=delete&id=<? echo $id ?>"><img src="loeschen.gif" width="69" height="27" border ="0"></a></div>
      </td>
    </tr>
  </form>

  <? }?>
  
  <tr> 
    <td width="22" height="30">&nbsp;</td>
    <td height="30" colspan="4">&nbsp;</td>
  </tr>
  
  <? if ($action == "error") { ?>
  
  <tr> 
    <td width="22" height="50">&nbsp;</td>
    <td height="50" colspan="4"><b><font color="#CC0000">Fehler: Die Unterkategorie 
      oder die Anzeige ist leer!</font></b></td>
  </tr>

  <? } 
  
  if (!isset($_POST['neu_anzeige'])) $_POST['neu_anzeige'] = "";
  if (!isset($_POST['neu_kategorie'])) $_POST['neu_kategorie'] = "";
  ?>

  <tr> 
    <td width="22" height="25">&nbsp;</td>
    <td height="25" colspan="4"> Unterkategorie anlegen:</td>
  </tr>
  <form name="form2" method="post" action="<? echo $_SERVER['PHP_SELF'] ?>">
    <tr> 
      <td width="22" height="25">&nbsp;</td>
      <td height="25" width="90">
        <input type="text" class="textbox" name="neu_anzeige" size="3" value="<? echo htmlspecialchars($_POST['neu_anzeige']) ?>" maxlength="3">
      </td>
      <td height="25" width="170"> 
        <input type="text" class="textbox" name="neu_kategorie" size="25" value="<? echo htmlspecialchars($_POST['neu_kategorie']) ?>" maxlength="50">
        <input type="hidden" name="typ" value="new">
      </td>
      <td height="25"> 
        <select class="textbox" name="main_kat">
        <?
		$result = mysqli_query($conn_id, "select id , name from ".$PREFIX."_Hauptgruppen order by name");
		while ($row = mysqli_fetch_object($result))
			{

				$id1   = $row->id;
				$name1 = $row->name;

				echo "<option value='$id1'>$name1</option>";
			}
		?>
        </select>
      </td>
      <td height="25"> 
        <div align="left"> &nbsp;&nbsp;&nbsp;&nbsp; 
          <input type="image" src="anlegen.gif" width="69" height="27">
        </div>
      </td>
    </tr>
  </form>
  <tr> 
    <td width="22" height="25">&nbsp;</td>
    <td height="25" valign="top" colspan="4">&nbsp;</td>
  </tr>
  <tr> 
    <td width="22" height="29">&nbsp;</td>
    <td height="29" colspan="4"><a href="hilfe.php#kategorie">Online-Hilfe</a>&nbsp;&nbsp;&nbsp;<a href="index.php">Hauptmen&uuml;</a></td>
  </tr>
</table>
<?

closetable();

require_once THEMES."templates/footer.php";
?>
