<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        table td {
            padding-block: 0.5rem;
        }
        table td label {
            width: 10rem;
        }
        .form-check {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="bg-dark text-white p-4">
        <div class="d-flex align-items-center gap-3">
            <a href={{ route('users.index') }}><i class="fa fa-arrow-left mr-2 text-white fs-5" aria-hidden="true"></i></a>
            <h2>Create User</h2>
        </div>
        <form action="{{ route('users.store') }}" method="POST" class="mt-3">
            @csrf
            <table>
                <tr>
                    <td><label for="name" class="form-label">Nama</label></td>
                    <td><input type="text" class="form-control" id="name" name="name"></td>
                </tr>
                <tr>
                    <td><label for="email" class="form-label">Email</label></td>
                    <td><input type="email" class="form-control" id="email" name="email"></td>
                </tr>
                <tr>
                    <td><label for="password" class="form-label">Password</label></td>
                    <td><input type="password" class="form-control" id="password" name="password"></td>
                </tr>
                <tr>
                    <td><label for="role" class="form-label">Role</label></td>
                    <td class="d-flex flex-column">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="mahasiswa" value="Mahasiswa">
                            <label class="form-check-label" for="mahasiswa">Mahasiswa</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="dosen" value="Dosen">
                            <label class="form-check-label" for="dosen">Dosen</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="admin" value="Admin">
                            <label class="form-check-label" for="admin">Admin</label>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="d-flex justify-content-between mt-3 mx-5">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil Menambahkan User!",
                text: "{{ session('success')}}",
                icon: "success"
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                title: "Gagal Menambahkan User!",
                html: `{!! implode('<br>', $errors->all()) !!}`,
                text: "Terdapat kesalahan pada inputan.",
                icon: "error",
                confirmButtonText: "Perbaiki",
            });
        </script>
    @endif
</body>
</html>