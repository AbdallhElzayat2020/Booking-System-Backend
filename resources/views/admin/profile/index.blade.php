@extends('admin.layouts.master')
@section('title','Profile')

@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item  ">Dashboard</div>
                <div class="breadcrumb-item "><a href="{{ route('admin.profile') }}">Profile</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Profile</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ auth()->user()->id}}">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="avatar">Avatar <span class="text-danger"> * </span></label>
                                            <div id="image-preview" class="image-preview mt-4 avatar-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="avatar" id="image-upload"/>
                                                <input type="hidden" name="old_avatar" value="{{$user->avatar}}">
                                            </div>
                                            @error('avatar')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="banner">Banner </label>
                                            <div id="image-preview-2" class="image-preview banner-preview mt-4">
                                                <label for="image-upload-2" id="image-label-2">Choose File</label>
                                                <input type="file" name="banner" id="image-upload-2"/>
                                                <input type="hidden" name="old_banner" value="{{$user->banner}}">
                                            </div>
                                        </div>
                                        @error('banner')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="name" value="{{$user->name}}" required id="name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-danger"> * </span> </label>
                                            <input type="text" class="form-control" name="email" value="{{$user->email}}" required id="email">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone <span class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="phone" value="{{$user->phone}}" required id="phone">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Address">Address <span class="text-danger"> * </span></label>
                                            <input type="text" class="form-control" name="address" value="{{$user->address}}" required id="address">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="About">About <span class="text-danger"> * </span></label>
                                            <textarea name="about" id="about" class="form-control" required cols="30" rows="10">{!! $user->about !!}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input type="text" class="form-control" value="{{$user->website}}" name="website" id="website">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fb_link">Facebook Link</label>
                                            <input type="text" class="form-control" value="{{$user->fb_link}}" name="fb_link" id="fb_link">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="x_link">X Link</label>
                                            <input type="text" class="form-control" name="x_link" value="{{$user->x_link}}" id="x_link">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="in_link">LinkedIn Link</label>
                                            <input type="text" class="form-control" name="in_link" value="{{$user->in_link}}" id="in_link">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="wa_link">WhatsApp Link</label>
                                            <input type="text" class="form-control" name="wa_link" value="{{$user->wa_link}}" id="wa_link">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="instra_link">Instagram Link</label>
                                            <input type="text" class="form-control" name="instra_link" value="{{$user->instra_link}}" id="instra_link">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </div>

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
            $('.avatar-preview').css({
                'background-image': 'url({{ asset($user->avatar) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })

            $('.banner-preview').css({
                'background-image': 'url({{ asset($user->banner) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        });
        $.uploadPreview({
            input_field: "#image-upload",   // Default: .image-upload
            preview_box: "#image-preview",  // Default: .image-preview
            label_field: "#image-label",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false,                // Default: false
            success_callback: null          // Default: null
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

