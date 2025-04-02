<!--jquery library js-->
<script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
<!--bootstrap js-->
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<!--font-awesome js-->
<script src="{{asset('frontend/js/Font-Awesome.js')}}"></script>
<!--slick js-->
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<!--venobox js-->
<script src="{{asset('frontend/js/venobox.min.js')}}"></script>
<!--counter js-->
<script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.countup.min.js')}}"></script>
<!--nice select js-->
<script src="{{asset('frontend/js/select2.min.js')}}"></script>
<!--isotope js-->
<script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
<!--summer_note js-->
<script src="{{asset('frontend/js/summernote.min.js')}}"></script>
<!--select js-->
<script src="{{asset('frontend/js/jquery.nice-select.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!--main/custom js-->
<script src="{{asset('frontend/js/main.js')}}"></script>


<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif

    $.uploadPreview({
        input_field: "#image-upload",   // Default: .image-upload
        preview_box: "#image-preview",  // Default: .image-preview
        label_field: "#image-label",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
    });

</script>
@stack('js')
