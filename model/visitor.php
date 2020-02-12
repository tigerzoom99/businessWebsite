<?php
function getVisitor  ($empNo) {
    global $db;
    $query2 = 'SELECT * FROM contact WHERE empNo = :empNo ORDER BY visitorEMail;';
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(":empNo", $empNo);
    $statement2->execute();
    $visitors = $statement2;
    return $visitors;
}
?>