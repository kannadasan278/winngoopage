
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                           <p class="text-muted">©<script>document.write(new Date().getFullYear())</script> winngoo All rights reserved</p>

                            </div>

                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('backend/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('backend/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('backend/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('backend/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('backend/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- Peity JS -->
        <script src="{{asset('backend/libs/peity/jquery.peity.min.js')}}"></script>

        <script src="{{asset('backend/libs/morris.js/morris.min.js')}}"></script>
        <script src="{{asset('backend/libs/raphael/raphael.min.js')}}"></script>

        <script src="{{asset('backend/js/pages/dashboard.init.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <!-- Required datatable js -->
        <script src="{{asset('backend/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{asset('backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('backend/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('backend/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('backend/libs/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{asset('backend/libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{asset('backend/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('backend/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('backend/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{asset('backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatable init js -->
        <script src="{{asset('backend/js/pages/datatables.init.js')}}"></script>
        <!-- App js -->
        <script src="{{asset('backend/js/app.js')}}"></script>


  @stack('scripts')

  <script>
    setTimeout(function(){
      $('.alert').slideUp();
    },4000);
  </script>
