

$(document).ready(function(){
    $('#VisitorDt').DataTable();
    $('.dataTables_length').addClass('bs-select');
});


function getServiceDataToservice(){

    axios.get('/getservicedata')
    .then(function(response){
        if (response.status==200) {
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
                    "<td class='th-sm'><a href='' ><i class='fas fa-trash-alt'></i></a></td>"
                ).appendTo('#servicdatatab');

            });

        } else {
            $('#WrongDiv').removeClass('d-none');
            $('#spinDiv').addClass('d-none');

        }
    })
    .catch(function(error){
        $('#WrongDiv').removeClass('d-none');
            $('#spinDiv').addClass('d-none');

    });
}
