<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>JAMP | Home</title>
        <link rel="stylesheet" type="text/css" href="include/style_login.css"/></head>
    <body>
        <table>
            <tr>
                <th><h3>ADD</h3></th>
                <th><h3>
                    <?php
                    if(preg_match('/^A.*/',$_SESSION['eid'])||$_SESSION['eid']=='C000'||$_SESSION['eid']=='F000')
                        echo "<a href='create/product/add_prod.php'>PRODUCT</a></h3><hr width=30%><h3>";
                    else 
                        echo "<a href='create/sale/create_sale.php'>SALE</a></h3><hr width=30%><h3>";
                    ?>
                    <a href="create/employee/employee_details_form.php">EMPLOYEE</a></h3></th>
            </tr>
            <tr>
                <th><h3>VIEW</h3></th>
                <th><h3><a href="view/sales/view_sales_details_final.php">SALE</a></h3><hr width=30%><h3><a href="view/employee/view_employees.php">EMPLOYEE</a></h3></th>
            </tr>
            <tr>
                <th><h3>UPDATE</h3></th>
                <th><h3><a href="update/employee/view_for_update.php">EMPLOYEE</a></h3></th>
            </tr>
            <tr>
                <th><h3>FIRE</h3></th>
                <th><h3><a href="delete/view_for_delete.php">EMPLOYEE</a></h3></th>
            </tr>
        </table>

    </body>
</html>
