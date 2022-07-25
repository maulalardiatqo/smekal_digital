$(document).ready( function () {

    // function 
    function setInputForm({id,type,keterangan,jumlah,idSiswa,tanggalPemasukan}){
        $('#id').val(id)
        $('#type').val(type).change()
        $('#keterangan').val(keterangan)
        $('#jumlah').val(jumlah)
        $('#id_siswa').val(idSiswa).change()
        document.getElementById('tanggal_pemasukan').valueAsDate = tanggalPemasukan;
    }
    // function
    
    // event listener
    $('#type').change(function(){
        let value = $('#type').val();
        
        if(value == 1){
            $('#input_id_siswa').removeClass('d-none');
        }else{
            $('#input_id_siswa').addClass('d-none');
        }
    });

    $('.btn-edit').click(function(){
        let tanggalPemasukan = new Date($(this).data('tanggalpemasukan'));
        let data ={
            id : $(this).data('id'),
            type : $(this).data('type'),
            keterangan : $(this).data('keterangan'),
            jumlah : $(this).data('jumlah'),
            idSiswa : $(this).data('id_siswa'),
            tanggalPemasukan : tanggalPemasukan
        }
        setInputForm(data)
    });

    $('#exampleModal').on('hidden.bs.modal', function () {
        // do something…
        let tanggalPemasukan = new Date();
        let data ={
            id : '',
            type : 0,
            keterangan : '',
            jumlah : '',
            idSiswa : 0,
            tanggalPemasukan : tanggalPemasukan
        }
        setInputForm(data)
    })
    // event listener
} );