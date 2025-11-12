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
            <form method="GET" action="{{ route('absensi.index') }}" class="row g-3">
                <div class="col-md-4">
                    <label for="tanggal_absensi" class="form-label">Tanggal</label>
                    <input type="date" id="tanggal_absensi" name="tanggal_absensi"
                        class="form-control"
                        value="{{ $selectedDate ?? '' }}">
                </div>
                <div class="col-md-5">
                    <label for="matakuliah_id" class="form-label">Mata Kuliah</label>
                    <select id="matakuliah_id" name="matakuliah_id" class="form-select">
                        <option value="">-- Pilih Mata Kuliah --</option>
                        @foreach ($mataKuliahs as $mk)
                            <option value="{{ $mk->id }}" {{ ($selectedMatkul == $mk->id) ? 'selected' : '' }}>
                                {{ $mk->nama_matakuliah }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 align-self-end">
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                </div>
            </form>
            
            <form method="POST" action="{{ route('absensi.store') }}">
                @csrf
                <input type="hidden" name="tanggal_absensi" value="{{ $selectedDate }}">
                <input type="hidden" name="matakuliah_id" value="{{ $selectedMatkul }}">
                <button type="submit" class="btn btn-primary mt-4">Simpan Absensi</button>
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
                @forelse ($mahasiswas as $index => $mhs)
                    @php
                        $status = $existingAbsensi[$mhs->id]->status_absen ?? '';
                    @endphp
                    <tr>
                    <td scope="row">{{$mhs->id}}</td>
                    <td>{{$mhs->name}}</td>
                    <td>
                        @switch($status)
                            @case('H')
                                <span class="badge bg-success">Hadir</span>
                                @break
                            @case('A')
                                <span class="badge bg-danger">Alpa</span>
                                @break
                            @case('I')
                                <span class="badge bg-warning">Izin</span>
                                @break
                            @case('S')
                                <span class="badge bg-secondary">Sakit</span>
                                @break
                            @default
                                <span>-</span>
                        @endswitch
                    </td>
                    <td class="d-flex gap-2">
                        <div class="d-flex gap-3">
                            <label><input type="radio" name="status[{{ $mhs->id }}]" value="H" {{ $status == 'H' ? 'checked' : '' }}> Hadir</label>
                            <label><input type="radio" name="status[{{ $mhs->id }}]" value="A" {{ $status == 'A' ? 'checked' : '' }}> Alpha</label>
                            <label><input type="radio" name="status[{{ $mhs->id }}]" value="I" {{ $status == 'I' ? 'checked' : '' }}> Izin</label>
                            <label><input type="radio" name="status[{{ $mhs->id }}]" value="S" {{ $status == 'S' ? 'checked' : '' }}> Sakit</label>
                        </div>
                    </td>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </form>

    </div>
</body>
</html>