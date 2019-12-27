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
?>

<table cellpadding="0" cellspacing="0" border="0">
    <tbody>
        <?php

//        $sql = "SELECT * FROM employee_details ORDER  BY id";
        
        $sql = "SELECT * FROM employee_details WHERE status='".$_GET['status']."' AND ".$_GET['searchby']." LIKE '%".$_GET['search']."%' ORDER BY  ".$_GET['sortby'].";";
        
//        echo $sql;
        
        $result = ($conn->query($sql)) ;

        if($result-> num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {  

        ?>

        <tr>
            <td><?php echo $row["id"]?><input type="button" class="delete" data-toggle="modal" value="Delete" data-target="#delete_confirm"></td>
            <td><?php echo $row["fname"]. " " . $row["mname"] . " " . $row["lname"] . "<br>"; ?></td>
            <td>View Address</td>
            <td>View contact details</td>
            <td>View job information</td>
            <td>View emergency contact details</td>
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