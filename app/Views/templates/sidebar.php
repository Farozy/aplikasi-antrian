 <!-- Main Sidebar Container -->
 <!-- <aside class="main-sidebar sidebar-dark-primary elevation-4"> -->
 <aside class="main-sidebar elevation-4">
   <!-- Brand Logo -->
   <a href="#" class="brand-link">
     <img src="<?= base_url('templates'); ?>/dist/img/user2-160x160.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">Antrian</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar pt-3">
     <!-- SidebarSearch Form -->
     <div class="form-inline">
       <div class="input-group" data-widget="sidebar-search">
         <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
         <div class="input-group-append">
           <button class="btn btn-sidebar">
             <i class="fas fa-search fa-fw"></i>
           </button>
         </div>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item">
           <a href="<?= base_url('PemanggilanAntrian'); ?>" class="nav-link <?= $title == 'Pemanggilan Antrian' ? 'active' : '' ?>">
             <i class="nav-icon fas fa-microscope"></i>
             <p>Pemanggilan Antrian</p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?= base_url('NoAntrian'); ?>" class="nav-link <?= $title == 'No Antrian' ? 'active' : '' ?>">
             <i class="nav-icon fas fa-users"></i>
             <p>No. Antrian</p>
           </a>
         </li>
         <li class="nav-item">
           <a href="<?= base_url('KodeAntrian'); ?>" class="nav-link <?= $title == 'Kode Antrian' ? 'active' : '' ?>">
             <i class="nav-icon fas fa-code"></i>
             <p>Kode Antrian</p>
           </a>
         </li>
         <li class="nav-item">
           <a class="nav-link" type="button" id="logout">
             <i class="nav-icon fas fa-sign-out-alt"></i>
             <p>Logout</p>
           </a>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>