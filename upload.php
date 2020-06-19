<?php
session_start();

if(!$_SESSION['user']){
  header("Location:index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="src/bootstrap_original.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!-- Bootstrap core CSS -->
  <link href="src/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="src/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="src/css/style.css" rel="stylesheet">
  <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  <style>
  body{
    background: #ff0057;
  }
  .heading{
    font-family: times, Times New Roman, times-roman, georgia, serif;
    color: white;
    margin: 0;
    padding: 0px 0px 6px 0px;
    font-size: 51px;
    line-height: 44px;
    letter-spacing: 2px;
    font-weight: bold;
    text-transform: uppercase;
  }
</style>
</head>

<body>

  <div class="container bg-dark text-light z-depth-5 mb-3" style="margin-top:20px;">
    <div class="row">
      <div class="col text-center my-4">
        <hr class="bg-light w-50"><h1 class="heading"> Certificate Generator</h1><hr class="bg-light w-50">
      </div>
    </div>
    <div class="row px-4 py-2">
      <div class="col">
        <?Php
$foo_x=$_POST['foo_x'] * 5;
$foo_y=$_POST['foo_y'] * 5;
echo "X=$foo_x, Y=$foo_y ";

list($width, $height, $type, $attr) = getimagesize("event-certificate.jpg");

echo "Image width: " . $width;
echo "   Image height: " . $height;

?>
<form action='' method=post>
    <input type="image" alt=' Finding coordinates of an image' src="event-certificate.jpg"
    name="foo" style=cursor:crosshair; height="<?php echo $height / 5; ?>" width="<?php echo $width / 5; ?>" />
</form>

        <form action="process.php" method="post" enctype="multipart/form-data">
          <div class=" row my-3">
            <div class="col">
              <input type="submit" value="Generate Certificate" name="submit" class="btn btn-warning">
            </div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col">
              <div class="fa-2x">
                <a href="https://github.com/neel6762" class="text-light mx-2"><i class="fab fa-github"></i></a>
                <a href="https://linkedin.com/in/neel6762" class="text-light mx-2"><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</script>
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="src/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="src/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="src/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="src/js/mdb.min.js"></script>
</body>
</html>
