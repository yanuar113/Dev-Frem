@extends('layout.app')
@section('title', 'Daftar Rak Buku')
@section('content')
    <h2>Apakah Anda akan menghapus data ini?</h2>
    @isset($rak)
        <table>
            <tr>
                <td>ID</td>
                <td>:</td>
                <td>{{ $rak->id }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $rak->nama }}</td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td>:</td>
                <td>{{ $rak->lokasi }}</td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td>{{ $rak->keterangan }}</td>
            </tr>
        </table>
    @endisset
    <form method="POST">
        @csrf
        @method('DELETE')
        
        <div class="send_bt d-flex ">
            <a class="btn btn-warning mt-3 mr-3" href="{{ url('/rak_buku') }}">Kembali</a>
            <input class="btn btn-danger mt-3 " type="submit" value="Hapus" />&nbsp;
        </div>
    </form>
@endsection
