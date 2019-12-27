<!doctype html>

<html>
    <head>
        <title>View Sales Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0">
        <link rel="stylesheet" href="../../include/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="../../include/view_employees1.css">
        <script src="../../include/jquery-3.2.1.js"></script>
        <!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
        <script src="../../include/bootstrap.min.js"></script>
    </head>

    <body>

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

        <form id="form1">
            <div class="topnav">
                <ul>
                    <li style="float: left"><h1>Sales Details</h1></li>
                    <li><input id="search" name="search" type="text" placeholder="search"></li>
                    <li><select id="searchby" name="searchby">
                        <option value="id" selected>ID</option>
<!--
                        <option value="store">Store</option>
                        <option value="Customer">Customer</option>
                        <option value="date">Date</option>
-->
                        </select>
                    </li>
                    <li><h3>Search By: </h3></li>

                    <li style="padding-right:1.8em;"><select id="ad" name="ad">
                        <option value="asc" selected>Ascending</option>
                        <option value="desc">Descending</option>
                        </select>
                    </li>

                    <li style="padding-right:1.8em;"><select id="sortby" name="sortby">
                        <option value="id" selected>ID</option>
                        <option value="date">Date</option>
                        <option value="total_amount">Total amount</option>
                        </select>
                    </li>
                    <li><h3>Sort By: </h3></li>
                </ul>
            </div>
        </form>


        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Store Name</th>
                        <th>Customer Name</th>
                        <th>Employee Name</th>
                        <th>Date</th>
                        <th>Quantity</th>
                        <th>Total Amount</th>
                        <!--
<th>Payment Method</th>
<th>Transaction ID</th>
-->
                        <th>Order Details</th>
                    </tr>
                </thead>
            </table>
            <div hidden>
                <form action="" method="post" id="rowid_form">
                    <!--A js function stores the row_id on clicking in this input box to use in php-->
                    <input type="text" id="rowid" name="rowid" />
                    <input type="text" id="colid" name="colid" />
                    <input type="submit" id="submit">
                </form>
                <button id="btn_for_order_details" data-toggle="modal" data-target="#modal_for_order_details" >modal_for_order_details</button>
            </div>

        </div>

        <div class="tbl-content">

        </div>

        <div class="container">

            <!-- Modal only for order details -->
            <div class="modal fade" id="modal_for_order_details" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <div class="modal-body">
                            <div class="box-body table-responsive no-padding">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </body>

    <script>
        $(window).on("load resize ", function() {
            var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
            $('.tbl-header').css({'padding-right':scrollWidth});
        }).resize();

        $(document).on('click','td', function(e){
            var xid=$(this).closest('tr')[0];
            var rid=xid.children[0].innerText;
            var d=document.getElementById("rowid");
            d.value=rid;
            d=document.getElementById("colid");
            var cid=$(this).get(0).cellIndex;
            d.value=cid;
            //            alert(rowid.value);
            document.getElementById("submit").click();
        });

        $(function () {
            $('form').on('submit', function (e) {
                e.preventDefault();
                var rowid=$('#rowid').val();
                var colid=$('#colid').val();
                $.ajax({
                    //                    type: 'post',
                    url: 'sale_retrieval.php',
                    data: $('form').serialize(),
                    success: function (data) {
                        //                        alert('form was submitted');

                        if(colid==7) document.getElementById("btn_for_order_details").click();
                        $('.box-body').html(data);
                    }
                });
            });
        });

        $.ajax({
            url: "table_content_sale.php",
            data: $('#form1').serialize(),
            success: function(data){
                //                alert("chal raha hai");
                $(".tbl-content").html(data);
            }
        });

        $(document).on('keyup click', 'select, input', function(e){

            $.ajax({
                url: "table_content_sale.php",
                data: $('#form1').serialize(),
                success: function(data){
                    //                alert("chal raha hai");
                    $(".tbl-content").html(data);
                }
            });
        });

    </script>
</html>