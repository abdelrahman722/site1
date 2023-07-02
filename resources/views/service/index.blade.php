@extends('layouts.admin')

@section('content')
    <div class="wrapper">

        <x-model title="Add New Admin" form="addAdmin">
            <form id="addAdmin" action="{{ route('admin.store') }}" method="POST">
                @csrf
                <x-input name="name" label="Name"></x-input>
                <!-- /.form-group -->
                <x-input name="email" label="Email" type="email"></x-input>
                <!-- /.form-group -->
                <x-input name="password" label="Password" type="password"></x-input>
                <!-- /.form-group -->
                <x-input name="password_confirmation" label="Password Confirmation" type="password"></x-input>
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
                                <li class="breadcrumb-item active">Admins</li>
                            </ol>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary float-sm-right" data-toggle="modal" data-target="#addAdmin">
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
                        <h3 class="card-title">admins</h3>

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
                                    <th style="width: 30%">Email</th>
                                    <th style="width: 20%">role</th>
                                    <th style="width: 20%">control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->id }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>
                                            @if ($admin->role)
                                                <span class="badge badge-success">super admin</span>
                                            @else
                                                <span class="badge badge-primary">admin</span>
                                            @endif
                                        </td>
                                        <td class="project-actions text-center">
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#ea{{ $admin->id }}">
                                                <i class="fas fa-pencil-alt"></i>Edit
                                            </button>
                                            <x-model title="Edit {{ $admin->name }} Password" form="ea{{ $admin->id }}">
                                                <form id="ea{{ $admin->id }}" action="{{ route('admin.update', $admin->id) }}" method="POST" class="text-left">
                                                    @csrf
                                                    <x-input name="password" label="Password" type="password"></x-input>
                                                    <!-- /.form-group -->
                                                    <x-input name="password_confirmation" label="Password Confirmation" type="password"></x-input>
                                                    <!-- /.form-group -->
                                                </form>
                                            </x-model>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ra{{ $admin->id }}">
                                                <i class="fas fa-trash"></i>Delete
                                            </button>
                                            <x-model title="Remove Admin" form="ra{{ $admin->id }}">
                                                <p>Are You Sure to remove {{ $admin->name }}</p>
                                                <form id="ra{{ $admin->id }}" action="{{ route('admin.destroy') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $admin->id }}">
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
