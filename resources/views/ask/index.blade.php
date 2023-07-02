@extends('layouts.admin')

@section('content')
    <div class="wrapper">

        <x-model title="Add New Ask" form="addAsk">
            <form id="addAsk" action="{{ route('ask.store') }}" method="POST">
                @csrf
                <x-input name="qu" label="Question"></x-input>
                <!-- /.form-group -->
                <x-input name="an" label="Answer"></x-input>
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
                                <li class="breadcrumb-item active">Asks</li>
                            </ol>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-primary float-sm-right" data-toggle="modal" data-target="#addAsk">
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
                        <h3 class="card-title">Asks</h3>

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
                                    <th style="width: 15%">Question</th>
                                    <th style="width: 30%">Answer</th>
                                    <th style="width: 20%">Status</th>
                                    <th style="width: 20%">control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asks as $ask)
                                    <tr>
                                        <td>{{ $ask->id }}</td>
                                        <td>{{ $ask->qu }}</td>
                                        <td>{{ $ask->an }}</td>
                                        <td>
                                            @if ($ask->status)
                                                <span class="badge badge-success">on</span>
                                            @else
                                                <span class="badge badge-danger">Off</span>
                                            @endif
                                        </td>
                                        <td class="project-actions text-center">
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#eask{{ $ask->id }}">
                                                <i class="fas fa-pencil-alt"></i>Edit
                                            </button>
                                            <x-model title="Edit {{ $ask->id }}" form="eask{{ $ask->id }}">
                                                <form id="eask{{ $ask->id }}" action="{{ route('ask.update', $ask->id) }}" method="POST" class="text-left">
                                                    @csrf
                                                    <x-input name="qu" label="Question" value="{{ $ask->qu }}"></x-input>
                                                    <!-- /.form-group -->
                                                    <x-input name="an" label="Answer" value="{{ $ask->an }}"></x-input>
                                                    <!-- /.form-group -->
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" value="1" @if ($ask->status == 1) checked @endif>
                                                            <label class="form-check-label">On</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status" value="0" @if ($ask->status == 0) checked @endif>
                                                            <label class="form-check-label">Off</label>
                                                        </div>
                                                    </div>
                                                    <!-- /.form-group -->
                                                </form>
                                            </x-model>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rask{{ $ask->id }}">
                                                <i class="fas fa-trash"></i>Delete
                                            </button>
                                            <x-model title="Remove Ask" form="rask{{ $ask->id }}">
                                                <p>Are You Sure to remove {{ $ask->id }}</p>
                                                <form id="rask{{ $ask->id }}" action="{{ route('ask.destroy') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $ask->id }}">
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
