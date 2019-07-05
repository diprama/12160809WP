@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Manajemen Data Bendahara</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url('/bendahara/new') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {!! session('success') !!}
                            </div>
                        @endif
                <table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>Kode Bendahara</th>           
            <th>Nama Bendahara</th>
            <th>No Telp</th>
            <th>Alamat</th>
            <th>Email</th>
            <th colspan="2">Aksi</th> <!-- MODIFIKASI INI DENGAN MENAMBAHKAN COLSPAN -->
        </tr>
    </thead>
    <tbody>
        @forelse($bendaharas as $bendahara)
        <tr>
            <td>{{ $bendahara->kode_bendahara }}</td>
            <td>{{ $bendahara->nama_bendahara }}</td>
            <td>{{ $bendahara->phone }}</td>
            <td>{{ str_limit($bendahara->address, 50) }}</td>
            <td><a href="mailto:{{ $bendahara->email }}">{{ $bendahara->email }}</a></td>
            <td>
                <form action="{{ url('/bendahara/' . $bendahara->id) }}" method="POST">
                {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" class="form-control">
                    <a href="{{ url('/bendahara/' . $bendahara->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
            
            <!-- [... TAMBAHKAN FORM INI ...] -->
            <!-- KARENA YANG DIBUTUHKAN METHOD POST MAKA KITA MEMASUKKANNYA KEDALAM FORM -->
            <td>
                <form action="{{ route('invoice.store') }}" method="post">
                {{ csrf_field() }}
                    <input type="hidden" name="bendahara_id" value="{{ $bendahara->id }}" class="form-control">
                    <button class="btn btn-primary btn-sm">Buat Invoice</button>
                </form>
            </td>
            <!-- [... TAMBAHKAN FORM INI ...] -->
        </tr>
        @empty
        <tr>
            <td class="text-center" colspan="5">Tidak ada data</td>
        </tr>
        @endforelse
    </tbody>
</table>
                        <div class="float-right">
                            {{ $bendaharas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection