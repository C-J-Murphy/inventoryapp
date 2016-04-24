<?php
    include 'database.php';
    
    $action = $_GET['action'];
    $myDatabase = new Database();
    
    if ($action == "addproduct")
    {
        $location = $_GET['location'];
        $productid = $_GET['productid'];
        $product_amount = $_GET['product_amount'];
        $myDatabase -> addProduct($productid, $product_amount, $location);
    }
    
    if ($action == "removeproduct")
    {
        $location = $_GET['location'];
        $productid = $_GET['productid'];
        $myDatabase -> removeProduct($productid, $location);
    }
    
    if ($action == "addstorage")
    {
        $storageid = $_GET['storageid'];
        $myDatabase -> addStorage($storageid);
        
    }
    
    if ($action == "removestorage")
    {
        $storageid = $_GET['storageid'];
        $myDatabase -> removeStorage($storageid);
        
    }
