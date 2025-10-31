<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
<body>
    <x-navbar />
    <div class="mx-5 my-4">
        <div class="d-flex justify-content-between">
            <form class="d-flex" role="search" method="GET" action={{ route('mata-kuliah.index') }}>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="tanggal_absensi">Tanggal:</label>
                        <input type="date" id="tanggal_absensi" name="tanggal_absensi" class="form-control mt-2">
                    </div>
                    <div class="col-md-6">
                        <label for="matakuliah">Mata Kuliah:</label>
                        <select 
                            class="form-select mt-2" 
                            aria-label="Default select example" 
                            name="matakuliah"
                            id="matakuliah"
                        >
                            <option value="" selected>Pilih Mata Kuliah</option>
                            @foreach ($mataKuliahs as $mataKuliah)
                                <option value={{ $mataKuliah->nama_matakuliah }}>{{ $mataKuliah->nama_matakuliah }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
            <a href={{  route('absensi.store') }}>
                <button type="button" class="btn btn-primary mt-2">Save Absensi</button>
            </a>
        </div>
        <br>
        <table class="table table-striped table-striped-columns">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Mahasiswa</th>
                <th scope="col">Kehadiran</th>
                <th scope="col">Status</th>
            </thead>
            <tbody>
                @forelse ($mahasiswas as $mahasiswa)
                    <tr>
                    <td scope="row">{{$mahasiswa->id}}</td>
                    <td>{{$mahasiswa->name}}</td>
                    <td>-</td>
                    <td class="d-flex gap-2">
                        <input type="radio" value="A"> Alpha
                        <input type="radio" value="H"> Hadir
                        <input type="radio" value="I"> Izin
                        <input type="radio" value="S"> Sakit
                    </td>
                @empty
                    <tr>
                        <td colspan="5">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>