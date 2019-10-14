<!DOCTYPE html>
<html lang="en">

<head>

@include('layouts.back._head')

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.back._sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->

        <div id="content">

            <!-- Topbar -->
        @include('layouts.back._header')
            <!-- End of Topbar -->
            @include('layouts.back._message')

            <!-- Begin Page Content -->
        @yield('content')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('layouts.back._footer')
        <!-- End of Footer -->


    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
    @include('layouts.back._logout_modal')
<!-- Bootstrap core JavaScript-->

@include('layouts.back._scripts')

</body>

</html>
