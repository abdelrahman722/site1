@extends('layouts.admin')

@section('content')
    <div class="wrapper">

        <x-model title="Add New Team" form="addTeam">
            <form id="addTeam" action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-input name="name" label="Name"></x-input>
                <!-- /.form-group -->
                <x-input name="title" label="Title"></x-input>
                <!-- /.form-group -->
                <x-input name="description" label="Description"></x-input>
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
                                <li class="breadcrumb-item active">Team</li>
                            </ol>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary float-sm-right" data-toggle="modal" data-target="#addTeam">
                                Add New
                            </button>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Team</h3>

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
                                    <th style="width: 15%">Name</th>
                                    <th style="width: 10%">Title</th>
                                    <th style="width: 15%">Description</th>
                                    <th style="width: 10%">Status</th>
                                    <th style="width: 10%">Image</th>
                                    <th style="width: 15%">control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($team as $member)
                                    <tr>
                                        <td>{{ $member->id }}</td>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->title }}</td>
                                        <td>{{ $member->description }}</td>
                                        <td>
                                            @if ($member->status)
                                                <span class="badge badge-success">On</span>
                                            @else
                                                <span class="badge badge-danger">Off</span>
                                            @endif
                                        </td>
                                        <td><img src="{{ url($member->img) }}" width="100%"></td>
                                        <td class="project-actions text-center">
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#et{{ $member->id }}">
                                                <i class="fas fa-pencil-alt"></i>Edit
                                            </button>
                                            <x-model title="Edit {{ $member->name }}" form="et{{ $member->id }}">
                                                <form id="et{{ $member->id }}" action="{{ route('team.update', $member->id) }}" method="POST" class="text-left" enctype="multipart/form-data">
                                                    @csrf
                                                    <x-input name="name" label="Name" value="{{ $member->name }}"></x-input>
                                                    <!-- /.form-group -->
                                                    <x-input name="title" label="Title" value="{{ $member->title }}"></x-input>
                                                    <!-- /.form-group -->
                                                    <x-input name="description" label="Description" value="{{ $member->description }}"></x-input>
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
                                                            <input class="form-check-input" type="radio" name="status" value="1" @if ($member->status == 1) checked @endif>
                                                            <label class="form-check-label">On</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" value="0" @if ($member->status == 0) checked @endif>
                                                            <label class="form-check-label">Off</label>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </form>
                                            </x-model>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rt{{ $member->id }}">
                                                <i class="fas fa-trash"></i>Delete
                                            </button>
                                            <x-model title="Remove Team" form="rt{{ $member->id }}">
                                                <p>Are You Sure to remove {{ $member->name }}</p>
                                                <form id="rt{{ $member->id }}" action="{{ route('team.destroy') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $member->id }}">
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
