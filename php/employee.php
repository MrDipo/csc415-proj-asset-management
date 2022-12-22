<?php
require "db_connect.php";

# modify so it checks if request has been made previously and if it is available
function create_request($employee_id, $asset_id, $conn){
    $query = "INSERT INTO `request`(`employee_id`, `asset_id`) VALUES ('$employee_id','$asset_id')";
    $result = mysqli_query($conn, $query);
    return $result;
}

# returns an assoc array of all requests made by this employee
function view_made_requests($employee_id, $conn){
    $query = "SELECT 'request.*', 'asset.*' FROM 'employee' INNER JOIN 'request' ON 'employee.id' = 'request.employee_id' INNER JOIN 'asset' ON 'request.asset_id' = 'asset.id' WHERE 'employee.id' = '$employee_id';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

# returns an assoc array of all assets belonging to this employee
function view_assigned_assets($employee_id, $conn){
    $query = "SELECT 'asset.*' FROM 'employee' INNER JOIN 'employee_asset' ON 'employee.id' = 'employee_asset.employee_id' INNER JOIN 'asset' ON 'employee_asset.asset_id' = 'asset.id'
    WHERE 'employee.id' = '$employee_id';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

?>