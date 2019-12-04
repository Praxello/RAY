<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if (isset($_POST['productId']) && isset($_POST['userId']) && isset($_POST['productTitle']) && isset($_POST['price']) && isset($_POST['GST']) && isset($_POST['category']) && isset($_POST['videoUrl'])) {
    
    $details = isset($_POST['details']) ? $_POST['details'] : 'NULL';
    
    $details = mysqli_real_escape_string($conn, $details);
    
    $sql = "UPDATE ProductMaster SET userId = $userId,productTitle='$productTitle',price='$price',GST='$GST',category='$category',videoUrl='$videoUrl',details='$details' WHERE productId = $productId";
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $academicQuery = mysqli_query($conn, "SELECT * FROM ProductMaster where productId = $productId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Product Updated Successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
        
    } else {
        $response = array(
            'Message' => mysqli_error($conn) . " No Data Changee",
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