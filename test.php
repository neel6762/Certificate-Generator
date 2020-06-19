<?Php
$foo_x=$_POST['foo_x'] * 3;
$foo_y=$_POST['foo_y'] * 3;
echo "X=$foo_x, Y=$foo_y ";

list($width, $height, $type, $attr) = getimagesize("event-certificate.jpg");

echo "Image width " . $width;
echo "Image height " . $height;
echo "Image type " . $type;
echo "Attribute " . $attr;

?>
<form action='' method=post>
    <input type="image" alt=' Finding coordinates of an image' src="event-certificate.jpg"
    name="foo" style=cursor:crosshair; height="<?php echo $height / 3; ?>" width="<?php echo $width / 3; ?>" />
</form>
