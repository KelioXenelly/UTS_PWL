<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Mata Kuliah</title>
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
            <a href={{ route('mata-kuliah.index') }}><i class="fa fa-arrow-left mr-2 text-white fs-5" aria-hidden="true"></i></a>
            <h2>Update Mata Kuliah</h2>
        </div>
        <form action="{{ route('mata-kuliah.update', ['id' => $mataKuliah['id']]) }}" method="POST" class="mt-3">
            @csrf
            @method('PATCH')
            <table>
                <tr>
                    <td><label for="kode" class="form-label">Kode MK</label></td>
                    <td>
                        <input type="text" class="form-control" id="kode" name="kode"
                        value="{{ old('kode', $mataKuliah->kode)}}">
                    </td>
                </tr>
                <tr>
                    <td><label for="nama_matakuliah" class="form-label">Nama MK</label></td>
                    <td>
                        <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah" 
                        value="{{ old('nama_matakuliah', $mataKuliah->nama_matakuliah) }}">
                    </td>
                </tr>
            </table>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil Memperbarui Mahasiswa!",
                text: "{{ session('success')}}",
                icon: "success"
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                title: "Gagal Memperbarui Mahasiswa!",
                html: `{!! implode('<br>', $errors->all()) !!}`,
                text: "Terdapat kesalahan pada inputan.",
                icon: "error",
                confirmButtonText: "Perbaiki",
            });
        </script>
    @endif
</body>
</html>