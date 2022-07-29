
<?php
session_start();
$db = mysqli_connect('localhost', 'root', 'root', 'crud');

// initialize variables
$name = "";
$width = "";
$length = "";
$height = "";
$id = 0;
$update = false;

if (isset($_POST['save'])) {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = $_POST['name'];
    }

    $name = $_POST['name'];
    $width = $_POST['width'];
    $length = $_POST['length'];
    $height = $_POST['height'];

    mysqli_query($db, "INSERT INTO boxes (name, width,length,height)
     VALUES ('$name', '$width','$length','$height')");
    $_SESSION['message'] = "Box saved successfully";
    header('location: index.php');
}
if (isset($_POST['update'])) {
	$id = $_POST['id'];
    $name = $_POST['name'];
    $width = $_POST['width'];
    $length = $_POST['length'];
    $height = $_POST['height'];

	mysqli_query($db, "UPDATE boxes SET name='$name', width='$width' 
    , length='$length' , height='$height' WHERE id=$id");
	$_SESSION['message'] = "Box updated successfully!"; 
	header('location: index.php');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM boxes WHERE id=$id");
	$_SESSION['message'] = "Box deleted successfully!"; 
	header('location: index.php');
}