<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
$dir = '../Levels/levelthird/';
if (isset($_POST['elevelthirdparent']) && isset($_POST['etitle']) && isset($_POST['ettype']) && isset($_POST['reportId'])) {
    $details = isset($_POST['el3details']) ? $el3details : 'NULL';
    $details = mysqli_real_escape_string($conn, $details);
    $etitle = mysqli_real_escape_string($conn, $etitle);
    
    $sql   = "UPDATE reports_level3 SET details='$el3details', parentId = $elevelthirdparent,title = '$etitle',type = $ettype WHERE reportId = $reportId";
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        if (isset($_FILES["imgname"]["type"])) {
            $imgname    = $_FILES["etimgname"]["name"];
            $sourcePath = $_FILES['etimgname']['tmp_name']; // Storing source path of the file in a variable
            $targetPath = $dir . $reportId . ".jpg"; // Target path where file is to be stored
            move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
        }
        $academicQuery = mysqli_query($conn, "SELECT rl.reportId,rl.title as mtitle,rt.title as title,rt.reportId as sreportId,rl.details FROM reports_level3 rl INNER JOIN reports_level2 rt ON rt.reportId = rl.parentId WHERE rl.reportId = $reportId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Level Third updated added successfully",
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
