<?php 
echo $_POST['desc'];
echo "<pre>";
print_r($_FILES['img']);
echo "</pre>";
 
if($_FILES['img']['error']==0){

    $name=md5(strtotime('now') . $_FILES['img']['name']);
    $tmp=explode('.',$_FILES['img']['name']);
    $sub="." . array_pop($tmp);
    
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$name.$sub);
}
?>