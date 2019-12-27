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
    <title>Clothing</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="include/style_clothing.css">
    <link rel="stylesheet" href="include/roboto.css">
    <link rel="stylesheet" href="include/montserrat.css">
    <link rel="stylesheet" href="include/awesome.css">
    <script src="include/jquery.js"></script>
    <script src="include/bootstrap.js"></script>

    <style>
        .w3-sidebar a {font-family: "Roboto", sans-serif}
        body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}

        .w3-container {
            margin-top: 40px;
        }

        .active {
            color: blue;
        }

        .button {
            background-color: #555555;
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
        }
    </style>

    <body class="w3-content" style="max-width:1200px">

        <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-fixed-top" style="z-index:3;width:250px" id="mySidebar">
            <div class="w3-container w3-display-container w3-padding-16">
                <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
                <a href="index.html" style="padding: 15px 32px;" class="button">Home</a>
                <a href="food_home.php" class="button" style="padding: 15px 35px;">Food</a>
            </div>
            <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
                <?php
                $sql = "SELECT name FROM stores where floor=1;";
                $result = ($conn->query($sql));

                if($result-> num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {  

                ?>

                <a href="#<?php echo str_replace(' ', '_', $row['name'])?>_products" class="w3-bar-item w3-button" onclick="<?php echo str_replace(' ', '_',$row['name'])?>_products()"><?php echo $row["name"]?></a>

                <?php

                    }

                }
                ?>

            </div>
            <a href="#contact_us_footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a> 
        </nav>

        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:250px">

            <!-- Push down content on small screens -->
            <div class="w3-hide-large" style="margin-top:83px"></div>

            <!-- Image header -->
            <div class="w3-display-container w3-container" style="margin-top: 20PX;">
                <img src="Images/home2.jpg" alt="Jeans" style="width:100%">
                <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
                    <h1 class="w3-jumbo w3-hide-small">Popular choices</h1>
                    <h1 class="w3-hide-large w3-hide-medium">Our Best Products</h1>
                    <!--      <h1 class="w3-hide-small">COLLECTION 2016</h1>-->
                    <p><a href="#best_products" onclick="best_products()" class="w3-button w3-black w3-padding-large w3-large">SHOP NOW</a></p>
                </div>
            </div>


            <!-- Product grid -->
            <div id="Allen_Solly_products" style="margin-top: 30px; display: none;" class="active w3-row w3-grayscale">
                <h1 style="text-align: center; margin-bottom: 20px;">Allen Solly Products</h1>

                <?php
                $sql = "SELECT name,price FROM all_products,products where all_products.product_id=products.id and store_id=1 limit 8";
                $result = ($conn->query($sql));

                if($result-> num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {  
                ?>

                <div class="w3-col l3 s6">
                    <div class="w3-container">
                        <img src="Images/Allen_Solly_<?php echo str_replace(' ', '_',$row['name'])?>.jpg" style="width:100%">
                        <p><?php echo $row['name']?><br><b>Rs.<?php echo $row['price']?></b></p><br><br>
                    </div>
                    <?php $row = $result->fetch_assoc(); ?>
                    <div class="w3-container" style="margin-top: 30px;">
                        <img src="Images/Allen_Solly_<?php echo str_replace(' ', '_',$row['name'])?>.jpg" style="width:100%">
                        <p><?php echo $row['name']?><br><b>Rs.<?php echo $row['price']?></b></p>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>

                <!--


<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/Allen_Solly_black_jeans.jpg" style="width:100%">
<p>Black Jeans<br><b>$24.99</b></p><br><br>
</div>
<div class="w3-container" style="margin-top: 30px;">
<img src="Images/Allen_Solly_white_shirt.jpg" style="width:100%">
<p>White Shirt<br><b>$19.99</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/Allen_Solly_Blue_Jeans.jpeg" style="width:100%">
<p>Blue Jeans<br><b>$19.99</b></p>
</div>
<div class="w3-container">
<img src="Images/Allen_Solly_Black_Shirt.jpg" style="width:100%">
<p>Black Shirt<br><b>$20.50</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/Allen_Solly_Round_neck_T-Shirt_full_sleeves.jpg" style="width:100%">
<p>Round Neck T-shirt in Full Sleeves<br><b>$20.50</b></p>
</div>
<div class="w3-container" style="margin-top: 80px;">
<img src="Images/Allen_Solly_Cotton_Shorts.jpg" style="width:100%">
<p>Cotton Shorts<br><b class="w3-text-red">$14.99</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/Allen_Solly_POLO_T-Shirt_half_sleeves.jpg" style="width:100%">
<p>Half Sleeves T-shirt<br><b>$14.99</b></p>
</div>
<div class="w3-container" style="margin-top: 70px;">
<img src="Images/Allen_Solly_POLO_T-Shirt_full_sleeves.jpg" style="width:100%">
<p>Full Sleeve T-shirt<br><b>$24.99</b></p>
</div>
</div>
-->
            </div>


            <div id="SuperDry_products" style="display: none; margin-top: 30px;" class="w3-row w3-grayscale">
                <h1 style="text-align: center; margin-bottom: 20px;">SuperDry Products</h1>


                <?php
                $sql = "SELECT name,price FROM all_products,products where all_products.product_id=products.id and store_id=2 limit 8";
                $result = ($conn->query($sql));

                if($result-> num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {  
                ?>

                <div class="w3-col l3 s6">
                    <div class="w3-container">
                        <img src="Images/SuperDry_<?php echo str_replace(' ', '_',$row['name'])?>.jpg" style="width:100%">
                        <p><?php echo $row['name']?><br><b>Rs.<?php echo $row['price']?></b></p><br><br>
                    </div>
                    <?php $row = $result->fetch_assoc(); ?>
                    <div class="w3-container" style="margin-top: 30px;">
                        <img src="Images/SuperDry_<?php echo str_replace(' ', '_',$row['name'])?>.jpg" style="width:100%">
                        <p><?php echo $row['name']?><br><b>Rs.<?php echo $row['price']?></b></p>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>



                <!--
<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/SuperDry_black_jeans.jpg" style="width:100%">
<p>Black Jeans<br><b>$24.99</b></p>
</div>
<div class="w3-container">
<img src="Images/SuperDry_Cotton_Shorts.jpg" style="width:100%">
<p>Cotton Shorts<br><b>$19.99</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/SuperDry_Hosiery_Shorts.jpg" style="width:100%">
<p>Hosiery Shorts<br><b>$19.99</b></p>
</div>
<div class="w3-container">
<img src="Images/SuperDry_Printed_Shorts.jpg" style="width:100%">Printed
<p>Printed Shorts<br><b>$20.50</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/SuperDry_Round_neck_T-Shirt_half_sleeves.jpg" style="width:100%">
<p>Round Neck T-shirt in half sleeves<br><b>$20.50</b></p>
</div>
<div class="w3-container">
<img src="Images/SuperDry_POLO_T-Shirt_half_sleeves.jpg" style="width:100%">
<p>POLO T-shirt half sleeves<br><b class="w3-text-red">$14.99</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/SuperDry_POLO_T-Shirt_full_sleeves.jpg" style="width:100%">
<p>POLO T-shirt full sleeves<br><b>$14.99</b></p>
</div>
<div class="w3-container">
<img src="Images/SuperDry_ONE_PIECE.jpg" style="width:100%">
<p>One Piece<br><b>$24.99</b></p>
</div>
</div>
-->
            </div>

            <div id="Zara_products" style="display: none; margin-top: 30px;" class="w3-row w3-grayscale">
                <h1 style="text-align: center; margin-bottom: 20px;">Zara Products</h1>



                <?php
                $sql = "SELECT name,price FROM all_products,products where all_products.product_id=products.id and store_id=3 limit 8";
                $result = ($conn->query($sql));

                if($result-> num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {  
                ?>

                <div class="w3-col l3 s6">
                    <div class="w3-container">
                        <img src="Images/Zara_<?php echo str_replace(' ', '_',$row['name'])?>.jpg" style="width:100%">
                        <p><?php echo $row['name']?><br><b>Rs.<?php echo $row['price']?></b></p><br><br>
                    </div>
                    <?php $row = $result->fetch_assoc(); ?>
                    <div class="w3-container" style="margin-top: 30px;">
                        <img src="Images/Zara_<?php echo str_replace(' ', '_',$row['name'])?>.jpg" style="width:100%">
                        <p><?php echo $row['name']?><br><b>Rs.<?php echo $row['price']?></b></p>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>


                <!--
<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/Zara_white_shirt.jpg" style="width:100%">
<p>White Shirt<br><b>$24.99</b></p>
</div>
<div class="w3-container">
<img src="Images/Zara_Round_neck_T-Shirt_full_sleeves.jpg" style="width:100%">
<p>Round Neck T-shirt in full sleeves<br><b>$19.99</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/Zara_white_shirt.jpg" style="width:100%">
<p>Cotton Shorts<br><b>$19.99</b></p>
</div>
<div class="w3-container">
<img src="Images/Zara_Hosiery_Shorts.jpg" style="width:100%">
<p>Hosiery Shorts<br><b>$20.50</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/Zara_Printed_Shorts.jpg" style="width:100%">
<p>Printed Shorts<br><b>$20.50</b></p>
</div>
<div class="w3-container">
<img src="Images/Zara_Round_neck_T-Shirt_half_sleeves.jpg" style="width:100%">
<p>Round Neck T-shirt in Half Sleeves<br><b class="w3-text-red">$14.99</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/Zara_ONE_PIECE.jpg" style="width:100%">
<p>One Piece<br><b>$14.99</b></p>
</div>
<div class="w3-container">
<img src="Images/Zara_SKIRT.jpg" style="width:100%">
<p>Skirt<br><b>$24.99</b></p>
</div>
</div>
-->
            </div>


            <div id="USPA_products" style="display: none; margin-top: 30px;" class="w3-row w3-grayscale">
                <h1 style="text-align: center; margin-bottom: 20px;">USPA Products</h1>

                <?php
                $sql = "SELECT name,price FROM all_products,products where all_products.product_id=products.id and store_id=4 limit 8";
                $result = ($conn->query($sql));

                if($result-> num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {  
                ?>

                <div class="w3-col l3 s6">
                    <div class="w3-container">
                        <img src="Images/USPA_<?php echo str_replace(' ', '_',$row['name'])?>.jpg" style="width:100%">
                        <p><?php echo $row['name']?><br><b>Rs.<?php echo $row['price']?></b></p><br><br>
                    </div>
                    <?php $row = $result->fetch_assoc(); ?>
                    <div class="w3-container" style="margin-top: 30px;">
                        <img src="Images/USPA_<?php echo str_replace(' ', '_',$row['name'])?>.jpg" style="width:100%">
                        <p><?php echo $row['name']?><br><b>Rs.<?php echo $row['price']?></b></p>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>




                <!--
<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/USPA_black_jeans.jpg" style="width:100%">
<p>Black Jeans<br><b>$24.99</b></p>
</div>
<div class="w3-container">
<img src="Images/USPA_Black_Shirt.jpg" style="width:100%">
<p>Black T-shirt<br><b>$19.99</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/USPA_Cotton_Shorts.jpg" style="width:100%">
<p>Cotton Shorts<br><b>$19.99</b></p>
</div>
<div class="w3-container">
<img src="Images/USPA_Printed_Shorts.jpg" style="width:100%">
<p>Printed Shorts<br><b>$20.50</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/USPA_Round_neck_T-Shirt_sleeveless.jpg" style="width:100%">
<p>Round Neck T-shirt sleeveless<br><b>$20.50</b></p>
</div>
<div class="w3-container">
<img src="Images/USPA_POLO_T-Shirt_full_sleeves.jpg" style="width:100%">
<p>POLO T-shirt in full sleeves<br><b class="w3-text-red">$14.99</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/USPA_POLO_T-Shirt_half_sleeves.jpg" style="width:100%">
<p>POLO T-shirt in half sleeves<br><b>$14.99</b></p>
</div>
<div class="w3-container">
<img src="Images/USPA_ONE_PIECE.jpg" style="width:100%">
<p>One Piece<br><b>$24.99</b></p>
</div>
</div>
-->
            </div>    


            <div id="UCB_products" style="display: none; margin-top: 30px;" class="w3-row w3-grayscale">
                <h1 style="text-align: center; margin-bottom: 20px;">United Colors of Benetton Products</h1>


                <?php
                $sql = "SELECT name,price FROM all_products,products where all_products.product_id=products.id and store_id=5 limit 8";
                $result = ($conn->query($sql));

                if($result-> num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {  
                ?>

                <div class="w3-col l3 s6">
                    <div class="w3-container">
                        <img src="Images/UCB_<?php echo str_replace(' ', '_',$row['name'])?>.jpg" style="width:100%">
                        <p><?php echo $row['name']?><br><b>Rs.<?php echo $row['price']?></b></p><br><br>
                    </div>
                    <?php $row = $result->fetch_assoc(); ?>
                    <div class="w3-container" style="margin-top: 30px;">
                        <img src="Images/UCB_<?php echo str_replace(' ', '_',$row['name'])?>.jpg" style="width:100%">
                        <p><?php echo $row['name']?><br><b>Rs.<?php echo $row['price']?></b></p>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>


                <!--
<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/UCB_black_jeans.jpg" style="width:100%">
<p>Black Jeans<br><b>$24.99</b></p>
</div>
<div class="w3-container">
<img src="Images/UCB_white_shirt.jpg" style="width:100%">
<p>White Shirt<br><b>$19.99</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/UCB_Blue_Jeans.jpeg" style="width:100%">
<p>Blue Jeans<br><b>$19.99</b></p>
</div>
<div class="w3-container">
<img src="Images/UCB_Black_Shirt.jpg" style="width:100%">
<p>Black Shirt<br><b>$20.50</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/UCB_Round_neck_T-Shirt_full_sleeves.jpg" style="width:100%">
<p>Round Neck T-shirt full sleeves<br><b>$20.50</b></p>
</div>
<div class="w3-container">
<img src="Images/UCB_Cotton_Shorts.jpg" style="width:100%">
<p>Cotton Shorts<br><b class="w3-text-red">$14.99</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/UCB_Printed_Shorts.jpg" style="width:100%">
<p>Printed Shorts<br><b>$14.99</b></p>
</div>
<div class="w3-container">
<img src="Images/UCB_SKIRT.jpg" style="width:100%">
<p>Skirt<br><b>$24.99</b></p>
</div>
</div>
-->
            </div>    


            <div id="Arrow_products" style="display: none; margin-top: 30px;" class="w3-row w3-grayscale">
                <h1 style="text-align: center; margin-bottom: 20px;">Arrow Products</h1>


                <?php
                $sql = "SELECT name,price FROM all_products,products where all_products.product_id=products.id and store_id=6 limit 8";
                $result = ($conn->query($sql));

                if($result-> num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {  
                ?>

                <div class="w3-col l3 s6">
                    <div class="w3-container">
                        <img src="Images/Arrow_<?php echo str_replace(' ', '_',$row['name'])?>.jpg" style="width:100%">
                        <p><?php echo $row['name']?><br><b>Rs.<?php echo $row['price']?></b></p><br><br>
                    </div>
                    <?php $row = $result->fetch_assoc(); ?>
                    <div class="w3-container" style="margin-top: 30px;">
                        <img src="Images/Arrow_<?php echo str_replace(' ', '_',$row['name'])?>.jpg" style="width:100%">
                        <p><?php echo $row['name']?><br><b>Rs.<?php echo $row['price']?></b></p>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>


                <!--
<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/Arrow_black_jeans.jpg" style="width:100%">
<p>Black Jeans<br><b>$24.99</b></p>
</div>
<div class="w3-container">
<img src="Images/Arrow_white_shirt.jpg" style="width:100%">
<p>White Shirt<br><b>$19.99</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/Arrow_Blue_Jeans.jpeg" style="width:100%">
<p>Blue Jeans<br><b>$19.99</b></p>
</div>
<div class="w3-container">
<img src="Images/Arrow_Black_Shirt.jpg" style="width:100%">
<p>Black Shirt<br><b>$20.50</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/Arrow_Printed_Shorts.jpg" style="width:100%">
<p>Printed Shorts<br><b>$20.50</b></p>
</div>
<div class="w3-container">
<img src="Images/Arrow_Round_neck_T-Shirt_half_sleeves.jpg" style="width:100%">
<p>Round Neck T-shirt in half sleeves<br><b class="w3-text-red">$14.99</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/Arrow_ONE_PIECE.jpg" style="width:100%">
<p>One Piece<br><b>$14.99</b></p>
</div>
<div class="w3-container">
<img src="Images/Arrow_SKIRT.jpg" style="width:100%">
<p>Skirt<br><b>$24.99</b></p>
</div>
</div>
-->
            </div>


            <div id="Forever_21_products" style="display: none; margin-top: 30px;" class="w3-row w3-grayscale">
                <h1 style="text-align: center; margin-bottom: 20px;">Forever21 Products</h1>

                <?php
                $sql = "SELECT name,price FROM all_products,products where all_products.product_id=products.id and store_id=7 limit 8";
                $result = ($conn->query($sql));

                if($result-> num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {  
                ?>

                <div class="w3-col l3 s6">
                    <div class="w3-container">
                        <img src="Images/Forever_21_<?php echo str_replace(' ', '_',$row['name'])?>.jpg" style="width:100%">
                        <p><?php echo $row['name']?><br><b>Rs.<?php echo $row['price']?></b></p><br><br>
                    </div>
                    <?php $row = $result->fetch_assoc(); ?>
                    <div class="w3-container" style="margin-top: 30px;">
                        <img src="Images/Forever_21_<?php echo str_replace(' ', '_',$row['name'])?>.jpg" style="width:100%">
                        <p><?php echo $row['name']?><br><b>Rs.<?php echo $row['price']?></b></p>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>


                <!--
<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/Forever_21_black_jeans.jpg" style="width:100%">
<p>Black Jeans<br><b>$24.99</b></p>
</div>
<div class="w3-container">
<img src="Images/Forever_21_white_shirt.jpg" style="width:100%">
<p>White Shirt<br><b>$19.99</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/Forever_21_Blue_Jeans.jpeg" style="width:100%">
<p>Blue Jeans<br><b>$19.99</b></p>
</div>
<div class="w3-container">
<img src="Images/Forever_21_Black_Shirt.jpg" style="width:100%">
<p>Black Shirt<br><b>$20.50</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/Forever_21_Hosiery_Shorts.jpg" style="width:100%">
<p>Hosiery Shorts<br><b>$20.50</b></p>
</div>
<div class="w3-container">
<img src="Images/Forever_21_Round_neck_T-Shirt_half_sleeves.jpg" style="width:100%">
<p>Round Neck T-shirt Half Sleeves<br><b class="w3-text-red">$14.99</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/Forever_21_ONE_PIECE.jpg" style="width:100%">
<p>One Piece<br><b>$14.99</b></p>
</div>
<div class="w3-container">
<img src="Images/Forever_21_SKIRT.jpg" style="width:100%">
<p>Skirt<br><b>$24.99</b></p>
</div>
</div>
-->
            </div>


            <div id="best_products" style="display: none; margin-top: 30px;" class="w3-row w3-grayscale">
                <h1 style="text-align: center; margin-bottom: 20px;">Best of the Lot</h1>


                <?php
                $sql = "SELECT products.name as pname,price,stores.name as sname FROM all_products,products,stores where all_products.product_id=products.id and all_products.store_id=stores.id order by price desc limit 8";
                $result = ($conn->query($sql));

                if($result-> num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {  
                ?>

                <div class="w3-col l3 s6">
                    <div class="w3-container">
                        <img src="Images/<?php echo str_replace(' ', '_',$row['sname'])."_".str_replace(' ', '_',$row['pname'])?>.jpg" style="width:100%">
                        <p><?php echo $row['sname']."->".$row['pname']?><br><b>Rs.<?php echo $row['price']?></b></p><br><br>
                    </div>
                    <?php $row = $result->fetch_assoc(); ?>
                    <div class="w3-container" style="margin-top: 30px;">
                        <img src="Images/<?php echo str_replace(' ', '_',$row['sname'])."_".str_replace(' ', '_',$row['pname'])?>.jpg" style="width:100%">
                        <p><?php echo $row['sname']."->".$row['pname']?><br><b>Rs.<?php echo $row['price']?></b></p>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>



                <!--
<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/blue_jeans4.jpeg" style="width:100%">
<p>Blue Jeans<br><b>$24.99</b></p>
</div>
<div class="w3-container">
<img src="Images/half_sleeve10.jpg" style="width:100%">
<p>T-shirt Half Sleeves<br><b>$19.99</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/hosiery_shorts_5.jpg" style="width:100%">
<p>Hosiery Shorts<br><b>$19.99</b></p>
</div>
<div class="w3-container">
<img src="Images/cotton_shorts5.jpg" style="width:100%">
<p>Cotton Shorts<br><b>$20.50</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/skirt3.jpg" style="width:100%">
<p>Skirt<br><b>$20.50</b></p>
</div>
<div class="w3-container">
<img src="Images/full_sleeve10.jpg" style="width:100%">
<p>T-shirt in Full sleeves<br><b class="w3-text-red">$14.99</b></p>
</div>
</div>

<div class="w3-col l3 s6">
<div class="w3-container">
<img src="Images/onepiece4.jpg" style="width:100%">
<p>One Piece<br><b>$14.99</b></p>
</div>
<div class="w3-container">
<img src="Images/printed4.jpg" style="width:100%">
<p>Printed Shorts<br><b>$24.99</b></p>
</div>
</div>
-->
            </div>


            <!-- Subscribe section -->
            <div class="w3-container w3-black w3-padding-32" style="margin-left: 16px; margin-right: 16px; margin-top: 30px;">
                <h1>Subscribe</h1>
                <h3>To get special offers and VIP treatment :</h3>
                <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" style="width:100%"></p>
                <button type="button" class="w3-button w3-red w3-margin-bottom">Subscribe</button>
            </div>


            <div class="container" id="contact_us_footer" style="margin-left: 16px; margin-right: 16px; margin-top: 30px;">
                <h1 style="text-align: center;">Contact Us</h1>
                <h3 style="text-align: center;">Questions? Go ahead</h3>
                <form action="/action_page.php" target="_blank">
                    <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
                    <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
                    <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
                    <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
                    <button type="submit" class="w3-button w3-block w3-black">Send</button>
                </form>
            </div>


            <!-- Footer -->
            <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer" style="margin-left: 16px; margin-right: 16px; margin-top: 30px ;">
                <div class="w3-row-padding">
                    <div class="w3-col s6">
                        <h1>About</h1><br>
                        <h4><a href="#">About us</a></h4>
                        <h4><a href="#">We're hiring</a></h4>
                        <h4><a href="#">Support</a></h4>
                        <h4><a href="#">Help</a></h4>
                        <!--
<h3><a href="#">Shipment</a></h3>
<h3><a href="#">Payment</a></h3>
<h3><a href="#">Gift card</a></h3>
<h3><a href="#">Return</a></h3>
<h3><a href="#">Help</a></h3>
-->
                    </div>

                    <div class="w3-col s6">
                        <h1>Store</h1><br>
                        <h4><i class="fa fa-fw fa-map-marker"></i>    JAMP</h4>
                        <h4><i class="fa fa-fw fa-phone"></i>    +919422247762</h4>
                        <h4><i class="fa fa-fw fa-envelope"></i>   jamp@gmail.com</h4>
                        <br>
                    </div>
                </div>
            </footer>


            <footer class="container" style="margin-top: 20px; margin-bottom: 30px; margin-left: 40%; margin-right: 40%">
                <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
                <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
                <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
                <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
                <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
                <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
            </footer>




            <!--  <div class="w3-black w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>-->

            <!-- End page content -->
        </div>

        <!-- Newsletter Modal -->
        <div id="newsletter" class="w3-modal">
            <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
                <div class="w3-container w3-white w3-center">
                    <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
                    <h2 class="w3-wide">NEWSLETTER</h2>
                    <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
                    <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
                    <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
                </div>
            </div>
        </div>

    </body>

    <script>
        // Accordion 
        function myAccFunc() {
            var x = document.getElementById("demoAcc");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }


        function Allen_Solly_products() {
            document.getElementById("Allen_Solly_products").style.display = "block";
            document.getElementById("SuperDry_products").style.display = "none";
            document.getElementById("Zara_products").style.display = "none";
            document.getElementById("USPA_products").style.display = "none";
            document.getElementById("best_products").style.display = "none";
            document.getElementById("UCB_products").style.display = "none";
            document.getElementById("Arrow_products").style.display = "none";
            document.getElementById("Forever_21_products").style.display = "none";
        } 


        function best_products() {
            document.getElementById("Allen_Solly_products").style.display = "none";
            document.getElementById("SuperDry_products").style.display = "none";
            document.getElementById("Zara_products").style.display = "none";
            document.getElementById("USPA_products").style.display = "none";
            document.getElementById("best_products").style.display = "block";
            document.getElementById("UCB_products").style.display = "none";
            document.getElementById("Arrow_products").style.display = "none";
            document.getElementById("Forever_21_products").style.display = "none";
        }     


        function SuperDry_products() {
            document.getElementById("Allen_Solly_products").style.display = "none";
            document.getElementById("best_products").style.display = "none";
            document.getElementById("SuperDry_products").style.display = "block";
            document.getElementById("Zara_products").style.display = "none";
            document.getElementById("USPA_products").style.display = "none";
            document.getElementById("UCB_products").style.display = "none";
            document.getElementById("Arrow_products").style.display = "none";
            document.getElementById("Forever_21_products").style.display = "none";
        }

        function Zara_products() {
            document.getElementById("Allen_Solly_products").style.display = "none";
            document.getElementById("SuperDry_products").style.display = "none";
            document.getElementById("best_products").style.display = "none";
            document.getElementById("Zara_products").style.display = "block";
            document.getElementById("USPA_products").style.display = "none";
            document.getElementById("UCB_products").style.display = "none";
            document.getElementById("Arrow_products").style.display = "none";
            document.getElementById("Forever_21_products").style.display = "none";
        } 

        function USPA_products() {
            document.getElementById("Allen_Solly_products").style.display = "none";
            document.getElementById("SuperDry_products").style.display = "none";
            document.getElementById("best_products").style.display = "none";
            document.getElementById("Zara_products").style.display = "none";
            document.getElementById("USPA_products").style.display = "block";
            document.getElementById("UCB_products").style.display = "none";
            document.getElementById("Arrow_products").style.display = "none";
            document.getElementById("Forever_21_products").style.display = "none";
        } 

        function UCB_products() {
            document.getElementById("Allen_Solly_products").style.display = "none";
            document.getElementById("SuperDry_products").style.display = "none";
            document.getElementById("Zara_products").style.display = "none";
            document.getElementById("USPA_products").style.display = "none";
            document.getElementById("UCB_products").style.display = "block";
            document.getElementById("best_products").style.display = "none";
            document.getElementById("Arrow_products").style.display = "none";
            document.getElementById("Forever_21_products").style.display = "none";
        } 

        function Arrow_products() {
            document.getElementById("Allen_Solly_products").style.display = "none";
            document.getElementById("SuperDry_products").style.display = "none";
            document.getElementById("Zara_products").style.display = "none";
            document.getElementById("USPA_products").style.display = "none";
            document.getElementById("UCB_products").style.display = "none";
            document.getElementById("best_products").style.display = "none";
            document.getElementById("Arrow_products").style.display = "block";
            document.getElementById("Forever_21_products").style.display = "none";
        } 

        function Forever_21_products() {
            document.getElementById("Allen_Solly_products").style.display = "none";
            document.getElementById("best_products").style.display = "none";
            document.getElementById("SuperDry_products").style.display = "none";
            document.getElementById("Zara_products").style.display = "none";
            document.getElementById("USPA_products").style.display = "none";
            document.getElementById("UCB_products").style.display = "none";
            document.getElementById("Arrow_products").style.display = "none";
            document.getElementById("Forever_21_products").style.display = "block";
        } 


        // Click on the "Jeans" link on page load to open the accordion for demo purposes
        document.getElementById("myBtn").click();


        // Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
    </script>

</html>
