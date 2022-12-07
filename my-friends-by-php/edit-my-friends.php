<?php

header("Content-type: text/html; charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "my_friends";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'UTF8');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ID = $_GET["ID"];
$result = mysqli_query($conn, "SELECT * FROM data WHERE ID = $ID");
$row = mysqli_fetch_array($result);

if (isset($_POST["Submit"])) {
    $Name = $_POST["Name"];
    $Phone = $_POST["Phone"];

    if ($_FILES['Image']['name'][0] !== "") {
        $countImage = count($_FILES['Image']['name']);
        $Image = array();
        for ($i = 0; $i < $countImage; $i++) {
            $tmpImagePath = $_FILES['Image']['tmp_name'][$i];
            $linkImage = "images/";
            $tmpImagePathNew = $linkImage . $_FILES['Image']['name'][$i];
            if ($tmpImagePath != "") {
                $newImagePath = $_FILES['Image']['name'][$i];
                if (move_uploaded_file($tmpImagePath, $tmpImagePathNew)) {
                    array_push($Image, $newImagePath);
                };
            };
        };
        $Image = implode(", ", $Image);
    } else {
        $Image = $row["Image"];
    }

    if ($_FILES['Video']['name'][0] !== "") {
        $countVideo = count($_FILES['Video']['name']);
        $Video = array();
        for ($i = 0; $i < $countVideo; $i++) {
            $tmpVideoPath = $_FILES['Video']['tmp_name'][$i];
            $linkVideo = "videos/";
            $tmpVideoPathNew = $linkVideo . $_FILES['Video']['name'][$i];
            if ($tmpVideoPath != "") {
                $newVideoPath = $_FILES['Video']['name'][$i];
                if (move_uploaded_file($tmpVideoPath, $tmpVideoPathNew)) {
                    array_push($Video, $newVideoPath);
                };
            }
        }
        $Video = implode(", ", $Video);
    } else {
        $Video = $row["Video"];
    }

    $sql = "UPDATE data SET Name = '$Name', Phone = '$Phone', Image = '$Image', Video = '$Video' WHERE ID = '$ID'";
    if ($conn->query($sql) === TRUE) {
        echo "Sửa dữ liệu thành công";
        header('location:index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edit my friends</title>
    <link rel="icon" href="./images/1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body {
            background: url(./images/bg.jpg);
            background-size: cover;
        }
    </style>

</head>

<body>

    <!-- Begin form edit -->
    <form class="w-50 container" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-center">
            <h1 class="card p-3 my-4">Edit my friends</h1>
        </div>
        <div class="card row m-0 border p-3">
            <div class="Name col-12 p-0">
                <h5>Name:</h5>
                <input id="Name" class="w-100" type="text" placeholder="Ex: Tá Bá Phú" name="Name" value="<?= $row["Name"] ?>">
            </div>
            <div class="Phone col-12 p-0">
                <h5>Phone:</h5>
                <input id="Phone" class="w-100" type="text" placeholder="Ex: tabaphu0@gmail.com" name="Phone" value="<?= $row["Phone"] ?>">
            </div>
            <div class="Image col-12 p-0">
                <h5>Image:</h5>
                <label for="Image" class="Image btn btn-primary w-100">Choose Image</label>
                <input class="d-none" id="Image" type="file" name="Image[]" multiple>
                <input class="d-none" type="text" name="Image[]" value="<?= $row["Image"] ?>">
                <div class="gallery-Image"></div>
            </div>
            <div class="Video col-12 p-0">
                <h5>Video:</h5>
                <label for="Video" class="Video btn btn-primary w-100">Choose Video</label>
                <input class="d-none" id="Video" type="file" name="Video[]" multiple>
                <input class="d-none" type="text" name="Video[]" value="<?= $row["Video"] ?>">
                <div class="gallery-Video"></div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="m-3 w-25 btn btn-success" type="submit" name="Submit" value="submit">Save</button>
        </div>
    </form>
    <!-- End form edit -->

    <!-- Begin preview image, video -->
    <script>
        $(function() {
            var imagesPreview = function(input, placeToInsertImagePreview) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).attr('class', 'col-3 w-100 h-100').appendTo(placeToInsertImagePreview);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };

            $('#Image').on('change', function() {
                imagesPreview(this, 'div.gallery-Image');
            });
        });


        $(function() {
            var videosPreview = function(input, placeToInsertvideoPreview) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<video></video>')).attr('src', event.target.result).attr('class', 'col-3 w-100 h-100').attr('controls', '').appendTo(placeToInsertvideoPreview);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };

            $('#Video').on('change', function() {
                videosPreview(this, 'div.gallery-Video');
            });
        });

        $(function() {

            $('#Image').click(function() {
                $('.gallery-Image').html('')
            })

            $('#Video').click(function() {
                $('.gallery-Video').html('')
            })

        })
    </script>
    <!-- End preview image, video -->

</body>

</html>