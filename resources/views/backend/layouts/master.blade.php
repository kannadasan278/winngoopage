<!DOCTYPE html>
<html lang="en">

@include('backend.layouts.head')

    <body data-sidebar="dark" data-topbar="colored">

  <!-- Page Wrapper -->
        <div id="layout-wrapper">

    <!-- Sidebar -->
    @include('backend.layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="main-content">
@include('sweetalert::alert')
      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('backend.layouts.header')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        @yield('main-content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      @include('backend.layouts.footer')

</body>

</html>
