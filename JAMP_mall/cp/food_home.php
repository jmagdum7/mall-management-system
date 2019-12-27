<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mall";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}   
//echo "Connected successfully<br>";
?>


<!DOCTYPE html>
<html>
    <title>Our Food Joints</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="include/style_clothing.css">
    <link rel="stylesheet" href="include/raleway.css">
    <link rel="stylesheet" href="include/bootstrap.css">
    <script src="include/jquery.js"></script>
    <script src="include/bootstrap.js"></script>

    <style>
        body,h1,h5 {font-family: "Raleway", sans-serif}
        body, html {height: 100%;overflow: hidden;}
        .bgimg {
            background-image: url('Images/food_homepage.jpg');
            min-height: 100%;
            background-position: center;
            background-size: cover;
        }

        b {
            margin-left: 20px;
        }

    </style>

    <body>

        <div class="container">  
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="food_home.php">Food</a></li>
                        <li><a href="clothing_home.php#">Shop</a></li>      
                    </ul>
                </div>
            </nav>    
        </div>    

        <div class="bgimg w3-display-container w3-text-white" style="margin-top: 50px; margin-bottom: 20px;">
            <div class="w3-display-middle w3-jumbo">
                <p>Eat to your Full !</p>
            </div>
            <div class="w3-display-topleft w3-container w3-xlarge" style="margin-top: 100px;">
                <?php
                $mysq="select name from stores where id>=8";
                $resul = ($conn->query($mysq));
                if($resul-> num_rows > 0)
                {
                    while($ro = $resul->fetch_assoc())
                    {
                ?>
                <p><button onclick="document.getElementById('<?php echo str_replace("'", '',str_replace(' ', '_',$ro['name'])) ?>').style.display='block'" class="w3-button w3-black"><?php echo $ro['name']?></button></p>
                <?php
                    }
                }
                ?>
                <!--
<p><button onclick="document.getElementById('dominos').style.display='block'" class="w3-button w3-black" style="margin-top: 100px;">Domino's</button></p>
<p><button onclick="document.getElementById('haldirams').style.display='block'" class="w3-button w3-black">Haldirams</button></p>
<p><button onclick="document.getElementById('starbucks').style.display='block'" class="w3-button w3-black">Starbucks Coffee</button></p>
<p><button onclick="document.getElementById('mcdonalds').style.display='block'" class="w3-button w3-black">McDonald's</button></p>
<p><button onclick="document.getElementById('pizza_hut').style.display='block'" class="w3-button w3-black">Pizza Hut</button></p>
<p><button onclick="document.getElementById('indian_coffee_house').style.display='block'" class="w3-button w3-black">Indian Coffee House</button></p>
<p><button onclick="document.getElementById('subway').style.display='block'" class="w3-button w3-black">Subway</button></p>
-->
            </div>
        </div>
        <?php
        $mysq="select name,id from stores where id>=8";
        $resul = ($conn->query($mysq));
        if($resul-> num_rows > 0)
        {
            while($ro = $resul->fetch_assoc())
            {
                $stname=str_replace("'", '',str_replace(' ', '_',$ro['name']));
        ?>
        <!-- Menu Modal -->
        <div id="<?php echo $stname?>" class='w3-modal'>
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-black w3-display-container">
                    <span onclick="document.getElementById('<?php echo $stname ?>').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
                </div>
                <?php
            $sql = "select DISTINCT categories.name as cname from categories,products,all_products where products.id=all_products.product_id and categories.id = products.category_id and all_products.store_id=".$ro['id'];
                $result = ($conn->query($sql));

                if($result-> num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                        echo "<div class='w3-container w3-black''><h1>".$row['cname']."</h1></div>";
                        $qr="SELECT name,price FROM all_products,products where product_id=id and store_id=".$ro['id']." and category_id = any(SELECT id from categories WHERE name='".$row['cname']."')";
                        //                            echo $qr;
                        $resu = ($conn->query($qr));
                        if($resu-> num_rows > 0)
                        {
                            echo "<div class='w3-container'><pre>";
                            while($raw = $resu->fetch_assoc())
                            {
                                echo"<h5>".$raw['name']."       <b>Rs.".$raw['price']."</b></h5>";
                            }
                            echo "</pre></div>";
                        }
                    }
                }
                ?>

                <!--
<h1>Starters</h1>
</div>
<div class="w3-container">
<h5>Garlic Bread <b>$2.50</b></h5>
<h5>Pasta <b>$3.50</b></h5>
<h5>Bread and Butter <b>$1.00</b></h5>
</div>
<div class="w3-container w3-black">
<h1>Main Courses</h1>
</div>
<div class="w3-container">
<h5>Veg Peppy Paneer Pizza <b>$8.50</b></h5>
<h5>Barbeque Chicken Pizza <b>$5.50</b></h5>
<h5>Country Special Pizza <b>$4.00</b></h5>
<h5>Chicken Fiesta <b>$6.50</b></h5>
<h5>Margherita <b>$5.00</b></h5>
<h5>Chef's Veg Wonder <b>$5.00</b></h5>
<h5>Non-Veg Supreme <b>$5.00</b></h5>
</div>
<div class="w3-container w3-black">
<h1>Beverages and Desserts</h1>
</div>
<div class="w3-container">
<h5>Coke <b>$2.50</b></h5>
<h5>Mountain Dew <b>$2.00</b></h5>
<h5>Choco Lava Cake <b>$4.00</b></h5>
<h5>Cheese <b>$5.50</b></h5>
</div>
-->
            </div>
        </div>
        <?php

            }
        }
        ?>

        <!--

