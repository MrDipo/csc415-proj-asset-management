<?php
    require "db_connect.php";
    function reject_request($employee_id, $asset_id, $conn){
        $curr_date = date("Y-m-d h:i:sa");
        $query = "UPDATE `request` SET `status`='rejected',`date_resolved`='$curr_date' WHERE `employee_id`='$employee_id' AND `asset_id`='$asset_id';";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    # set request status to approved and insert into employee_asset
    function approve_request($employee_id, $asset_id, $conn){
        $curr_date = date("Y-m-d h:i:sa");
        $query = "UPDATE `request` SET `status`='approved',`date_resolved`='$curr_date' WHERE `employee_id`='$employee_id' AND `asset_id`='$asset_id';";
        $asset_query = "INSERT INTO 'employee_asset'('employee_id', 'asset_id') VALUES ('$employee_id', '$asset_id);";
        $result = mysqli_query($conn, $query);
        if ($result){
            $effect = mysqli_query($conn, $asset_query);
        }
        return $result;
    }

    # also needs a join statement
    function show_status_requests(){

    }
?>