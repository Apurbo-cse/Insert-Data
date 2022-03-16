<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <a href="{{ url('student') }}" class="btn btn-danger btn-sm 5 mt-5  px-4 float-end">Back</a>
            </div>

            <div class="col-md-6">
                <div class="card-body">

                    <form action="{{ route('student.update',$student->id) }}" method="post" enctype="multipart/form-data">

                        @csrf
                        @method('put')

                        <div class="from-group mb-3">
                            <label class="w-25" for="">Student Name</label>
                            <input class="from-control w-50" type="text" name='name' value="{{$student->name}}"/>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="from-group mb-3">
                            <label class="w-25" for="">Email</label>
                            <input class="from-control w-50" type="email" name='email'  value="{{$student->email}}"/>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="from-group mb-3">
                            <label class="w-25" for="">Course</label>
                            <input class="from-control w-50" type="text" name='course' value="{{$student->course}}"/>
                            @error('course')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="from-group mb-3">
                            <label class="w-25" for="">Section</label>
                            <input class="from-control w-50" type="text" name='section' value="{{$student->section}}"/>
                            @error('section')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="w-25"  for="">Upload Image</label>
                            <input type="file" name="image"  class="from-control w-50">
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @if($student->image != null)
                                <img src="{{ asset($student->image) }}" width="20%">
                            @endif
                        </div>

                        <div class="from-group mb-3 float-end">
                           <button type="submit" class="btn btn-success ">Submit</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</body>
</html>
