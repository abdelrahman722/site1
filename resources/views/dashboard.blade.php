@extends('layouts.admin')

@section('content')
    <div class="wrapper">

        <x-sidebar />
      

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-left">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Setting</li>
                                </ol>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <input type="submit" form="settingForm" class="btn btn-primary float-sm-right" value="Save All" >
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <form id="settingForm" action="{{ route('save.setting') }}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                                @csrf
                            <!-- Site Setting -->
                            <div class="col-md-6">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Site Setting</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <x-input name="title" label="Title" value="{{ $setting->title }}"></x-input>
                                        <!-- /.form-group -->
                                        
                                        <x-input name="description1" label="Description 1" value="{{ $setting->description1 }}"></x-input>
                                        <!-- /.form-group -->
                                        
                                        <x-input name="description2" label="Description 2" value="{{ $setting->description2 }}"></x-input>
                                        <!-- /.form-group -->

                                        <div class="form-group">
                                            <label for="img">Img</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="img" class="custom-file-input @error('img') is-invalid  @enderror" id="img">
                                                    <label class="custom-file-label" for="img">Choose file</label>
                                                </div>
                                            </div>
                                            @error('img')
                                                <span class="error invalid-feedback" id="img">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->

                            <!-- Social Media Setting -->
                            <div class="col-md-6">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Social Media Setting</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        
                                        <x-input name="facebook" label="Facebook" value="{{ $setting->facebook }}"></x-input>
                                        <!-- /.form-group -->
                                        
                                        <x-input name="twitter" label="Twitter" value="{{ $setting->twitter }}"></x-input>
                                        <!-- /.form-group -->
                                        
                                        <x-input name="linkedin" label="Linkedin" value="{{ $setting->linkedin }}"></x-input>
                                        <!-- /.form-group -->
                                        
                                        <x-input name="skype" label="Skype" value="{{ $setting->skype }}"></x-input>
                                        <!-- /.form-group -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->

                            <!-- Contact Setting -->
                            <div class="col-md-6">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Contact Setting</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">                                        
                                        
                                        <x-input name="email" label="Email" value="{{ $setting->email }}"></x-input>
                                        <!-- /.form-group -->
                                        
                                        <x-input name="address" label="Address" value="{{ $setting->address }}"></x-input>
                                        <!-- /.form-group -->
                                        
                                        <x-input name="location" label="Location" value="{{ $setting->location }}"></x-input>
                                        <!-- /.form-group -->
                                        
                                        <x-input name="phone1" label="Phone 1" value="{{ $setting->phone1 }}"></x-input>
                                        <!-- /.form-group -->
                                        
                                        <x-input name="phone2" label="Phone 2" value="{{ $setting->phone2 }}"></x-input>
                                        <!-- /.form-group -->
                                        
                                        <x-input name="phone3" label="Phone 3" value="{{ $setting->phone3 }}"></x-input>
                                        <!-- /.form-group -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->

                        </div>
                    </form>
                        <!-- /.end row -->

                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
        </div>
        <x-footer></x-footer>
    </div>
    <!-- ./wrapper -->
@endsection
