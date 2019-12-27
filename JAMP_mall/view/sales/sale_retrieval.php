<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mall";

$conn = new mysqli($servername, $username, $password, $dbname); 

if(! $conn ) {
    die("Connection failed: " . $conn->connect_error);
    echo "Connection denied" ;
}

if($_GET['colid']==7)
{
    //    echo "Success is on the way";
?>

<table class="tbl-header" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <!--        <th>Order ID</th>-->
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Discount</th>
        <th>Final Price</th>
    </tr>
</table>

<?php
    $sql="SELECT store_id FROM orders WHERE id='".$_GET["rowid"]."';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $storeid=$row['store_id'];

    $sql1 = "SELECT * FROM order_details WHERE order_id='".$_GET["rowid"]."';";
    $result = ($conn->query($sql1));
    //    echo $sql1;

    if($result->num_rows > 0)
    {
        //        $temp=0;
        while($row = $result->fetch_assoc())
        {
            $sql="SELECT name FROM products WHERE id='".$row['product_id']."';";
            $res=mysqli_query($conn,$sql);
            $r=mysqli_fetch_array($res);
            $product=$r['name'];

            $sql="SELECT price FROM all_products WHERE product_id='".$row['product_id']."' AND store_id='".$storeid."';";
            $res=mysqli_query($conn,$sql);
            $r=mysqli_fetch_array($res);
            $price=$r['price'];
?>

<table cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td><?php echo $product; ?></td>
        <td><?php echo $price; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td><?php echo $row['total_price']; ?></td>
        <td><?php echo $row['discount']; ?></td>
        <td><?php echo $row['final_price']; ?></td>
    </tr>
    <?php
        }
    }

    else
    {
        echo "0 results" ;
    }

    ?>

</table>
<?php
}


else
{
    echo "Sales ka retrieval kyu nahi hora" ;
}
?>