<script src="{{asset('assets/modules/jquery.min.js')}}"></script>
<script src="{{asset('assets/modules/popper.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/js/stisla.js')}}"></script>

<!-- JS Libraies -->
<script src="{{asset('assets/modules/summernote/summernote-bs4.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset('assets/js/page/index-0.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
<!-- Template JS File -->
<script src="{{asset('assets/js/scripts.js')}}"></script>

{{--    Data Table cdn   --}}
<script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>

{{--  sweet alert  --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    // sweet alert Delete button
    $('body').on('click', '.delete-item', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ddd",
            cancelButtonColor: "#f00",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    method: "DELETE",
                    url: url,
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function (data) {
                        if (data.status === 'success') {
                            Swal.fire({
                                title: "Deleted!",
                                responseText: data.message,
                                icon: "success",
                            });
                            window.location.reload();
                        } else if (data.status === 'error') {
                            Swal.fire({
                                title: "Error!",
                                responseText: data.message,
                                icon: "error",
                            });
                        }
                    },
                    error: function (status, err) {
                        console.log(err)
                    },
                });
            }
        });
    })
</script>
@stack('js')
