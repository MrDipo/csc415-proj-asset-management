<?php
require "db_connect.php";

    function view_all_requests($conn){
        $query = "SELECT department.department_name, employee.employee_id, asset.asset_id, employee.employee_name, employee.role, request.status, request.date_created, request.date_resolved, asset.asset_name
        FROM department
        INNER JOIN employee ON department.id = employee.department_id
        INNER JOIN request ON employee.employee_id = request.employee_id
        INNER JOIN asset ON request.asset_id = asset.asset_id;";
        $result = mysqli_query($conn, $query);
        return $result;
    }
?>