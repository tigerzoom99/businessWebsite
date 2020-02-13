<?php
function getEmployee() {
    try {
        global $db;
        $query = 'SELECT * FROM employees
            ORDER BY empNo';
        $statement = $db->prepare($query);
        $statement->execute();
        $employees = $statement;
        return $employees;
    } catch(PDOException $e) {
        header("Location: error.html");
    }
}
?>