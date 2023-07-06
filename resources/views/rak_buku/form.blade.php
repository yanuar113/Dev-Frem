@extends('layout.app')
@section('title', 'Daftar Rak Buku')
@section('content')

<script>
    $(function() {
        $("#datepicker").datepicker();
        $("#slider-range").slider({
            range: true,
            min: 1000,
            max: 1000000,
            values: [1000, 500000],
            slide: function(event, ui) {
                $("#amount").val("Rp" + ui.values[0] + " - Rp" + ui.values[1]);
            }
        });
        $("#amount").val("Rp" + $("#slider-range").slider("values", 0) +
            " - Rp" + $("#slider-range").slider("values", 1));
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
    <input type="text" class="mail_text" name="keterangan" placeholder="keterangan" value="{{ $rak->keterangan }}" title="Masukan Keterengan" />
    <input type="text" class="mail_text" name="tanggal" placeholder="tanggal" id="datepicker" title="Masukan Tanggal" />
    <br/>
    <p>
        <label class="mt-4" for="amount">Rentang Harga:</label>
        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
    </p>
    <div id="slider-range"></div>
    <input class="btn btn-success mt-3" type="submit" value="{{ $store }}" />
    <a class="btn btn-warning mt-3" href="{{ url('/rak_buku') }}">Kembali</a>


</form>


@endsection