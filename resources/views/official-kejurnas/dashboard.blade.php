@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Official | Dashboard
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="mb-3">Selamat Datang</h3>

    {{-- data kontingen --}}
    <div class="table-responsive mb-3">
        <table class="table mb-3 fw-bold ">
            <tr>
                <td>Nama Official</td>
                <td>: {{ $official->name }}</td>
            </tr>
            <tr>
                <td>Nama Kontingen</td>
                <td>: {{ $kontingen->nama_kontingen }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $kontingen->alamat }}</td>
            </tr>
        </table>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 mb-3">
        <div class="col">
            <div class="card text-bg-primary shadow">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Atlet Terdaftar</h5>
                    <h1>{{ $atlet }} atlet</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- status pembayaran --}}
    @if ($invoice->pembayaran == 1)
        <div class="p-2 alert alert-success">
            <div class="d-flex bg-danger-subtle justify-content-around align-items-center">
                <div>
                    <h1>Status Pembayaran : LUNAS</h1>
                </div>
                <div>
                    <h1><i class="fas fa-check-circle text-success"></i></h1>
                </div>
            </div>
        </div>
    @else
        <div class="p-2 alert alert-danger">
            <div class="d-flex bg-danger-subtle justify-content-around align-items-center">
                <div>
                    <h1>Anda belum melakukan pembayaran!</h1>
                    <a href="https://wa.me/6281255242365" class="btn btn-success" target="_blank"><i
                            class="fab fa-whatsapp"></i>
                        Konfirmasi Pembayaran</a>
                    <a href="{{ url('/official/download/invoice') }}" class="btn btn-secondary" target="_blank"><i
                            class="fas fa-file-alt"></i>
                        Cek Invoice</a>
                </div>
                <div>
                    <h1><i class="fas fa-times-circle text-danger"></i></h1>
                </div>
            </div>
        </div>
    @endif
@endsection
{{-- /konten --}}
