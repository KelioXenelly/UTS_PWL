<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mata Kuliah</title>
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
                <input 
                    class="form-control me-2" 
                    type="search"
                    placeholder="Search" 
                    aria-label="Search"
                    name="search"
                />
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a href={{  route('mata-kuliah.create') }}>
                <button type="button" class="btn btn-primary">Add Mata Kuliah</button>
            </a>
        </div>
        <br>
        <table class="table table-striped table-striped-columns">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Kode Mk</th>
                <th scope="col">Nama Mk</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                @forelse ($mataKuliahs as $mataKuliah)
                    <tr>
                    <td scope="row">{{$mataKuliah->id}}</td>
                    <td>{{$mataKuliah->kode}}</td>
                    <td>{{$mataKuliah->nama_matakuliah}}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('mata-kuliah.show', ['id' => $mataKuliah['id']]) }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>
                        <form method="post" action="{{ route('mata-kuliah.delete', ['id' => $mataKuliah['id']]) }}">
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <input type="submit" value="Delete" class="btn btn-danger" />
                        </form>
                    </td>
                @empty
                    <tr>
                        <td colspan="5">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- pagination -->
        {{-- {{ $mataKuliahs->links() }} --}}
    </div>
</body>
</html>