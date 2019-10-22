<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  <LINK REL=STYLESHEET TYPE="text/css"  HREF="styl1.css" >
  </head>
  <body>
<table border="0" cellspacing="0"  bordercolor="#FFFFFF" width="900" height="221" >
  <tr>
    <td width="200" height="27" align="center" bgcolor="#000080" >
    	<font color="#FFFF00">logo</font>
    </td>
    <td width="700" height="27" bgcolor="#000080" >
    	<h1 ><font color="#FFFF00">Záhlavie </font></h1>
    </td>
  </tr>
  <tr>
 <td width="200" height="27" align="center" valign="top" bgcolor="#FFFF00" >  
   <?php 
    include ("menu.php");
    ?>
     </td>
    <td width="700" height="510" valign="center" bgcolor="#FFFFCC" >
    	&nbsp;</p>
<DIV CLASS =dolezite>
    <?php
   $config = include("config.php");
$m=  @($_GET["menu"]);
if (($m!=1) and ($m!=2) and ($m!=3) and ($m!=4) and ($m!=5) and ($m!=6) and ($m!=7) and ($m!=8) and ($m!=9) and ($m!=10)) $m=1;
if (! isset($m)) $m=1;
switch ($m){
	        case 1:
	          include ("prihlasenie.php");
	        	break;
	        case 2:
	        	include ("registracia.php");
	        	break;
	        case 3:
	        	include ("vypis-DB.php");
	        	break;
			case 4:
	        	include ("hladaj-podla-mena.php");
            break;
      case 5:
            include ("vypis-podla-mena.php");
            break;
      case 6:
            include ("zmaz-osobu.php");
            break;
      case 7:
            include ("edit.php");
            break;
      case 8:
            include ("save.php");
            break;
      case 9:
            include ("search.php");
            break;   
      case 10:
            include ("print-search.php");
            break;                             
      default:
		        include ("prihlasenie.php");
	        	break;
	                    }

?>
</DIV>
    </td>
  </tr>
</table>

  </body>
</html>
