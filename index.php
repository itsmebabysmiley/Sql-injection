<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
</head>

<body>
    <div>
        <h1>login</h1>
    </div>
    <div>
        <form action="" method="post">
            username <br><input type="text" name="username" id="username" required> <br>
            password <br><input type="password" name="password" id="password" required> <br>
            <input type="submit" value="submit" name="submit">

        </form>
    </div>

    <div>
        <?php
        if (isset($_POST['submit'])) {
            $dbserver = "localhost";
            $dbusername = "root";
            $dbpassword = "root";
            $dbname = "member_db";

            $connect = mysqli_connect($dbserver, $dbusername, $dbpassword, $dbname) or die("Connection error" . mysqli_connect_error());

            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = "SELECT * FROM member WHERE username = '" . $username . "' AND password = '" .$password ."' ";

            $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
            if ($result->num_rows == 0) {
                echo "Invalid username or password  ";
                
            }else{
                echo "<h2>Result</h2>";
                echo "<table border=\" 2\">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Password</th>
                </tr>"; ?>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                        echo "
                    <tr>
                        <td>";
                        echo $row['id'];
                        echo "</td>
                        <td>";
                        echo $row['name'];
                        echo "</td>
                        <td>";
                        echo $row['username'];
                        echo "</td>
                        <td>";
                        echo $row['password'];
                        echo "</td>
        
                    </tr>";
                
                }
                echo "</table>";
            }

        }
        ?>
    </div>
</body>

</html>