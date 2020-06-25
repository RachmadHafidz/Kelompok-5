const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal({
        title: 'Data Notaris',
        text: 'Berhasil' + flashData,
        type="success"
    });
}