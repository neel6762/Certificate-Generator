<?php

session_start();
if(!$_SESSION['user']){
        // send the user back to the login page
    header("Location:index.php");
}
$conn = mysqli_connect("localhost","root","","ct");
$user = $_SESSION['user'];
global $filename;
global $filepath;

if(isset($_POST["submit"])){
    $xEvent = $_POST['xEvent'];
    $yEvent = $_POST['yEvent'];
    $xName = $_POST['xName'];
    $yName = $_POST['yName'];
    $file = $_FILES['file'];
    $sheet = $_FILES['sheet'];

        // Image Details
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

        // Sheet Details
    $sheetName = $_FILES['sheet']['name'];
    $sheetTmpName = $_FILES['sheet']['tmp_name'];
    $sheetSize = $_FILES['sheet']['size'];
    $sheetError = $_FILES['sheet']['error'];
    $sheetType = $_FILES['sheet']['type'];

        // To seperate name with the dot
    $fileExt = explode('.', $fileName);
    $sheetExt = explode('.', $sheetName);

        // last element of the fileExt
    $fileActualExt = strtolower(end($fileExt));
    $sheetActualExt = strtolower(end($sheetExt));

    $allow = array('jpg');
    $allowsheet = array(
        'csv',
        'text/csv',
        'text/plain',
        'application/csv',
        'text/comma-separated-values',
        'application/excel',
        'application/vnd.ms-excel',
        'application/vnd.msexcel',
        'text/anytext',
        'application/octet-stream',
        'application/txt',
    );

        // $output = passthru("python wordgame2.py ".$start_word." ".$end_word);
        // check for a valid extension type
    if(in_array($fileActualExt, $allow) && in_array($sheetActualExt, $allowsheet)){
        if($fileError === 0 && $sheetError === 0){
            $fileNewName = uniqid('',true) . "." . $fileActualExt;
            $fileDestination = "uploads/" . $fileNewName;

            $sheetNewName = uniqid('',true) . "." . $sheetActualExt;
            $sheetDestination = "uploads/" . $sheetNewName;

            move_uploaded_file($fileTmpName, $fileDestination);
            move_uploaded_file($sheetTmpName, $sheetDestination);

            global $py;
            $py = exec("python certi.py " . $fileNewName . " " . $sheetNewName . " " . $xEvent . " " . $yEvent . " " . $xName . " " . $yName);
            $query = "INSERT INTO record(id,file,sheet,zipfile) VALUES ('$user','$fileNewName','$sheetNewName','$py')";
            $result = mysqli_query($conn, $query);

        }else{
            echo "Error uploading the file";
        }
    }else{
        echo "File not allowed!";
    }

}

$getData = "SELECT * FROM record WHERE id=" . $_SESSION['user'];
$user_result = mysqli_query($conn,$getData);

while($rows = mysqli_fetch_assoc($user_result)){
    $filename = $rows['zipfile'];
}
$filepath = 'uploads/'.$filename;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Download</title>
</head>
<body>
    <!--    <a href="">Download Here!</a>-->
    <a href="<?php echo $filepath ?>" onclick="location.href='destroy.php';" target="_blank">Download File</a>
</body>
</html>

