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
include ("templates.php");


$conn_id = mysql_connect($HOST,$ID,$PW);
mysql_select_db($DB,$conn_id);

opentable("Bestellvorgang beendet");

if ($shop == "enable") {
if ($header == "ok") { 

} 

?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="40"> <b><font size="<? echo $FONTSIZE_TITLE2 ?>" color="#000000"> 
      <? echo $TITLE2 ?>
      </font></b></td>
  </tr>
  <tr> 
    <td height="50" colspan="0"><a href="index.php?nr=<? echo $_GET['nr'] ?>"><img src="images/uebersicht.gif" alt="&Uuml;bersicht" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="suche.php?nr=<? echo $_GET['nr'] ?>"><img src="images/suchen.gif" border="0" alt="Suchen"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="agbs.php?nr=<? echo $_GET['nr'] ?>"><img src="images/agbs.gif" alt="Allgemeine Gesch&auml;ftsbedingungen" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="warenkorb.php?nr=<? echo $_GET['nr'] ?>"><img src="images/warenkorb.gif" alt="Warenkorb" border="0"></a> 
    </td>
  </tr>
  <tr> 
    <td height="25" bgcolor="#CCCCCC"><b><font size="<? echo $FONTSIZE_TITLE3 ?>" color="#000000">&nbsp;Vielen 
      Dank f&uuml;r Ihre Bestellung</font></b></td>
  </tr>
  <tr> 
    <td bgcolor="<? echo $TABLE_COLOR2 ?>" height="20"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr> 
          <td height="50"><font size="<? echo $FONTSIZE_NORMAL ?>"> Die Auftragsbest&auml;tigung 
            wird Ihnen per E-Mail geschickt.</font> </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td height="20" bgcolor="#CCCCCC"></td>
  </tr>
  <tr> 
    <td height="20"> 
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
    <td><b> 
      <? echo $shopmeldung ?>
      </b> </td>
  </tr>
</table>

<? 
} 

closetable();
echo "<br><span class='small'>PHP-Fusion Shop system, based on the web shop by <a href='http://www.laaser.net/shop_index.php' target='blank'>J&uuml;rgen Laaser</a></span>\n";


require_once THEMES."templates/footer.php";
?>
