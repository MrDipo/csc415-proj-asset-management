<?php
require "db_connect.php";

# use join statement here as well
function view_assets_assigned($conn){
    $query = "SELECT department.name, employee.name, employee.role, asset.name
    FROM department
    INNER JOIN employee ON department.id = employee.department_id
    INNER JOIN employee_asset ON employee.id = employee_asset.employee_id
    INNER JOIN asset ON employee_asset.asset_id = asset.id;";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function create_employee($department_id, $name, $address, $phone, $email, $password, $role, $employement_type, $conn){
    $query = "INSERT INTO 'employee'(`department_id`, `name`, `address`, `phone`, `email`, `password`, `role`, `employment_type`)
    VALUES ('$department_id','$name','$address','$phone','$email','$password','$role','$employement_type');";
    $result = mysqli_query($conn, $query);
    return $result;
}
# checks if 
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
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function get_employee($employee_id, $conn){
    $query = "SELECT * from employee WHERE employee.id = '$employee_id';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function delete_employee(){    
}

?>