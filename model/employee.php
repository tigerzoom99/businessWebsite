<?php
function getEmployee() {
    global $db;
    $query = 'SELECT * FROM employees
        ORDER BY empNo';
    $statement = $db->prepare($query);
    $statement->execute();
    $employees = $statement;
    return $employees;
}
?>