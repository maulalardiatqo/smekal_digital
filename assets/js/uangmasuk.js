$(document).ready( function () {
    $('#type').change(function(){
        let value = $('#type').val();
        
        if(value == 1){
            $('#input_id_siswa').removeClass('d-none');
        }else{
            $('#input_id_siswa').addClass('d-none');
        }
    });

    $('#btn-edit').click(function(){
        console.log($(this).data('type'))
        $('#id').val($(this).data('id'))
        $('#type').val($(this).data('type')).change()
        $('#keterangan').val($(this).data('keterangan'))
        $('#jumlah').val($(this).data('jumlah'))
        $('#id_siswa').val($(this).data('id_siswa')).change()
        $('#tanggal_pemasukan').val($(this).data('tanggal_pemasukan'))
    });
} );