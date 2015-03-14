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

include LOCALE.LOCALESET."index.php";
include INCLUDES."comments_include.php";
if (!iSUPERADMIN){ redirect("../../../index.php"); };

//include FUSION_LANGUAGES.FUSION_LAN."admin/admin_main.php";
//if (!iSUPERADMIN) { header("Location:".FUSION_BASE."index.php"); exit; }

include ("../xxxxconfig.php");
include ("../templates.php");


// Variablen Deklaration

if (!isset($_GET['typ']))			$_GET['typ'] = "";
if (!isset($_GET['table_align']))	$_GET['table_align'] = "";

$get_vars						= array();
$get_vars['typ']				= htmlentities(mysqli_real_escape_string($conn_id, $_GET['typ']));
$get_vars['table_align']		= htmlentities(mysqli_real_escape_string($conn_id, $_GET['table_align']));

$post_vars						= array();
$post_vars['bgcolor']			= htmlentities(mysqli_real_escape_string($conn_id, $_POST['bgcolor']));
$post_vars['table_color1']		= htmlentities(mysqli_real_escape_string($conn_id, $_POST['table_color1']));
$post_vars['table_color2']		= htmlentities(mysqli_real_escape_string($conn_id, $_POST['table_color2']));
$post_vars['fontcolor_title2']	= htmlentities(mysqli_real_escape_string($conn_id, $_POST['fontcolor_title2']));
$post_vars['fontcolor_title3']	= htmlentities(mysqli_real_escape_string($conn_id, $_POST['fontcolor_title3']));
$post_vars['footer_color']		= htmlentities(mysqli_real_escape_string($conn_id, $_POST['footer_color']));
$post_vars['error_color']		= htmlentities(mysqli_real_escape_string($conn_id, $_POST['error_color']));
$post_vars['erfolg_color']		= htmlentities(mysqli_real_escape_string($conn_id, $_POST['erfolg_color']));
$post_vars['text']				= htmlentities(mysqli_real_escape_string($conn_id, $_POST['text']));
$post_vars['fontsize_title2']	= htmlentities(mysqli_real_escape_string($conn_id, $_POST['fontsize_title2']));
$post_vars['fontsize_title3']	= htmlentities(mysqli_real_escape_string($conn_id, $_POST['fontsize_title3']));
$post_vars['footer_size']		= htmlentities(mysqli_real_escape_string($conn_id, $_POST['footer_size']));
$post_vars['fontsize_normal']	= htmlentities(mysqli_real_escape_string($conn_id, $_POST['fontsize_normal']));
$post_vars['link']				= htmlentities(mysqli_real_escape_string($conn_id, $_POST['link']));
$post_vars['alink']				= htmlentities(mysqli_real_escape_string($conn_id, $_POST['alink']));
$post_vars['vlink']				= htmlentities(mysqli_real_escape_string($conn_id, $_POST['vlink']));
$post_vars['style1']			= htmlentities(mysqli_real_escape_string($conn_id, $_POST['style1']));
$post_vars['style2']			= htmlentities(mysqli_real_escape_string($conn_id, $_POST['style2']));
$post_vars['fontcolor_header']	= htmlentities(mysqli_real_escape_string($conn_id, $_POST['fontcolor_header']));
$post_vars['fontsize_header']	= htmlentities(mysqli_real_escape_string($conn_id, $_POST['fontsize_header']));
$post_vars['table_align']		= htmlentities(mysqli_real_escape_string($conn_id, $_POST['table_align']));
$post_vars['table_width']		= htmlentities(mysqli_real_escape_string($conn_id, $_POST['table_width']));
$post_vars['ds_anzahl']			= htmlentities(mysqli_real_escape_string($conn_id, $_POST['ds_anzahl']));


// Programm-Code

