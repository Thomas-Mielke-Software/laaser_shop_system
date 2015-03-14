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

error_reporting(E_ALL);
ini_set("display_errors", 1); 

require_once "../../maincore.php";
require_once THEMES."templates/header.php";

include ("xxxxconfig.php");
include ("templates.php");

$conn_id = mysqli_connect($HOST,$ID,$PW,$DB);
//mysql_select_db($DB,$conn_id);

if(!isset($bestellpreis)) $bestellpreis = "";

opentable("Warenkorb");

if ($shop == "enable") {
if ($header == "ok") { 
}

?>
<table width="100%" border="0" cellpadding="0" cellspacing="0"">
  <tr> 
    <td height="40" colspan="2"> <b><font size="<? echo $FONTSIZE_TITLE2 ?>" color="#000000"> 
      <? echo $TITLE2 ?>
      </font></b></td>
  </tr>
  <tr> 
    <td height="50" colspan="0"><a href="index.php?nr=<? echo $_GET['nr'] ?>"><img src="images/uebersicht.gif" alt="&Uuml;bersicht" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="suche.php?nr=<? echo $_GET['nr'] ?>"><img src="images/suchen.gif" border="0" alt="Suchen"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="agbs.php?nr=<? echo $_GET['nr'] ?>"><img src="images/agbs.gif" alt="Allgemeine Gesch&auml;ftsbedingungen" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="warenkorb.php?nr=<? echo $_GET['nr'] ?>"><img src="images/warenkorb.gif" alt="Warenkorb" border="0"></a> 
    </td>
  </tr>
  <tr> 
    <td height="25" bgcolor="#CCCCCC" colspan="2">&nbsp;<b><font size="<? echo $FONTSIZE_TITLE3 ?>" color="#000000">Warenkorb</font></b></td>
  </tr>
  <? if ($_GET['nr'] == "") {?>
  <tr> 
    <td bgcolor="<? echo $TABLE_COLOR2 ?>" height="50" colspan="2">&nbsp;&nbsp;<font size="<? echo $FONTSIZE_NORMAL ?>">Der 
      Warenkorb ist leer</font></td>
  </tr>
  <? } else { ?>
  <tr> 
     <td bgcolor="<? echo $TABLE_COLOR2 ?>" height="20" colspan="2"> 
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
         <tr> 
          <td height="25"><b><font size="<? echo $FONTSIZE_NORMAL ?>">Name</font></b></td>
          <td colspan="2" height="25"> 
            <div align="center"><b><font size="<? echo $FONTSIZE_NORMAL ?>">Menge</font></b></div>
          </td>
          <td width="100" height="25"> 
            <div align="right"><b><font size="<? echo $FONTSIZE_NORMAL ?>">Einzelpreis</font></b>&nbsp;&nbsp;</div>
          </td>
          <td width="130" height="25"> 
            <div align="right"><b><font size="<? echo $FONTSIZE_NORMAL ?>">Gesamtpreis&nbsp;&nbsp;</font></b>&nbsp;&nbsp;</div>
          </td>
        </tr>
        <?
		$result = mysqli_query($conn_id, "select * from ".$PREFIX."_Warenkorb where nr = '".mysqli_real_escape_string($conn_id, $_GET['nr'])."' order by name");
		
		while ($row = mysqli_fetch_object($result))
			{
				
				$id			    = $row->id;
				$artikelnummer  = $row->artikelnummer;
				$name           = $row->name;
				$menge          = $row->menge;
				$preis		    = $row->preis;
				$variante1	    = $row->variante1;
				$variante2	    = $row->variante2;
				
				$gesamtpreis    = $menge * $preis;
				$bestellpreis   = $bestellpreis + $gesamtpreis;
				
				if ($variante1 OR $variante2)
					{
			
						$name .= "\r\n";
						$name .= "(Typ: $variante1 $variante2) ";
						$name .= " Art.Nr.: $artikelnummer";
					
					}
				else 
					{
					
					$name .= "\r\n";
					$name .= "Art.Nr.: $artikelnummer";
					
					}
		?>
        <tr> 
          <form name="form1" method="post" action="warenkorb_edit.php?id=<? echo $id ?>&nr=<? echo $_GET['nr'] ?>">
            <td height="35"> <font size="<? echo $FONTSIZE_NORMAL ?>"> 
              <? echo nl2br($name)?>
              </font> </td>
            <td width="50" height="35"> 
              <div align="center"> 
                <input type="text" class="textbox" name="menge" maxlength="3" size="3" value="<? echo $menge ?>">
              </div>
            </td>
            <td width="30" height="35"> 
              <div align="center"> 
                <input type=image src="images/ok.gif" border ="0" alt="&Auml;nderung &uuml;bernehmen" name="image">
              </div>
            </td>
            <td width="100" height="35"> 
              <div align="right"><font size="<? echo $FONTSIZE_NORMAL ?>"> 
                <? echo number_format($preis,2,",",".") ?>
                <? echo $waehrung ?>
                &nbsp;</font></div>
            </td>
            <td width="130" height="35"> 
              <div align="right"> <font size="<? echo $FONTSIZE_NORMAL ?>"> 
                <? echo number_format($gesamtpreis,2,",",".") ?>
                <? echo $waehrung ?>
                &nbsp;</font>&nbsp;&nbsp;</div>
            </td>
          </form>
        </tr>
        <? } ?>
        <tr> 
          <td height="22" colspan="5"> 
            <div align="right"><b><font size="<? echo $FONTSIZE_NORMAL ?>">Gesamtpreis:&nbsp;</font></b><b><font size="<? echo $FONTSIZE_NORMAL ?>"> 
              <? echo number_format($bestellpreis,2,",",".") ?>
              <? echo $waehrung ?>
              &nbsp;</font></b>&nbsp;&nbsp;</div>
          </td>
        </tr>
        <tr> 
          <td height="22" colspan="5">&nbsp;</td>
        </tr>
        <tr> 
          <td height="22" colspan="5"> 
            <div align="right"><a href="warenkorb_delete.php?nr=<? echo $_GET['nr'] ?>"><img src="images/loeschen.gif" border="0" alt="Warenkorb l&ouml;schen"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="warenkorb_senden_1.php?nr=<? echo $_GET['nr'] ?>"><img src="images/bestellen.gif" alt="Warenkorb bestellen" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          </td>
        </tr>
        <tr> 
          <td height="10" colspan="5">&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
  <? } ?>
  <tr> 
    <td height="20" bgcolor="#CCCCCC" width="100">&nbsp;<b><font size="<? echo $FONTSIZE_NORMAL ?>"><a class="zurueck" href="javascript:history.back();">zur&uuml;ck</a></font></b> 
    </td>
    <td height="20" bgcolor="#CCCCCC"></td>
  </tr>
  <tr> 
    <td height="20" colspan="2"> 
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
    <td width="20">&nbsp;</td>
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
