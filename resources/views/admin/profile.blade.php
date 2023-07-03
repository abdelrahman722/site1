@extends('layouts.admin')

@section('content')
    <div class="wrapper">
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
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <form id="settingForm" action="{{ route('admin.profile.update') }}" method="POST">
                        @csrf
                        <!-- Contact Setting -->
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">{{ auth()->user()->name }} Profile</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <x-input name="name" label="Name" value="{{ auth()->user()->name }}"></x-input>
                                <!-- /.form-group -->
                                <x-input name="email" label="Email" value="{{ auth()->user()->email }}"></x-input>
                                <!-- /.form-group -->
                                <x-input name="password" label="Password" type="password"></x-input>
                                <!-- /.form-group -->
                                <x-input name="password_confirmation" label="Password Confirmation" type="password">
                                </x-input>
                                <!-- /.form-group -->
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </div>

                    </form>

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <x-footer></x-footer>

    </div>
    <!-- ./wrapper -->
@endsection
