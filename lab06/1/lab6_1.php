<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 6_1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student_management";
    $initialDataInserted = false;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create the database if it doesn't exist
        $checkDatabaseQuery = "SHOW DATABASES LIKE '$dbname'";
        $result = $conn->query($checkDatabaseQuery);

        if ($result->rowCount() == 0) {
            $createDatabaseQuery = "CREATE DATABASE $dbname";
            $conn->exec($createDatabaseQuery);
        }

        $conn->exec("USE $dbname");

        // if table not created then do it
        $checkTableQuery = "SHOW TABLES LIKE 'students'";
        $result = $conn->query($checkTableQuery);
        if ($result->rowCount() == 0) {
            $createTableQuery = "
            CREATE TABLE students (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                mobile VARCHAR(20) NOT NULL,
                email VARCHAR(255) NOT NULL
            )
        ";
            $initialDataInserted = true;
            $conn->exec($createTableQuery);
        }

        $studentList = array(
            array('id' => 1, 'name' => 'Nguyen Van A', 'mobile' => '0123456789', 'email' => 'a@example.com'),
            array('id' => 2, 'name' => 'Tran Thi B', 'mobile' => '0987654321', 'email' => 'b@example.com'),
            array('id' => 3, 'name' => 'Le Van C', 'mobile' => '0365478962', 'email' => 'c@example.com'),
            array('id' => 4, 'name' => 'Pham Thi D', 'mobile' => '0543217896', 'email' => 'd@example.com'),
            array('id' => 5, 'name' => 'Vo Van E', 'mobile' => '0789456123', 'email' => 'e@example.com'),
        );

        //insert data to table
        if ($initialDataInserted) {
            foreach ($studentList as $student) {
                $name = $student['name'];
                $mobile = $student['mobile'];
                $email = $student['email'];

                $sql = "INSERT INTO students (name, mobile, email) VALUES (:name, :mobile, :email)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':mobile', $mobile);
                $stmt->bindParam(':email', $email);

                $stmt->execute();
            }
        }

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    function fetchStudentList()
    {
        global $conn;
        $stmt = $conn->query("SELECT * FROM students");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    echo "<div class='container'>";
    echo "<h2 class='mt-4 ms-2' >Student Management</h2>";
    echo "<table class='table table-striped'>";
    echo "<thead><tr><th>ID</th><th>Name</th><th>Mobile</th><th>Email</th></tr></thead><tbody>";

    $studentList = fetchStudentList();
    foreach ($studentList as $student) {
        echo "<tr>";
        echo "<td>{$student['id']}</td>";
        echo "<td>{$student['name']}</td>";
        echo "<td>{$student['mobile']}</td>";
        echo "<td>{$student['email']}</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
    echo "</div>";

    $conn = null;
    ?>

    <!-- Link to Bootstrap JS and Popper.js (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>