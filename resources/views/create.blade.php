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

            <div class="col-md-12">
                <div class="card-body">
                    <form action="" method="Post">
                        <div class="from-group mb-3">
                            <label for="">Student Name</label>
                            <input class="from-control" type="text" name='name'/>
                        </div>
                        <div class="from-group mb-3">
                            <label for="">Email</label>
                            <input class="from-control" type="email" name='email'/>
                        </div>

                        <div class="from-group mb-3">
                            <label for="">Course</label>
                            <input class="from-control" type="text" name='course'/>
                        </div>

                        <div class="from-group mb-3">
                            <label for="">Section</label>
                            <input class="from-control" type="text" name='section'/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
