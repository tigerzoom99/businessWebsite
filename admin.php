<!--
    Author: Tyler Chilcote
    Date Created: 2-12-2020
    Last Modified: 2-12-2020
-->
<?php

require('model/database.php');
require('model/employee.php');
require('model/visitor.php');
//connects to database

try {
    $db = Database::getDB(); //function 1

} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "DB Error: " . $error_message; 
    exit();
    }
        
// Check action; on initial load it is null
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_visitors';
    }
}  

// List the visitors & employees
if ($action == 'list_visitors') {

    // Read employee data 

    $empNo = filter_input(INPUT_GET, 'empNo', 
            FILTER_VALIDATE_INT);
    if ($empNo == NULL || $empNo == FALSE) {
        $empNo = 2;
    }
    try {
        $employees = getEmployee();             //function 2
        $visitors = getVisitor($empNo);    //function 3
    }
    catch(PDOException $e){
        echo 'Error: ' . $e->getMessage(); //on failure, shows error message
    }
}

// Executed when user clicks delete button
else if ($action == 'delete_visitor') {
    $visitorID = filter_input(INPUT_POST, 'visitorID', 
            FILTER_VALIDATE_INT);
    $query = 'DELETE FROM contact
              WHERE visitorID = :visitorID';
    $statement = $db->prepare($query);
    $statement->bindValue(':visitorID', $visitorID);
    $statement->execute();
    $statement->closeCursor();
    echo ("VisitorID: $visitorID");
    header("Location: admin.php");  
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Contact Form Page for Sunrise Cafe for the Homeless">
        <meta name="Author" content="Tyler Chilcote">
        <title>Contact Us</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="CSS/styles.css">
        <link rel="stylesheet" href="CSS/print.css" media="print">
        <link rel="stylesheet" type="text/css" href="CSS/form.css">
        <link rel="shortcut icon" href="images/favicon.ico" />
    </head>

    <body>
        <header>
            <nav class="center">
                <ul>
                    <!--
                        navigation bar
                    -->
                    <li><a href="index.html">Home</a></li> <span>|</span>
                    <li><a href="menu.html">Menu</a></li> <span>|</span>
                    <li><a href="members.html">Our Members</a></li> <span>|</span>
                    <li><a href="mission.html">Mission Statement</a></li> <span>|</span>
                    <li><a href="contact.html">Contact Us</a></li> <span>|</span>
                    <li><a href="login.php">Admin</a></li>
                </ul>
            </nav>
        </header>
        <section>
            <h1>Admin Page</h1>
            <h2>Select an employee email to view messages</h2>
            <!-- display links for all employees -->
            <ul>
                <?php foreach($employees as $employee) : ?> <!-- lists all employees and names can be selected to view assigned comments -->
                <li>
                    <a href="?empNo=<?php echo $employee['empNo']; ?>">
                        <?php echo $employee['fName'] . " " . $employee['lName']; ?>
                    </a>
                    
                </li>
                <?php endforeach; ?>
            </ul>
            </br>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th class="right">Message</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($visitors as $visitor) : ?> <!-- lists all comments assigned to selected employee -->
                <tr>
                    <td><?php echo $visitor['visitorName']; ?></td>
                    <td><?php echo $visitor['visitorEMail']; ?></td>
                    <td><?php echo $visitor['visitorComment']; ?></td> </td>
                    <td><form action="admin.php" method="post">
                        <input type="hidden" name="action"
                               value="delete_visitor">
                        <input type="hidden" name="visitorID"
                               value="<?php echo $visitor['visitorID']; ?>">
                        <input type="submit" value="Delete"> <!-- delete button -->
                    </form></td>
                </tr>
            <?php endforeach; ?>
            </table>
            <article>
                
            </article>
        </section>
        <footer>
            <!--
                basic contact info
                footer
            -->
            <p>tel: (xxx)xxx-xxxx</p>
        </footer>
    </body>
</html>