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

    function calculateBill(){
        let tagihan = $('#tagihan').val()
        let bayar = $('#jumlah').val()
        let kurang = Number(tagihan) - Number(bayar)
        if(kurang > 0){
            $('#kurang').val(kurang)
            $('#container-kurang').removeClass('d-none')
        }else{
            $('#container-kurang').addClass('d-none')
        }
    }
    // function
    
    // event listener
    $('#type').change(function(){
        let value = $('#type').val();
        
        if(value == 1){
            $('#input_id_siswa').removeClass('d-none');
            $('#container-tagihan').removeClass('d-none');

        }else{
            $('#input_id_siswa').addClass('d-none');
            $('#container-tagihan').addClass('d-none');
        }
    });

    $('#id_siswa').change(function(){
        var optionSelected = $("option:selected", this);
        let jumlahTagihan =optionSelected.data('jumlahtagihan')
        $('#tagihan').val(jumlahTagihan)
    })

    $('#jumlah').on('input',function(){
        calculateBill()
    })

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

    $('#filter-pemasukan').change(function(){
        let value = $('#filter-pemasukan').val();
        console.log(value)
        let url=$('#base_url').val();
        if(value == 'pemasukan_tetap'){
            $('#filter-pemasukan-tetap').removeClass('d-none');
        }else{
            $('#btn-filter').attr('href', `${url}admin/uangmasuk/lainya`)
        }
        $('#btn-filter').removeClass('d-none')
    })

    $('#filter-pemasukan-tetap').change(function(){
        let value = $('#filter-pemasukan-tetap').val();
        let url=$('#base_url').val();
        $('#btn-filter').attr('href', `${url}admin/uangmasuk/${value !== 0 && value}`)
    });

    // event listener
} );