@extends('Layout.app')
@section('title','Course')
@section('content')
<div class="container d-none" id="mainDiv">
    <div class="row">
        <div class="col-md-12">
            <div class="my-3">
                <button class="btn btn-outline-danger" id="addbtnid">Add  New Course</button>
            </div>
            <table class="table table-striped table-bordered w-100 mt-3">
                <thead>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Fee(Tk)</th>
                        <th class="th-sm">Class</th>
                        <th class="th-sm">Enrol</th>
                        <th class="th-sm">Details</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                      </tr>
                </thead>
                <tbody id="courseTableBody" class="w-100">
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
getCourseData();
</script>

@endsection
