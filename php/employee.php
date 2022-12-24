<?php
require "db_connect.php";

# Returns true if request has not been previously inserted into the database
function create_request($employee_id, $asset_name, $conn){
    $check_query = "SELECT r.employee_id, r.asset_id
    FROM request r
    JOIN employee e ON r.employee_id = e.id
    JOIN asset a ON r.asset_id = a.id
    WHERE e.id = '$employee_id' AND a.name = '$asset_name';";
    $check_query_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_query_result)==1){
        return False;
    }
    $query = "INSERT INTO request (employee_id, asset_id)
    SELECT e.id, a.id
    FROM employee e
    JOIN asset a ON a.name = '$asset_name'
    WHERE e.id = '$employee_id';";
    $result = mysqli_query($conn, $query);
    return $result;
}

# returns an assoc array of all requests made by this employee
function view_made_requests($employee_id, $conn){
    $query = "SELECT request.*, asset.* FROM employee INNER JOIN request ON employee.id = request.employee_id INNER JOIN asset ON request.asset_id = asset.id WHERE employee.id = ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

# returns an assoc array of all assets belonging to this employee
function view_assigned_assets($employee_id, $conn){
    $query = "SELECT 'asset.*' FROM 'employee' INNER JOIN 'employee_asset' ON 'employee.id' = 'employee_asset.employee_id' INNER JOIN 'asset' ON 'employee_asset.asset_id' = 'asset.id'
    WHERE 'employee.id' = ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
?>