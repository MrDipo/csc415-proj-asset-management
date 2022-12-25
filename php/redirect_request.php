<?php
require "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $employee_id = $_POST['emp_id'];
    $asset_id = $_POST['asset_id'];
    redirect_request($employee_id, $asset_id, $conn);
    status_alert("Request redirected successfully");
    header("Refresh:0; url=../pages/human_resources.php");
}

function redirect_request($employee_id, $asset_id, $conn){
    $query = "UPDATE request SET redirected=1 WHERE `employee_id`=? AND `asset_id`=?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $employee_id, $asset_id);
    $stmt->execute();
    return $stmt->get_result();
}

function status_alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

?>