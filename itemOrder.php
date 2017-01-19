<html>
    <head>
        <link rel='stylesheet' type='text/css' href='jQuery/jquery-ui.min.css'>
        <script src="jQuery/jquery.min.js"></script>
        <script src="jQuery/jquery-ui.min.js"></script>
        <script src="jQuery/unslider-min.js"></script>
        <script src="jQuery/unslider.js"></script>
        <script src="jQuery/bootstrap.min.js"></script>
        <script src="jQuery/bootstrapglyph.min.js"></script>
        <link rel='stylesheet' type='text/css' href='css/jquery-ui.min.css'>
        <link rel='stylesheet' type='text/css' href='css/unslider.css'>
        <link rel='stylesheet' type='text/css' href='css/unslider-dots.css'>
        <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
        <link rel='stylesheet' type='text/css' href='css/bootstrapglyph.min.css'>


        <script type="text/javascript">
            GLOBALNAME = "NOT APPLICABLE!";
            GLOBALPRICE = 0;

//            function getIdAndSubmit() {
//                var ProductCode = '0';
//                var searchName = $('#customerSearch').val();
//
//                $.ajax({
//                    url: 'ajax/ItemAjax.php',
//                    cache: false,
//                    type: 'POST',
//                    //async:false,
//                    data: {
//                        'request': 'SearchItem',
//                        'searchName': 'searchName',
//                    },
//                    dataType: 'json',
//                    success: function (data)
//                    {
//                        ProductCode = data.dataResult[0].ProductCode;
//                        //alert(ID);
//
//                    },
//                    error: function (data)
//                    {
//                        alert('error in calling ajax page');
//                    }
//                });



                //alert(ID);


            function toLoginPage() {
                document.location.href = 'login.php';
            }

            function productComplete(ProductDescShort, ProductId, Cost) {
                $('#productSearch').val(ProductDescShort);
                $('#searchResults').html("");
                $('#searchResults').hide();
                $('#priceForOne').val(Cost);
                $('#priceFor').val(Cost);
                GLOBALNAME = ProductDescShort;
                GLOBALPRICE = Cost;
            }

            function searchUpdate() {
                var productSearch = $('#productSearch').val();
                var len = productSearch.length;
                var outputData = "";
                if (len < 3) {
                    $('#searchResults').html("");
                    $('#searchResults').hide();
                    return;
                }

                $.ajax({
                    url: 'ajax/ItemAjax.php',
                    cache: false,
                    type: 'POST',
                    //async:false,
                    data: {
                        'request': 'SearchItem',
                        'productSearch': productSearch,
                    },
                    dataType: 'json',
                    success: function (data)
                    {
                        $('#searchResults').show();
                        outputData = outputData + "<table style='margin: auto; text-align:center;'>";
                        for (i = 0; i < data.dataResult.length; i++) {
                            outputData = outputData + "<tr> <td style='width:100%;' onclick='productComplete(\"" + data.dataResult[i].ProductDescShort + "\", \"" + data.dataResult[i].ProductId + "\", \"" + data.dataResult[i].Cost + "\")' >" + "<p class='searchText'>" + data.dataResult[i].ProductDescShort + "</p>" + "</td> </tr>";
                        }
                        //alert(data.dataResult[0].CustomerName);
                        //document.location.reload();

                        outputData = outputData + "</table>";
                        $('#searchResults').html(outputData);

                    },
                    error: function (data)
                    {
                        alert('error in calling ajax page');
                    }
                });
            }

            function quantityChange() {
                //alert("hello");
                var quantity = $('#quantity').val();
                var Cost = $('#priceForOne').val();
                var total = quantity * Cost;
                
                //alert(quantity);
                $('#priceForText').html("Total For " + quantity + ":");
                $('#priceFor').val((Math.round(total * 100)) / 100);
            }
            
            function addToBasket() {
                var Quantity = $('#quantity').val();
                GLOBALPRICE = GLOBALPRICE * Quantity;
                var Total = GLOBALPRICE;
                var ProductName = GLOBALNAME;
                
                $.ajax({
                    url: 'ajax/ItemAjax.php',
                    cache: false,
                    type: 'POST',
                    //async:false,
                    data: {
                        'request': 'addToBasket',
                        'Quantity': Quantity,
                        'Total': Total,
                        'ProductName': ProductName,
                    },
                    dataType: 'json',
                    success: function (data)
                    {
                        alert("Added to basket!");

                    },
                    error: function (data)
                    {
                        alert('error in calling ajax page');
                    }
                });
            }


        </script>

        <style>


            .homeHeader {
                width: 75%;
                margin: 0 auto;
                margin-top: 25px;
            }

            .video-center {
                width: 560px; /* you have to have a size or this method doesn't work */
                height: 315px; /* think about making these max-width instead - might give you some more responsiveness */

                position: relative; /* positions out of the flow, but according to the nearest parent */
                top: 0; right: 0; /* confuse it i guess */
                bottom: 0; left: 0;
                margin: auto; /* make em equal */
            }

            .mag {
                width:250px;
                margin: 0 auto;
                float: none;
            } 

            .mag img {
                max-width: 100%;
            }



            .magnify {
                position: relative;
                cursor: none
            }

            .magnify-large {
                position: absolute;
                display: none;
                width: 175px;
                height: 175px;

                -webkit-box-shadow: 0 0 0 7px rgba(255, 255, 255, 0.85), 0 0 7px 7px rgba(0, 0, 0, 0.25), inset 0 0 40px 2px rgba(0, 0, 0, 0.25);
                -moz-box-shadow: 0 0 0 7px rgba(255, 255, 255, 0.85), 0 0 7px 7px rgba(0, 0, 0, 0.25), inset 0 0 40px 2px rgba(0, 0, 0, 0.25);
                box-shadow: 0 0 0 7px rgba(255, 255, 255, 0.85), 0 0 7px 7px rgba(0, 0, 0, 0.25), inset 0 0 40px 2px rgba(0, 0, 0, 0.25);

                -webkit-border-radius: 100%;
                -moz-border-radius: 100%;
                border-radius: 100%
            }

            .navbar-brand {
                padding: 0px;
            }
            .navbar-brand>img {
                height: 100%;
                padding: 2px;
                width: auto;
            }


            #studentTable{
                width: 100%;
                font-size:17px;
                color: black;
                border-collapse: collapse;

                box-shadow:
                    -1px -1px 10px rgba(0, 0, 0, 0.2),  
                    1px -1px 10px rgba(0, 0, 0, 0.2),
                    -1px 1px 10px rgba(0, 0, 0, 0.2),
                    1px 1px 10px rgba(0, 0, 0, 0.2);


            }

            td#fmt {
                border: 1px solid black;
                padding: 3px;
                margin: 0;
                cell-padding: 0px;
            }
            
            .searchText {
                text-align: center !important;
                font-size: 14px !important;
            }

        </style>
    </head>




    <body>
        <?php
