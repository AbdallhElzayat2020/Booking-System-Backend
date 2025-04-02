@extends('admin.layouts.master')
@section('title','Hero')

@section('content')
    <section class="section">

        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item  ">Dashboard</div>
                <div class="breadcrumb-item "><a href="{{ route('admin.hero.index') }}">Hero</a></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Hero</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.hero.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Background</label>
                                    <div id="image-preview" class="image-preview mt-4 avatar-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="background" id="image-upload"/>
                                        <input type="hidden" name="old_background" value="{{@$hero->background}}">
                                    </div>
                                    @error('background')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{@$hero->title}}">
                                    @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="sub_title">Sub Title <span class="text-danger">*</span></label>
                                    <textarea type="text" style="height: 120px!important;" class="form-control" name="sub_title" id="sub_title">{{@$hero->sub_title}}</textarea>
                                    @error('sub_title')
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
            $('.avatar-preview').css({
                'background-image': 'url({{ asset(@$hero->background) }})',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        });
    </script>
@endpush
