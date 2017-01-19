<?php

$errFlg = 0;
$errMsg = "";
$jsonVal = new stdClass();
$request = $_POST['request'];
$productSearch = $_POST['productSearch'];
$Quantity = $_POST['Quantity'];
$Total = $_POST['Total'];
$ProductName = $_POST['ProductName'];



$sqlConnection = null;
include_once 'config.php';
$sqlConnection = connectToDatabase();


if ($request == "SearchItem") {
    if ($sqlConnection != null) {
        
      //echo $sqlQuery;
//    $result = sqlsrv_query($sqlConnection,$sqlQuery);
        try {
            $sqlQuery = "SELECT * FROM Products WHERE ProductDescShort LIKE '%$productSearch%'";
            $result = $sqlConnection->prepare($sqlQuery);
            
            $result->execute();
            $rs = $result->fetchAll();
            
            $jsonVal->dataResult = $rs;
            //print_r($rs);
//    print_r($result->rowCount());
        } catch (PDOExeption $e) {
            $errFlg = 1;
            $errMsg = $e->getMessage();
        }
    }
    $jsonVal->errMsg=$errMsg;
}

if ($request == "addToBasket") {
    if ($sqlConnection != null) {
        
      //echo $sqlQuery;
//    $result = sqlsrv_query($sqlConnection,$sqlQuery);
        try {
            $sqlQuery = "INSERT INTO Basket (ProductName, Quantity, Total) VALUES ('$ProductName', '$Quantity', '$Total');";
            $result = $sqlConnection->prepare($sqlQuery);
            
            $result->execute();
            $rs = $result->fetchAll();
            
            $jsonVal->dataResult = $rs;
            //print_r($rs);
//    print_r($result->rowCount());
        } catch (PDOExeption $e) {
            $errFlg = 1;
            $errMsg = $e->getMessage();
        }
    }
    $jsonVal->errMsg=$errMsg;
}


echo json_encode($jsonVal);
?>