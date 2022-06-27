   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
  <div class="sidebar-brand-icon">
  <i class='bx bxl-postgresql'></i>
  </div>
  <!-- <div class="sidebar-brand-text mx-3">FUNDA <sup>WEB IT</sup></div> -->
  <div class="sidebar-brand-text mx-3">รายงานช้างออกนอกพื้นที่</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<div class="sidebar-heading">
  Interface
</div>

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="home.php">
        <i class='bx bx-table'></i>
        <span class="links_name">ตารางข้อมูล</span>
    </a>
</li>

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="img.php">
        <i class='bx bx-image-alt'></i>
        <span class="links_name">ตารางภาพช้าง</span>
    </a>
</li>

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="manageuser.php">
        <i class='bx bx-file'></i>
        <span class="links_name">การจัดการผู้ใช้งาน</span>
    </a>
</li>

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="add_data_admin.php">
        <i class='bx bxs-file-plus'></i>
        <span class="links_name">เพิ่มข้อมูล</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="logout.php">
        <i class='bx bx-log-out'></i>
        <span class="links_name">ออกจากระบบ</span>
    </a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

          <form action="logout.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

          </form>


        </div>
      </div>
    </div>
  </div>