@extends('layouts.subadmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        {{ $judul }}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>code pasien</th>
                                    <th>nama pasien</th>
                                    <th>jenis kelamin</th>
                                    <th>status</th>
                                    <th>alamat</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($pasien as $pas)
                                    <tr>
                                        <td>{{ $pas->id }}</td>
                                        <td>{{ $pas->kode_pasien }}</td>
                                        <td>{{ $pas->nama_pasien }}</td>
                                        <td>{{ $pas->jenis_kelamin }}</td>
                                        <td>{{ $pas->status }}</td>
                                        <td>{{ $pas->alamat }}</td>
                                        <td class="text-center d-flex gap-2">
                                            <a href="{{ url('pasien/' . $pas->id . '/edit') }}"
                                                class="btn btn-primary">Edit</a>

                                            <form action="{{ url('pasien/' . $pas->id) }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini ?');">

                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $pasien->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
