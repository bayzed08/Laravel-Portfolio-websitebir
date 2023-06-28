@extends('Layout.app')
@section('content')
  <div class="container d-none" id="mainDiv">
    <div class="row">
        <div class="col-md-12">
            <div class="my-3">
                <button class="btn btn-outline-danger" id="addbtnid">Add  New Service</button>
            </div>
            <table class="table table-striped table-bordered w-100 mt-4">
                <thead>
                    <tr>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                      </tr>
                </thead>
                <tbody id="servicdatatab">
                    @foreach ($servicesDataKey as $service)
                    <tr>
                        <th class="th-sm"><img class="table-img" src="{{ url($service->service_img) }}"></th>
                        <th class="th-sm">{{ $service->service_name }}</th>
                        <th class="th-sm">{{ $service->service_des  }}</th>
                        <th class="th-sm"><a href="" ><i class="fas fa-edit"></i></a></th>
                        <th class="th-sm"><a href="" ><i class="fas fa-trash-alt"></i></a></th>
                    </tr>
                    @endforeach

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
                <div class="form-group w-100">
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
@endsection

@section('script')
<script type="text/javascript">
    getServiceDataToservice();
</script>

@endsection
