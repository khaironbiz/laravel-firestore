<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h4>Daftar Nama Pengguna</h4>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-striped">
                <form action="{{ route('user.update', ['id' => $user->id()]) }}" method="post">
                    @csrf
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="form-control" name="nama" value="{{ $user['nama'] }}">
                            @error('nama')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="form-control" name="email" value="{{ $user['email'] }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="form-control" name="phone" value="{{ $user['phone'] }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><button type="submit" class="btn btn-success">Update</button></td>
                    </tr>

                </form>

            </table>
        </div>

    </div>

</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
