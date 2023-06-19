

$(document).ready(function(){
    $('#VisitorDt').DataTable();
    $('.dataTables_length').addClass('bs-select');
});


function getServiceDataToservice(){

    axios.get('/getservicedata')
    .then(function(response){
        if (response.status==200) {
            aler
            $('#mainDiv').removeClass('d-none');
            $('#spinDiv').addClass('d-none');
            var datajson=response.data;
            $.each(datajson, function (i)
            {
                $('<tr>').html(
                    "<td class='th-sm'><img class='table-img' src="+datajson[i].service_img +"></td>"+
                    "<td class='th-sm'>"+datajson[i].service_name+"</td>"+
                    "<td class='th-sm'>"+datajson[i].service_des+"</td>"+
                    "<td class='th-sm'><a href='' ><i class='fas fa-edit'></i></a></td>" +
                    "<td class='th-sm'><a class='serviceDeletebtnid' data-id="+datajson[i].id +"><i class='fas fa-trash-alt'></i></a></td>"
                ).appendTo('#servicdatatab');

            });

            $('.serviceDeletebtnid').click(function (e) {
                var id=$(this).data('id');
                $('#serviceConfirmBtnModal').attr('data-id', id);
                $('#deleteModal').modal('show');
            });

        } else {
            $('#WrongDiv').removeClass('d-none');
            $('#spinDiv').addClass('d-none');
        }
    })
    .catch(function(error){
        $('#WrongDiv').removeClass('d-none');
            $('#spinDiv').addClass('d-none');

    })
}

$('#serviceConfirmBtnModal').click(function (e) {
    var id=$(this).data('id');
    alert(id);
    getServiceDelete(id);
});

function getServiceDelete(deleteID){
    alert(deleteID);
    axios.post('/deleteservicedata',{id:deleteID})
    .then(function(response){
        if (response.data==1) {
            alert("Success");
        } else {
            alert("Fail");
        }

    })
    .catch(function(error){

    })
}
