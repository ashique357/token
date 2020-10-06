<html lang="en">
@include('Admin.Layouts.header')
<body id="page-top">
  <div id="wrapper">
  @include('Admin.Layouts.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      @include('Admin.Layouts.nav')

        @yield('page_content')

      </div>
      <!-- End of Main Content -->

      @include('Admin.Layouts.footer')

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>  
@include('Admin.Layouts.logout_modal')
@include('Admin.Layouts.footer_links')
</body>
</html>