<div id="haldirams" class="w3-modal">
<div class="w3-modal-content w3-animate-zoom">
<div class="w3-container w3-black w3-display-container">
<span onclick="document.getElementById('haldirams').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
<h1>Starters</h1>
</div>
<div class="w3-container">
<h5>Pani Puri <b>$2.50</b></h5>
<h5>Vada Pav <b>$3.50</b></h5>
<h5>Aloo Tikki <b>$3.50</b></h5>
<h5>Papdi Chaat <b>$3.50</b></h5>

</div>
<div class="w3-container w3-black">
<h1>Main Courses</h1>
</div>
<div class="w3-container">
<h5>Paneer Tikka Burger <b>$6.50</b></h5>
<h5>Veg Cheese Sandwhich <b>$5.50</b></h5>
<h5>Veg Cheese Burger <b>$4.00</b></h5>
<h5>Veg Noodles <b>$4.00</b></h5>
<h5>Seekh Kebab <b>$6.00</b></h5>

</div>
<div class="w3-container w3-black">
<h1>Beverages and Desserts</h1>
</div>
<div class="w3-container">
<h5>Coke <b>$2.50</b></h5>
<h5>Rabdi <b>$4.00</b></h5>
<h5>Coffee <b>$2.00</b></h5>
<h5>Jalebi <b>$4.00</b></h5>
<h5>Gulab Jamun <b>$4.00</b></h5>

</div>
</div>
</div>


<div id="starbucks" class="w3-modal">
<div class="w3-modal-content w3-animate-zoom">
<div class="w3-container w3-black w3-display-container">
<span onclick="document.getElementById('starbucks').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
<h1>Espresso and Coffee</h1>
</div>
<div class="w3-container">
<h5>Pumpkin Spice Latte <b>$2.50</b></h5>
<h5>Salted Caramel Mocha <b>$3.50</b></h5>
<h5>Caffe Mocha <b>$1.00</b></h5>
<h5>Espresso Shot  <b>$1.00</b></h5>
</div>
<div class="w3-container w3-black">
<h1>Shakes and Frappes</h1>
</div>
<div class="w3-container">
<h5>Caramel Cream <b>$8.50</b></h5>
<h5>Double Chocolate Chip <b>$5.50</b></h5>
<h5>Green Tea Cream <b>$4.00</b></h5>
<h5>Strawberries and Creme <b>$6.50</b></h5>
<h5>Signature Hot Chocolate <b>$5.00</b></h5>
</div>
<div class="w3-container w3-black">
<h1>Desserts and Cakes</h1>
</div>
<div class="w3-container">
<h5>Red Velvet Muffin <b>$2.50</b></h5>
<h5>Blueberry Cheese Cake <b>$2.00</b></h5>
<h5>Dark Chocolate Pastry <b>$4.00</b></h5>

</div>
</div>
</div>


<div id="mcdonalds" class="w3-modal">
<div class="w3-modal-content w3-animate-zoom">
<div class="w3-container w3-black w3-display-container">
<span onclick="document.getElementById('mcdonalds').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
<h1>Mini Treats</h1>
</div>
<div class="w3-container">
<h5>Chicken Nuggets <b>$2.50</b></h5>
<h5>Fries with Piri Piri <b>$3.50</b></h5>
<h5>Paneer Tikka Wrap <b>$1.00</b></h5>
<h5>Egg Wrap <b>$1.00</b></h5>
</div>
<div class="w3-container w3-black">
<h1>Burgers</h1>
</div>
<div class="w3-container">
<h5>McSpicy Chicken/Paneer <b>$8.50</b></h5>
<h5>Maharaja Mac Chicken/Veg <b>$5.50</b></h5>
<h5>Filet-O' Fish <b>$4.00</b></h5>
<h5>McAaloo Tikki <b>$6.50</b></h5>
<h5>Chicken Kebab Burger <b>$5.00</b></h5>
</div>
<div class="w3-container w3-black">
<h1>Beverages and Desserts</h1>
</div>
<div class="w3-container">
<h5>Oreo McFlurry <b>$2.50</b></h5>
<h5>Coke Float <b>$2.00</b></h5>
<h5>Hot Fudge with Brownie <b>$4.00</b></h5>

