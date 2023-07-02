@extends('layouts.admin')

@section('content')
    <div class="wrapper">

        <x-model title="Add New Client" form="addClient">
            <form id="addClient" action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-input name="title" label="Title"></x-input>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="img">Img</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="img"
                                class="custom-file-input @error('img') is-invalid  @enderror" id="img">
                            <label class="custom-file-label" for="img">Choose file</label>
                        </div>
                    </div>
                    @error('img')
                        <span class="error invalid-feedback" id="img">{{ $message }}</span>
                    @enderror
                </div>
                <!-- /.form-group -->
            </form>
        </x-model>

        <x-sidebar />

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Client</li>
                            </ol>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary float-sm-right" data-toggle="modal" data-target="#addClient">
                                Add New
                            </button>
                            {{-- <a href="{{ route('admin.create') }}" class="btn btn-primary float-sm-right">Add New</a> --}}
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Client</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 3%">#id</th>
                                    <th style="width: 15%">Title</th>
                                    <th style="width: 20%">Status</th>
                                    <th style="width: 10%">Image</th>
                                    <th style="width: 20%">control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->title }}</td>
                                        <td>
                                            @if ($client->status)
                                                <span class="badge badge-success">On</span>
                                            @else
                                                <span class="badge badge-danger">Off</span>
                                            @endif
                                        </td>
                                        <td><img src="{{ url($client->img) }}" width="100%"></td>
                                        <td class="project-actions text-center">
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#ec{{ $client->id }}">
                                                <i class="fas fa-pencil-alt"></i>Edit
                                            </button>
                                            <x-model title="Edit {{ $client->title }} Password" form="ec{{ $client->id }}">
                                                <form id="ec{{ $client->id }}" action="{{ route('client.update', $client->id) }}" method="POST" class="text-left" enctype="multipart/form-data">
                                                    @csrf
                                                    <x-input name="title" label="Title" value="{{ $client->title }}"></x-input>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label for="img">Img</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="img"
                                                                    class="custom-file-input @error('img') is-invalid  @enderror" id="img">
                                                                <label class="custom-file-label" for="img">Choose file</label>
                                                            </div>
                                                        </div>
                                                        @error('img')
                                                            <span class="error invalid-feedback" id="img">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" value="1" @if ($client->status == 1) checked @endif>
                                                            <label class="form-check-label">On</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" value="0" @if ($client->status == 0) checked @endif>
                                                            <label class="form-check-label">Off</label>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </form>
                                            </x-model>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rc{{ $client->id }}">
                                                <i class="fas fa-trash"></i>Delete
                                            </button>
                                            <x-model title="Remove Client" form="rc{{ $client->id }}">
                                                <p>Are You Sure to remove {{ $client->title }}</p>
                                                <form id="rc{{ $client->id }}" action="{{ route('client.destroy') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $client->id }}">
                                                    <!-- /.form-group -->
                                                </form>
                                            </x-model>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <x-footer></x-footer>

    </div>
    <!-- ./wrapper -->
@endsection