if ($get_vars['typ'] == "edit") 
	{

		$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
		//mysql_select_db($DB,$conn_id);
		
		$name = "bgcolor";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['bgcolor']}' where name = '$name'");
		
		$name = "table_color1";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['table_color1']}' where name = '$name'");
		
		$name = "table_color2";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['table_color2']}' where name = '$name'");
		
		$name = "fontcolor_title2";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['fontcolor_title2']}' where name = '$name'");
		
		$name = "fontcolor_title3";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['fontcolor_title3']}' where name = '$name'");
		
		$name = "footer_color";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['footer_color']}' where name = '$name'");
		
		$name = "error_color";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['error_color']}' where name = '$name'");
		
		$name = "erfolg_color";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['erfolg_color']}' where name = '$name'");
		
		$name = "text";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['text']}' where name = '$name'");
		
		$name = "fontsize_title2";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['fontsize_title2']}' where name = '$name'");
		
		$name = "fontsize_title3";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['fontsize_title3']}' where name = '$name'");
		
		$name = "footer_size";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['footer_size']}' where name = '$name'");
		
		$name = "fontsize_normal";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['fontsize_normal']}' where name = '$name'");
		
		$name = "link";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['link']}' where name = '$name'");
		
		$name = "alink";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['alink']}' where name = '$name'");
		
		$name = "vlink";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['vlink']}' where name = '$name'");
		
		$name = "style1";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['style1']}' where name = '$name'");
		
		$name = "style2";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['style2']}' where name = '$name'");
		
		$name = "fontcolor_header";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['fontcolor_header']}' where name = '$name'");
		
		$name = "fontsize_header";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['fontsize_header']}' where name = '$name'");
		
		$name = "table_align";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['table_align']}' where name = '$name'");
		
		$name = "table_width";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['table_width']}' where name = '$name'");

		$name = "ds_anzahl";
		mysqli_query($conn_id, "update ".$PREFIX."_Templates set inhalt ='{$post_vars['ds_anzahl']}' where name = '$name'");
		
		mysql_close($conn_id);

		$action = "erfolg";
	
	}
opentable("Shop Layout");
?>

