<h2>Daftar Buku</h2>
<h3>{{$sub_judul}}</h3>

<p> Perintah kondisonal</p>
@if ($poin > 80 && $poin <=100)
   Poin {{$poin}} = Rating A <br/>
@elseif($poin > 60 && $poin <=80)
    Poin {{$poin}} = Rating B <br/>
@elseif($poin > 40 && $poin <=60)
    Poin {{$poin}} =  Rating C <br/>
@elseif($poin > 20 && $poin <=40)
    Poin {{$poin}} =  Rating D <br/>
@elseif($poin >= 0 && $poin <=20)
    Poin {{$poin}} = Rating E <br/>
@else
    Salah Nilai<br>
@endif

<p>Perintah Switch</p>
@switch($flag)
    @case(1)
       Flag {{$flag}} = Jenis pemerograman<br/>
        @break
    @case(2)
        Flag {{$flag}} = Jenis struktur data<br/>
        @break
    @case(3)
        Flag {{$flag}} =Jenis basis data<br/>
        @break
    @default
        Flag {{$flag}} = Bukan buku komputer<br/>
@endswitch

<p>Perintah Pengulangan</p>
@foreach ($buku as $b)
    {{$b}}<br/>
@endforeach

