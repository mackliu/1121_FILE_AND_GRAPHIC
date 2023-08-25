<?php 
require '../vendor/autoload.php';
include_once "../DB.php";
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set("isPhpEnabled", true);
$dompdf = new Dompdf();

//$font=$dompdf->getFontMetrics()->getFont("華康方圓體 Std W7","reqular");
$sql="select * from `factory` where id in(".join(",",$_POST['data']).")";
$data=$db->q($sql);
$file=fopen("../export.csv",'w+');
fwrite($file, "\xEF\xBB\xBF");
$html="";
fwrite($file,$html);
foreach($data as $row){
   $str=join(",",$row);
   $html.=$str."<br>";
   fwrite($file,$str);
}


$dompdf->loadHtml(
   '<style>
      *{
         font-family:"TTC"
      }
    </style>'.$html

);
$dompdf->render();
$output = $dompdf->output();
file_put_contents('../export.pdf', $output);
fclose($file);
?>

<a href="export.csv" download>請下載(.csv)</a>
<a href="export.pdf" download>請下載(.pdf)</a>