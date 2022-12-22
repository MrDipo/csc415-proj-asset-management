<?php
require "db_connect.php";

function create_request($employee_id, $asset_id, $conn){
    $curr_date = date("Y-m-d h:i:sa");
    $query = "INSERT INTO `request`(`employee_id`, `asset_id`, `status`, `date_created`) VALUES ('$employee_id','$asset_id','requested','$curr_date')";
    $result = mysqli_query($conn, $query);
    return $result;
}

# might neews a join statement here
function view_made_requests($employee_id, $asset_id, $conn){
    $query = "SELECT * FROM `request` WHERE 'employee_id' = '$employee_id' AND 'asset_id' = '$asset_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

# here too
function view_assigned_assets($employee_id, $asset_id, $conn){
    $query = "SELECT * FROM `employee_asset` WHERE 'employee_id' = '$employee_id' AND 'asset_id' = '$asset_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

?>