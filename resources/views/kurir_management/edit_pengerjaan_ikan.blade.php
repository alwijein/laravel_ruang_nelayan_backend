@extends('layouts.app')

@section('content')
    <!-- Basic multiple Column Form section start -->

    <!-- Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Pengerjaan Ikan</h4>
                    </div>
                    <div class="card-body">
                        <form class="form"  action="/show-kurir/jasa-pengerjaan/{{$data->id}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">Nama</label>
                                        <input type="text" id="first-name-column" class="form-control"
                                            placeholder="Masukkan Nama Baru" value="{{$data->jenis_pengerjaan_ikan}}" name="jenis_pengerjaan_ikan" />
                                    </div>
                                    @error('jenis_pengerjaan_ikan')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">Biaya</label>
                                        <input type="number" id="first-name-column" class="form-control"
                                            placeholder="Masukkan Nomor Telepon Baru" value="{{$data->biaya}}" name="biaya" />
                                    </div>
                                    @error('biaya')
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
