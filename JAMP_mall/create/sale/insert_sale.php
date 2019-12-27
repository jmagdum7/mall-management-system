<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'mall');

$cnt=$_POST['cnt'];
//echo $cnt;
$i=1;
$acnt=$cnt;
$quant=$cnt;
while($i<=$cnt)
{
    if(!isset($_POST["prod".$i]) || $_POST["prod".$i]=='--')
        $acnt--;   
    if(!isset($_POST["qty".$i]) || $_POST["qty".$i]=='' || $_POST["qty".$i]==0)
        $quant--;
    $i++;
}

//echo $acnt;

if($acnt==0)
{
    echo "Add product";
    die;
}

if($quant<$acnt)
{
    echo "Quantity cannot be 0";
    die;
}



$sql="SELECT count(*) AS count FROM customers where phone='".$_POST['phone']."';";

//echo $sql;

$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($result);

//echo $row['count'];

if($row['count']==0)
{
    $sql="INSERT INTO customers (fname, mname, lname, phone, address, city, state, pincode, country, email, DOB) VALUES ('".$_POST['firstname']."', '".$_POST['middlename']."', '".$_POST['lastname']."', '".$_POST['phone']."', '".$_POST['address']."', '".$_POST['city']."', '".$_POST['state']."', '".$_POST['pincode']."', '".$_POST['country']."', '".$_POST['email']."', '".$_POST['DOB']."');";

//    echo $sql;

    if(!mysqli_query($conn,$sql))
    {
        echo("Error description: " . mysqli_error($conn));
//        echo "<br>";
        die;
    }
}

$sql="SELECT id FROM customers where phone='".$_POST['phone']."';";

$result=mysqli_query($conn,$sql);

if(!$result)
{
    echo("Error description: " . mysqli_error($conn));
//    echo "<br>";
    die;
}
else
{
    $row=mysqli_fetch_array($result);

    $id=$row['id'];
    //echo $id;
}

$sql="SELECT store_id FROM employee_details where id='".$_SESSION['eid']."';";

$result=mysqli_query($conn,$sql);

if(!$result)
{
    echo("Error description: " . mysqli_error($conn));
//    echo "<br>";
    die;
}
else
{
    $row=mysqli_fetch_array($result);

    $sid=$row['store_id'];
    //echo $sid;
}

$sql="INSERT INTO orders (store_id, customer_id, employee_id, date) VALUES ('".$sid."', '".$id."', '".$_SESSION['eid']."', CURDATE());";
//echo "<br>";
//echo $sql;
if(!mysqli_query($conn,$sql))
{
    echo("Error description: " . mysqli_error($conn));
//    echo "<br>";
    die;
}

$sql="SELECT id FROM orders ORDER BY id desc LIMIT 1;";

$result=mysqli_query($conn,$sql);

if(!$result)
{
    echo("Error description: " . mysqli_error($conn));
//    echo "<br>";
    die;
}
else
{
    $row=mysqli_fetch_array($result);

    $oid=$row['id'];
}

$i=1;
$st=0;
while($i<=$cnt)
{

    if(isset($_POST["prod".$i]) && $_POST["prod".$i]!='--')
    {
        $sql=$sql="SELECT id FROM products WHERE name='".$_POST["prod".$i]."';";

        $result=mysqli_query($conn,$sql);
        if(!$result)
        {
            echo("Error description: " . mysqli_error($conn));
//            echo "<br>";
            die;
        }
        else
        {
            $row=mysqli_fetch_array($result);
            //        echo $row['id'];
        }

        $sql="INSERT INTO order_details (order_id, product_id, quantity,discount) VALUES ('".$oid."', '".$row['id']."', '".$_POST["qty".$i]."', '".$_POST["disc".$i]."');";

//                echo $sql."<br>";

        if(!mysqli_query($conn,$sql))
        {
            echo("Error description: " . mysqli_error($conn));
//            echo "<br>";
            die;
        }
        else
        {
//            echo "Transaction Successful<br>";
            $st++;
        }
    }

    $i++;
}

if($st==$acnt)
    echo "Transaction Successful";

//header("refresh: 2; URL=sales_form_trial3.php");
?>