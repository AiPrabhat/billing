<?php

session_start();

include './includes/header.php';
include './includes/sidebar.php';
include './includes/connection.php';
include './includes/function.php';

$name = '';
$mrp = '';
$rate = '';
$qty = '';
$hsn_code = '';
$status = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "select * from products where id='$id'");
    $row = mysqli_fetch_assoc($res);

    $name = $row['name'];
    $mrp = $row['mrp'];
    $rate = $row['rate'];
    $qty = $row['qty'];
    $hsn_code = $row['hsn_code'];
    $status = $row['status'];
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php // include('message.php'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php"> Home </a></li>
                        <li class="breadcrumb-item"><a href="./products.php">Products</a></li>
                        <li class="breadcrumb-item active"> View Products </li>
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
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">View Products</h3>
                            <a href="./products.php" class="float-right">
                                <button class="btn btn-primary">
                                    <i class="fas fa-flip-horizontal fa-fw fa-share"></i>&nbsp; Back
                                </button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post">
                            <div class="card-body">
                                <div class="row col-md-12 item-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name<span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter Products Name" value="<?php echo $name ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>QTY<span class="text-danger">*</span></label>
                                            <input type="number" name="qty" class="form-control" placeholder="Enter Product Quantity" value="<?php echo $mrp ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>HSN Code<span class="text-danger">*</span></label>
                                            <input type="text" name="hsn_code" class="form-control" placeholder="Enter Product Code" value="<?php echo $hsn_code ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>MRP<span class="text-danger">*</span></label>
                                            <input type="number" name="mrp" class="form-control" placeholder="Enter Product MRP" value="<?php echo $mrp ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Rate</label>
                                            <input type="text" name="rate" class="form-control" placeholder="Enter Product Rate" value="<?php echo $rate ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Status<span class="text-danger">*</span></label>
                                            <select name="status" class="form-control" disabled>
                                                <option <?php if($status=="1") echo 'selected="selected"'; ?> >Active</option>
                                                <option <?php if($status=="0") echo 'selected="selected"'; ?> >Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <!-- /.card -->
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