<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'mall');
if(mysqli_connect_errno())
    echo "Failed to connect: ".mysqli_connect_error();

$sql=$conn->prepare('CALL get_manager("'.$_GET['str'].'",@name)') or die ('Unable to prepare'. $conn->error);
$sql->execute();

$sql = $conn->prepare("SELECT @name");
$sql->execute();

$sql->bind_result($name);
$sql->fetch();

echo $name;

?>