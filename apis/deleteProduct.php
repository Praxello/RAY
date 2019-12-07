<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);

if (isset($_POST['productId'])) {
    
    $sql   = "DELETE FROM ProductMaster WHERE productId = $productId";
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $response = array(
            'Message' => "Product Removed Successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
        
        
    } else {
        $response = array(
            'Message' => mysqli_error($conn) . " failed",
            'Responsecode' => 500
        );
    }
} else {
    $response = array(
        "Message" => "Parameters missing",
        "Responsecode" => 403
    );
}
mysqli_close($conn);
print json_encode($response);
?>