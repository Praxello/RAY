<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
$sql = "SELECT rl.reportId,rl.title as mtitle,rt.title as title,rt.reportId as sreportId FROM reports_level1 rl INNER JOIN reports_title_master rt ON rt.reportId = rl.parentId";
$jobQuery = mysqli_query($conn, $sql);
if ($jobQuery != null) {
    $academicAffected = mysqli_num_rows($jobQuery);
    if ($academicAffected > 0) {
        while ($academicResults = mysqli_fetch_assoc($jobQuery)) {
            $records[] = $academicResults;
        }
        
        $response = array(
            'Message' => "All Categories Data Fetched successfully",
            "Data" => $records,
            'Responsecode' => 200
        );
    } else {
        $response = array(
            'Message' => "Add Data first",
            "Data" => $records,
            'Responsecode' => 401
        );
    }
}else{
    $response = array(
        'Message' => "Failed",
        "Data" => $records,
        'Responsecode' => 300
    ); 
}
mysqli_close($conn);
exit(json_encode($response));
?> 