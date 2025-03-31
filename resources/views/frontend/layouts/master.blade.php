<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.head')

<body>

<!--==========================
    Navbar Start
===========================-->

@include('frontend.layouts.header')

<!--==========================
   Navbar End
===========================-->


<!--==========================
    Content Start
===========================-->

@yield('content')

<!--==========================
   Content End
===========================-->


<!--==========================
    FOOTER PART START
===========================-->
@include('frontend.layouts.footer')
<!--==========================
    FOOTER PART END
===========================-->


<!--=============SCROLL BTN==============-->
<div class="scroll_btn">
    <i class="fas fa-chevron-up"></i>
</div>
<!--=============SCROLL BTN==============-->

@include('frontend.layouts.scripts')

</body>

</html>
