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

?>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My friends</title>
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

    <!-- Begin header form -->
    <form action="insert-my-friends.php" class="header w-50 container" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-center">
            <h1 class="card p-3 my-4">My friends</h1>
        </div>
        <div class="card row m-0 p-3">
            <div class="Name col-12 p-0">
                <h5>Name:</h5>
                <input id="Name" class="w-100" type="text" placeholder="Ex: Tá Bá Phú" name="Name">
            </div>
            <div class="Phone col-12 p-0">
                <h5>Phone:</h5>
                <input id="Phone" class="w-100" type="text" placeholder="Ex: 0763853612" name="Phone">
            </div>
            <div class="Image col-12 p-0">
                <h5>Image:</h5>
                <label for="Image" class="btn btn-primary w-100">Choose Image</label>
                <input class="d-none" id="Image" type="file" name="Image[]" multiple>
                <div class="gallery-Image"></div>
            </div>
            <div class="Video col-12 p-0">
                <h5>Video:</h5>
                <label for="Video" class="btn btn-primary w-100">Choose Video</label>
                <input class="d-none" id="Video" type="file" name="Video[]" multiple>
                <div class="gallery-Video"></div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="m-3 w-25 btn btn-success" type="submit" name="submit">Add</button>
        </div>
    </form>
    <!-- End header form -->

    <!-- Begin main data -->
    <div class="main container">
        <div class="row m-3">
            <div class="col-2 card d-flex justify-content-center align-items-center">
                <h5>Name</h5>
            </div>
            <div class="col-2 card d-flex justify-content-center align-items-center">
                <h5>Phone</h5>
            </div>
            <div class="col-2 card d-flex justify-content-center align-items-center">
                <h5>Image</h5>
            </div>
            <div class="col-3 card d-flex justify-content-center align-items-center">
                <h5>Video</h5>
            </div>
            <div class="col-3 card d-flex justify-content-center align-items-center">
                <h5>Option</h5>
            </div>
        </div>

        <?php
        $data = "SELECT * FROM data";
        $result = $conn->query($data);
        $LinkImage = ("./images/");
        $LinkVideo = ("./videos/");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="row m-3">
                    <div class="col-2 card d-flex justify-content-center align-items-center">
                        <?= $row["Name"] ?>
                    </div>
                    <div class="col-2 card d-flex justify-content-center align-items-center">
                        <?= $row["Phone"] ?>
                    </div>
                    <div class="col-2 card">
                        <?php
                        $Image = $row["Image"];
                        $arrayImage = explode(', ', $Image);
                        $arrayImageLength = count($arrayImage);
                        for ($i = 0; $i < $arrayImageLength; $i++) {
                            echo "<img class='p-3 w-100 h-100' src='$LinkImage$arrayImage[$i]'>";
                        }
                        ?>
                    </div>
                    <div class="col-3 card">
                        <?php
                        if ($row["Video"] == "") {
                            echo "";
                        } else {
                            $Video = $row["Video"];
                            $arrayVideo = explode(', ', $Video);
                            $arrayVideoLength = count($arrayVideo);
                            for ($i = 0; $i < $arrayVideoLength; $i++) {
                                echo "<video class='p-3 w-100 h-100' src='$LinkVideo$arrayVideo[$i]' controls></video>";
                            }
                        }
                        ?>
                    </div>
                    <div class="col-3 card d-flex justify-content-center align-items-center">
                        <div class="w-100 d-flex justify-content-center">
                            <a class="btn btn-warning m-2 w-25" href="edit-my-friends.php?ID=<?= $row["ID"] ?>">Edit</a>
                            <a class="btn btn-danger m-2 w-50" href="delete-my-friends.php?ID=<?= $row["ID"] ?>">Delete</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <!-- End main data -->

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