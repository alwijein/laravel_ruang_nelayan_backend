@extends('layouts.app')

@section('content')
    <!-- Basic multiple Column Form section start -->

    <!-- Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Akun Costumer</h4>
                    </div>
                    <div class="card-body">
                        <form class="form"  action="/show-costumer/{{$costumer->id}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">Nama</label>
                                        <input type="text" id="first-name-column" class="form-control"
                                            placeholder="Masukkan Nama Baru" value="{{$costumer->name}}" name="name" />
                                    </div>
                                    @error('name')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">No Telepon</label>
                                        <input type="number" id="first-name-column" class="form-control"
                                            placeholder="Masukkan Nomor Telepon Baru" value="{{$costumer->no_hp}}" name="no_hp" />
                                    </div>
                                    @error('no_hp')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">Password</label>
                                        <input type="password" id="first-name-column" class="form-control"
                                            placeholder="Masukkan Password Baru" value="{{$costumer->password}}"  name="password" />
                                    </div>
                                    @error('password')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">Alamat</label>
                                        <input type="text" id="first-name-column" class="form-control"
                                            placeholder="Masukkan Alamat Baru" value="{{$costumer->alamat}}"  name="alamat" />
                                    </div>
                                    @error('alamat')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">Nomor KTP</label>
                                        <input type="text" id="first-name-column" class="form-control"
                                            placeholder="Masukkan KTP Baru" value="{{$costumer->nik_ktp}}"  name="nik_ktp" />
                                    </div>
                                    @error('alamat')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicSelect">Status</label>
                                        <select class="form-select mb-1" id="basicSelect" name="role">
                                            <option value="costumer">Costumer</option>
                                        </select>
                                    </div>
                                    @error('role')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
