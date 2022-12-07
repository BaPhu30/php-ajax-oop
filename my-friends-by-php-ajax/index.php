<?php

include 'config.php';

?>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My friends</title>
    <link rel="icon" href="./images/1.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
            $data = "SELECT * FROM data LIMIT 2";
            $result = $conn->query($data);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="row m-3">
                        <div class="d-none">
                            <?= $row["ID"] ?>
                        </div>
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
                            $LinkImage = ("./images/");
                            for ($i = 0; $i < $arrayImageLength; $i++) {
                                echo "<img class='p-2 w-100 h-100' src='$LinkImage$arrayImage[$i]'>";
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
                                $LinkVideo = ("./videos/");
                                for ($i = 0; $i < $arrayVideoLength; $i++) {
                                    echo "<video class='p-2 w-100 h-100' src='$LinkVideo$arrayVideo[$i]' controls></video>";
                                }
                            }
                            ?>
                        </div>
                        <div class="col-3 card d-flex justify-content-center align-items-center">
                            <div class="w-100 d-flex justify-content-center">
                                <button class="get-data-edit btn btn-warning m-2 w-50" id="edit_<?= $row["ID"] ?>" data-toggle='modal' data-target='#modal-edit'>Edit</button>
                                <button class="delete-data btn btn-danger m-2 w-50" id="delete_<?= $row["ID"] ?>">Delete</button>
                            </div>
                        </div>
                    </div>
            <?php
                }
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

    <!-- Begin preview image, video modal -->
    <script>
        $(function() {

            var imagesPreview = function(input, placeToInsertImagePreview) {
                if (input.files) {
                    var filesAmount = input.files.length
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).attr('class', 'col-3 w-50 h-50').appendTo(placeToInsertImagePreview);
                        }
                        reader.readAsDataURL(input.files[i])
                    }
                }
            }

            $('#image-add').on('change', function() {
                imagesPreview(this, 'div.gallery-image-add');
            })

            $('#image-edit').on('change', function() {
                imagesPreview(this, 'div.gallery-image-edit');
            })

        });

        $(function() {

            var videosPreview = function(input, placeToInsertvideoPreview) {
                if (input.files) {
                    var filesAmount = input.files.length
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<video></video>')).attr('src', event.target.result).attr('class', 'col-3 w-50 h-50').attr('controls', '').appendTo(placeToInsertvideoPreview);
                        }
                        reader.readAsDataURL(input.files[i])
                    }
                }
            }

            $('#video-add').on('change', function() {
                videosPreview(this, 'div.gallery-video-add')
            })

            $('#video-edit').on('change', function() {
                videosPreview(this, 'div.gallery-video-edit')
            })

        })

        $(function() {

            $('#x-modal-add').click(function() {
                $('.gallery-image-add').html('')
                $('.gallery-video-add').html('')
            })

            $('#close-modal-add').click(function() {
                $('.gallery-image-add').html('')
                $('.gallery-video-add').html('')
            })

            $('#insert-data').click(function() {
                $('.gallery-image-add').html('')
                $('.gallery-video-add').html('')
            })

            $('#image-add').click(function() {
                $('.gallery-image-add').html('')
            })

            $('#video-add').click(function() {
                $('.gallery-video-add').html('')
            })

            $('#x-modal-edit').click(function() {
                $('.gallery-image-edit').html('')
                $('.gallery-video-edit').html('')
            })

            $('#close-modal-edit').click(function() {
                $('.gallery-image-edit').html('')
                $('.gallery-video-edit').html('')
            })

            $('#edit-data').click(function() {
                $('.gallery-image-edit').html('')
                $('.gallery-video-edit').html('')
            })

            $('#image-edit').click(function() {
                $('.gallery-image-edit').html('')
            })

            $('#video-edit').click(function() {
                $('.gallery-video-edit').html('')
            })

        })
    </script>
    <!-- End preview image, video modal -->

    <!-- Begin ajax -->
    <script>
        $(document).ready(function() {

            $('#get-data').click(function() {
                $('#get-data').hide()
                $getData = $("#result")
                $getData.html('')

                $.ajax({
                    type: 'GET',
                    url: 'get-data.php',
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(k) {
                            $ID = data[k].ID
                            $Name = data[k].Name
                            $Phone = data[k].Phone
                            $LinkImage = ("./images/")
                            $LinkVideo = ("./videos/")
                            $divImage = ""
                            $divVideo = ""

                            $Image = (data[k].Image).split(", ")
                            $countImage = $Image.length
                            for ($i = 0; $i < $countImage; $i++) {
                                $divImage += ("<img class='p-2 w-100 h-100' src='" + $LinkImage + $Image[$i] + "'>")
                            }


                            if (data[k].Video == "") {
                                $divVideo == ""
                            } else {
                                $Video = (data[k].Video).split(", ")
                                $countVideo = $Video.length
                                for ($i = 0; $i < $countVideo; $i++) {
                                    $divVideo += ("<video class='p-2 w-100 h-100' src='" + $LinkVideo + $Video[$i] + "' controls></video>")
                                }
                            }

                            $getData.append(
                                $(
                                    "<div class='row m-3'>" +
                                    "<div class='d-none'>" + data[k].ID + "</div>" +
                                    "<div class='col-2 card d-flex justify-content-center align-items-center'>" + data[k].Name + "</div>" +
                                    "<div class='col-2 card d-flex justify-content-center align-items-center'>" + data[k].Phone + "</div>" +
                                    "<div class='col-2 card'>" + $divImage + "</div>" +
                                    "<div class='col-3 card'>" + $divVideo + "</div>" +
                                    "<div class='col-3 card d-flex justify-content-center align-items-center'>" +
                                    "<div class='w-100 d-flex justify-content-center'>" +
                                    "<button class='get-data-edit btn btn-warning m-2 w-50' id='edit_" + data[k].ID + "' data-toggle='modal' data-target='#modal-edit'>Edit</button>" +
                                    "<button class='delete-data btn btn-danger m-2 w-50' id='delete_" + data[k].ID + "'>Delete</button>" +
                                    "</div>" +
                                    "</div>"
                                )
                            )
                        })
                    }
                })
            })

            $('#insert-data').click(function(e) {
                e.preventDefault()
                let Form = new FormData()
                let Name = $("#name-add").val()
                Form.append("Name", Name)
                let Phone = $("#phone-add").val()
                Form.append("Phone", Phone)
                let ArrayImages = $("#image-add").get(0).files
                for (let i = 0; i < ArrayImages.length; i++) {
                    Form.append("File[]", ArrayImages[i]);
                }
                let ArrayVideo = $("#video-add").get(0).files;
                for (let i = 0; i < ArrayVideo.length; i++) {
                    Form.append("File[]", ArrayVideo[i]);
                }

                $.ajax({
                    type: 'POST',
                    url: 'insert.php',
                    dataType: "text",
                    async: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    data: Form,
                    success: function(data) {
                        $("#name-add").val('')
                        $("#phone-add").val('')
                        $('#get-data').click()
                    }
                })
            })


            $(document).on("click", ".get-data-edit", function() {
                let id = ($(this).attr("id")).slice(5)
                $.ajax({
                    type: 'GET',
                    url: 'get-data-edit.php',
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(k, val) {
                            $("#id-edit").val(data[k].ID)
                            $("#name-edit").val(data[k].Name)
                            $("#phone-edit").val(data[k].Phone)
                            $("#get-image-old").val(data[k].Image)
                            $("#get-video-old").val(data[k].Video)
                        })
                    }
                })
            })


            $('#edit-data').click(function(e) {
                e.preventDefault()
                let Form = new FormData()
                let ID = $("#id-edit").val()
                Form.append("ID", ID)
                let Name = $("#name-edit").val()
                Form.append("Name", Name)
                let Phone = $("#phone-edit").val()
                Form.append("Phone", Phone)
                let ImageOld = $("#get-image-old").val()
                Form.append("ImageOld", ImageOld)
                let VideoOld = $("#get-video-old").val()
                Form.append("VideoOld", VideoOld)
                let ArrayImages = $("#image-edit").get(0).files
                for (let i = 0; i < ArrayImages.length; i++) {
                    Form.append("File[]", ArrayImages[i]);
                }
                let ArrayVideo = $("#video-edit").get(0).files;
                for (let i = 0; i < ArrayVideo.length; i++) {
                    Form.append("File[]", ArrayVideo[i]);
                }

                $.ajax({
                    type: 'POST',
                    url: 'edit.php',
                    dataType: "text",
                    async: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    data: Form,
                    success: function(data) {
                        $('#get-data').click()
                    }
                })
            })

            $(document).on("click", ".delete-data", function() {
                let id = ($(this).attr("id")).slice(7)
                $.ajax({
                    type: "POST",
                    url: 'delete.php',
                    data: {
                        'id': id
                    },
                    cache: false,
                    success: function(data) {
                        $('#get-data').click()
                    }
                })
            })

        })
    </script>
    <!-- End ajax -->

</body>

</html>