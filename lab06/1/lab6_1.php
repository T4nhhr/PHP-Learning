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
    $sinhVienList = array(
        array('id' => 1, 'name' => 'Nguyen Van A', 'mobile' => '0123456789', 'email' => 'a@example.com'),
        array('id' => 2, 'name' => 'Tran Thi B', 'mobile' => '0987654321', 'email' => 'b@example.com'),
        array('id' => 3, 'name' => 'Le Van C', 'mobile' => '0365478962', 'email' => 'c@example.com'),
        array('id' => 4, 'name' => 'Pham Thi D', 'mobile' => '0543217896', 'email' => 'd@example.com'),
        array('id' => 5, 'name' => 'Vo Van E', 'mobile' => '0789456123', 'email' => 'e@example.com'),
    );

    echo "<table class='table table-striped'>";
    echo "<thead><tr><th>ID</th><th>Name</th><th>Mobile</th><th>Email</th></tr></thead><tbody>";

    foreach ($sinhVienList as $sinhVien) {
        echo "<tr>";
        echo "<td>{$sinhVien['id']}</td>";
        echo "<td>{$sinhVien['name']}</td>";
        echo "<td>{$sinhVien['mobile']}</td>";
        echo "<td>{$sinhVien['email']}</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>