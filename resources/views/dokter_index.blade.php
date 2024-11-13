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
                                    <th>code dokter</th>
                                    <th>nama dokter</th>
                                    <th>spesialis</th>
                                    <th>Created</th>
                                    <th>Nomor Hp</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($dokter as $dok)
                                    <tr>
                                        <td>{{ $dok->id }}</td>
                                        <td>{{ $dok->kode_dokter }}</td>
                                        <td>{{ $dok->nama_dokter }}</td>
                                        <td>{{ $dok->spesialis }}</td>
                                        <td>{{ $dok->nomor_hp }}</td>
                                        <td>{{ $dok->created_at }}</td>
                                        <td class="text-center d-flex gap-2">
                                            <a href="{{ url('dokter/' . $dok->id . '/edit') }}"
                                                class="btn btn-primary">Edit</a>

                                            <form action="{{ url('dokter/' . $dok->id) }}" method="POST" class="d-inline"
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
                        {{ $dokter->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
