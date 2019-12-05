<?php
header('Content-type: text/json'); //3
header('Content-type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response    = null;
$records     = null;
$result      = array();
$storeFolder = 'upload';
$ds          = DIRECTORY_SEPARATOR;
extract($_GET);
if (isset($_GET['productId'])) {
    $academicQuery = mysqli_query($conn, "SELECT photoUrl FROM ProductImages where productId = $productId");
    if ($academicQuery != null) {
        $academicAffected = mysqli_num_rows($academicQuery);
        if ($academicAffected > 0) {
            while ($academicResults = mysqli_fetch_assoc($academicQuery)) {
                $obj['name'] = $academicResults['photoUrl'];
                $obj['size'] = filesize($storeFolder . $ds . $academicResults['photoUrl']);
                $records[]   = $obj;
            }
            $response = array(
                'Message' => "Fetched",
                'Data' => $records,
                'Responsecode' => 200
            );
            
        } else {
            $response = array(
                'Message' => "No Record Found",
                'Data' => $records,
                'Responsecode' => 300
            );
        }
    }
} else {
    $response = array(
        'Message' => "Parameter Missing",
        'Responsecode' => 400
    );
}
mysqli_close($conn);
exit(json_encode($response));
?> 