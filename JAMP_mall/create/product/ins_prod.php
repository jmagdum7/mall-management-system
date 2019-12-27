<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'mall');

$sql='SELECT count(*) AS count FROM all_products where product_id = (select id from products where name = "'.$_POST['prod'].'") and store_id = (select id from stores where name = "'.$_POST['store'].'");';

$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($result);

//----------------if this count = 0 then the selected product is not available in the selected store.
if($row['count']==0)
{
    $row=mysqli_fetch_array(mysqli_query($conn,'select count(*) as count from products where name = "'.$_POST['prod'].'"'));
    //------------if this count = 0 then product of mentioned name is not present in the mall anywhere hence we have to add it.
    if($row['count']==0)
    {
        if(!mysqli_query($conn,'INSERT INTO products (id, name, category_id, stock) VALUES (NULL, "'.$_POST['prod'].'", '.substr($_POST['category'], 0,1).', "");'))
            echo "<script>alert('Error occured while adding into products: " . $conn->error ."')</script>";
    }
    $pr_id=mysqli_fetch_array(mysqli_query($conn,'select id from products where name = "'.$_POST['prod'].'"'))['id'];
    $st_id=mysqli_fetch_array(mysqli_query($conn,'select id from stores where name = "'.$_POST['store'].'"'))['id'];
    if(!mysqli_query($conn,'INSERT INTO all_products (product_id, store_id, price, stock) VALUES ('.$pr_id.', '.$st_id.', '.$_POST['price'].', '.$_POST['stock'].')'))
        echo "<script>alert('Error occured while adding into all_products: " . $conn->error ."')</script>";
    else
        echo "<script>alert('Product Added Successfully')</script>";
}
//----------------else we have to update the stock and price as the values from the form.
else
{
    $pr_id=mysqli_fetch_array(mysqli_query($conn,'select id from products where name = "'.$_POST['prod'].'"'))['id'];
    $st_id=mysqli_fetch_array(mysqli_query($conn,'select id from stores where name = "'.$_POST['store'].'"'))['id'];

    if(!mysqli_query($conn,'UPDATE all_products SET price = '.$_POST['price'].', stock = '.$_POST['stock'].' WHERE product_id = '.$pr_id.' AND store_id = '.$st_id.';'))
        echo "<script>alert('Error occured while updating:" . $conn->error ."')</script>";
    else
        echo "<script>alert('Product Added Successfully')</script>";
}
header("refresh: 0; URL=../../Home.php");
?>