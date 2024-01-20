<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "<script>alert('The file " . htmlspecialchars(basename($_FILES['image']['name'])) . " has been uploaded.');</script>";
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 4_1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data" id="uploadForm" class="text-center mt-4">
        <label for="image" class="d-block pb-3">Upload an image</label>
        <input type="file" name="image" id="image" accept="image/*">
    </form>

    <div class="text-center">
        <?php
        $target_dir = "uploads/";
        $images = glob($target_dir . "*");

        foreach ($images as $image) {
            echo '<img src="' . $image . '" alt="Uploaded Image" style="max-width: 300px; max-height: 300px; margin: 10px;">';
        }
        ?>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#image').change(function () {
                $('#uploadForm').submit();
            });
        });
    </script>
</body>

</html>