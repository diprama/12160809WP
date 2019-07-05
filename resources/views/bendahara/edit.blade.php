@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Bendahara</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/bendahara/' . $bendahara->id) }}" method="post">
                        {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group">
                                <label for="">Nama Bendahara</label>
                                <input type="text" name="nama_bendahara" class="form-control {{ $errors->has('nama_bendahara') ? 'is-invalid':'' }}" value="{{ $bendahara->nama_bendahara }}" placeholder="Masukkan nama lengkap anda">
                                <p class="text-danger">{{ $errors->first('nama_bendahara') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="address" cols="5" rows="5" class="form-control {{ $errors->has('address') ? 'is-invalid':'' }}" value="{{ $bendahara->address }}"></textarea>
                                <p class="text-danger">{{ $errors->first('address') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid':'' }}" value="{{ $bendahara->phone }}">
                                <p class="text-danger">{{ $errors->first('phone') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" value="{{ $bendahara->email }}" readonly>
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger btn-sm">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection