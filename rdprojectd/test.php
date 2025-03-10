<!--  chat gpt test email and password-->
<?php
//
//// Retrieve the email and password from the login form
//
//$servername = "localhost";
//$username = "root";
//$password = "";  // If you set a password for MySQL, enter it here
//$database = "annudorms";
//
//// Create connection
//$conn = new mysqli($servername, $username, $password, $database);
//
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
//$email = $_POST['email'];
//$password = $_POST['password'];
//// SQL query to retrieve student names
//$sql = "SELECT Name FROM Student";
//
//// Execute the query
//$result = $conn->query($sql);
//
//// Check if any records found
//if ($result->num_rows > 0) {
//    // Output data of each row
//    while ($row = $result->fetch_assoc()) {
//        echo "      " . $row["Name"] . "<br>";
//    }
//} else {
//    echo "No students found.";
//}
//
//// Close the database connection
//$conn->close();
//
//
//// SQL query to check if the email and password match
//$sql = "SELECT * FROM agent WHERE email = '$email' AND password = '$password'";
//
//// Execute the query
//$result = $conn->query($sql);
//
//// Check if a matching record is found
//if ($result->num_rows > 0) {
//    // Authentication successful
//    echo "Authentication successful!";
//} else {
//    // Authentication failed
//    echo "Authentication failed!";
//}
//
//// Close the database connection
//$conn->close();
//?>

<!---->
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title>Login</title>-->
<!--</head>-->
<!--<body>-->
<!--<form method="post" action="testchat.php">-->
<!--    <label>Email:</label>-->
<!--    <input type="email" name="email" required><br><br>-->
<!--    <label>Password:</label>-->
<!--    <input type="password" name="password" required><br><br>-->
<!--    <input type="submit" value="Login">-->
<!--</form>-->
<!--</body>-->
<!--</html>-->


<!--   TESTING SEARCH BUTTON-->

<?php
// Check if the search form is submitted
if (isset($_GET['search'])) {
    // Get the search keyword from the form input
    $search = $_GET['search'];

    // Perform the search query in your database
    $servername = "localhost";
    $username = "root";
    $password = "";  // If you set a password for MySQL, enter it here
    $database = "annudorms";

// Create connection
    $conn = new mysqli($servername, $username, $password, $database);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }  // Use the $search variable in your query to search for agents

    // Example database query
    $query = "SELECT * FROM agent WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%'";

    // Execute the query and fetch the results
    // Replace this with your actual database connection and execution logic
    $result = mysqli_query($conn, $query);

    // Display the agent information in a table
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>Phone</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Phone'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No agents found.";
    }
}
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="GET" action="testchat.php">
    <input type="text" name="search" placeholder="Search agents...">
    <button type="submit">Search</button>
</form>

</body>
</html>