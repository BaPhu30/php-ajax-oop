// Priview img, video
var imagesPreview = function (input, placeToInsertImagePreview) {
    if (input.files) {
        var filesAmount = input.files.length
        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
            reader.onload = function (event) {
                $($.parseHTML('<img>')).attr('src', event.target.result).attr('class', 'col-3 w-50 h-50').appendTo(placeToInsertImagePreview);
            }
            reader.readAsDataURL(input.files[i])
        }
    }
}

$('#image-add').on('change', function () {
    imagesPreview(this, 'div.gallery-image-add');
})

$('#image-edit').on('change', function () {
    imagesPreview(this, 'div.gallery-image-edit');
})



var videosPreview = function (input, placeToInsertvideoPreview) {
    if (input.files) {
        var filesAmount = input.files.length
        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
            reader.onload = function (event) {
                $($.parseHTML('<video></video>')).attr('src', event.target.result).attr('class', 'col-3 w-50 h-50').attr('controls', '').appendTo(placeToInsertvideoPreview);
            }
            reader.readAsDataURL(input.files[i])
        }
    }
}

$('#video-add').on('change', function () {
    videosPreview(this, 'div.gallery-video-add')
})

$('#video-edit').on('change', function () {
    videosPreview(this, 'div.gallery-video-edit')
})



$('#x-modal-add').click(function () {
    $('.gallery-image-add').html('')
    $('.gallery-video-add').html('')
})

$('#close-modal-add').click(function () {
    $('.gallery-image-add').html('')
    $('.gallery-video-add').html('')
})

$('#insert-data').click(function () {
    $('.gallery-image-add').html('')
    $('.gallery-video-add').html('')
})

$('#image-add').click(function () {
    $('.gallery-image-add').html('')
})

$('#video-add').click(function () {
    $('.gallery-video-add').html('')
})

$('#x-modal-edit').click(function () {
    $('.gallery-image-edit').html('')
    $('.gallery-video-edit').html('')
})

$('#close-modal-edit').click(function () {
    $('.gallery-image-edit').html('')
    $('.gallery-video-edit').html('')
})

$('#edit-data').click(function () {
    $('.gallery-image-edit').html('')
    $('.gallery-video-edit').html('')
})

$('#image-edit').click(function () {
    $('.gallery-image-edit').html('')
})

$('#video-edit').click(function () {
    $('.gallery-video-edit').html('')
})
// End preview img, video


// See more
$("#get-data").click(function () {
    $("#get-data").hide()
    $getData = $("#result")
    $getData.html("")

    $.ajax({
        type: 'GET',
        url: 'get-data.php',
        dataType: "json",
        success: function (data) {
            $.each(data, function (k) {
                $ID = data[k].ID
                $Name = data[k].Name
                $Phone = data[k].Phone
                $LinkImage = ("./images/")
                $LinkVideo = ("./videos/")
                $divImage = ""
                $divVideo = ""

                $Image = data[k].Image.split(", ")
                $countImage = $Image.length
                if ($countImage > 0) {
                    for ($i = 0; $i < $countImage; $i++) {
                        $divImage += (`<img class="p-2 w-100 h-100" src="${$LinkImage}${$Image[$i]}">`)
                    }
                }

                if (data[k].Video == "") {
                    $divVideo == ""
                } else {
                    $Video = (data[k].Video).split(", ")
                    $countVideo = $Video.length
                    for ($i = 0; $i < $countVideo; $i++) {
                        $divVideo += (`<video class="p-2 w-100 h-100" src="${$LinkVideo}${$Video[$i]}" controls></video>`)
                    }
                }

                $getData.append(
                    $(
                        `<div class="row m-3">
                        <div class="d-none">${data[k].ID}</div>
                        <div class="col-2 card d-flex justify-content-center align-items-center">${data[k].Name}</div>
                        <div class="col-2 card d-flex justify-content-center align-items-center">${data[k].Phone}</div>
                        <div class="col-2 card">${$divImage}</div>
                        <div class="col-3 card">${$divVideo}</div>
                        <div class="col-3 card d-flex justify-content-center align-items-center">
                            <div class="w-100 d-flex justify-content-center">
                                <button class="get-data-edit btn btn-warning m-2 w-50" id="edit_${data[k].ID}" data-toggle="modal" data-target="#modal-edit">Edit</button>
                                <button class="delete-data btn btn-danger m-2 w-50" id="delete_${data[k].ID}">Delete</button>
                            </div>
                        </div>`
                    )
                )
            })
        }
    })
})
// End see more


// Insert data
$("#insert-data").click(function (e) {
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
        success: function (data) {
            $("#name-add").val("")
            $("#phone-add").val("")
            $("#get-data").click()
        }
    })
})
// End insert data


// Edit data
// Get data edit
$(document).on("click", ".get-data-edit", function () {
    let id = ($(this).attr("id")).slice(5)
    $.ajax({
        type: 'GET',
        url: 'get-data-edit.php',
        data: { 'id': id },
        dataType: "json",
        success: function (data) {
            $.each(data, function (k, val) {
                $("#id-edit").val(data[k].ID)
                $("#name-edit").val(data[k].Name)
                $("#phone-edit").val(data[k].Phone)
                $("#get-image-old").val(data[k].Image)
                $("#get-video-old").val(data[k].Video)
            })
        }
    })
})
// End get data edit
// Update data
$('#edit-data').click(function (e) {
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
        success: function (data) {
            $('#get-data').click()
        }
    })
})
// End update data
// End edit data


// Delete data
$(document).on("click", ".delete-data", function () {
    let id = ($(this).attr("id")).slice(7)
    $.ajax({
        type: "POST",
        url: 'delete.php',
        data: { 'id': id },
        cache: false,
        success: function (data) {
            $('#get-data').click()
        }
    })
})
// End delete data