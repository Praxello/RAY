<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include "../connection.php";
mysqli_set_charset($conn, 'utf8');
$response = null;
$records  = null;
extract($_POST);
// userId ,categoryId, question, option1, option2, option3,option4, correctoption,ansdes
if (isset($_POST['userId']) && isset($_POST['categoryId']) && isset($_POST['question']) && isset($_POST['option1']) && isset($_POST['option2'])
&& isset($_POST['option3']) && isset($_POST['option4']) && isset($_POST['correctoption'])) {

    // $details = isset($_POST['details']) ? $_POST['details'] : 'NULL';

    $question = mysqli_real_escape_string($conn, $question);
    $option1 = mysqli_real_escape_string($conn, $option1);
    $option2 = mysqli_real_escape_string($conn, $option2);
    $option3 = mysqli_real_escape_string($conn, $option3);
    $option4 = mysqli_real_escape_string($conn, $option4);
    $ansdes = mysqli_real_escape_string($conn, $ansdes);

    $sql   = "INSERT INTO QuestionAnswerMaster(categoryId, question, option1, option2, option3,option4, correctoption, ansdes) VALUES
    ($userId,$categoryId,'$question','$option1','$option2','$option3','$option4','$correctoption','$ansdes')";
    echo $sql;
    $query = mysqli_query($conn, $sql);

    $rowsAffected = mysqli_affected_rows($conn);
    if ($rowsAffected == 1) {
        $questionId     = $conn->insert_id;
        $academicQuery = mysqli_query($conn, "SELECT * FROM QuestionAnswerMaster where questionId = $questionId");
        if ($academicQuery != null) {
            $academicAffected = mysqli_num_rows($academicQuery);
            if ($academicAffected > 0) {
                $academicResults = mysqli_fetch_assoc($academicQuery);
                $records         = $academicResults;
            }
        }
        $response = array(
            'Message' => "Question added Successfully",
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
