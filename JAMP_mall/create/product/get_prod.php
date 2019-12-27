<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'mall');

$sql = 'SELECT name FROM products WHERE id = any(select product_id from all_products where store_id = any(select id from stores where department = (SELECT department from stores where name = "'.$_GET["st_name"].'")))';
//echo $sql;

$result = ($conn->query($sql));

if($result-> num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        echo "<option value='".$row['name']."'>".$row['name']."<a></option>";
    }
}
?>