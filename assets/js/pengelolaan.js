$(document).ready( function () {

    console.log("TEST");
    // function 
    function setInputForm({id,type,desc}){
        $('#id').val(id)
        $('#type').val(type).change()
        $('#desc').val(desc)
    }
    // function
    
    // event listener
    $('.btn-add').click(function(){
        let data ={
            id : null,
            type : $(this).data('type'),
            desc : null
        }
        setInputForm(data)
    })

    $('.btn-edit').click(function(){
        let tanggalPemasukan = new Date($(this).data('tanggalpemasukan'));
        let data ={
            id : $(this).data('id'),
            type : $(this).data('type'),
            desc : $(this).data('desc')
        }
        setInputForm(data)
    });

    $('#exampleModal').on('hidden.bs.modal', function () {
        // do something…
        let data ={
            id : null,
            type : null,
            keterangan : null
        }
        setInputForm(data)
    })
    // event listener
} );