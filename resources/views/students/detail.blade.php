 @extends('layout.app') {{-- Optional, remove if not using layouts --}}

 @section('content')
 <title>Edit Student</title>
 <link rel="stylesheet" href="{{ asset('stu/css/bootstrap.min.css') }}">
 </head>

 <body>
    <div class="container mt-5">
       <div class="container">
          <div class="card bg-info" style="width:30rem;">
             <div class="card-header fs-3  text-center b-1 Major: {{ $student->major->name }}">
                <h5>Student Information</h5>
             </div>

             <ul class="list-group list-group-flush fs-5 b-2">
                <li class="list-group-item border-primary">Number: {{ $student->number }}</li>
                <li class="list-group-item border-primary">Name: {{ $student->name }}</li>
                <li class="list-group-item border-primary">Year: {{ $student->year }}</li>
                <li class="list-group-item border-primary">Major: {{ $student->major->name }}</li>
             </ul>
          </div>
          <h4 class="mt-4">Subjects under this Major:</h4>

          @if ($student->major->subjects->count())
          <ul class="list-group ">
             @foreach ($student->major->subjects as $subject)
             <li class="list-group-item border-primary fs-">{{ $subject->name }}</li>
             @endforeach
          </ul>
          @else
          <p>No subjects found for this major.</p>
          @endif
       </div>
       @endsection