<?php
    require "db_connect.php";
    function reject_request($employee_id, $asset_id, $conn){
        # $curr_date = date("Y-m-d h:i:sa");
        $query = "UPDATE `request` SET `status`='rejected',`date_resolved`= NOW() WHERE `employee_id`='$employee_id' AND `asset_id`='$asset_id';";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    # set request status to approved and insert into employee_asset
    function approve_request($employee_id, $asset_id, $conn){
        # $curr_date = date("Y-m-d h:i:sa");
        $query = "UPDATE `request` SET `status`='approved',`date_resolved`= NOW() WHERE `employee_id`='$employee_id' AND `asset_id`='$asset_id';";
        $asset_insert = "INSERT INTO 'employee_asset'('employee_id', 'asset_id') VALUES ('$employee_id', '$asset_id);";
        $result = mysqli_query($conn, $query);
        if ($result){
            $temp = mysqli_query($conn, $asset_insert);
            unset($temp);
        }
        return $result;
    }

    # return all requests with their statuses
    function show_status_requests($conn){
        $query = "SELECT 'department.name', 'employee.name', 'employee.role', 'request.status', 'request.date_created', 'request.date_resolved', 'asset.name'
        FROM 'department'
        INNER JOIN 'employee' ON 'department.id' = 'employee.department_id'
        INNER JOIN 'request' ON 'employee.id' = 'request.employee_'id'
        INNER JOIN 'asset' ON 'request.asset_id' = 'asset.id';";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
?>