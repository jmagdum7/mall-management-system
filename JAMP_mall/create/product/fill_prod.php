<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'mall');

//$phone = $_GET['hphone'];

$cat = ($conn->query("SELECT id,name FROM categories where id = (select category_id from products where name ='".$_GET['pr_name']."')"))->fetch_assoc();
//echo $cat;
//$result = ($conn->query($sql));
//$cat = $result->fetch_assoc();
$a_pr = ($conn->query('SELECT price,stock FROM all_products where product_id = (select id from products where name = "'.$_GET['pr_name'].'") and store_id = (select id from stores where name = "'.$_GET['st2_name'].'")'))->fetch_assoc();

$arr = array('category' => $cat['id'].".".$cat['name'], 'price' => $a_pr['price'], 'stock' => $a_pr['stock']);

echo json_encode($arr);

?>