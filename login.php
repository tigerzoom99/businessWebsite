<!--
    Author: Tyler Chilcote
    Date Created: 2-11-2020
    Last Modified: 2-12-2020
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Contact Form Page for Sunrise Cafe for the Homeless">
        <meta name="Author" content="Tyler Chilcote">
        <title>Admin Login</title>
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
            <h1>Admin Login</h1>
            <h2>please enter administrator EMail and password</h2>
            <article>
                <!--
                    form
                -->
                <form name="form1" id="contact" action="admin.php" method="post">
                    <div class="formRow">
                        <label for="adminMail">Email</label>
                        <input name="adminMail" id="admin" type="text" placeholder="Admin email" required />
                    </div>

                    <div class="formRow">
                        <label for="email">Password</label>
                        <input name="pass" id="pass" type="password" required /> <!-- password is hidden -->
                    </div>

                    <p> developers note: you will be logged in as long as something is entered</p>

                    <div id="buttons">
                        <input type="submit" value="Submit" name="submit" id="submit">
                    </div>
                </form>
            </article>
            <br><br><br><br><br><br><br>
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