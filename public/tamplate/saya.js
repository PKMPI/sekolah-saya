window.setTimeout(function () {
    $(".alert").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove()
    })
}, 10000)

function lihat() {
    const gambar = document.querySelector('.image_user');//gambar
    const label = document.querySelector('.custom-file-label');
    const image = document.querySelector('#image');//input

    label.textContent = image.files[0].name;

    const fileSampul = new FileReader();
    fileSampul.readAsBinaryString(image.files[0]);


    // fileSampul.onload = function (e) {
    //     gambar.src = e.target.result;
    //     console.log(e.target.result);
    // }
}

