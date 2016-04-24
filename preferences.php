<!doctype HTML>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-latest.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
        <script src="preferences.js"></script>    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="cp.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapased" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-expande="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="#"></a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-center">
                        <li><a href="cp.php"><i class="fa fa-book"></i>Track</a></li>
                        <li class="active"><a href="preferences.php"><i class="fa fa-cogs"></i>Preferences</a></li>
                        <li><a href="index.html"><i class="fa fa-power-off"></i>Log out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row preference">
                <div class="col-sm-4">
                    <h2>Attribute</h2>
                </div>
                <div class="col-sm-4">
                    <h2>Name</h2>
                </div>
                <div class="col-sm-4">
                    <h2>Action</h2>
                </div>
            </div>
            <div class="row preference">
                <div class="col-sm-4">
                    Storage
                </div>
                <div class="col-md-4">
                    <form class="form-inline" id="get_storage">
                        <input type="text" class="form-control" id="storageid" placeholder="Storage Name">
                    </form>
                    <div class="alert alert-success" id="storage_success" role="alert"></div>
                </div>
                <div class="col-sm-4">
                    <span class="glyphicon glyphicon-plus" id="add_storage" aria-hidden="true"></span> | <span class="glyphicon glyphicon-minus" id="remove_storage" aria-hidden="true"></span>
                </div>
            </div>
            <div class="row preference">
                <div class="col-sm-4">
                    Product
                </div>
                <div class="col-md-4">
                    <form class="form-inline" id="get_product">
                        <input type="text" class="form-control" id="productid" placeholder="Product Name">
                        <input type="text" class="form-control" id="product_amount" placeholder="#">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="location_text">Location</span> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                                //List all locations as list
                                include "database.php";
                                
                                $connection = new Database();
                                $sql = "SHOW TABLES";
                                $tablelist = array();
                                $result = $connection->query($sql);
                                while ($cRow = mysqli_fetch_array($result))
                                {
                                    echo "<li class='location_select' title='{$cRow[0]}'>" . $cRow[0] . "</li>";
                                }
                            ?>
                        </ul>
                    </form>
                    <div class="alert alert-success" id="product_success" role="alert"></div>
                </div>
                <div class="col-sm-2">
                    <span class="glyphicon glyphicon-plus" id="add_product" aria-hidden="true"></span> | <span class="glyphicon glyphicon-minus" id="remove_product" aria-hidden="true"></span>
                </div>
            </div>
            <div class="row preference">
                <div class="col-sm-4">
                    Restock
                </div>
                <div class="col-md-4">
                    <form class="form-inline">
                        <input type="text" class="form-control" id="storageid" placeholder="Item Name">
                        <input type="text" class="form-control" id="restock_num" placeholder="#">
                    </form>
                </div>
                <div class="col-sm-4">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </div>
            </div>
            <div class="row preference">
                <div class="col-sm-4">
                    Threshold
                </div>
                <div class="col-md-4">
                    <form class="form-inline">
                        <input type="text" class="form-control" id="storageid" placeholder="Item Name">
                        <input type="text" class="form-control" id="restock_num" placeholder="#">
                    </form>
                </div>
                <div class="col-sm-4">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </div>
            </div>
        </div>
    </body>
</html>
