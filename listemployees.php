<?php

class Database {
    private static $dsn = 'mysql:host=localhost;dbname=sunrise';
    private static $username = 'root';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                //include('../errors/database_error.php');
                echo '</br>' . $error_message;
                exit();
            }
        }
        return self::$db;
    }
}

class Employee {
    private $id;
    private $fname;
    private $lname;

    public function __construct($id, $fname, $lname) {
        $this->id = $id;
        $this->fname = $fname;
        $this->lname = $lname;
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getFName() {
        return $this->fname;
    }

    public function setFName($value) {
        $this->fname = $value;
    }
    
    public function getLName() {
        return $this->lname;
    }

    public function setLName($value) {
        $this->lname = $value;
    }
}

class EmployeeDB {
    public static function getEmployees() {
        $db = Database::getDB();
        $query = 'SELECT * FROM employees
                  ORDER BY lName';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $employees = array();
        foreach ($statement as $row) {
            $employee = new Employee($row['empNo'],
                                     $row['fName'],
                                     $row['lName']);
            $employees[] = $employee;
        }
        return $employees;
    }
}
$employees = EmployeeDB::getEmployees();
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
            <ul>
            <?php foreach($employees as $employee) : ?>
                <li>
                    <?php echo $employee->getLName() . ', ' . $employee->getFName() ;?>
                </li>
            <?php endforeach; ?>
            </ul>
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