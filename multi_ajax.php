<?php
$name = $_FILES["image"]["name"];
echo '<pre>';print_r($_FILES['image']);
$count=count($_FILES['image']['name']);
for($i=0;$i<$count;$i++){
$ext = explode('.', basename( $_FILES['file']['name'][$i]));
$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext)-1]; 
move_uploaded_file($_FILES['image']['tmp_name'][$i],'Images/'.$_FILES['image']['name'][$i]);
echo "Successfully Uploaded Images";
?>


