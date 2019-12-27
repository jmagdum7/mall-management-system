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
//        echo $store;
        if($title=='Store Manager')
        {
            $sql = "SELECT * FROM employee_details WHERE status='".$_GET['status']."' AND store_id='".$store."' AND ".$_GET['searchby']." LIKE '%".$_GET['search']."%' ORDER BY  ".$_GET['sortby'].";";
        }
        else
        {
            $sql = "SELECT * FROM employee_details WHERE status='".$_GET['status']."' AND ".$_GET['searchby']." LIKE '%".$_GET['search']."%' ORDER BY  ".$_GET['sortby'].";";
        }
//                            echo $sql;
        $result = ($conn->query($sql));

        if($result-> num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {  

        ?>

        <tr>
            <td><?php echo $row["id"]?></td>
            <td><?php echo $row["fname"]. " " . $row["mname"] . " " . $row["lname"] . "<br>"; ?></td>
            <td><b style="cursor:pointer">View Address</b></td>
            <td><b style="cursor:pointer">View contact details</b></td>
            <td><b style="cursor:pointer">View job information</b></td>
            <td><b style="cursor:pointer">View emergency contact details</b></td>
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

$conn->close();
?>