<form name="form1" method="post" action="<? echo $_SERVER['PHP_SELF'] ?>?typ=edit">

  <table width="700" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td width="22" height="50">&nbsp;</td>
      <td height="50" colspan="2"><b><font size="4">Shop - Administration - Layout 
        einstellen</font></b></td>
    </tr>
      <tr> 
      <td width="22" height="25">&nbsp;</td>
      <td height="25" colspan="2"><a href="hilfe.php#layout">Online-Hilfe</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Hauptmen&uuml;</a></td>
    </tr>
    <? if ($action == "erfolg") { ?>
    <tr> 
      <td width="22" height="50">&nbsp;</td>
      <td height="50" colspan="2"><b><font color="#006600">Erfolg: Die &Auml;nderungen 
        wurden &uuml;bernommen!</font></b></td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">&nbsp;</td>
      <td height="30" valign="top">&nbsp;</td>
    </tr>
    <? } ?>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Hintergrundfarbe:</td>
      <td height="30" valign="top"> 
        <input type="text" name="bgcolor" maxlength="10" size="10" value="<? echo $BGCOLOR ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Header-Hintergrundfarbe:</td>
      <td height="30" valign="top"> 
        <input type="text" name="fontcolor_header" maxlength="10" size="10" value="<? echo $FONTCOLOR_HEADER ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Tabellen-Hintergrundfarbe 1:</td>
      <td height="30" valign="top"> 
        <input type="text" name="table_color1" maxlength="10" size="10" value="<? echo $TABLE_COLOR1 ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Tabellen-Hintergrundfarbe 2:</td>
      <td height="30" valign="top"> 
        <input type="text" name="table_color2" maxlength="10" size="10" value="<? echo $TABLE_COLOR2 ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="31">&nbsp;</td>
      <td width="230" height="31" valign="top">Seiten&uuml;berschrift-Farbe (Firma):</td>
      <td height="31" valign="top"> 
        <input type="text" name="fontcolor_title2" maxlength="10" size="10" value="<? echo $FONTCOLOR_TITLE2 ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Seiten&uuml;berschrift-Farbe (Tabelle)</td>
      <td height="30" valign="top"> 
        <input type="text" name="fontcolor_title3" maxlength="10" size="10" value="<? echo $FONTCOLOR_TITLE3 ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Firmenadressen-Farbe:</td>
      <td height="30" valign="top"> 
        <input type="text" name="footer_color" maxlength="10" size="10" value="<? echo $FOOTER_COLOR ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Fehlermeldung-Farbe:</td>
      <td height="30" valign="top"> 
        <input type="text" name="error_color" maxlength="10" size="10" value="<? echo $ERROR_COLOR ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Erfolgsmeldung-Farbe:</td>
      <td height="30" valign="top"> 
        <input type="text" name="erfolg_color" maxlength="10" size="10" value="<? echo $ERFOLG_COLOR ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">restliche Schrift-Farbe:</td>
      <td height="30" valign="top"> 
        <input type="text" name="text" maxlength="10" size="10" value="<? echo $TEXT ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Header&uuml;berschrift-Gr&ouml;&szlig;e:</td>
      <td height="30" valign="top"> 
        <input type="text" name="fontsize_header" maxlength="3" size="3" value="<? echo $FONTSIZE_HEADER ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Seiten&uuml;berschrift-Gr&ouml;&szlig;e 
        (Firma):</td>
      <td height="30" valign="top"> 
        <input type="text" name="fontsize_title2" maxlength="3" size="3" value="<? echo $FONTSIZE_TITLE2 ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="31">&nbsp;</td>
      <td width="230" height="31" valign="top">Seiten&uuml;berschrift-Gr&ouml;&szlig;e 
        (Tabelle):</td>
      <td height="31" valign="top"> 
        <input type="text" name="fontsize_title3" maxlength="3" size="3" value="<? echo $FONTSIZE_TITLE3 ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Firmenadressen-Gr&ouml;&szlig;e:</td>
      <td height="30" valign="top"> 
        <input type="text" name="footer_size" maxlength="3" size="3" value="<? echo $FOOTER_SIZE ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">restliche Schrift-Gr&ouml;&szlig;e:</td>
      <td height="30" valign="top"> 
        <input type="text" name="fontsize_normal" maxlength="3" size="3" value="<? echo $FONTSIZE_NORMAL ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Tabellengr&ouml;&szlig;e:</td>
      <td height="30" valign="top"> 
        <input type="text" name="table_width" maxlength="5" size="5" value="<? echo $table_width ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Shoplage:</td>
      <td height="30" valign="top"> 
        <input type="checkbox" name="table_align" value="center" <? if ($table_align == "center") echo "checked" ?>>
        mittig </td>
    </tr>
    <tr>
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Datensatzanzahl:</td>
      <td height="30" valign="top">
        <input type="text" name="ds_anzahl" maxlength="6" size="6" value="<? echo $ds_anzahl ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Link:</td>
      <td height="30" valign="top"> 
        <input type="text" name="link" maxlength="10" size="10" value="<? echo $LINK ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">vLink:</td>
      <td height="30" valign="top"> 
        <input type="text" name="vlink" maxlength="10" size="10" value="<? echo $VLINK ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">aLink</td>
      <td height="30" valign="top"> 
        <input type="text" name="alink" maxlength="10" size="10" value="<? echo $ALINK ?>">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Style (Schriftart):</td>
      <td height="30" valign="top"> 
        <select name="style1">
          <option value="font {font-family: Verdana, Arial, Helvetica, sans-serif;}">Verdana,Arial,Helvetica,Sans-Serif</option>
          <option value="font {font-family: Times New Roman, Times, serif;}">Times 
          New Roman,Times,Serif</option>
          <option value="font {font-family: Courier New, Courier, mono;}">Courier 
          New,Courier,Mono</option>
          <option value="font {font-family: Georgia, Times New Roman, Times, serif;}">Georgia,Times 
          New Roman,Times, Serif</option>
          <option value="font {font-family: Geneva, Arial, Helvetica, san-serif;}">Geneva,Arial,Helvetica,San-Serif</option>
          <option value="font {font-family: Arial, Helvetica, sans-serif;}">Arial,Helvetica,Sans-Serif</option>
        </select>
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30" valign="top">Style (Link):</td>
      <td height="30" valign="top"> 
        <p> 
          <textarea name="style2" rows="8" cols="50"><? echo $STYLE2 ?></textarea>
        </p>
      </td>
    </tr>
    <tr> 
      <td width="22" height="40">&nbsp;</td>
      <td height="40" valign="top" width="230">&nbsp; </td>
      <td height="40"> 
        <input type="image" src="speichern.gif" name="image">
      </td>
    </tr>
    <tr> 
      <td width="22" height="30">&nbsp;</td>
      <td width="230" height="30">&nbsp;</td>
      <td height="30">&nbsp;</td>
    </tr>
    <tr> 
      <td width="22" height="25">&nbsp;</td>
      <td height="25" colspan="2"><a href="hilfe.php#layout">Online-Hilfe</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Hauptmen&uuml;</a></td>
    </tr>
  </table>
</form>
<?
closetable();

?>
