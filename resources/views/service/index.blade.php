@extends('layouts.admin')

@section('content')
    <div class="wrapper">

        <x-model title="Add New Service" form="addService">
            <form id="addService" action="{{ route('service.store') }}" method="POST">
                @csrf
                <x-input name="title" label="Title"></x-input>
                <!-- /.form-group -->
                <x-input name="description" label="Description"></x-input>
                <!-- /.form-group -->
                <x-input name="icon" label="Icon Class"></x-input>
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
                                <li class="breadcrumb-item active">Service</li>
                            </ol>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary float-sm-right" data-toggle="modal" data-target="#addService">
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
                        <h3 class="card-title">Service</h3>

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
                                    <th style="width: 15%">Description</th>
                                    <th style="width: 10%">Status</th>
                                    <th style="width: 10%">Icon</th>
                                    <th style="width: 15%">control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td>{{ $service->title }}</td>
                                        <td>{{ $service->description }}</td>
                                        <td>
                                            @if ($service->status)
                                                <span class="badge badge-success">On</span>
                                            @else
                                                <span class="badge badge-danger">Off</span>
                                            @endif
                                        </td>
                                        <td><i class="{{ url($service->icon) }}"></i></td>
                                        <td class="project-actions text-center">
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#es{{ $service->id }}">
                                                <i class="fas fa-pencil-alt"></i>Edit
                                            </button>
                                            <x-model title="Edit {{ $service->title }}" form="es{{ $service->id }}">
                                                <form id="es{{ $service->id }}" action="{{ route('service.update', $service->id) }}" method="POST" class="text-left">
                                                    @csrf
                                                    <x-input name="title" label="Title" value="{{ $service->title }}"></x-input>
                                                    <!-- /.form-group -->
                                                    <x-input name="description" label="Description" value="{{ $service->description }}"></x-input>
                                                    <!-- /.form-group -->
                                                    <x-input name="icon" label="Icon Class" value="{{ $service->icon }}"></x-input>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" value="1" @if ($service->status == 1) checked @endif>
                                                            <label class="form-check-label">On</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" value="0" @if ($service->status == 0) checked @endif>
                                                            <label class="form-check-label">Off</label>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </form>
                                            </x-model>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rs{{ $service->id }}">
                                                <i class="fas fa-trash"></i>Delete
                                            </button>
                                            <x-model title="Remove Service" form="rs{{ $service->id }}">
                                                <p>Are You Sure to remove {{ $service->title }}</p>
                                                <form id="rs{{ $service->id }}" action="{{ route('service.destroy') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $service->id }}">
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
