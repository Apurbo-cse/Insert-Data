<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                            <div class="col-lg-8 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Basic Slug</h4>
                                        <p class="card-description"> Basic table with card </p>
                                        <div class="table-responsive">
                                            <form action="{{ route('slug.store') }}" method="post" enctype="multipart/form-data">

                                                @csrf

                                                <div class="from-group mb-3">
                                                    <label class="w-25" for="">Title</label>
                                                    <input class="from-control w-50" type="text" name='title' />
                                                </div>

                                                <div class="from-group mb-3">
                                                    <label class="w-25" for="">Summary</label>
                                                    <input class="from-control w-50" type="text" name='summary'  />
                                                </div>


                                                <div class="mb-3">
                                                    <label class="w-25"  for="">Upload Image</label>
                                                    <input type="file" name="image"  class="from-control w-50">

                                                </div>

                                                <div class="from-group mb-3 float-end">
                                                   <button type="submit" class="btn btn-success ">Submit</button>
                                                </div>

                                            </form>
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
