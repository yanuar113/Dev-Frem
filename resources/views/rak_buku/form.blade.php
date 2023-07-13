@extends('layout.app')
@section('title', 'Daftar Rak Buku')
@section('content')


<h2>{{ $store }} Data Rak Buku</h2>
<meta name="csrf-token" content="{{ csrf_token()}}"/>
<form method="POST" action="{{ $action }}">
    @csrf
    @if (strtolower($store) == 'ubah')
    @method('PUT')
    @endif
    <input type="hidden" name="id" value="{{ $rak->id }}" />
    <div class="form-grup">
        <input type="text" class="mail_text" name="nama" placeholder="Nama Rak" value="{{ $rak->nama }}" title="Masukan Nama Rak" id="nama"/>
        @error('nama')
        <b>{{$message}}</b>
        @enderror
    </div>
    <div class="form-grup">
        <input type="text" class="mail_text" name="lokasi" placeholder="Lokasi" value="{{ $rak->lokasi }}" title="Masukan Lokasi" id="lokasi"/>
        @error('lokasi')
        <b>{{$message}}</b>
        @enderror
    </div>
    <input type="text" class="mail_text" name="keterangan" placeholder="keterangan" value="{{ $rak->keterangan }}" title="Masukan Keterengan" id="keterangan"/>
    <input type="text" class="mail_text" name="tanggal" placeholder="tanggal" id="datepicker" title="Masukan Tanggal" />
    <br />
    <p>
        <label class="mt-4" for="amount">Rentang Harga:</label>
        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
    </p>
    <div id="slider-range"></div>

</form>
<!-- <input class="btn btn-success mt-3" type="submit" value="{{ $store }}" /> -->
<button class="save_bt mt-3 mr-4 bg-success " id="btn_save">
    Simpan
</button>
<a class="save_bt  mt-3 bg-warning" href="{{ url('/rak_buku') }}">Kembali</a>

<script>
    $(function() {
        console.log("ok")
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
        console.log("ok2")
    })
</script>
<script>
    $(function() {
        $("#btn_save").click(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var formData = {
                nama: $('#nama').val(),
                lokasi: $('#lokasi').val(),
                keterangan: $('#keterangan').val()
            };
            var state = $('#btn-save').val();
            var type = "POST";
            var id = $('#id').val();
            var ajaxurl = '{{ $action }}';
            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function(data) {
                    var todo = 'Pengiriman Data berhasil'
                    alert(todo)
                    window.location.href= "{{url('rak_buku')}}"
                },
                error: function(data) {
                    console.log(data);
                    alert(data.responseJSON.message)
                }
            });
        });
    });
</script>



@endsection