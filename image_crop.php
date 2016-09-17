
<?php
echo $filename = $_POST['fn'];

//header('Content-Type: image/jpeg');
$explode=explode('/',$filename);
echo $newwidth = $_POST['width'];
$newheight= $_POST['height'];
$x=$_POST['x1'];
$y= $_POST['y1'];

list($width, $height) = getimagesize($filename);
$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = imagecreatefromjpeg($filename);


$to_crop_array = array('x' =>$x, 'y' =>$y, 'width' => $newwidth, 'height'=> $newheight);
$thumb_im = imagecrop($source, $to_crop_array);

imagejpeg($thumb_im,'Crop/'.$explode[1]);


?>
<img src="Crop/<?php echo $explode[1];?>">&&<?php echo $filename;?>


