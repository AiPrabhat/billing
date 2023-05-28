<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link fas fa-user mx-2" data-toggle="dropdown" href="#">
        &nbsp;<?php echo ucfirst($_SESSION['ADMIN_USERNAME']) ?>
      </a>
      <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <a href="./account.php" class="dropdown-item">
          <i class="fas fa-user mr-3"></i> Account
        </a>
        <a href="./logout.php" class="dropdown-item">
          <i class="fas fa-power-off mr-3"></i> Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link text-center">
    <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-bold">Sri Ram Distributors</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="./index.php" class="nav-link <?= $page == 'index.php' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item <?= $page == 'purchase.php' | $page == 'add_purchase.php' | $page == 'view_purchase.php' ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?= $page == 'purchase.php' | $page == 'add_purchase.php' | $page == 'view_purchase.php' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-file-invoice"></i>
            <p>Purchase<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./purchase.php" class="nav-link <?= $page == 'purchase.php' | $page == 'view_purchase.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Purchase</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./add_purchase.php" class="nav-link <?= $page == 'add_purchase.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Purchase</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./purchase.php" class="nav-link <?= $page == 'add_suppliers.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Suppliers</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="retailers.php" class="nav-link <?= $page == 'retailers.php' | $page == 'add_retailers.php' | $page == 'view_retailers.php' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-address-card"></i>
            <p>Retailers</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="retailers.php" class="nav-link <?= $page == 'salesman.php' | $page == 'add_salesman.php' | $page == 'view_retailers.php' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>Salesman</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="products.php" class="nav-link <?= $page == 'products.php' | $page == 'add_products.php' | $page == 'view_products.php' ? 'active' : ''; ?>">
            <i class="nav-icon fab fa-product-hunt"></i>
            <p>Products</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="brands.php" class="nav-link <?= $page == 'brands.php' | $page == 'add_brands.php' | $page == 'view_brands.php' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-bolt"></i>
            <p>Brands</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="tax.php" class="nav-link <?= $page == 'tax.php' | $page == 'add_tax.php' | $page == 'view_tax.php' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>Tax</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="routes.php" class="nav-link <?= $page == 'routes.php' | $page == 'add_routes.php' | $page == 'view_routes.php' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-route"></i>
            <p>Routes</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="users.php" class="nav-link <?= $page == 'users.php' | $page == 'add_users.php' | $page == 'view_users.php' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>Users</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="./account.php" class="nav-link <?= $page == 'account.php' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>My Account</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>