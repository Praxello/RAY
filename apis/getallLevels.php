<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);

$sql = "SELECT * FROM Levels WHERE parentId IS NULL";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $records[] = $academicResults;
        }

        $response = array(
            'Message' => " Data Fetched successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
    } else {
        $response = array(
            'Message' => "No Data Available",
            "Data" => $records,
            'Responsecode' => 401
        );
    }
}
mysqli_close($conn);
exit(json_encode($response));
?>
