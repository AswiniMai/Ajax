
<?php
	echo $filename=$_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$_FILES['image']['name']);
$filename = 'images/'.$filename;
header('Content-Type: image/jpeg');

$newwidth = '180px ';
$newheight= '180px' ;

list($width, $height) = getimagesize($filename);
$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = imagecreatefromjpeg($filename);


$to_crop_array = array('x' =>0 , 'y' => 0, 'width' => $newwidth, 'height'=> $newheight);
$thumb_im = imagecrop($source, $to_crop_array);

imagejpeg($thumb_im,'Crop/$_FILES['image']['name']');

?>