</div>
</div>
</div>


<div id="pizza_hut" class="w3-modal">
<div class="w3-modal-content w3-animate-zoom">
<div class="w3-container w3-black w3-display-container">
<span onclick="document.getElementById('pizza_hut').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
<h1>Starters</h1>
</div>
<div class="w3-container">
<h5>Pasta <b>$2.50</b></h5>
<h5>Cheesy Jalapeno Poppers <b>$3.50</b></h5>
<h5>Garlic Bread Stix <b>$1.00</b></h5>

</div>
<div class="w3-container w3-black">
<h1>Pizzas</h1>
</div>
<div class="w3-container">
<h5>Italian Classic <b>$8.50</b></h5>
<h5>Chicken Americana <b>$5.50</b></h5>
<h5>Keema Masala <b>$4.00</b></h5>
<h5>Triple Chicken Feast <b>$6.50</b></h5>

</div>
<div class="w3-container w3-black">
<h1>Beverages and Desserts</h1>
</div>
<div class="w3-container">
<h5>Hazelnut Cold Coffee <b>$2.50</b></h5>
<h5>Fresh Lime <b>$2.00</b></h5>
<h5>Dark Chocolate Pastry <b>$4.00</b></h5>

</div>
</div>
</div>



<div id="indian_coffee_house" class="w3-modal">
<div class="w3-modal-content w3-animate-zoom">
<div class="w3-container w3-black w3-display-container">
<span onclick="document.getElementById('indian_coffee_house').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
<h1>Drinks</h1>
</div>
<div class="w3-container">
<h5>Hot Coffee <b>$2.50</b></h5>
<h5>Caramel Latte <b>$3.50</b></h5>
<h5>Hot Cream <b>$1.00</b></h5>
<h5>Cappuccino  <b>$1.00</b></h5>
</div>
<div class="w3-container w3-black">
<h1>Snacks</h1>
</div>
<div class="w3-container">
<h5>Masala Dosa <b>$3.50</b></h5>
<h5>Idli Sambar <b>$5.50</b></h5>
<h5>Veg Noodles <b>$4.00</b></h5>
<h5>Masala Maggi <b>$2.50</b></h5>
<h5>Cheese Sandwhiches <b>$5.00</b></h5>
</div>
<div class="w3-container w3-black">
<h1>Desserts and Cakes</h1>
</div>
<div class="w3-container">
<h5>Donut <b>$2.50</b></h5>
<h5>Cream Rolls <b>$2.00</b></h5>
<h5>Black Forest Pastry <b>$4.00</b></h5>

</div>
</div>
</div>



<div id="subway" class="w3-modal">
<div class="w3-modal-content w3-animate-zoom">
<div class="w3-container w3-black w3-display-container">
<span onclick="document.getElementById('subway').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
<h1>Salads and Wraps</h1>
</div>
<div class="w3-container">
<h5>Roasted Chicken Salad <b>$2.50</b></h5>
<h5>Turkey Salad <b>$3.50</b></h5>
<h5>Hara Bhara Kebab <b>$1.00</b></h5>
<h5>Veg Shammi Wrap <b>$3.00</b></h5>
</div>
<div class="w3-container w3-black">
<h1>Subs</h1>
</div>
<div class="w3-container">
<h5>Veggie Delight <b>$8.50</b></h5>
<h5>Chicken Tikka <b>$5.50</b></h5>
<h5>Chicken Seekh <b>$4.00</b></h5>
<h5>Paneer Tikka <b>$6.50</b></h5>
<h5>Italian B.M.T <b>$5.00</b></h5>
</div>
<div class="w3-container w3-black">
<h1>Beverages and Desserts</h1>
</div>
<div class="w3-container">
<h5>Cookies <b>$2.50</b></h5>
<h5>Mountain Dew <b>$2.00</b></h5>
<h5>Pepsi <b>$4.00</b></h5>

</div>
</div>
</div>
-->



    </body>
</html>

