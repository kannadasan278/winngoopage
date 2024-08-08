<!DOCTYPE html>
<html lang="en">

@include('merchant.layouts.head')

    <body data-sidebar="dark" data-topbar="colored">

  <!-- Page Wrapper -->
        <div id="layout-wrapper">

    <!-- Sidebar -->
    @include('merchant.layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="main-content">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('merchant.layouts.header')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        @yield('main-content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      @include('merchant.layouts.footer')

</body>

</html>
