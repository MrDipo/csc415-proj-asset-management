<?php
    require "db_connect.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $employee_id = $_POST['emp_id'];
        $asset_id = $_POST['asset_id'];
        if ($_POST['action'] == 'Approve'){
            approve_request($employee_id, $asset_id, $conn);
            status_alert("Request approved successfully");
            header("Refresh:0; url=../pages/manager.php");
        } else if ($_POST['action'] == 'Reject'){
            reject_request($employee_id, $asset_id, $conn);
            status_alert("Request rejected successfully");
            header("Refresh:0; url=../pages/manager.php");
        }
    }

    function reject_request($employee_id, $asset_id, $conn){
        $query = "UPDATE `request` SET `status`='rejected',`date_resolved`= NOW() WHERE `employee_id`=? AND `asset_id`=?;";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $employee_id, $asset_id);
        $stmt->execute();
        return $stmt->get_result();
    }
    # set request status to approved and insert into employee_asset
    function approve_request($employee_id, $asset_id, $conn){
        $query = "UPDATE `request` SET `status`='approved',`date_resolved`= NOW() WHERE `employee_id`=? AND `asset_id`=?;";
        $asset_insert = "INSERT INTO 'employee_asset'('employee_id', 'asset_id') VALUES (?, ?);";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $employee_id, $asset_id);
        $stmt->execute();
        if ($stmt->get_result()){
            $secondstmt = $conn->prepare($asset_insert);
            $secondstmt->bind_param("ii", $employee_id, $asset_id);
            $stmt->execute();
        }
        return $stmt->get_result();
    }

    function status_alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
?>