<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <x-navbar />
    <div class="mx-5 my-4">
        <div class="d-flex justify-content-between">
            <form class="d-flex" role="search" method="GET" action={{ route('mahasiswa.index') }}>
                <input 
                    class="form-control me-2" 
                    type="search"
                    placeholder="Search" 
                    aria-label="Search"
                    name="search"
                />
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a href={{  route('users.create') }}>
                <button type="button" class="btn btn-primary">Add Users</button>
            </a>
        </div>
        <br>
        <table class="table table-light table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td scope="row">{{$user['id']}}</td>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['role']}}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('users.update', ['id' => $user['id']]) }}">
                                <button type="button" class="btn btn-warning">Edit</button>
                            </a>
                            <form method="post" action="{{ route('users.delete', ['id' => $user['id']]) }}">
                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                                <input type="submit" value="Delete" class="btn btn-danger" />
                            </form>
                        </td>
                @empty
                    <tr>
                        <td colspan="8">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- pagination -->
        {{-- {{ $mahasiswas->links() }} --}}
    </div>
</body>

</html>