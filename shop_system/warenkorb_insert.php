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

include ("xxxxconfig.php");
include ("templates.php");

if (!isset($_GET['typ_d'])) $_GET['typ_d'] = "";
if (!isset($_GET['search'])) $_GET['search'] = "";
if (!isset($_POST['variante1'])) $_POST['variante1'] = "";
if (!isset($_POST['variante2'])) $_POST['variante2'] = "";
if (!isset($LINK)) $LINK = "";

if ($shop == "enable"){

	if ($_GET['typ_d'] == "details"): $LINK = "details.php?id={$_GET['id']}&kategorie={$_GET['kategorie']}&search={$_GET['search']}&main_kat={$_GET['main_kat']}&start={$_GET['start']}&action=error&nr={$_GET['nr']}";
	elseif (!$_GET['search']): $LINK = "show.php?kategorie={$_GET['kategorie']}&main_kat={$_GET['main_kat']}&start={$_GET['start']}&action=error&menge={$_POST['menge']}&nr={$_GET['nr']}";
	else: $LINK = "suche_details.php?search={$_GET['search']}&start={$_GET['start']}&action=error&menge={$_POST['menge']}&nr={$_GET['nr']}";
	endif;

	if ($_POST['menge'] == 0): header("Location: $LINK");
	elseif ($_GET['typ_d'] != "details" AND $_POST['variante1']): header("Location: $LINK");
	elseif ($_GET['typ_d'] != "details" AND $_POST['variante2']): header("Location: $LINK");

	else: 
		{

			if (!$_GET['nr']) $_GET['nr'] = md5(uniqid(rand()));
				
			$datum = time();
		
			$conn_id = mysql_connect($HOST,$ID,$PW);
			mysql_select_db($DB,$conn_id);
			
			$result = mysql_query("select id from ".$PREFIX."_Session where id = '".mysql_real_escape_string($_GET['nr'])."'");
			$check_nr = mysql_numrows($result);
			
			if ($check_nr == 0) mysql_query("insert into ".$PREFIX."_Session (id,datum) VALUES ('".mysql_real_escape_string($_GET['nr'])."','$datum')");
			else mysql_query("update ".$PREFIX."_Session set datum ='$datum' where id = '".mysql_real_escape_string($_GET['nr'])."'");
			 
			$result = mysql_query("select artikelnummer , name , preis from ".$PREFIX."_Artikel where id = '".mysql_real_escape_string($_GET['id'])."'"); 
			while ($row = mysql_fetch_object($result))
				{

					$artikelnummer = $row->artikelnummer;
					$name  	       = $row->name;
					$preis	       = $row->preis;
					
				}
				
			$result = mysql_query("select artikelnummer from ".$PREFIX."_Warenkorb where artikelnummer = '$artikelnummer' AND nr = '".mysql_real_escape_string($_GET['nr'])."'");
			$check_artikel  = mysql_numrows($result);
							
			if ($check_artikel == 0) mysql_query("insert into ".$PREFIX."_Warenkorb (nr,artikelnummer,name,menge,preis,variante1,variante2) VALUES ('".mysql_real_escape_string($_GET['nr'])."','$artikelnummer','$name','".mysql_real_escape_string($_POST['menge'])."','$preis','".mysql_real_escape_string($_POST['variante1'])."','".mysql_real_escape_string($_POST['variante2'])."')"); 
			else 
				{

					$result = mysql_query("select id, menge , variante1 , variante2 from ".$PREFIX."_Warenkorb where artikelnummer = '$artikelnummer' AND nr = '".mysql_real_escape_string($_GET['nr'])."'");
					
					$anzahl_artikel = "";
					
					while ($row = mysql_fetch_object($result))
						{
							$variante1_wk = $row->variante1; 
							$variante2_wk = $row->variante2; 
							$menge1       = $row->menge;
							$id_artikel   = $row->id;
							
							if ($variante1_wk == $_POST['variante1'] AND $variante2_wk == $_POST['variante2'])
								{
								
									$menge2 = mysql_real_escape_string($_POST['menge']) + $menge1;
									mysql_query("update ".$PREFIX."_Warenkorb set menge ='$menge2' where id = '$id_artikel' AND nr = '".mysql_real_escape_string($_GET['nr'])."'");
									$anzahl_artikel++;
									
								}	
						}

						if (!$anzahl_artikel) mysql_query("insert into ".$PREFIX."_Warenkorb (nr,artikelnummer,name,menge,preis,variante1,variante2) VALUES ('".mysql_real_escape_string($_GET['nr'])."','$artikelnummer','$name','".mysql_real_escape_string($_POST['menge'])."','$preis','".mysql_real_escape_string($_POST['variante1'])."','".mysql_real_escape_string($_POST['variante2'])."')"); 
				}
		
			$datum1 = time();
			$datum1 = $datum1 - 3600;
			
			$result = mysql_query("select id from ".$PREFIX."_Session where datum < '$datum1' order by datum");
			
			while ($row = mysql_fetch_object($result))
				{
		
					$id1    = $row->id;
					
					mysql_query("delete from ".$PREFIX."_Session where id = '$id1'");
					mysql_query("delete from ".$PREFIX."_Warenkorb where nr = '$id1'");
					
				}
				
				
			mysql_close($conn_id);
			
			if ($_GET['typ_d'] == "details"): header("Location: details.php?id={$_GET['id']}&kategorie={$_GET['kategorie']}&search={$_GET['search']}&main_kat={$_GET['main_kat']}&start={$_GET['start']}&action=erfolg&nr={$_GET['nr']}");
			elseif (!$_GET['search']): header("Location: show.php?kategorie={$_GET['kategorie']}&main_kat={$_GET['main_kat']}&start={$_GET['start']}&action=erfolg&nr={$_GET['nr']}");
			else: header("Location: suche_details.php?search={$_GET['search']}&start={$_GET['start']}&action=erfolg&nr={$_GET['nr']}");
			endif;

		}
		endif;
	}
	
else header("Location: index.php?nr=");
?>
