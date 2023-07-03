//Show visitor data
$(document).ready(function () {
    $("#VisitorDt").DataTable();
    $(".dataTables_length").addClass("bs-select");
});

//Get All Course Data

function getCourseData() {
    axios
        .get("/getcoursesdata")
        .then(function (response) {
            if (response.status == 200) {

                $("#mainDiv").removeClass("d-none");
                $("#spinDiv").addClass("d-none");
                var datajson = response.data;
                $('#courseTableBody').empty();
                $.each(datajson, function (i) {
                    $("<tr>")
                        .html(
                            "<td class='th-sm'>" + datajson[i].course_name +"</td>" +
                            "<td class='th-sm'>" + datajson[i].course_fee +"</td>" +
                            "<td class='th-sm'>" + datajson[i].course_totalclass +"</td>" +
                            "<td class='th-sm'>" + datajson[i].course_totalenroll +"</td>" +
                            "<td class='th-sm'><a class='courseDetailsIconid' data-id=" + datajson[i].id +"><i class='fas fa-eye'></i></a></td>" +
                            "<td class='th-sm'><a class='courseEditIconid' data-id=" + datajson[i].id +"><i class='fas fa-edit'></i></a></td>" +
                            "<td class='th-sm'><a class='courseDeleteIconid' data-id=" + datajson[i].id +"><i class='fas fa-trash-alt'></i></a></td>"
                        ).appendTo("#courseTableBody");
                });
                // //delete btn click result
                // $(".serviceDeleteIconid").click(function (e) {
                //     var id = $(this).data("id");
                //     $('#idshow').html(id);
                //     $("#deleteModal").modal("show");
                // });
                // //Edit btn click result
                // $(".serviceEditIconid").click(function (e) {
                //     var id = $(this).data("id");
                //     $('#editID').val(id);
                //     serviceDetails(id);
                //     $("#editModal").modal("show");
                // });

            } else {
                // $("#WrongDiv").removeClass("d-none");
                // $("#spinDiv").addClass("d-none");
            }
        })
        .catch(function (error) {
            // $("#WrongDiv").removeClass("d-none");
            // $("#spinDiv").addClass("d-none");
        });
}
