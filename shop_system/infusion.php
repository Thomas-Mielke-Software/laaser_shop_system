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

if (!defined("IN_FUSION")) { die("Access Denied"); }

include INFUSIONS."infusion_folder/infusion_db.php";

// Infusion Information
$inf_title = "Shop System";
$inf_version = "2.0";
$inf_developer = "Jürgen Laaser, Carsten Pukass, firemike, Thomas Mielke";
$inf_email = "mielket@gmx.de";
$inf_weburl = "";
$inf_admin_image = "";
$inf_description = "Ein komplettes Shop System für die PHP-Fusion (inkl.Online Hilfe und Admin Menü).";

// Infusion Paths
// inf_folder : The folder in which the infusion resides e.g. "new_infusion";
// inf_admin : The name of the Admin Panel (if required) e.g. "new_infusion_admin.php";
$inf_folder = "shop_system";
$inf_adminpanel[1] = array(
	"title" => "Shop System",
	"image" => "images/kaufen.gif",
	"panel" => "admin/index.php",
	"rights" => "SHOP"
);	// v7
$inf_admin_panel = "admin/index.php";

// If any of the following items are not required, you can delete the entire
// line, or ideally set the parameter to ""; i.e. leave it blank.

// Infusion Links : Adds a link to Site Links (if required).
$inf_link_name = "Shop System";
$inf_link_url = "shop_system/index.php";
$inf_sitelink[1] = array(		// v7
	"title" => "Shop System",
	"url" => "shop_system/index.php",
	"visibility" => "0"
);

// Database table commands are stored in an array, the first table, or a single
// table must always be in array [0].

// Database Table Drop Command : Drop tables if infusion is uninstalled.
$inf_drop_tables[0] = "DROP TABLE IF EXISTS shop_Session";
$inf_drop_tables[1] = "DROP TABLE IF EXISTS shop_Warenkorb";
$inf_drop_tables[2] = "DROP TABLE IF EXISTS shop_Untergruppen";
$inf_drop_tables[3] = "DROP TABLE IF EXISTS shop_Hauptgruppen";
$inf_drop_tables[4] = "DROP TABLE IF EXISTS shop_Templates";
$inf_drop_tables[5] = "DROP TABLE IF EXISTS shop_Artikel";
$inf_drop_tables[6] = "DROP TABLE IF EXISTS shop_Zahlarten";
$inf_drop_tables[7] = "DROP TABLE IF EXISTS shop_Bestellungen";

?>
