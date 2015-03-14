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


//include ("xxxxconfig.php");

if ($ID == "" AND $PW == "") echo "Fehler: Diese Datei darf nicht alleine aufgerufen werden";
else {


$db_test = mysqli_connect($HOST,$ID,$PW);
if (!$db_test) 
{
	echo "<b>Es konnte keine Verbindung zur Datenbank aufgebaut werden!</b><br>";
	echo "<b>Bitte versuchen Sie es später noch einmal!</b>";
	exit();
}
mysqli_close($db_test);


$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
//mysql_select_db($DB,$conn_id);

$result	= mysqli_query($conn_id, "select name,inhalt from ".$PREFIX."_Templates");
if (!$result) 
{
	echo "<p><b>Bitte führen Sie die Installationsroutine aus und löschen anschließend die Datei aus dem Verzeichnis!</b></p>";
	echo "<p><b><a href='install.php'>Installation starten</a></b></p>";
	exit();
}


while ($row = mysqli_fetch_object($result))
{
	$name_t = $row->name;
	$templates = $row->inhalt;  
	if (!isset($templates_arry)) $templates_arry = array($name_t=>$templates);
	else $templates_arry[$name_t] = $templates;
}

$shop = $templates_arry["shop"];
$shopzeit = $templates_arry["shopzeit"];
$shopmeldung = $templates_arry["shopmeldung"];
$shopmeldung1 = $shopmeldung;
$shopmeldung = nl2br($shopmeldung);
$TITLE1 = $templates_arry["title1"];
$TITLE2 = $templates_arry["title2"];
$BGCOLOR = $templates_arry["bgcolor"];
$FONTSIZE_TITLE2 = $templates_arry["fontsize_title2"];
$FONTCOLOR_TITLE2 = $templates_arry["fontcolor_title2"];
$FONTSIZE_TITLE3 = $templates_arry["fontsize_title3"];
$FONTCOLOR_TITLE3 = $templates_arry["fontcolor_title3"];
$FOOTER = $templates_arry["footer"];
$HOMEPAGE = $templates_arry["homepage"];
$EMAIL = $templates_arry["mailadresse"];
$FOOTER_SIZE = $templates_arry["footer_size"];
$FOOTER_COLOR = $templates_arry["footer_color"];
$STYLE1 = $templates_arry["style1"];
$STYLE2 = $templates_arry["style2"];
$TEXT = $templates_arry["text"];
$LINK = $templates_arry["link"];
$ALINK = $templates_arry["alink"];
$VLINK = $templates_arry["vlink"];
$FONTSIZE_NORMAL = $templates_arry["fontsize_normal"];
$TABLE_COLOR1 = $templates_arry["table_color1"];
$TABLE_COLOR2 = $templates_arry["table_color2"];
$ERROR_COLOR = $templates_arry["error_color"];
$ERFOLG_COLOR = $templates_arry["erfolg_color"];
$unternehmen = $templates_arry["unternehmen"];
$header = $templates_arry["header"];
$header_img = $templates_arry["header_img"];
$header_text = $templates_arry["header_text"];
$FONTSIZE_HEADER = $templates_arry["fontsize_header"];
$FONTCOLOR_HEADER = $templates_arry["fontcolor_header"];
$waehrung = $templates_arry["waehrung"];
$variante_name1 = $templates_arry["variante_name1"];
$variante_name2 = $templates_arry["variante_name2"];
$table_align = $templates_arry["table_align"];
$table_width = $templates_arry["table_width"];
$AGBS = $templates_arry["agbs"];
$status_green = $templates_arry["status_green"];
$status_yellow = $templates_arry["status_yellow"];
$status_red = $templates_arry["status_red"];
$ds_anzahl = $templates_arry["ds_anzahl"];
$mindermengenaufschlag = $templates_arry["mindermengenaufschlag"];
$mindestbestellpreis = $templates_arry["mindestbestellpreis"];
$mailheader = $templates_arry["mailheader"];
$mailfooter = $templates_arry["mailfooter"];
$mehrwertsteuer = $templates_arry["mehrwertsteuer"];
$mailadresse_mail = $templates_arry["mailadresse_mail"];


// Variablen Deklaration

if (!isset ($_GET['nr'])) $_GET['nr'] = "";
if (!isset ($_GET['main_kat'])) $_GET['main_kat'] = "";
if (!isset ($main_kat)) $main_kat = "";
if (!isset ($_GET['action'])) $_GET['action'] = "";
if (!isset ($action)) $action = "";


// Nummer check

$result	  = mysqli_query($conn_id, "select * from ".$PREFIX."_Session where id = '".mysqli_real_escape_string($conn_id, $_GET['nr'])."'" );
$check_db = mysqli_num_rows($result);
if ($check_db == 0) $_GET['nr'] = "";

mysqli_close($conn_id);
}
?>
