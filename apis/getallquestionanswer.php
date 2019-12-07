<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
if(isset($_POST['userId'])){
    $sql      = "SELECT * FROM QuestionAnswerMaster qam left join categorymaster cm on qam.categoryId=cm.categoryId";
}else{
    $sql = "SELECT * FROM QuestionAnswerMaster qam left join categorymaster cm on qam.categoryId=cm.categoryId";
}
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $records[] = $academicResults;
        }

        $response = array(
            'Message' => "All Question Data Fetched successfully",
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
