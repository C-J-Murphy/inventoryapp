<?php
    // This class is used to initalize Database connections and to preform SQL functions

    class Database 
    {
        protected static $connection;
        protected static $servername = "sql5.freemysqlhosting.net";
        protected static $username = "sql5116253";
        protected static $password = "iPGvebzVcJ";
        protected static $dbname = "sql5116253";
        private $productid;
        private $product_amount;
        protected static $location;
        
        public function connect() 
        {
            static $connection;
            if (!isset(self::$connection))
            {
                self::$connection = new mysqli( "sql5.freemysqlhosting.net", "sql5116253", "iPGvebzVcJ", "sql5116253" );
            }
        
            if (self::$connection->connect_error) 
            {
                echo "Error: " . $dbconnect->connect_error;
            }
            return self::$connection;
        }
        
        public function query($query)
        {
            //Connect to database
            $connection = $this -> connect();
            
            //Query database
            $result = $connection -> query($query);
            
            return $result;
        }
        
        public function addProduct($productid, $product_amount, $location)
        {
            //Connect to database
            $connection = $this -> connect();
            
            //Retrieve and set product name and amount to be added
            $this->productid = $productid;
            $this->product_amount = $product_amount;
            $this->location = $location;
            
            //Query Database
            $addproduct = $connection -> query("INSERT INTO {$location} (item, count)
                                            VALUES ('{$this->productid}', {$this->product_amount})");
            
            return $addproduct;
        }
        
        public function removeProduct($productid, $location)
        {
            //Connect to database
            $connection = $this -> connect();
            
            //Retrieve and set product name to be removed
            $this->productid = $productid;
            
            //Query Database
            $remove = $connection -> query("DELETE FROM {$location}
                                            WHERE item='{$productid}'");
            
            return $remove;
        }
        
        public function addStorage($storageid)
        {
            //Connect to database
            $connection = $this -> connect();
            
            //Retrieve and set location to be added
            $this->storageid = $storageid;
            
            $addstorage = $connection -> query("CREATE TABLE {$storageid}
                                                (
                                                    item varchar(255),
                                                    count int
                                                );");
        }
        
        public function removeStorage($storageid)
        {
            //Connect to database
            $connection = $this -> connect();
            
            //Retrieve and set location to be removed
            $this->storageid = $storageid;
            
            $removestorage = $connection -> query("DROP TABLE {$storageid}");
        }
        
        public function display($location)
        {
            $connection = $this -> connect();
            if (!isset(self::$location))
            {
                $sql = "SHOW TABLES";
                $tablelist = array();
                $result = $connection->query($sql);
                self::$location = mysqli_fetch_array($result);
                $default = self::$location[0];

                $display = $connection->query("SELECT item, count FROM {$default}");
                if ($display->num_rows > 0) 
                {
                 // output data of each row
                    while ($row = $display->fetch_assoc()) 
                    {
                        $glyph_title = str_replace(' ', '', $row['item']);
                        echo "<ul class='row inventory_items'>"; 
                        echo "<li class='inventory_item col-sm-4'>";
                        echo $row['item'];
                        echo "</li>";
                        echo "<li class='inventory_item col-sm-4'>";
                        echo "<span id='{$glyph_title}'>".$row['count']."</span>";
                        echo "</li>";
                        echo "<li class='inventory_item col-sm-4'>";
                        echo "<span class='glyphicon glyphicon-plus' title='{$glyph_title}+' aria-hidden='true'></span> | <span class='glyphicon glyphicon-minus 'title='{$glyph_title}-' aria-hidden='true'></span>";
                        echo "</li>";
                        echo "</ul>";
                    }
                } 
            }
            elseif (isset($location))
            {
                $display = $connection->query("SELECT item, count FROM {$location}");
                if ($display->num_rows > 0) 
                {
                 // output data of each row
                    while ($row = $display->fetch_assoc()) 
                    {
                        $glyph_title = str_replace(' ', '', $row['item']);
                        echo "<ul class='row inventory_items'>";
                        echo "<li class='inventory_item col-sm-4'>";
                        echo $row['item'];
                        echo "</li>";
                        echo "<li class='inventory_item col-sm-4'>";
                        echo "<span id='{$glyph_title}'>".$row['count']."</span>";
                        echo "</li>";
                        echo "<li class='inventory_item col-sm-4'>";
                        echo "<span class='glyphicon glyphicon-plus' title='{$glyph_title}+' aria-hidden='true'></span> | <span class='glyphicon glyphicon-minus 'title='{$glyph_title}-' aria-hidden='true'></span>";
                        echo "</li>";
                        echo "</ul>";
                    }
                }
            }
            else
            {
                echo ("You need to add stuff to this inventory location!");
            }
        }
        
        
    }
