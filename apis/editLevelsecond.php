<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
$dir = '../Levels/levelsecond/';
if (isset($_POST['essecondLevel']) && isset($_POST['estitle']) && isset($_POST['estype'])  && isset($_POST['reportId'])) {
    
    $estitle = mysqli_real_escape_string($conn, $estitle);
    
    $sql   = "UPDATE reports_level2 SET parentId = $essecondLevel,title = '$estitle',type=$estype WHERE reportId = $reportId";
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        if (isset($_FILES["esimgname"]["type"])) {
            $imgname    = $_FILES["esimgname"]["name"];
            $sourcePath = $_FILES['esimgname']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = $dir . $reportId . ".jpg"; // Target path where file is to be stored
            move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
        }
        $academicQuery = mysqli_query($conn, "SELECT rl.reportId,rl.title as mtitle,rt.title as title,rt.reportId as sreportId FROM reports_level2 rl INNER JOIN reports_level1 rt ON rt.reportId = rl.parentId WHERE rl.reportId = $reportId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Level second data Updated successfully",
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