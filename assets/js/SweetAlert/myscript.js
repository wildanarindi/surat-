const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal({
        title: 'Data',
        text: 'Berhasil ' + flashData,
        type: 'success'
    });
}

// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin',
        text: "data akan dihapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});

document.querySelector(".sweet").addEventListener("click", function () {
    swal({
        title: "Anda bukan admin",
        text: "Kembali !.",
        imageUrl: 'thumbs-up.jpg'
    });
});

document.querySelector(".third").addEventListener("click", function () {
    swal({
        title: "Profile Picture",
        text: "Do you want to make the above image your profile picture?",
        imageUrl: "https://images3.imgbox.com/4f/e6/wOhuryw6_o.jpg",
        imageWidth: 550,
        imageHeight: 225,
        imageAlt: "Eagle Image",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        confirmButtonColor: "#00ff55",
        cancelButtonColor: "#999999",
        reverseButtons: true,
    });
});

document.querySelector(".fourth").addEventListener("click", function () {
    swal({
        title: "Alert Set on Timer",
        text: "This alert will disappear after 3 seconds.",
        position: "bottom",
        backdrop: "linear-gradient(yellow, orange)",
        background: "white",
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        showConfirmButton: false,
        showCancelButton: false,
        timer: 3000
    });
});
