<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <div class="row">

            <div class="col-md-12">
                <a href="{{ url('student/create') }}" class="btn btn-primary btn-sm mt-5 px-3  float-end">Add
                    Student</a>
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Course</th>
                            <th scope="col">Section</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($students as $student)
                        <tr>
                            <th scope="row">{{$student->id }}</th>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->course }}</td>
                            <td>{{ $student->section }}</td>
                            <td>
                                <div style="max-width: 70px; max-height:30px;overflow:hidden ; object-fit:cover">
                                    <img src="{{ asset($student->image) }}" class="img-fluid " alt="">
                                </div>
                            </td>

                            <td>

                                <a class="btn btn-info d-inline-block"
                                    href="{{ route('student.edit',$student->id) }}"><i
                                        class="fa-solid fa-pen-to-square mx-2 text-success"></i></a>

                                <form class="d-inline-block pull-right" method="post"
                                    action="{{ route('student.destroy',$student->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Are you confirm to delete?')">
                                        <i class="fa-solid fa-trash-can mx-2 text-light"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>

                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</body>

</html>
