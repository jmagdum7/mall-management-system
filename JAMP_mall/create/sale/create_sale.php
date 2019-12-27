<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'mall');

?>

<!doctype html>
<!-- Note :- SPANS are for displaying Validation Faliures-->
<html>
    <head>
        <title>Sale Details</title>
        <link rel="stylesheet" type="text/css" href="../../include/style_food.css"/>
        <link rel="stylesheet" type="text/css" href="../../include/font.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../../include/jquery-3.2.1.js"></script>
    </head>

    <body>

        <button id="PDF_modal" hidden>Open Modal</button>

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Generate Billed Receipt</h2>
                </div>
                <div class="modal-body">
                    <form action='pdf_on_sale.php' style="margin-top:20px ;margin-bottom:20px"><input type='submit' value='Get Invoice' id="pdf">
                    </form>
                </div>
            </div>
        </div>

        <!-- Division for Representation-->
        <div class="sales_form">
            <h2><strong>Sale Details</strong></h2>
            <!-- Hidden forms for AJAX submission-->
            <form id="form2" hidden>
                <input type="text" id="hphone" name="hphone">
                <input type="submit" id="submit3">
            </form>
            <form id='form1' action="" method="post" hidden>
                <input type="text" id="prdt" name="prdt" placeholder="prdt">
                <input type="text" id="rowid" name="rowid" placeholder="rowid">
                <input type="text" id="colid" name="colid" placeholder="colid">

                <input type="submit" id="submit">
            </form>

            <!-- Total Form-->
            <form id="details" name="form" action="" method="post">
                <!-- Customer Details-->
                <fieldset class="cust">
                    <legend style="color:#D85427"><strong>Customer Details</strong></legend>
                    <strong>Phone</strong><a style="color: red"><strong>*</strong></a><br>

                    <input list="customers" id="phone" name="phone" style="width:33%" onclick="document.getElementById('span3').style.display='none'" onkeypress="document.getElementById('span3').style.display='none'">
                    <datalist id="customers">
                    </datalist>

                    <span id='span3' style="display:none">Please enter Phone Number</span>
                    <fieldset style="margin-top: 10px;" name="name" class="inside">
                        <legend><strong>Name</strong><a style="color: red"><strong>*</strong></a></legend>
                        <input type="text" name="firstname" id="firstname" placeholder="First" onclick="document.getElementById('span1').style.display='none'" onkeypress="document.getElementById('span1').style.display='none'" required style="width: 33%;">
                        <input type="text" name="middlename" id="middlename" placeholder="Middle" style="width: 32%">
                        <input type="text" name="lastname" id="lastname" onclick="document.getElementById('span1.1').style.display='none'" onkeypress="document.getElementById('span1.1').style.display='none'" required placeholder="Last" style="width: 33%">
                        <span id='span1' style="display:none">Please Enter First Name</span>
                        <span id='span1.1' style="display:none">Please Enter Last Name</span>
                    </fieldset>
                    <fieldset style="margin-top: 10px;" class="inside">
                        <legend><strong>Address</strong><a style="color: red"><strong>*</strong></a></legend>
                        <input type="text" name="address" id="address" onclick="document.getElementById('span2').style.display='none'" onkeypress="document.getElementById('span2').style.display='none'" placeholder="Address" required style="width: 99.3%; margin-bottom: 5px">
                        <input type="text" name="city" id="city" onclick="document.getElementById('span2').style.display='none'" onkeypress="document.getElementById('span2').style.display='none'" placeholder="City" required style="width: 49.35%; margin-bottom: 5px">
                        <input type="text" name="state" id="state" onclick="document.getElementById('span2').style.display='none'" onkeypress="document.getElementById('span2').style.display='none'" placeholder="State" required style="width: 49.35%">
                        <input type="text" name="pincode" id="pincode" onclick="document.getElementById('span2').style.display='none'" onkeypress="document.getElementById('span2').style.display='none'" placeholder="Pin code" required style="width: 49.35%">
                        <select id="country" name="country" required style="width: 49.35%">
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antarctica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo, Republic of(Brazzaville)">Congo, Republic of(Brazzaville)</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Democratic Republic of the Congo (Kinshasa)">Democratic Republic of the Congo (Kinshasa)</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="East Timor (Timor-Leste)">East Timor (Timor-Leste)</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="English English Name">English English Name</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands">Falkland Islands</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Great Britain">Great Britain</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Holy See">Holy See</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option selected value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Ivory Coast">Ivory Coast</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, Democratic People's Rep. (North Korea)">Korea, Democratic People's Rep. (North Korea)</option>
                            <option value="Korea, Republic of (South Korea)">Korea, Republic of (South Korea)</option>
                            <option value="Kosovo">Kosovo</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao, People's Democratic Republic">Lao, People's Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libya">Libya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macau">Macau</option>
                            <option value="Macedonia, Rep. of">Macedonia, Rep. of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia, Federal States of">Micronesia, Federal States of</option>
                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar, Burma">Myanmar, Burma</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Palestinian territories">Palestinian territories</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn Island">Pitcairn Island</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion Island">Reunion Island</option>
                            <option value="Romania">Romania</option>
                            <option value="Russian Federation">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Sudan">South Sudan</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria, Syrian Arab Republic">Syria, Syrian Arab Republic</option>
                            <option value="Taiwan (Republic of China)">Taiwan (Republic of China)</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Tibet">Tibet</option>
                            <option value="Timor-Leste (East Timor)">Timor-Leste (East Timor)</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Vatican City State (Holy See)">Vatican City State (Holy See)</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                            <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                            <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                        <span id="span2" style="display:none">Please enter your Complete Address</span>
                    </fieldset>
                    <fieldset style="margin-top: 10px;" class="inside"><legend><strong>Email</strong></legend>
                        <input type="text" name="email" id="email" style="width: 49.7%">
                    </fieldset>
                    <fieldset style="margin-top: 10px;" class="inside">
                        <legend><strong>Birth Date</strong></legend>
                        <input type="date" name="DOB" id="DOB" onclick="document.getElementById('span4').style.display='none'" onkeypress="document.getElementById('span4').style.display='none'" style="width: 25%">
                        <span id='span4' style="display:none">Please select your Date of Birth</span>
                    </fieldset>
                </fieldset>

                <input type="text" id="cnt" name="cnt" placeholder="cnt" value="1" hidden>
                <!-- Order Details-->
                <fieldset class="order_details">
                    <legend style="color:#D85427"><strong>Order Details</strong></legend>
                    <table>
                        <tr>
                            <th style="width: 4%;"></th>
                            <th style="width: 40%;">Product</th>
                            <th style="width: 14%;">Price</th>
                            <th style="width: 14%;">Quantity</th>
                            <th style="width: 14%;">Discount</th>
                            <th style="width: 14%;">Total</th>
                        </tr>
                        <tr>
                            <td><button class="delete" onclick="$(this).closest('tr').remove();"><strong>x</strong></button></td>
                            <td><select class="prod" id="prod1" name="prod1">
                                </select>
                            </td>
                            <td><input type=text id="price1" name="price1" readonly style="cursor:not-allowed;"></td>
                            <td><input class="quantity" id="qty1" name="qty1" type="number" placeholder="quantity" min="0"/></td>
                            <td><input type="number" id="disc1" name="disc1" value=0 placeholder="discount"></td>
                            <td><input type="text" id="total1" name="total1" style="cursor: not-allowed" readonly></td>
                        </tr>
                    </table>
                    <input type="button" value="Add Product" class="btn" onclick="add();" style="margin-top: 5px">
                    <input id="main_submit" type="button" value="Submit" class="btn" style="margin-top: 5px" onclick="if(validateCustomerInformation())insert();">
                </fieldset>
            </form>
        </div>
        <script>
            var names = /^[A-Za-z]*$/;
            var phone_syn = /^[0-9]{10}$/;
            var pin_syn = /^[0-9]{6}$/;
            var eml = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-]+)\.([a-zA-Z]{2,5})$/

            function validateCustomerInformation(){
                var firstname = document.form.firstname;
                var lastname = document.form.lastname;
                var address = document.form.address;
                var city = document.form.city;
                var state = document.form.state;
                var pincode = document.form.pincode;
                var phone = document.form.phone;
                var email = document.form.email;
                var DOB = document.form.DOB;

                if(phone.value == "")
                {
                    document.getElementById('span3').style.display='';
                    phone.focus();
                }
                else if(!phone.value.match(phone_syn))
                {
                    alert("Please enter numerical input of 10 characters for contact");
                    phone.focus();
                }
                else if(firstname.value == "")
                {
                    document.getElementById('span1').style.display='';
                    firstname.focus();
                }
                else if(lastname.value == "")
                {                                           document.getElementById('span1.1').style.display='';lastname.focus();
                }
                else if(!firstname.value.match(names))
                {
                    alert("Name can contain only Alphabets");
                    firstname.focus();
                }
                else if(!lastname.value.match(names))
                {
                    alert("Name can contain only Alphabets");
                    lastname.focus();
                }
                else if(address.value == ""||city.value == ""||state.value == ""||pincode.value == "")
                {
                    document.getElementById('span2').style.display='';
                    address.focus();
                }
                else if(!city.value.match(names))
                {
                    alert("City name can contain only alphabets");
                    city.focus();
                }
                else if(!state.value.match(names))
                {
                    alert("State name can contain only alphabets");
                    state.focus();
                }
                else if(!pincode.value.match(pin_syn))
                {
                    alert("PinCode must be numerical input of 6 characters");
                    pincode.focus();
                }
                else if(email.value != "" && !email.value.match(eml))
                {
                    alert("Please enter your Email Id in correct format(e.x. mark1.123abc@gmail.com)");
                    email.focus();
                }
                else
                    return true;
                return false;
            }

            $(document).on('keydown keyup',function(e) {
                if (e.keyCode == 13) {
                    e.preventDefault();
                    $('#phone').click;
                }
            });

            var i=2;
            function add(){
                //                                alert("nahi chalega me");
                document.getElementById('cnt').value=i;
                id='prod'+i;
                tr="'tr'";
                //                                alert(id);
                //                var add='<tr><td>0</td><td>1</td><td>2</td><td>3</td><td>4</td></tr>';
                var add='<tr><td><button class="delete" onclick="$(this).closest('+tr+').remove();"><strong>x</strong></button></td><td><select class="prod" id="'+id+'" name="'+id+'"><option value=""></option></select></td></td><td><input type=text id="price'+i+'" name="price'+i+'" readonly style="cursor: not-allowed"></td><td><input class="quantity" id="qty'+i+'" name="qty'+i+'" type="number" min="0" placeholder="quantity"/><td><input type="number" id="disc'+i+'" name="disc'+i+'" value=0 placeholder="discount"></td><td><input type="text" id="total'+i+'" name="total'+i+'" style="cursor: not-allowed" readonly></td></tr>';
                i++;
                $('table').append(add);

                $.ajax({
                    url: 'products.php',
                    dataType: 'html',
                    success: function(response){
                        $('#'+id).html(response);
                    }
                });

                //alert(document.getElementById('prod4'));
            }        

            //function to get product list
            $.ajax({
                url: 'products.php',
                dataType: 'html',
                success: function(response){
                    $('.prod').html(response);
                }
            });

            $(document).on('click','select', function () {
                var xid=$(this).attr('id');
                var d=document.getElementById('rowid');
                d.value=xid.substr(4,xid.length);

                d=document.getElementById('prdt');
                d.value=document.getElementById(xid).value;

                var pid='price'+xid.substring(4,xid.length);
                var qtid='qty'+xid.substring(4,xid.length);
                d=document.getElementById(pid);

                $.ajax({
                    url: 'price.php',
                    data: $('#form1').serialize(),
                    success: function (data) {
                        document.getElementById(pid).value=data;
                    }
                });
                $.ajax({
                    url: 'max_stock.php',
                    data: $('#form1').serialize(),
                    success: function (data) {
                        document.getElementById(qtid).setAttribute("max",data);
                    }
                });
                document.getElementById(qtid).click();
            });

            $(document).on('click keyup','td', function(e){
                var d=document.getElementById('colid');
                d.value=$(this).get(0).cellIndex;
                var colid=$(this).get(0).cellIndex;

                if(colid==3 || colid==4)
                {
                    if(colid==3)
                    {
                        $id=$(this).get(0).firstChild.id;
                        $id=$id.substring(3,$id.length);
                        //                    alert($id);
                        var tid='total'+$id;
                        var qid='qty'+$id;
                        var pid='price'+$id;
                        var did='disc'+$id;
                    }
                    else if(colid==4)
                    {
                        $id=$(this).get(0).firstChild.id;
                        $id=$id.substring(4,$id.length);
                        //                    alert($id);
                        var tid='total'+$id;
                        var qid='qty'+$id;
                        var pid='price'+$id;
                        var did='disc'+$id;
                    }
                    //                    alert(pid);
                    var total=document.getElementById(tid);
                    var quantity=document.getElementById(qid);
                    var price=document.getElementById(pid);
                    var discount=document.getElementById(did);
                    if(quantity.value < 0)
                    {
                        alert("Quantity cannot be negative");
                        quantity.value=0;
                    }
                    if(parseInt(quantity.value) > parseInt(quantity.getAttribute('max')))
                    {
                        alert("Quantity cannot be larger than stock("+quantity.getAttribute('max')+")");
                        quantity.value=quantity.getAttribute('max');
                    }
                    if(discount.value < 0)
                    {
                        alert("Discount cannot be negative");
                        discount.value=0;
                    }
                    if(discount.value > 100) 
                    {
                        alert("Discount cannot be greater than 100%");
                        discount.value=100;
                    }
                    if(price.value!=null)
                    {
//                        alert(quantity.value+"*"+price.value+"%"+discount.value);
                        total.value=Math.round((quantity.value)*(price.value)*(100-discount.value))/100;
                    }
                    if(e.keyCode==13)
                        e.preventDefault();
                }
            });

            //function to get list of phone numbers with customer names
            $.ajax({
                url: 'phone.php',
                success: function(response){
                    $('#customers').html(response);
                }
            });
            //function to fetch customer details via phone number
            $(document).on('keyup change','#phone', function(e){
                var d=document.getElementById('phone');
                var dd=document.getElementById('hphone');
                dd.value=d.value;
                $.ajax({
                    url: 'customer.php',
                    data: $('#form2').serialize(),
                    success: function(data){
                        var result=JSON.parse(data);
                        $('#firstname').val(result.fname);
                        $('#middlename').val(result.mname);
                        $('#lastname').val(result.lname);
                        $('#address').val(result.address);
                        $('#city').val(result.city);
                        $('#state').val(result.state);
                        $('#pincode').val(result.pincode);
                        $('#email').val(result.email);
                        $('#DOB').val(result.DOB);
                    }
                });
            });

            function insert(){
                $.ajax({
                    url: "insert_sale.php",
                    type: 'post',
                    data: $('#details').serialize(),
                    success: function(data){

                        if(data=="Transaction Successful")
                        {
                            $('#PDF_modal').click();
                            //                            $('#invoice').click();
                            //                            location.reload(true);
                        }

                        else
                        {
                            alert(data);
                        }
                    }
                });
            }
            $('#PDF_modal').click();

            $(document).on('click', '.close',function(){
                location.reload(true); 
            });

            //functions related to modal for PDF generation
            {
                // Get the modal
                var modal = document.getElementById('myModal');

                // Get the button that opens the modal
                var btn = document.getElementById("PDF_modal");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal 
                btn.onclick = function() {
                    modal.style.display = "block";
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            }
        </script>
    </body>
</html>