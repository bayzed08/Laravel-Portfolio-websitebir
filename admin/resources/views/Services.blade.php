@extends('Layout.app')
@section('title','Service')
@section('content')
  <div class="container d-none" id="mainDiv">
    <div class="row">
        <div class="col-md-12">
            <div class="my-3">
                <button class="btn btn-outline-danger" id="addbtnid">Add  New Service</button>
            </div>
            <table class="table table-striped table-bordered w-100 mt-3">
                <thead>
                    <tr>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                      </tr>
                </thead>
                <tbody id="servicdatatab" class="w-100">
                    {{-- @foreach ($servicesDataKey as $service)
                    <tr>
                        <th class="th-sm"><img class="table-img" src="{{ url($service->service_img) }}"></th>
                        <th class="th-sm">{{ $service->service_name }}</th>
                        <th class="th-sm">{{ $service->service_des  }}</th>
                        <th class="th-sm"><a href="" ><i class="fas fa-edit"></i></a></th>
                        <th class="th-sm"><a href="" ><i class="fas fa-trash-alt"></i></a></th>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>

        </div>
    </div>
  </div>
  <div class="container" id="spinDiv">
    <div class="row">
        <div class="col-md-12 text-center mt-lg-5">
            <img style="width: 100px;height: auto;" src="{{ asset('images/loader.svg') }}" alt="" srcset="">
            <h2>Loading...................</h2>
        </div>
    </div>
  </div>
  <div class="container d-none" id="WrongDiv">
    <div class="row">
        <div class="col-md-12">
            <h2>Something Went Wrong</h2>
        </div>
    </div>
  </div>
  {{-- <!-- Modal DELETE --> --}}
 <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body text-center text-danger pt-3">
            <h5>Do you want to delete ???</h5>
            <h5 id="idshow" class="d-none"></h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
          <button id="serviceConfirmBtnModal" type="button" class="btn btn-sm btn-danger">Yes</button>
        </div>
      </div>
    </div>
  </div>
    {{-- <!-- Modal ADD service --> --}}
 <div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body text-center text-danger pt-3">
            <h5>Add New Sevice</h5>
            <div class="form-row">
                <div id="addform" class="form-group w-100">
                    <input type="text" class="form-control m-2" id="addServiceNameID" placeholder="Service Name">
                    <input type="text" class="form-control m-2" id="addServiceDescID" placeholder="Service Description">
                    <input type="text" class="form-control m-2" id="AddImgLinkid" placeholder="Service Img link">
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Cancel</button>
          <button id="addserviceBtnModal" type="button" class="btn btn-sm btn-outline-info">Add</button>
        </div>
      </div>
    </div>
  </div>

      {{-- <!-- Modal EDIT/UPDATE service --> --}}
 <div class="modal fade " id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body text-center text-danger pt-3">
            <h5>EDit/Update Sevice</h5>
            <h5 id="editID"></h5>
            <div class="form-row text-center">
                <div id="servicEditForm" class="form-group w-100 d-none">
                    <input type="text" class="form-control m-2" id="editServiceNameID" placeholder="Service Name">
                    <input type="text" class="form-control m-2" id="editServiceDescID" placeholder="Service Description">
                    <input type="text" class="form-control m-2" id="editImgLinkid" placeholder="Service Img link">
                </div>
                {{-- //Loader and wrong message div --}}
                <div id="serviceEditLoader" class="col-md-12 text-center mt-lg-5">
                    <img style="width: 100px;height: auto;" src="{{ asset('images/loader.svg') }}" alt="" srcset="">
                    <h2>Loading...................</h2>
                </div>
                <div id="servicEditeWrong" class="col-md-12 d-none">
                    <h2>Something Went Wrong</h2>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-primary" data-dismiss="modal">Cancel</button>
          <button id="EditModalConfirmID" type="button" class="btn btn-sm btn-outline-info">Save</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script type="text/javascript">
    getServiceDataToservice();
    //Get all Services Data
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
                                "<td class='th-sm'><a class='serviceEditIconid' data-id=" + datajson[i].id +"><i class='fas fa-edit'></i></a></td>" +
                                "<td class='th-sm'><a class='serviceDeleteIconid' data-id=" + datajson[i].id +"><i class='fas fa-trash-alt'></i></a></td>"
                        ).appendTo("#servicdatatab");
                });
                //delete btn click result
                $(".serviceDeleteIconid").click(function (e) {
                    var id = $(this).data("id");
                    $('#idshow').html(id);
                    $("#deleteModal").modal("show");
                });
                //Edit btn click result
                $(".serviceEditIconid").click(function (e) {
                    var id = $(this).data("id");
                    $('#editID').val(id);
                    serviceDetails(id);
                    $("#editModal").modal("show");
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


//Delete Modal yes button to delete service data
$("#serviceConfirmBtnModal").click(function (e) {
    var id2 = $('#idshow').html();
    getServiceDelete(id2);
});

//dalete service data
function getServiceDelete(deleteID) {
    $('#serviceConfirmBtnModal').html(`<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>
        Deleteing...`);
    axios
        .post("/deleteservicedata", {
            id: deleteID
        })
        .then(function (response) {
            $('#serviceConfirmBtnModal').html(`Delete`);
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

//Details service data for EDIT MODAL
function serviceDetails(detailsid){
    axios
    .post("//detailsservice", {
        id: detailsid
    })
    .then(function (response) {
        if (response.status==200) {
            $('#servicEditForm').removeClass('d-none');
            $('#serviceEditLoader').addClass('d-none');

            var jsondata=response.data;
            $('#editServiceNameID').val(jsondata[0].service_name);
            $('#editServiceDescID').val(jsondata[0].service_des);
            $('#editImgLinkid').val(jsondata[0].service_img);
        } else {
            $('#serviceEditLoader').addClass('d-none');
            $('#servicEditeWrong').removeClass('d-none');
        }
    })
    .catch(function (error) {
            $('#serviceEditLoader').addClass('d-none');
            $('#servicEditeWrong').removeClass('d-none');
    });
}
//EDIT Modal  Save button to edit/update service data
$("#EditModalConfirmID").click(function (e) {
    var id2 = $('#editID').val();
    var sname = $('#editServiceNameID').val();
    var sdesc = $('#editServiceDescID').val();
    var simglink = $('#editImgLinkid').val();
    serviceupdate(id2,sname,sdesc,simglink);
});

//Service update function
function serviceupdate(sid,sname,sdesc,simglink) {
    if (sname.length==0) {
        toastr.error("Service name Empty");
    }
    else if(sdesc.length==0) {
        toastr.error("Service Description Empty");
    }
    else if(simglink.length==0) {
        toastr.error("Service Img link Empty");
    }
    else{
        $('#EditModalConfirmID').html(`<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>
        Editing...`);
        axios.post('/updateservice',{id:sid,sName:sname,sDescription:sdesc,sImgLink:simglink})
        .then(function (response) {
         $('#EditModalConfirmID').html(`Save`);
         if (response.status==200) {

             if (response.data==1) {
                 $('#editModal').modal('hide');
                 toastr.success('Successfully data updated');
                 getServiceDataToservice()
             } else {
                 ('#editModal').modal('hide');
                 toastr.error('data insertion Fail');
                 getServiceDataToservice()
             }

         } else {
             ('#editModal').modal('hide');
             toastr.error('Data not updated');
         }


        }).catch(function (error) {
            ('#editModal').modal('hide');
             toastr.error('Something Wrong');
        });

    }


}

//Add button to show add service modal
$('#addbtnid').click(function (e) {
    e.preventDefault();
    $('#addModal').modal('show');
});

//Modal add btn to insert new service
$('#addserviceBtnModal').click(function (e) {
    e.preventDefault();
    var Servicename= $('#addServiceNameID').val();
    var Servicedesc= $('#addServiceDescID').val();
    var ServiceImgLink= $('#AddImgLinkid').val();
    NewServiceInsertToDB(Servicename,Servicedesc,ServiceImgLink);
});

//new service add function
function NewServiceInsertToDB(Servicename,Servicedesc,ServiceImgLink) {
    if (Servicename.length==0) {
        toastr.error("Service name Empty");
    } else if(Servicedesc.length==0) {
        toastr.error("Service Description Empty");
    } else if(ServiceImgLink.length==0){
        toastr.error("Service Image link Empty");
    }
    else{
       $('#addserviceBtnModal').html(`<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>
       Adding...`);
       axios.post('/addnewservice',{ServiceName:Servicename,ServiceDesc:Servicedesc,ServiceImgLink:ServiceImgLink})
       .then(function (response) {
        $('#addserviceBtnModal').html(`Add`);
        if (response.status==200) {
            if (response.data==1) {
                $('#addModal').modal('hide');
                toastr.success('Successfully data inserted');
                getServiceDataToservice();
                //reset add modal input value
                $('#addServiceNameID').val('');
                $('#addServiceDescID').val('');
                $('#AddImgLinkid').val('');
            } else {
                ('#addModal').modal('hide');
                toastr.error('data insertion Fail');
                getServiceDataToservice();
                $('#addServiceNameID').val('');
                $('#addServiceDescID').val('');
                $('#AddImgLinkid').val('');
            }

        } else {
            ('#addModal').modal('hide');
            toastr.error('New Service Not added');
        }


       }).catch(function (error) {
        ('#addModal').modal('hide');
        toastr.error('Something Went wrong');

       })
    }

}

</script>

@endsection
