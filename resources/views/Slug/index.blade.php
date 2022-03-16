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
    <title>Slug</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-content page-container mt-5" id="page-content">
                    <div class="padding">
                        <div class="row container d-flex justify-content-center">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Basic Slug</h4>
                                        <p class="card-description"> Basic table with card </p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-success">
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th>Title</th>
                                                        <th>Slug</th>
                                                        <th>Summary</th>
                                                        <th>Photo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($slug as $slug)
                                                    <tr>
                                                        <td>{{ $slug->id }}</td>
                                                        <td>{{ $slug->title }}</td>
                                                        <td>{{ $slug->slug }}</td>
                                                        <td>{{ $slug->summary }}</td>
                                                        <td>
                                                            <div style="max-width: 70px; max-height:30px;overflow:hidden ; object-fit:cover">
                                                                <img src="{{ asset($slug->image) }}" class="img-fluid " alt="">
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <a class="btno d-inline-block"
                                                            href="{{ route('slug.edit',$slug->id) }}"><i
                                                                class="fa-solid fa-pen-to-square mx-2 text-success"></i></a>

                                                        <form class="d-inline-block pull-right" method="post"
                                                            action="{{ route('slug.destroy',$slug->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn "
                                                                onclick="return confirm('Are you confirm to delete?')">
                                                                <i class="fa-solid fa-trash-can mx-2 text-danger"></i>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
