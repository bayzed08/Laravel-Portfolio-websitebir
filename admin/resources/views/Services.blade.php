@extends('Layout.app')
@section('content')
  <div class="container d-none" id="mainDiv">
    <div class="row">
        <div class="col-md-12">
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
@endsection

@section('script')
<script type="text/javascript">
    getServiceDataToservice();
</script>

@endsection
