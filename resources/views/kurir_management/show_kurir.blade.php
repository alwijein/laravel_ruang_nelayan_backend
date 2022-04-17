@extends('layouts.app')

@section('content')
    <section class="app-user-list">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Kurir</h4>

                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Nama</th>
                                    <th>Biaya</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kurir as $data)
                                    <tr>
                                        <td>{{ $data->img }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td><span
                                                class="badge rounded-pill badge-light-primary me-1">{{ $data->biaya }}</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('edit-nelayan', ['id'=>$data->id]) }}">
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
