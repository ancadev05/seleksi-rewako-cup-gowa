@extends('tampilan.tema_utama')

{{-- title --}}
@section('title')
    Admin | Setting
@endsection
{{-- /title --}}

{{-- konten --}}
@section('konten')
    <h3 class="border-bottom border-2 mb-3">Admin</h3>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <td rowspan="5">
                    <a href="{{ asset('storage/foto-official/' . $user->foto_official) }}" target="_blank">
                        <img src="{{ asset('storage/foto-official/' . $user->foto_official) }}" alt="foto"
                            srcset="" width="100px"></a>
                </td>
                <td>Username</td>
                <td>: {{ $user->username }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: {{ $user->name }}</td>
            </tr>
            <tr>
                <td>No. Whatsapp</td>
                <td>: {{ $user->no_wa }}</td>
            </tr>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editUser">Edit</button>
    </div>

    <!-- Modal edit user -->
    <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="foto_official_lama" value="{{ $user->foto_official }}">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_wa" class="col-sm-2 col-form-label">No WhatsApp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="no_wa" name="no_wa"
                                    value="{{ $user->no_wa }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="foto_official" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control form-control-sm" id="foto_official"
                                    name="foto_official">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- /konten --}}
