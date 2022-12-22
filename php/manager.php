<?php
    require "db_connect.php";
    function reject_request($employee_id, $asset_id, $conn){
        $curr_date = date("Y-m-d h:i:sa");
        $query = "UPDATE `request` SET `status`='rejected',`date_resolved`='$curr_date' WHERE `employee_id`='$employee_id' AND `asset_id`='$asset_id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function approve_request($employee_id, $asset_id, $conn){
        $curr_date = date("Y-m-d h:i:sa");
        $query = "UPDATE `request` SET `status`='approved',`date_resolved`='$curr_date' WHERE `employee_id`='$employee_id' AND `asset_id`='$asset_id'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    # also needs a join statement
    function show_status_requests(){

    }
?>