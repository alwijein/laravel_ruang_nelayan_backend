@extends('layouts.app')

@section('content')
    <section class="app-user-list">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Ikan Air Tawar</h4>
                        <div class="form-modal-ex">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#inlineForm">
                                Tambah Ikan Air Tawar
                            </button>
                            <!-- Modal -->
                            <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">Tambahkan Ikan Air Tawar</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('show-air-tawar') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <label>Nama Ikan: </label>
                                                <div class="mb-1">
                                                    <input type="text" name="title" placeholder="Masukkan Jenis Ikan"
                                                        class="form-control" />
                                                </div>
                                                @error('title')
                                                    <div class="text-danger mt-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            {{-- <div class="modal-body">
                                                <label>Keterangan: </label>
                                                <div class="mb-1">
                                                    <input type="text" name="keterangan" placeholder="Masukkan Keterangan"
                                                        class="form-control" />
                                                </div>
                                                @error('keterangan')
                                                    <div class="text-danger mt-1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div> --}}
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Daftar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Ikan</th>
                                    {{-- <th>Keterangan</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ikanAirTawar as $data)
                                    <tr>
                                        <td>{{ $data->title }}</td>
                                        {{-- <td>{{ $data->keterangan }}</td> --}}
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('edit-tawar', ['id' => $data->id]) }}">
                                                        <i data-feather="edit-2" class="me-50"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                    {{-- <form action="{{ route('delete', ['id'=>$data->id]) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="dropdown-item" type="submit">
                                                            <i data-feather="trash" class="me-50"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </form> --}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <!-- users list ends -->
@endsection
