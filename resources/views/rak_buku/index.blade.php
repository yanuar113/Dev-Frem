@extends('layout.app')
@section('title', 'Daftar Rak Buku')
@section('content')
@if(session()->has('pesan'))
   <h3> <span class="badge badge-success">{{session()->get('pesan')}}</span> </h3>
@endif
    <h2>Daftar Rak Buku</h2>
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
@endsection
