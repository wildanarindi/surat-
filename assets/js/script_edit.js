$(function(){

    $('.tombolTambahData').on('click', function() {
        $('#formModalLabel').html('Tambah Surat Masuk');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });

    $('.tampilModalUbah').on('click', function() {
        $('#formModalLabel').html('Ubah Surat Masuk');
        $('.modal-footer button[type=submit]').html('Ubah Data');

        const id = $(this).data('id_tc_surat_masuk');
        console.log(id);
    });

});