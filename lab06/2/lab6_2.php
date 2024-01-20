<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 6_2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php

    $studentList = array(
        array('id' => 1, 'name' => 'Nguyen Van A', 'mobile' => '0123456789', 'email' => 'a@example.com'),
        array('id' => 2, 'name' => 'Tran Thi B', 'mobile' => '0987654321', 'email' => 'b@example.com'),
        array('id' => 3, 'name' => 'Le Van C', 'mobile' => '0365478962', 'email' => 'c@example.com'),
        array('id' => 4, 'name' => 'Pham Thi D', 'mobile' => '0543217896', 'email' => 'd@example.com'),
        array('id' => 5, 'name' => 'Vo Van E', 'mobile' => '0789456123', 'email' => 'e@example.com'),
    );

    function showDetails($student)
    {
        echo "<div class='modal' tabindex='-1' id='detailsModal{$student['id']}'>";
        echo "<div class='modal-dialog'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title'>Detail Informaiton</h5>";
        echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<p>ID: {$student['id']}</p>";
        echo "<p>Name: {$student['name']}</p>";
        echo "<p>Mobile: {$student['mobile']}</p>";
        echo "<p>Email: {$student['email']}</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }

    function addStudent($name, $mobile, $email)
    {
        global $studentList;
        $newStudentId = count($studentList) + 1;
        $newStudent = array('id' => $newStudentId, 'name' => $name, 'mobile' => $mobile, 'email' => $email);
        array_push($studentList, $newStudent);
    }

    function editStudent($id, $name, $mobile, $email)
    {
        global $studentList;
        foreach ($studentList as &$student) {
            if ($student['id'] == $id) {
                $student['name'] = $name;
                $student['mobile'] = $mobile;
                $student['email'] = $email;
                break;
            }
        }
    }

    function deleteStudent($id)
    {
        global $studentList;
        $studentList = array_values(array_filter($studentList, function ($student) use ($id) {
            return $student['id'] != $id;
        }));
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['action'])) {
            $action = $_POST['action'];

            switch ($action) {
                case 'add':
                    $name = $_POST['name'];
                    $mobile = $_POST['mobile'];
                    $email = $_POST['email'];
                    addStudent($name, $mobile, $email);
                    break;

                case 'edit':
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $mobile = $_POST['mobile'];
                    $email = $_POST['email'];
                    editStudent($id, $name, $mobile, $email);
                    break;

                case 'delete':
                    $id = $_POST['id'];
                    deleteStudent($id);
                    break;

            }
        }
    }
    echo "<div class='container'>";
    echo "<h2 class='mt-4 ms-2' >Student Management</h2>";
    echo "<button type='button' class='btn btn-outline-success float-end' data-bs-toggle='modal' data-bs-target='#addStudentModal'>Add New Student</button>";
    echo "<table class='table table-striped'>";
    echo "<thead><tr><th>ID</th><th>Name</th><th>Mobile</th><th>Email</th><th>Action</th></tr></thead><tbody>";

    foreach ($studentList as $student) {
        echo "<tr>";
        echo "<td>{$student['id']}</td>";
        echo "<td>{$student['name']}</td>";
        echo "<td>{$student['mobile']}</td>";
        echo "<td>{$student['email']}</td>";
        echo "<td>
            <a href='#' data-bs-toggle='modal' data-bs-target='#detailsModal{$student['id']}' class='text-decoration-none'>View</a> | 
            <a href='#' data-bs-toggle='modal' data-bs-target='#editStudentModal{$student['id']}' class='text-decoration-none'>Edit</a> | 
            <form method='post' style='display:inline;'>
                <input type='hidden' name='id' value='{$student['id']}'>
                <input type='hidden' name='action' value='delete'>
                <button type='submit' onclick='return confirm(\"Are you sure?\")' style='border: none; background: none; color: red; cursor: pointer;'>Delete</button>
            </form>
          </td>";
        echo "</tr>";

        showDetails($student);
        echo "<div class='modal' tabindex='-1' id='editStudentModal{$student['id']}'>";
        echo "<div class='modal-dialog'>";
        echo "<div class='modal-content'>";
        echo "<div class='modal-header'>";
        echo "<h5 class='modal-title'>Edit Student</h5>";
        echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
        echo "</div>";
        echo "<div class='modal-body'>";
        echo "<form method='post'>
         <input type='hidden' name='action' value='edit'>
         <input type='hidden' name='id' value='{$student['id']}'>
         <div class='mb-3'>
             <label for='editName' class='form-label'>Name</label>
             <input type='text' class='form-control' id='editName' name='name' value='{$student['name']}' required>
         </div>
         <div class='mb-3'>
             <label for='editMobile' class='form-label'>Phone</label>
             <input type='text' class='form-control' id='editMobile' name='mobile' value='{$student['mobile']}' required>
         </div>
         <div class='mb-3'>
             <label for='editEmail' class='form-label'>Email</label>
             <input type='email' class='form-control' id='editEmail' name='email' value='{$student['email']}' required>
         </div>
         <button type='submit' class='btn btn-primary'>Save Changes</button>
     </form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }


    echo "</tbody></table>";
    echo "</div>";
    ?>

    <!-- Add Student Modal -->
    <div class="modal" tabindex="-1" id="addStudentModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <input type="hidden" name="action" value="add">
                        <div class="mb-3">
                            <label for="addName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="addName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="addMobile" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="addMobile" name="mobile" required>
                        </div>
                        <div class="mb-3">
                            <label for="addEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="addEmail" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Link to Bootstrap JS and Popper.js (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>