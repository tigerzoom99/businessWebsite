<?php 
    /* gets info from contact.html  */
    $visitor_name = filter_input(INPUT_POST, 'custName');
    $visitor_email = filter_input(INPUT_POST, 'custEMail');
    $visitor_msg = filter_input(INPUT_POST, 'commentBox');
    $visitor_num = filter_input(INPUT_POST, 'custNum');
    $visitor_date = filter_input(INPUT_POST, 'visitDate');
    $contact_reason = filter_input(INPUT_POST, 'contactType');
    $woodc = filter_input(INPUT_POST, 'woodchuck');
    /* if non-required fields are null it assigns a default value  */
    if ($woodc == NULL) {
        $woodc = 'no';
    }
    if ($visitor_msg == NULL) {
        $visitor_msg = 'no message entered';
    }
    // Validate inputs
    if ($visitor_name == null || $visitor_email == null ||
        $visitor_msg == null) {
        $error = "Invalid input data. Check all fields and try again.";
        echo "Form Data Error: " . $error; 
        exit();
        } else {
            $dsn = 'mysql:host=localhost;dbname=sunrise';
            $username = 'root';
            $password = 'Pa$$w0rd';

            try {
                $db = new PDO($dsn, $username, $password);

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "DB Error: " . $error_message; 
                exit();
            }

            // Add the product to the database  
            $query = 'INSERT INTO contact
                         (visitorName, visitorEMail, visitorComment, visitorPhone, visitorDate, contactReason, woodchuckAnswer)
                      VALUES
                         (:visitor_name, :visitor_email, :visitor_msg, :visitor_num, :visitor_date, :contact_reason, :woodc)';
            $statement = $db->prepare($query);
            $statement->bindValue(':visitor_name', $visitor_name);
            $statement->bindValue(':visitor_email', $visitor_email);
            $statement->bindValue(':visitor_msg', $visitor_msg);
            $statement->bindValue(':visitor_num', $visitor_num);
            $statement->bindValue(':visitor_date', $visitor_date);
            $statement->bindValue(':contact_reason', $contact_reason);
            $statement->bindValue(':woodc', $woodc);
            $statement->execute();
            $statement->closeCursor();
            /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg; */

}

?>
<!--
    Author: Tyler Chilcote
    Date Created: 1-27-2020
    Last Modified: 1-27-2020
-->
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
                    <li><a href="contact.html">Contact Us</a></li>
                    <!-- reused from the daily labs --> <script src="rb_formsubmit.js"></script>
                </ul>
            </nav>
        </header>
        <section>
            <!-- confirmation of posting to DB -->
            <h1>Posted!</h1>
            <h2></h2>
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