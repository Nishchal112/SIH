<?php


$medicineid = $_POST['medicineid'];
$medicinename = $_POST['medicinename'];
$suppliername = $_POST['suppliername'];
$expdate = $_POST['expdate'];
$mafdate = $_POST['mafdate'];
$qty = $_POST['qty'];
$unitprice = $_POST['unitprice'];



$conn = new mysqli('localhost', 'root', '', 'medmanage');


if($conn->connect_error){
    die('Connection Failed: ' . $conn->connect_error);
} else {
   
    $stmt = $conn->prepare("INSERT INTO madmanage (medicineid,medicinename,suppliername,expdate,mafdate,qty,unitprice) VALUES (?,?,?,?,?,?,?)");
    
   
    $stmt->bind_param("issssii",$medicineid,$medicinename,$suppliername,$expdate,$mafdate,$qty,$unitprice);
    
   
    if($stmt->execute()){
        echo "Login details saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
   
    $stmt->close();
    $conn->close();
}
?>