@extends('layout.app')
@section('title', 'Daftar Rak Buku')
@section('content')
    <script> 
        $(function () {
            $("#datepicker").datepicker();
            $(document).tooltip();
        });
    </script>
    <h2>{{ $store }} Data Rak Buku</h2>
    <form method="POST" action="{{ $action }}">
        @csrf
        @if (strtolower($store) == 'ubah')
            @method('PUT')
        @endif
        <input type="hidden" name="id" value="{{ $rak->id }}" />
        <div class="form-grup">
        <input type="text" class="mail_text" name="nama" placeholder="Nama Rak" value="{{ $rak->nama }}" title="Masukan Nama Rak" />
        @error('nama')
        <b>{{$message}}</b>
        @enderror
        </div>
        <div class="form-grup">
        <input type="text" class="mail_text" name="lokasi" placeholder="Lokasi" value="{{ $rak->lokasi }}" title="Masukan Lokasi" />
        @error('lokasi')
        <b>{{$message}}</b>
        @enderror
        </div>
        <input type="text" class="mail_text" name="keterangan" placeholder="keterangan" value="{{ $rak->keterangan }}" title="Masukan Keterengan"/>
        <input type="text" class="mail_text" name="tanggal" placeholder="tanggal" id="datepicker" title="Masukan Tanggal"/>
        <input class="btn btn-success mt-3"type="submit" value="{{ $store }}" />

        
            <a class="btn btn-warning mt-3" href="{{ url('/rak_buku') }}">Kembali</a>
        
    </form>
@endsection
