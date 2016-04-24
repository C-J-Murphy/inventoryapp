<!doctype HTML>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-latest.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="cp.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
        <script src="track.js"></script>
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
                        <li class="active"><a href="#"><i class="fa fa-book"></i>Track</a></li>
                        <li><a href="preferences.php"><i class="fa fa-cogs"></i>Preferences</a></li>
                        <li><a href="index.html"><i class="fa fa-power-off"></i>Log out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
        <div class="track">
            <div class="row-fluid grid location">
                <div class="col-md-6 col-md-offset-3">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="default_location">Location</span> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                                //List all locations as list
                                include "database.php";
                                
                                $connection = new Database();
                                $sql = "SHOW TABLES";
                                $result = $connection->query($sql);
                                while ($cRow = mysqli_fetch_array($result))
                                {
                                    echo "<li class='location_select' title='{$cRow[0]}'>" . $cRow[0] . "</li>";
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row-fluid grid">
                <div class='col-md-12 grid'>
                    <div class="container-fluid grid">
                        <ul class="row inventory_functions">
                            <li class="inventory_function col-sm-4">
                                <h2>Item Name</h2>
                            </li>
                            <li class="inventory_function col-sm-4">
                                <h2>Current Count</h2>
                            </li>
                            <li class="inventory_function col-sm-4">
                                <h2>Modify</h2>
                            </li>
                        </ul>
                        <div id="display_inventory">
                            <?php
                                $location;
                                $display = $connection->display($location);
                                echo $display;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <footer class="footer">
          <div class="container">
            <p class="text-muted">Copyright 2016 The Inventory App. All rights reserved.</p>
          </div>
        </footer>
    </body>
</html>
