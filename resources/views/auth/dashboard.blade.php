@extends('layout.app')
@section('content')
@section('title', 'Daftar Rak Buku')
@if(session()->has('pesan'))
   <h3> <span class="badge badge-success">{{session()->get('pesan')}}</span> </h3>
@endif
<h2>Daftar Rak Buku</h2>
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">@if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @else
                <div class="alert alert-success">
                    You are logged in!
                </div>
                @endif
                
            </div>
        </div>
    </div>
</div>

    <div  class="send_bt mb-3">
        <a class="btn btn-success " href="{{ url('rak_buku/create') }}">Tambah</a>
    </div>
    <table class="table table-hover">
        <thead class="table-dark">
        <tr>
            <th>No.</th>
          
            <th>Nama Rak</th>
            <th>Lokasi</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
        @php
            $i = 1;
        @endphp
        @foreach ($rak as $r)
            <tr>
                <td>{{ $i }}</td>
                
                <td>{{ $r->nama }}</td>
                <td>{{ $r->lokasi }}</td>
                <td>{{ $r->keterangan }}</td>
                <td>
                    <a  class="btn btn-warning" href="rak_buku/{{ $r->id }}/edit">Edit</a>
                    <a class="btn btn-danger" href="rak_buku/{{ $r->id }}">Hapus</a>
                </td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
    </table>
    <form  action="{{url('logout')}}" method="POST">
                    @csrf
                    <input type="submit" class="col-md-3 offset-md-5 btn btn-danger" value="logout">
                </form>
@endsection