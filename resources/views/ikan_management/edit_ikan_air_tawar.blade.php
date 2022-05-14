@extends('layouts.app')

@section('content')
    <!-- Basic multiple Column Form section start -->

    <!-- Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Ikan Air Tawar</h4>
                    </div>
                    <div class="card-body">
                        <form class="form"  action="/show-ikan/air-tawar/{{$data->id}}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">Nama Ikan</label>
                                        <input type="text" id="first-name-column" class="form-control"
                                            placeholder="Masukkan Nama Baru" value="{{$data->title}}" name="title" />
                                    </div>
                                    @error('title')
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
