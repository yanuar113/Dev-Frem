
@extends('layout.app')

@section('title','Biodata karyawan')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar</p>
@endsection

@section('content')
{{-- <style>
    .bg {
    padding: 10px;
    background: rgba(41, 41, 48, 0.2);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    }
    </style> --}}
    <h2>Tambahkan Biodata Anda</h2>
    <div class="bg">
    <table>
        <form method="post">
            @csrf
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input name="nama" type="text" size=20 /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input name="email" type="text" size=20 /></td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>:</td>
                <td><input name="no_hp" type="text" size=20 /></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="kirim"  /></td>
            </tr>
        </form>      
    </table>
    </div>
    
@endsection