@extends('layouts.admin')

@section('content')
    <div class="wrapper">

        <x-model title="Add New Project" form="addProject">
            <form id="addProject" action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-input name="title" label="Title"></x-input>
                <!-- /.form-group -->
                <x-input name="url" label="Url"></x-input>
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
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" value="normal" checked>
                        <label class="form-check-label">Normal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" value="hot">
                        <label class="form-check-label">Hot</label>
                    </div>
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
                                <li class="breadcrumb-item active">Projects</li>
                            </ol>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary float-sm-right" data-toggle="modal"
                                data-target="#addProject">
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
                        <h3 class="card-title">Projects</h3>

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
                                    <th style="width: 10%">Title</th>
                                    <th style="width: 10%">Url</th>
                                    <th style="width: 19%">Description</th>
                                    <th style="width: 10%">Type</th>
                                    <th style="width: 10%">Status</th>
                                    <th style="width: 10%">img</th>
                                    <th style="width: 19%">control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $project->id }}</td>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $project->url }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td>
                                            @if ($project->type == 'normal')
                                                <span class="badge badge-success">{{ $project->type }}</span>
                                            @else
                                                <span class="badge badge-primary">{{ $project->type }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($project->status == 'on')
                                                <span class="badge badge-success">on</span>
                                            @else
                                                <span class="badge badge-danger">off</span>
                                            @endif
                                        </td>
                                        <td><img src="{{ url($project->img) }}" width="100%"></td>
                                        <td class="project-actions text-center">
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#ep{{ $project->id }}">
                                                <i class="fas fa-pencil-alt"></i>Edit
                                            </button>
                                            <x-model title="Edit {{ $project->name }}" form="ep{{ $project->id }}">
                                                <form id="ep{{ $project->id }}" action="{{ route('project.update', $project->id) }}" method="POST" class="text-left"  enctype="multipart/form-data">
                                                    @csrf
                                                    <x-input name="title" label="Title" value="{{ $project->title }}">
                                                    </x-input>
                                                    <!-- /.form-group -->
                                                    <x-input name="url" label="Url" value="{{ $project->url }}">
                                                    </x-input>
                                                    <!-- /.form-group -->
                                                    <x-input name="description" label="Description"
                                                        value="{{ $project->description }}"></x-input>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <label for="img">Img</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="img"
                                                                    class="custom-file-input @error('img') is-invalid  @enderror"
                                                                    id="img">
                                                                <label class="custom-file-label" for="img">Choose
                                                                    file</label>
                                                            </div>
                                                        </div>
                                                        @error('img')
                                                            <span class="error invalid-feedback"
                                                                id="img">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="type" value="normal" @if ($project->type == 'normal') checked @endif>
                                                            <label class="form-check-label">Normal</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="type" value="hot" @if ($project->type == 'hot') checked @endif>
                                                            <label class="form-check-label">Hot</label>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" value="on" @if ($project->status == 'on') checked @endif>
                                                            <label class="form-check-label">On</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" value="off" @if ($project->status == 'off') checked @endif>
                                                            <label class="form-check-label">Off</label>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->

                                                </form>
                                            </x-model>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#rp{{ $project->id }}">
                                                <i class="fas fa-trash"></i>Delete
                                            </button>
                                            <x-model title="Remove project" form="rp{{ $project->id }}">
                                                <p>Are You Sure to remove {{ $project->name }}</p>
                                                <form id="rp{{ $project->id }}" action="{{ route('project.destroy') }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $project->id }}">
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
