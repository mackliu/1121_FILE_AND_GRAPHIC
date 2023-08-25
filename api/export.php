<?php  include_once "../DB.php";
$sql="select * from `factory` where id in(".join(",",$_POST['data']).")";
$data=$db->q($sql);
$file=fopen("../export.csv",'w+');
fwrite($file, "\xEF\xBB\xBF");
fwrite($file,"序號,地區別,縣市,觀光工廠名稱,地址,觀光工廠預約電話,網址\n");
foreach($data as $row){
   $str=join(",",$row);
   fwrite($file,$str);
}

fclose($file);
?>

<a href="export.csv" download>請下載</a>