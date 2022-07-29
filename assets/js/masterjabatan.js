$(document).ready( function () {

    console.log("TEST");
    // function 
    function setInputForm({id,desc}){
        $('#id').val(id)
        $('#desc').val(desc)
    }
    // function
    
    // event listener
    $('.btn-add').click(function(){
        let data ={
            id : null,
            desc : null
        }
        setInputForm(data)
    })

    $('.btn-edit').click(function(){
        let tanggalPemasukan = new Date($(this).data('tanggalpemasukan'));
        let data ={
            id : $(this).data('id'),
            desc : $(this).data('desc')
        }
        setInputForm(data)
    });

    $('#exampleModal').on('hidden.bs.modal', function () {
        // do something…
        let data ={
            id : null,
            keterangan : null
        }
        setInputForm(data)
    })
    // event listener
} );