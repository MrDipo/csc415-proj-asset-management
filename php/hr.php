<?php
require "db_connect.php";

function view_all_requests($conn){
    $query = "SELECT * FROM `request`";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

# use join statement here as well
function view_employee_assets($employee_id, $asset_id, $conn){
    $query = "SELECT * FROM `employee_asset` WHERE 'employee_id' = '$employee_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function create_employee(){

}

function update_employee(){
    
}

function delete_employee(){
    
}

function get_all_employees(){
    
}

function get_employee(){
    
}
?>