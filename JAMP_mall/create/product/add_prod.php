<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'mall');
//$all_products = mysqli_query($conn,"select product_id from all_products where store_id=(select store_id from employee_details where id='".$_SESSION['eid']."');");
?>

<!doctype html>

<html>
    <head>
        <title>JAMP | PRODUCT</title>
        <link rel="stylesheet" type="text/css" href="../../include/style_food.css"/>
        <link rel="stylesheet" type="text/css" href="../../include/font.css">
        <script src="../../include/jquery-3.2.1.js"></script>
    </head>

    <body>
        <div class="sales_form">
            <form id="form2" name="form2" hidden>
                <input type="text" name="st_name" id="st_name">
                <input type="submit" id="submit1">
            </form>
            <form id="form3" name="form3" hidden>
                <input type="text" name="st2_name" id="st2_name">
                <input type="text" name="pr_name" id="pr_name">
                <input type="submit" id="submit2">
            </form>
            <form action="ins_prod.php" method="post">
                <fieldset><legend style="color:red"><h2><strong>Product Details</strong></h2></legend>
                    <fieldset class='inside'>
                        <legend><strong>Store</strong><a style="color: red"><strong>*</strong></a><br></legend>
                        <select name='store' id="store" style="width: 50%;">
                            <?php
                            if(preg_match('/^A.*/',$_SESSION['eid']))
                                $sql="SELECT name FROM stores ORDER BY name asc;";
                            else
                            {
                                if(preg_match('/^C.*/',$_SESSION['eid']))
                                    $dept='Clothing';
                                else
                                    $dept='Food';
                                $sql="SELECT name FROM stores WHERE department='".$dept."' ORDER BY name asc;";
                                //                            echo $sql;
                            }
                            if(!($stor=mysqli_query($conn, $sql)));
                            echo "<option value='--'>--</option>";
                            while($st=mysqli_fetch_array($stor))
                            {
                                echo '<option value="'.$st['name'].'">'.$st['name'].'</option>';
                            }
                            ?>
                        </select>
                        <span id="span1" style="display:none"><br>Please select Store</span>
                    </fieldset>
                    <fieldset style="margin-top: 10px;" class='inside'>
                        <legend><strong>Product</strong><a style="color: red"><strong>*</strong></a></legend>
                        <input type="text" id="prod" name="prod" list="suggestion" style="width: 50%;">
                        <datalist id="suggestion">
                        </datalist>
                        <span id="span2" style="display:none"><br>Please enter Product Name</span>
                    </fieldset>
                    <fieldset style="margin-top: 10px;" class='inside'>
                        <legend><strong>Category</strong><a style="color: red"><strong>*</strong></a></legend>
                        <select name="category" id="category" style="width: 50%;">
                            <option>1.Bottomwear</option><option>2.Topwear</option>
                            <option>3.Fast food</option><option>4.Beverages</option><option>5.desserts</option>
                        </select>
                        <span id="span3" style="display:none"><br>Please select Category</span>
                    </fieldset>
                    <fieldset style="margin-top: 10px;" class='inside'>
                        <legend><strong>Price</strong><a style="color: red"><strong>*</strong></a></legend>
                        <input type="text" id="price" name="price" style="width: 50%;">
                        <span id="span4" style="display:none"><br>Please enter Price</span>
                    </fieldset>
                    <fieldset style="margin-top: 10px;" class='inside'>
                        <legend><strong>Stock</strong><a style="color: red"><strong>*</strong></a></legend>
                        <input type="text" id="stock" name="stock" style="width: 50%;">
                        <span id="span5" style="display:none"><br>Please enter available stock</span>
                    </fieldset>
                    <input type="submit" class="btn" style="margin-top: 10px; margin-left:4px;" onclick="return validateProdInfo()">
                </fieldset>
            </form>
        </div>
    </body>
    <script>

        function validateProdInfo()
        {
            var store = document.getElementById('store');
            var prod = document.getElementById('prod');
            var category = document.getElementById('catogory');
            var price = document.getElementById('price');
            var stock = document.getElementById('stock');

            if(store.value == '--')
                document.getElementById('span1').style.display="";
            else if(prod.value == "")
                document.getElementById('span2').style.display="";
            else if(category.value == "")
                document.getElementById('span3').style.display="";
            else if(price.value == "")
                document.getElementById('span4').style.display="";
            else if(stock.value == "")
                document.getElementById('span5').style.display="";
            else
                return true;
            return false;
        }

        $(document).on('change','#store', function(e){
            var d=document.getElementById('store');
            var dd=document.getElementById('st_name');
            dd.value=d.value;
            $.ajax({
                url: 'get_prod.php',
                data: $('#form2').serialize(),
                success: function(data){
                    $('#suggestion').html(data);
                }
            });
        });
        $(document).on('change','#prod', function(e){
            var d=document.getElementById('store');
            var dd=document.getElementById('st2_name');
            dd.value=d.value;
            var d=document.getElementById('prod');
            var dd=document.getElementById('pr_name');
            dd.value=d.value;
            $.ajax({
                url: 'fill_prod.php',
                data: $('#form3').serialize(),
                success: function(data){
                    //                    alert(data);
                    var result=JSON.parse(data);
                    $('#category').val(result.category);
                    $('#price').val(result.price);
                    $('#stock').val(result.stock);

                    //                    $('#middlename').val(result.mname);
                    //                    $('#lastname').val(result.lname);
                    //                    $('#address').val(result.address);
                    //                    $('#city').val(result.city);
                    //                    $('#state').val(result.state);
                    //                    $('#pincode').val(result.pincode);
                    //                    $('#email').val(result.email);
                    //                    $('#DOB').val(result.DOB);
                }
            });
        });
    </script>