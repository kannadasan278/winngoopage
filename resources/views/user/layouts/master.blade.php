<!DOCTYPE html>
<html lang="en">

@include('user.layouts.head')

    <body data-sidebar="dark" data-topbar="colored">

  <!-- Page Wrapper -->
        <div id="layout-wrapper">

    <!-- Sidebar -->
    @include('user.layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="main-content">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('user.layouts.header')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        @yield('main-content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      @include('user.layouts.footer')

</body>

</html>
