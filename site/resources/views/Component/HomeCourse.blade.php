<div class="container section-marginTop text-center">
    <h1 class="section-title">All Courses </h1>
    <h1 class="section-subtitle">SSC HSC and Basic IT related Course</h1>
    <div class="row">
        @foreach ($courseDataKey as $course)
        <div class="col-md-4 thumbnail-container">
            <img class="thumbnail-image" src="{{ $course->course_img }}" alt="HELLO" srcset="">
            <div class="thumbnail-middle">
                 <h3 class="thumbnail-title">{{ $course->course_name }}</h3>
                 <h3 class="thumbnail-subtitle">Total Class: {{ $course->course_totalclass }}</h3>
                 <h5 class="thumbnail-subtitle">Course Fee: {{ $course->course_fee}}/=</h5>
                 <button class="normal-btn btn btn-sm">শুরু করুন</button>
                 <button class="btn btn-sm btn-light">Details</button>
            </div>
        </div>
        @endforeach

    </div>
</div>
