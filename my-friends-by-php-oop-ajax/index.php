<?php

include_once("classes/crud.php");

$crud = new crud();

$query = "SELECT * FROM data LIMIT 2";

$result = $crud->getData($query);

?>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My friends</title>

    <!-- Link icon youtube -->
    <link rel="icon" href="./images/1.png">

    <!-- Link css bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Link js bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Background -->
    <style>
        body {
            background: url(./images/bg.jpg);
            background-size: cover;
        }
    </style>

</head>

<body>

    <!-- Begin header -->
    <div class="header w-50 container">
        <div class="d-flex justify-content-center">
            <h1 class="card p-3 m-3">My friends</h1>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary p-3 m-3" data-toggle="modal" data-target="#modal-add">Are you my friends?</button>
        </div>
    </div>
    <!-- End header -->

    <!-- Begin main -->
    <div class="main container">
        <div class="row m-3">
            <div class="col-2 card d-flex justify-content-center align-items-center">
                <h4>Name</h4>
            </div>
            <div class="col-2 card d-flex justify-content-center align-items-center">
                <h4>Phone</h4>
            </div>
            <div class="col-2 card d-flex justify-content-center align-items-center">
                <h4>Image</h4>
            </div>
            <div class="col-3 card d-flex justify-content-center align-items-center">
                <h4>Video</h4>
            </div>
            <div class="col-3 card d-flex justify-content-center align-items-center">
                <h4>Option</h4>
            </div>
        </div>
        <div id="result">
            <?php
            foreach ($result as $key => $res) {
            ?>
                <div class="row m-3">
                    <div class="d-none">
                        <?= $res["ID"] ?>
                    </div>
                    <div class="col-2 card d-flex justify-content-center align-items-center">
                        <?= $res["Name"] ?>
                    </div>
                    <div class="col-2 card d-flex justify-content-center align-items-center">
                        <?= $res["Phone"] ?>
                    </div>
                    <div class="col-2 card">
                        <?php
                        $Image = $res["Image"];
                        $arrayImage = explode(', ', $Image);
                        $arrayImageLength = count($arrayImage);
                        $LinkImage = ("./images/");
                        for ($i = 0; $i < $arrayImageLength; $i++) {
                            echo "<img class='p-2 w-100 h-100' src='$LinkImage$arrayImage[$i]'>";
                        }
                        ?>
                    </div>
                    <div class="col-3 card">
                        <?php
                        if ($res["Video"] == "") {
                            echo "";
                        } else {
                            $Video = $res["Video"];
                            $arrayVideo = explode(', ', $Video);
                            $arrayVideoLength = count($arrayVideo);
                            $LinkVideo = ("./videos/");
                            for ($i = 0; $i < $arrayVideoLength; $i++) {
                                echo "<video class='p-2 w-100 h-100' src='$LinkVideo$arrayVideo[$i]' controls></video>";
                            }
                        }
                        ?>
                    </div>
                    <div class="col-3 card d-flex justify-content-center align-items-center">
                        <div class="w-100 d-flex justify-content-center">
                            <button class="get-data-edit btn btn-warning m-2 w-50" id="edit_<?= $res["ID"] ?>" data-toggle='modal' data-target='#modal-edit'>Edit</button>
                            <button class="delete-data btn btn-danger m-2 w-50" id="delete_<?= $res["ID"] ?>">Delete</button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn btn-info w-50 m-3 p-3" id="get-data"><i class="fa-solid fa-arrow-down pr-1"></i>See more</button>
        </div>
    </div>
    <!-- End main -->

    <!-- Begin modal add -->
    <div class="modal fade bd-example-modal-lg" id="modal-add" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-content modal-lg">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">My friends</h2>
                <button id="x-modal-add" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row m-0">
                        <div class="col-12">
                            <h4>Name:</h4>
                            <input id="name-add" class="w-100" type="text" placeholder="Ex: Tá Bá Phú">
                        </div>
                        <div class="col-12">
                            <h4>Phone:</h4>
                            <input id="phone-add" class="w-100" type="text" placeholder="Ex: 0763853612">
                        </div>
                        <div class="col-12">
                            <h4>Image:</h4>
                            <label for="image-add" class="btn btn-primary w-100 col-12">Choose Image</label>
                            <input id="image-add" class="d-none" type="file" multiple>
                            <div class="gallery-image-add"></div>
                        </div>
                        <div class="col-12">
                            <h4>Video:</h4>
                            <label for="video-add" class="btn btn-primary w-100 col-12">Choose Video</label>
                            <input id="video-add" class="d-none" type="file" multiple>
                            <div class="gallery-video-add"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="close-modal-add" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="insert-data" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
    <!-- End modal add -->

    <!-- Begin modal edit -->
    <div class="modal fade bd-example-modal-lg" id="modal-edit" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-content modal-lg">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLongTitle">Edit</h2>
                <button id="x-modal-edit" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row m-0">
                        <div class="d-none">
                            <input id="id-edit" type="text">
                        </div>
                        <div class="col-12">
                            <h4>Name:</h4>
                            <input id="name-edit" class="w-100" type="text" placeholder="Ex: Tá Bá Phú">
                        </div>
                        <div class="col-12">
                            <h4>Phone:</h4>
                            <input id="phone-edit" class="w-100" type="text" placeholder="Ex: 0763853612">
                        </div>
                        <div class="col-12">
                            <h4>Image:</h4>
                            <label for="image-edit" class="btn btn-primary w-100 col-12">Choose Image</label>
                            <input id="image-edit" class="d-none" type="file" multiple>
                            <input id="get-image-old" class="d-none" type="text">
                            <div class="gallery-image-edit"></div>
                        </div>
                        <div class="col-12">
                            <h4>Video:</h4>
                            <label for="video-edit" class="btn btn-primary w-100 col-12">Choose Video</label>
                            <input id="video-edit" class="d-none" type="file" multiple>
                            <input id="get-video-old" class="d-none" type="text">
                            <div class="gallery-video-edit"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="close-modal-edit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="edit-data" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
    <!-- End modal edit -->

    <!-- Link js -->
    <script src="./js/index.js"></script>

</body>

</html>