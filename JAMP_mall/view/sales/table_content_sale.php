<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mall";

$conn = new mysqli($servername, $username, $password, $dbname); 

if(! $conn ) {
    die("Connection failed: " . $conn->connect_error);
    echo "Connection denied" ;
}
?>
<table cellpadding="0" cellspacing="0" border="0">
    <tbody>
        <?php


        $sql = "SELECT title,store_id FROM employee_details WHERE id='".$_SESSION['eid']."';";
        //            echo $sql;
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        $title=$row['title'];
        $store=$row['store_id'];

        if($title=='Store Manager')
        {
            $sql_store_name = "SELECT s.name FROM stores as s,orders as o WHERE o.store_id=".$store." AND s.id=o.store_id ORDER by o.id ;" ;
            $result_store_name = ($conn->query($sql_store_name)) ;

            $sql_customer_name = "SELECT c.fname,c.mname,c.lname FROM customers as c,orders as o WHERE o.store_id=".$store." AND c.id=o.customer_id ORDER by o.id ;";
            $result_customer_name = ($conn->query($sql_customer_name))  ;

            $sql_employee_name = "SELECT e.fname,e.mname,e.lname FROM employee_details as e,orders as o WHERE o.store_id=".$store." AND e.id=o.employee_id ORDER by o.id ;" ;
            $result_employee_name = ($conn->query($sql_employee_name));
            
            $sql = "SELECT * FROM orders WHERE store_id=".$store." AND ".$_GET['searchby']." LIKE '".$_GET['search']."%'"." ORDER BY ".$_GET['sortby']." ".$_GET['ad'];
        }
        else
        {
            $sql_store_name = "SELECT s.name FROM stores as s,orders as o WHERE s.id=o.store_id ORDER by o.id ;" ;
            $result_store_name = ($conn->query($sql_store_name)) ;

            $sql_customer_name = "SELECT c.fname,c.mname,c.lname FROM customers as c,orders as o WHERE c.id=o.customer_id ORDER by o.id ;" ;
            $result_customer_name = ($conn->query($sql_customer_name)) ;

            $sql_employee_name = "SELECT e.fname,e.mname,e.lname FROM employee_details as e,orders as o WHERE e.id=o.employee_id ORDER by o.id ;" ;
            $result_employee_name = ($conn->query($sql_employee_name)) ;
            
            $sql = "SELECT * FROM orders WHERE ".$_GET['searchby']." LIKE '".$_GET['search']."%'"." ORDER BY ".$_GET['sortby']." ".$_GET['ad'];
        }
        $result = ($conn->query($sql)) ;

        if($result-> num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {  
                $store=$result_store_name->fetch_assoc();

                $customer=$result_customer_name->fetch_assoc();

                $employee=$result_employee_name->fetch_assoc();

        ?>

        <tr>
            <td><?php echo $row["id"]?></td>
            <td><?php echo $store["name"]?></td>
            <td><?php echo $customer["fname"]." ".$customer["lname"]?></td>
            <td><?php echo $employee["fname"]." ".$employee["lname"]?></td>
            <td><?php echo $row["date"]?></td>
            <td><?php echo $row["items_quantity"]?></td>
            <td><?php echo $row["total_amount"]?></td>
            <td><b style="cursor:pointer">View order details</b></td>
        </tr>

        <?php

            }

        }

        else
        {
            echo "0 results" ;
        }
        ?>
        <div id="content"></div>
    </tbody>
</table>
<?php
?>