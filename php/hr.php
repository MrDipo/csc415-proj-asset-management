<?php
require "db_connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $department_name = $_POST['department'];
    $employee_name = $_POST['employee_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $employment_type = $_POST['employment_type'];
    $query = "SELECT * FROM `department` WHERE department_name = ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $department_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $department_id = $row['id'];
    create_employee($department_id, $employee_name, $address, $phone, $email, $password, $role, $employment_type ,$conn);
    status_alert("Employee created successfully");
    header("Refresh:0; url=../pages/human_resources.php");
}

function view_all_pending_requests($conn){
    $query = "SELECT department.department_name, employee.employee_id, asset.asset_id, employee.employee_name, employee.role, request.status, request.date_created, request.date_resolved, asset.asset_name
    FROM department
    INNER JOIN employee ON department.id = employee.department_id
    INNER JOIN request ON employee.employee_id = request.employee_id
    INNER JOIN asset ON request.asset_id = asset.asset_id
    WHERE request.redirected = 0";
    $result = mysqli_query($conn, $query);
    return $result;
}

# use join statement here as well
function view_assets_assigned($conn){
    $query = "SELECT department.department_name, employee.employee_name, employee.role, asset.asset_name
    FROM department
    INNER JOIN employee ON department.id = employee.department_id
    INNER JOIN employee_asset ON employee.employee_id = employee_asset.employee_id
    INNER JOIN asset ON employee_asset.asset_id = asset.asset_id;";
    $result = mysqli_query($conn, $query);
    return $result;
}

function create_employee($department_id, $name, $address, $phone, $email, $password, $role, $employement_type, $conn){
    $query = "INSERT INTO employee(department_id, employee_name, address, phone, email, password, role, employment_type)
    VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isssssss", $department_id, $name, $address, $phone, $email, $password, $role, $employement_type);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
 
function update_employee($employee_id, $department_id, $name, $address, $phone, $email, $password, $role, $employment_type, $conn){
    $query = "UPDATE employee
    SET department_id = CASE 
        WHEN department_id = department_id THEN department_id
        ELSE '$department_id'
    END,
    name = CASE 
        WHEN name = name THEN name
        ELSE '$name'
    END,
    address = CASE 
        WHEN address = address THEN address
        ELSE '$address'
    END,
    phone = CASE 
        WHEN phone = phone THEN phone
        ELSE '$phone'
    END,
    email = CASE 
        WHEN email = email THEN email
        ELSE '$email'
    END,
    password = CASE 
        WHEN password = password THEN password
        ELSE '$password'
    END,
    role = CASE 
        WHEN role = role THEN role
        ELSE '$role'
    END,
    employment_type = CASE 
        WHEN employment_type = employment_type THEN employment_type
        ELSE '$employment_type'
    END,
    WHERE id = '$employee_id';";
    $result = mysqli_query($conn, $query);
    return $result;
}

function get_all_employees($conn){
    $query = "SELECT * from employee;";
    $result = mysqli_query($conn, $query);
    return $result;
}

function status_alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

?>