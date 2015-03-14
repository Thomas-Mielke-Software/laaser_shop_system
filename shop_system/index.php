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

require_once "../../maincore.php";
require_once THEMES."templates/header.php";


include ("xxxxconfig.php");
require_once ("templates.php");

$conn_id = mysql_connect($HOST,$ID,$PW);
mysql_select_db($DB,$conn_id);

if ($_GET['main_kat'] != '' && !IsNum($_GET['main_kat'])) die ("ung&uuml;ltiger URL-Parameter");

opentable("Shop System");

if ($shop == "enable") {
if ($header == "ok") { 

} 
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="40" colspan="0"> <b><font size="<? echo $FONTSIZE_TITLE2 ?>" color="#000000"> 
      <? echo $TITLE2 ?>
      </font></b></td>
  </tr>
  <tr> 
    <td height="50" colspan="0"><a href="index.php?nr=<? echo $_GET['nr'] ?>"><img src="images/uebersicht.gif" alt="&Uuml;bersicht" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="suche.php?nr=<? echo $_GET['nr'] ?>"><img src="images/suchen.gif" border="0" alt="Suchen"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="agbs.php?nr=<? echo $_GET['nr'] ?>"><img src="images/agbs.gif" alt="Allgemeine Gesch&auml;ftsbedingungen" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="warenkorb.php?nr=<? echo $_GET['nr'] ?>"><img src="images/warenkorb.gif" alt="Warenkorb" border="0"></a> 
    </td>
  </tr>
  <tr> 
    <td height="25" bgcolor="#CCCCCC" colspan="0"><b><font size="<? echo $FONTSIZE_TITLE3 ?>" color="#000000">&nbsp;&Uuml;bersicht</font></b></td>
  </tr>
  <tr> 
    <td height="50" bgcolor="<? echo $TABLE_COLOR2 ?>" colspan="0"> 
      <?
    $result = mysql_query("select id from ".$PREFIX."_Hauptgruppen order by anzeige");
    $num    = mysql_numrows($result);
    if ($num) 
		{
    ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="10"> <font size="<? echo $FONTSIZE_NORMAL ?>">Bitte w&auml;hlen 
            Sie eine Kategorie :</font><br><br></td>
        </tr>
        <tr> 
          <td> 
            <?
			$result = mysql_query("select id , name from ".$PREFIX."_Hauptgruppen order by anzeige");
			
			while ($row = mysql_fetch_object($result))
				{
				
					$id        = $row->id;
					$main_name = $row->name;
									
					echo "&nbsp;&nbsp;&nbsp;<img src='images/group.png' alt='Kategorie'>&nbsp;<font size='$FONTSIZE_NORMAL'><a href='index.php?main_kat=$id&nr={$_GET['nr']}'>$main_name</a></font><br>";
				
					if ($_GET['main_kat']) 
					
						{
					
							$result1 = mysql_query("select id , main_kat , name from ".$PREFIX."_Untergruppen where main_kat = ".mysql_real_escape_string($_GET['main_kat'])." order by anzeige");
							while ($row1 = mysql_fetch_object($result1))
								{
				
									 $id1       = $row1->id;
									 $main_kat1 = $row1->main_kat;
									 $name1     = $row1->name;
									
									 if ($main_kat1 == $id)	echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size='$FONTSIZE_NORMAL'><a href='show.php?main_kat=$id&kategorie=$id1&nr={$_GET['nr']}'>$name1</a></font><br>";	

								}
					
					
						}
				}
			?>
          </td>
        </tr>
        <tr> 
          <td height="10">&nbsp;</td>
        </tr>
      </table>
      <?
	  }
	  if (!$num AND !$main_kat) 
	  {
	  ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="10"><font size="<? echo $FONTSIZE_NORMAL ?>">Bitte w&auml;hlen 
            Sie eine Kategorie :</font><br><br></td>
        </tr>
        <tr> 
          <td> 
            <?
			$result = mysql_query("select id , name from ".$PREFIX."_Untergruppen order by anzeige");
			
			while ($row = mysql_fetch_object($result))
				{	
				
					$id   = $row->id;
					$name = $row->name;
					
					echo "&nbsp;&nbsp;&nbsp;<img src='images/group.png' alt='Kategorie'>&nbsp;<font size='$FONTSIZE_NORMAL'><a href='show.php?kategorie=$id&nr={$_GET['nr']}'>$name</a> </font><br>";
					
				}
			?>
          </td>
        </tr>
        <tr> 
          <td height="10">&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
  <? } ?>
  <tr> 
    <td height="20" bgcolor="#CCCCCC" width="100"></td>
    <td height="20" bgcolor="#CCCCCC"></td>
  </tr>
  <tr> 
    <td height="20" colspan="0"> 
      <div align="center"><font size="<? echo $FOOTER_SIZE ?>" color="<? echo $FOOTER_COLOR ?>"><br>
        <? echo "$FOOTER <br> <a href='$HOMEPAGE' target='_blank'>$HOMEPAGE</a> &nbsp; <a href='mailto:$EMAIL'>$EMAIL</a>"; ?>
        </font></div>
    </td>
  </tr>
</table>

<?
}
else 
{
?>
	      
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><b> 
      <? echo $shopmeldung ?>
      </b></td>
  </tr>
</table>
<? 
}

closetable();
echo "<br><span class='small'>PHP-Fusion Shop system, based on the web shop by <a href='http://www.laaser.net/shop_index.php' target='blank'>J&uuml;rgen Laaser</a></span>\n";

//require_once ADMIN."navigation.php";
require_once THEMES."templates/footer.php";

?>
