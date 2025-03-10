@extends('layouts.subadmin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tambah data dokter
                    </div>
                    <div class="card-body">
                        <form action="{{ url('pasien', $pasien->id) }}" method="POST">

                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="kode_pasien">Kode pasien</label>
                                <input id="kode_pasien" class="form-control" type="text" name="kode_pasien"
                                    value="{{ $pasien->kode_pasien ?? old('kode_pasien') }}">
                                <span class="text-danger">{{ $errors->first('kode_pasien') }}</span>

                            </div>

                            <div class="form-group">
                                <label for="nama_pasien">Nama pasien</label>
                                <input id="nama_pasien" class="form-control" type="text" name="nama_pasien"
                                    value="{{ $pasien->nama_pasien ?? old('nama_pasien') }}">
                                <span class="text-danger">{{ $errors->first('nama_pasien') }}</span>

                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin">jenis kelamin</label>
                                <select id="jenis_kelamin" class="form-control" name="jenis_kelamin">
                                    @foreach ($jenis_kelamin as $a)
                                        <option value="{{ $a }}" @selected($a == $pasien->jenis_kelamin)>{{ $a }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>

                            </div>

                            <div class="form-group">
                                <label for="status">status</label>
                                <select id="status" class="form-control" name="status">
                                    @foreach ($status as $a)
                                        <option value="{{ $a }}" @selected($a == $pasien->status)>{{ $a }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('status') }}</span>

                            </div>

                            <div class="form-group">
                                <label for="alamat">alamat</label>
                                <input id="alamat" class="form-control" type="text" name="alamat"
                                    value="{{ $pasien->alamat ?? old('alamat') }}">
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
