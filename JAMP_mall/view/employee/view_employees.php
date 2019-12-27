<!doctype html>
<html>
    <head>
        <title>View Employees</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="initial-scale=1.0">
        <link rel="stylesheet" href="../../include/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="../../include/view_employees1.css">
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

        <form id="form1">
            <div class="topnav">
                <ul>
                    <li style="float: left"><h1>Employee Details</h1></li>
                    <li><input id="search" name="search" type="text" placeholder="search"></li>
                    <li><select id="searchby" name="searchby">
                        <option value="id" selected>ID</option>
                        <option value="CONCAT(fname,' ',mname,' ',lname)">Name</option>
                        </select>
                    </li>
                    <li><h3>Search By: </h3></li>

                    <li style="padding-right:1.8em;"><select id="sortby" name="sortby">
                        <option value="id" selected>ID</option>
                        <option value="fname">First name</option>
                        <option value="Salary">Salary</option>
                        </select>
                    </li>
                    <li><h3>Sort By: </h3></li>

                    <li style="padding-right:1.8em;"><h3>Employees</h3></li>
                    <li>
                        <select id="status" name="status">
                            <option selected value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </li>
                    <li><h3>View: </h3></li>
                </ul>
            </div>
        </form>

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
        </div>

        <div class="container">
            <div class="modal fade" id="modal_for_all" role="dialog">
                <div class="modal-dialog">

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
            //                alert("clicked");
            var xid=$(this).closest('tr');
            var rid=xid.find('td:eq(0)').text();
            d=document.getElementById("eid");
            d.value=rid;
            document.getElementById("submit2").click();
        });

        $.ajax({
            url: "table-content.php",
            data: $('#form1').serialize(),
            success: function(data){
                $(".tbl-content").html(data);
            }
        });

        $(document).on('keyup click', 'select, input', function(e){

            $.ajax({
                url: "table-content.php",
                data: $('#form1').serialize(),
                success: function(data){
                    $(".tbl-content").html(data);
                }
            });
        });
    </script>
</html>