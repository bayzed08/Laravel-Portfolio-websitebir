//Show visitor data
$(document).ready(function () {
    $("#VisitorDt").DataTable();
    $(".dataTables_length").addClass("bs-select");
});

function getServiceDataToservice() {
    axios
        .get("/getservicedata")
        .then(function (response) {
            if (response.status == 200) {
                $("#mainDiv").removeClass("d-none");
                $("#spinDiv").addClass("d-none");
                var datajson = response.data;
                $('#servicdatatab').empty();
                $.each(datajson, function (i) {
                    $("<tr>")
                        .html(
                            "<td class='th-sm'><img class='table-img' src=" + datajson[i].service_img +"></td>" +
                                "<td class='th-sm'>" + datajson[i].service_name +"</td>" +
                                "<td class='th-sm'>" + datajson[i].service_des +"</td>" +
                                "<td class='th-sm'><a><i class='fas fa-edit'></i></a></td>" +
                                "<td class='th-sm'><a class='serviceDeleteIconid' data-id=" + datajson[i].id +"><i class='fas fa-trash-alt'></i></a></td>"
                        ).appendTo("#servicdatatab");
                });

                //delete btn click result
                $(".serviceDeleteIconid").click(function (e) {
                    var id = $(this).data("id");
                    $('#idshow').html(id);
                    $("#deleteModal").modal("show");
                });

            } else {
                $("#WrongDiv").removeClass("d-none");
                $("#spinDiv").addClass("d-none");
            }
        })
        .catch(function (error) {
            $("#WrongDiv").removeClass("d-none");
            $("#spinDiv").addClass("d-none");
        });
}


//Modal yes button to delete service data
$("#serviceConfirmBtnModal").click(function (e) {
    var id2 = $('#idshow').html();
    getServiceDelete(id2);
});

//dalete service data
function getServiceDelete(deleteID) {
    axios
        .post("/deleteservicedata", {
            id: deleteID
        })
        .then(function (response) {
            if (response.data == 1) {
                $("#deleteModal").modal("hide");
                toastr.success("Successfully deleted");
                getServiceDataToservice();
            } else {
                $("#deleteModal").modal("hide");
                toastr.error("Fail to Delete");
                getServiceDataToservice();
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}
