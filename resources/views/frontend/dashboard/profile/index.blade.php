@extends('frontend.layouts.master')
@section('title','Dashboard')
@section('content')

    <!--=============================
  DASHBOARD START
==============================-->
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="dashboard_content">
                        <div class="my_listing">
                            <h4>basic information</h4>
                            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-8 col-md-12">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label>Name <span class="text-danger">*</span> </label>
                                                    <div class="input_area">
                                                        <input type="text" value="{{old('name',$user->name)}}" name="name" placeholder="Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label>phone <span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="text" name="phone" value="{{old('phone',$user->phone)}}" placeholder="1234" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label>email <span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="email" name="email" value="{{old('email',$user->email)}}" placeholder="Email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label>Address <span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="text" name="address" value="{{old('address',$user->address)}}" placeholder="Address" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label>About Me <span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <textarea cols="3" name="about" rows="3" placeholder="Your Intro Text"
                                                                  required>{!! old('about',$user->about) !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="my_listing_single">
                                                    <label>Website</label>
                                                    <div class="input_area">
                                                        <input type="text" name="website" value="{{old('website',$user->website)}}" placeholder="Website">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="my_listing_single">
                                                    <label>Facebook</label>
                                                    <div class="input_area">
                                                        <input type="text" name="fb_link" value="{{old('fb_link',$user->fb_link)}}" placeholder="Facebook Link">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="my_listing_single">
                                                    <label>X</label>
                                                    <div class="input_area">
                                                        <input type="text" name="x_link" value="{{old('x_link',$user->x_link)}}" placeholder="X Link">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="my_listing_single">
                                                    <label>LinkedIn</label>
                                                    <div class="input_area">
                                                        <input type="text" name="in_link" value="{{old('in_link',$user->in_link)}}" placeholder="LinkedIn Link">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="my_listing_single">
                                                    <label>Whatsapp</label>
                                                    <div class="input_area">
                                                        <input type="text" name="wa_link" value="{{old('wa_link',$user->wa_link)}}" placeholder="Whatsapp Link">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="my_listing_single">
                                                    <label>Instagram</label>
                                                    <div class="input_area">
                                                        <input type="text" name="instra_link" value="{{old('instra_link',$user->instra_link)}}"
                                                               placeholder="Instagram Link">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="read_btn">Update</button>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-5">

                                        <div class="my_listing_single">
                                            <label for="avatar">Avatar</label>
                                            <div class="profile_pic_upload">
                                                <img src="{{asset($user->avatar)}}" name="avatar" alt="img" class="imf-fluid w-100">
                                                <input type="file" name="avatar">
                                                <input type="hidden" name="old_avatar" value="{{$user->avatar}}">
                                            </div>
                                        </div>

                                        <div class="my_listing_single">
                                            <label for="banner">Banner</label>
                                            <div class="profile_pic_upload">
                                                <img src="{{asset($user->banner)}}" name="banner" alt="img" class="imf-fluid w-100">
                                                <input type="file" name="banner">
                                                <input type="hidden" name="old_banner" value="{{$user->banner}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="my_listing list_mar">
                            <h4>change password</h4>
                            <form action="{{ route('user.profile.password-update') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="my_listing_single">
                                            <label>current password</label>
                                            <div class="input_area">
                                                <input type="password" name="current_password" placeholder="Current Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="my_listing_single">
                                            <label>new password</label>
                                            <div class="input_area">
                                                <input type="password" name="password" placeholder="New Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="my_listing_single">
                                            <label>confirm password</label>
                                            <div class="input_area">
                                                <input type="password" name="password_confirmation" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="read_btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
      DASHBOARD START
    ==============================-->

@endsection
