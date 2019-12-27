<!doctype html>

<html>
    <head>
        <title>Update Employee Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0">
        <link rel="stylesheet" href="../../include/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="../../include/view_employees.css">
        <script src="../../include/jquery-3.2.1.js"></script>
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

        <h1>Employee Details</h1>
        
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Employee Id</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Job Information</th>
                        <th>Emergency Contact Details</th>
                    </tr>
                </thead>
            </table>
            <div>
                <form id="modal_form" action="" method="post" id="rowid_form" hidden>
                    <input type="text" id="rowid" name="rowid" />
                    <input type="text" id="colid" name="colid" />
                    <input type="submit" id="submit">
                </form>
                <button id="btn_for_modal" data-toggle="modal" data-target="#modal_for_all" hidden>modal</button>
            </div>

        </div>
        
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    <form id="form2" action="update_details1.php" method="post">
                        <input type="text" name="eid" id="eid" hidden>
                        <input type="submit" id="submit2" hidden>
                    </form>
                    <?php

                    $sql = "SELECT * FROM employee_details ORDER  BY id";
                    $result = ($conn->query($sql));

                    if($result-> num_rows > 0)
                    {
                        while($row = $result->fetch_assoc())
                        {  

                    ?>

                    <tr>
                        <td><?php echo $row["id"]?><input type="button" value="update" class="update" onclick=""></td>
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
        </div>

        <div class="container">
            <div class="modal fade" id="modal_for_all" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <!--          <h4 class="modal-title">Modal Header</h4>-->
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

        $("td").on('click', function(e){
            var xid=$(this).closest('tr');
            var rid=xid.find('td:eq(0)').text();
            var d=document.getElementById("rowid");
            d.value=rid;
            d=document.getElementById("colid");
            var cid=$(this).get(0).cellIndex;
            d.value=cid;

            if(cid>=2)
                document.getElementById("submit").click();
        });

        $('#modal_form').on('submit', function (e) {
            e.preventDefault();
            var rowid=$('#rowid').val();
            var colid=$('#colid').val();
            $.ajax({
                url: 'modal.php',
                data: $('#modal_form').serialize(),
                success: function (data) {

                    if(colid>1) document.getElementById("btn_for_modal").click();
                    $('.box-body').html(data);
                }
            });
        });

        $(".update").on('click', function(e){
            var xid=$(this).closest('tr');
            var rid=xid.find('td:eq(0)').text();
            d=document.getElementById("eid");
            d.value=rid;
            document.getElementById("submit2").click();
        });
    </script>
</html>