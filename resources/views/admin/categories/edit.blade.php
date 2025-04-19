@extends('admin.layouts.master')
@section('title','Edit Category')

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
                <div class="breadcrumb-item "><a href="javascript:;">Edit</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.categories.update',$category->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Icon Image <span class="text-danger">*</span></label>
                                            <div id="image-preview" class="image-preview mt-4 icon-image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="icon_image" id="image-upload"/>
                                                <input type="hidden" name="old_icon" value="{{$category->icon_image}}"/>
                                            </div>
                                            @error('icon_image')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Background Image <span class="text-danger">*</span></label>
                                            <div id="image-preview-2" class="image-preview mt-4 background-image-preview">
                                                <label for="image-upload-2" id="image-label-2">Choose File</label>
                                                <input type="file" name="background_image" id="image-upload-2"/>
                                                <input type="hidden" name="old_background" value="{{$category->background_image}}"/>
                                            </div>
                                            @error('background_image')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="show_at_home">Show At Home <span class="text-danger">*</span></label>
                                    <select name="show_at_home" id="show_at_home" class="form-control">
                                        <option @selected(old('show_at_home', $category->show_at_home) === 0 ) value="0">No</option>
                                        <option @selected(old('show_at_home', $category->show_at_home) === 1 ) value="1">Yes</option>
                                    </select>
                                    @error('show_at_home')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select name="status" id="status" class="form-control">
                                        <option @selected(old('status', $category->status) === 'active' ) value="active">Active</option>
                                        <option @selected(old('status', $category->status) === 'inactive' ) value="inactive">InActive</option>
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
    <script>
        $(document).ready(function () {
            $('.background-image-preview').css({
                'background-image': 'url({{ asset($category->background_image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
            $('.icon-image-preview').css({
                'background-image': 'url({{ asset($category->icon_image) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        });
        $.uploadPreview({
            input_field: "#image-upload-2",   // Default: .image-upload
            preview_box: "#image-preview-2",  // Default: .image-preview
            label_field: "#image-label-2",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false,                // Default: false
            success_callback: null          // Default: null
        });
    </script>
@endpush
