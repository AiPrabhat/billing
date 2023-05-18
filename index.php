<?php

session_start();

include './includes/header.php';
include './includes/sidebar.php';
include './includes/connection.php';
include './includes/function.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"> Home </a></li>
                        <li class="breadcrumb-item active"> Dashboard </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0"> Shortcuts </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-sm-8">
                                    <!-- small card -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>Retailers</h3>
                                            <p>Manage Retailers</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-store"></i>
                                        </div>
                                        <a href="retailers.php" class="small-box-footer">
                                            Go to Retailers <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-sm-8">
                                    <!-- small card -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3>Products</h3>
                                            <p>Manage Products</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fab fa-product-hunt"></i>
                                        </div>
                                        <a href="products.php" class="small-box-footer">
                                            Go to Products Page <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-sm-8">
                                    <!-- small card -->
                                    <div class="small-box bg-primary">
                                        <div class="inner">
                                            <h3>Users</h3>
                                            <p>Manage Users</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <a href="users.php" class="small-box-footer">
                                            Go to Users Page <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-sm-8">
                                    <!-- small card -->
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3>Tax</h3>
                                            <p>Manage Tax</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-chart-pie"></i>
                                        </div>
                                        <a href="tax.php" class="small-box-footer">
                                            Go to Tax Page <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include './includes/footer.php'; ?>