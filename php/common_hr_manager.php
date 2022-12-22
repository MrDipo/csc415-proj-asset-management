<?php
require "db_connect.php";

    function view_all_requests($conn){
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