<!DOCTYPE html>

<html lang="en" dir="ltr">

<main>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>IES</title>
        <link href="../styles/logstyles.css" rel="stylesheet" />
    </head>

    <body>

        <h2>Login Form</h2>

        <form action="log_process.php" method="post">

            <div class="container">
                <label for="user"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="user" required>

                <label for="pass"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pass" required>

                <button type="submit">Login</button>
                <button type="recover">Recover Password</button>
            </div>

        </form>

    </body>

</main>