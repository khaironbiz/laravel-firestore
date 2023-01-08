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
                    @include('test._form')
                    <tr>
                        <td colspan="3">
                            <a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
                            <button type="submit" class="btn btn-success">Update</button>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Delete
                            </button>
                        </td>
                    </tr>
                </form>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('user.destroy', ['id' => $user->id()]) }}" method="post">
                                @csrf
                                <div class="modal-header bg-danger">Delete Data</div>
                                <div class="modal-body">
                                    <input type="checkbox"> Saya menyetujui penghapusan data ini
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </table>
        </div>

    </div>

</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
