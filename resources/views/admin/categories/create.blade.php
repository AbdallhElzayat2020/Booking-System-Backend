@extends('admin.layouts.master')
@section('title','Create Category')

@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Dashboard</div>
                <div class="breadcrumb-item">Categories</div>
                <div class="breadcrumb-item "><a href="javascript:;">Create</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.categories.update',1) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Icon Image <span class="text-danger">*</span></label>
                                            <div id="image-preview" class="image-preview mt-4 avatar-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="icon_image" id="image-upload"/>
                                            </div>
                                            @error('icon_image')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Icon Image <span class="text-danger">*</span></label>
                                            <div id="image-preview" class="image-preview mt-4 avatar-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="background_image" id="image-upload"/>
                                            </div>
                                            @error('background_image')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="show_at_home">Show At Home <span class="text-danger">*</span></label>
                                    <select name="show_at_home" id="show_at_home" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('show_at_home')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="inactive">InActive</option>
                                    </select>
                                    @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('js')

@endpush