//        include_once 'include/menu.php';
        ?>

        <div class="menubar">
            <nav class="navbar navbar-inverse navbar-static-top" style="margin-bottom:0px;">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php"><img src="images/Logo.png" alt="Monster Energy">
                        </a>
                    </div>
                    <div id="navbar3" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="products.php">Products</a></li>
                            <li class="active"><a href="customerOrder.php">New Order</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="login.php">Logout</a></li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
                <!--/.container-fluid -->
            </nav>
        </div>


        <div class="jumbotron" style="margin-bottom:0px; background-image: url('images/dark_geometric.png');">
            <div class='homeHeader' style="margin-top:10px;">
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Notice:</strong> This site is still under development! Some features may not work as expected.

                </div>






                <!--                <hr style="border-color: #999999;">-->
                <!--                <div style="margin: 0 auto; width: 80%;position: absolute;">
                                <div class="container">
                                    <div class="col-md-4">
                                        <img src="images/RecordingStudio1.jpg" width='200px;' style='border-radius: 5px;'>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="images/RecordingStudio2.jpg" width='200px;' style='border-radius: 5px;'>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="images/RecordingStudio3.jpg" width='200px;' style='border-radius: 5px;'>
                                    </div>
                                    
                                </div>
                                </div>-->
                <br>

                <div style="margin:0 auto;text-align: center;">
                    <p style="color:white;">Product:</p>
                    <input onkeyup="searchUpdate();"id="productSearch" type="text"placeholder="Please enter the product you are looking for..."size="50">
                </div>

                <div id="searchResults" style="background-color: whitesmoke; text-align: center; margin: auto; border-radius: 2px; width: 250px; padding: 5px;display:none;">

                </div>

                <div style="margin:0 auto;margin-top: 5px;text-align: center;">
                    <p style="color:white;">Quantity:</p>
                    <input type="number" id="quantity" size="50" min="1" value="1" onchange="quantityChange()">
                </div>
                <div style="margin:0 auto;margin-top: 5px;text-align: center;">
                    <p style="color:white;">Unit Price:</p>
                    <input type="text" id="priceForOne" value="0.00" size="50" disabled="true">
                </div>
                <div style="margin:0 auto;margin-top: 5px;text-align: center;">
                    <p style="color:white;" id="priceForText">Total For 1:</p>
                    <input type="text" id="priceFor" value="0.00" disabled="true" size="50">
                </div>
                <div style="margin:0 auto;margin-top: 35px;text-align: center;">
                    <input type="button" id="SubmitButton" value="Add To Basket" onclick="addToBasket()">
                </div>



            </div>

        </div>
        <div class="jumbotron" style="background-image: url('images/grey_wash_wall.png'); margin-bottom:0px;">
            <div class='homeHeader' style='margin-top:5px;'>
                <div class="container">

                    <div class="row">
                        <p><img src='images/HomeIcon.png' width="20px">  Monster Energy Company, 1 Monster Way, Corona, CA, 92879, USA</p>
                        <p><img src='images/PhoneIcon.png' width="20px">  855-488-1212</p>
                        <p><img src='images/EnvelopeIcon.png' width="20px"></span>  info@monsterenergy.com</p>

                    </div>



                </div> 
            </div>
    </body>
</html>