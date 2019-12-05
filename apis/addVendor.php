<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
$roleId = 2;
if (isset($_POST['contactNumber']) && isset($_POST['emailId'])  && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['contactAddress'])) {
    
    $mname     = isset($_POST['mname']) ? $_POST['mname'] : 'NULL';
    $pincode   = isset($_POST['pincode']) ? $_POST['pincode'] : 'NULL';
    $birthDate = isset($_POST['birthDate']) ? $_POST['birthDate'] : 'NULL';
    $landline  = isset($_POST['landline']) ? $_POST['landline'] : 'NULL';
    $upassword = '12345';
    $Contactaddress = mysqli_real_escape_string($conn, $contactAddress);
    $fname          = mysqli_real_escape_string($conn, $fname);
    $lname          = mysqli_real_escape_string($conn, $lname);
    $mname          = mysqli_real_escape_string($conn, $mname);
    
    $sql   = "INSERT INTO  UserMaster(roleId,contactNumber,emailId,upassword) VALUES($roleId,'$contactNumber','$emailId','$upassword')";
    $query = mysqli_query($conn, $sql);
    
    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $userId       = $conn->insert_id;
        $sql          = "INSERT INTO UserDetails(userId,fname,lname,mname,contactAddress,pincode,birthDate,landline) VALUES($userId,'$fname','$lname','$mname','$contactAddress','$pincode','$birthDate','$landline')";
        $query        = mysqli_query($conn, $sql);
        $rowsAffected = mysqli_affected_rows($conn);
        if ($rowsAffected == 1) {
            $academicQuery = mysqli_query($conn, "SELECT * FROM UserMaster um INNER JOIN UserDetails ud ON um.userId = ud.userId WHERE um.userId=$userId");
            if ($academicQuery != null) {
                $academicAffected = mysqli_num_rows($academicQuery);
                if ($academicAffected > 0) {
                    $academicResults = mysqli_fetch_assoc($academicQuery);
                    $records         = $academicResults;
                }
            }
            $response = array(
                'Message' => "Vendor added Successfully",
                "Data" => $records,
                'sql'=> $sql,
                'Responsecode' => 200
            );
            
        }
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