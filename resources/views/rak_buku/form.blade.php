@extends('layout.app')
@section('title', 'Daftar Rak Buku')
@section('content')
    <h2>{{ $store }} Data Rak Buku</h2>
    <form method="POST" action="{{ $action }}">
        @csrf
        @if (strtolower($store) == 'ubah')
            @method('PUT')
        @endif
        <input type="hidden" name="id" value="{{ $rak->id }}" />
        <input type="text" class="mail_text" name="nama" placeholder="Nama
Rak" value="{{ $rak->nama }}" />
        <input type="text" class="mail_text" name="lokasi" placeholder="Lokasi" value="{{ $rak->lokasi }}" />
        <input type="text" class="mail_text" name="keterangan" placeholder="keterangan" value="{{ $rak->keterangan }}" />
        <input class="btn btn-success mt-3"type="submit" value="{{ $store }}" />
        
            <a class="btn btn-warning mt-3" href="{{ url('/rak_buku') }}">Kembali</a>
        
    </form>
@endsection
