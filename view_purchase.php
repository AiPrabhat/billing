<?php

session_start();

include './includes/header.php';
include './includes/sidebar.php';
include './includes/connection.php';
include './includes/function.php';

$name = '';
$phone = '';
$person = '';
$gstno = '';
$address1 = '';
$address2 = '';
$city = '';
$pincode = '';
$retailer_type = '';
$status = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "select * from retailers where id='$id'");
    $row = mysqli_fetch_assoc($res);

    $name = $row['name'];
    $phone = $row['phone'];
    $person = $row['person'];
    $gstno = $row['gstno'];
    $address1 = $row['address1'];
    $address2 = $row['address2'];
    $city = $row['city'];
    $pincode = $row['pincode'];
    $retailer_type = $row['retailer_type'];
    $status = $row['status'];
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include('message.php'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Retailers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php"> Home </a></li>
                        <li class="breadcrumb-item"><a href="./retailers.php">Retailers</a></li>
                        <li class="breadcrumb-item active"> View Retailers </li>
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
                            <h3 class="card-title">View Retailers</h3>
                            <a href="./retailers.php" class="float-right">
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
                                            <input type="text" name="name" class="form-control" placeholder="Enter Retailers Name" value="<?php echo $name ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone<span class="text-danger">*</span></label>
                                            <input type="phone" name="phone" class="form-control" placeholder="Enter Phone Number" value="<?php echo $phone ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Person</label>
                                            <input type="text" name="person" class="form-control" placeholder="Enter Contact Person" value="<?php echo $person ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Retailer Type<span class="text-danger">*</span></label>
                                            <select name="retailer_type" class="form-control" disabled>
                                                <option>- - - - Select - - - -</option>
                                                <option <?php if ($retailer_type == "General Store") echo 'selected="selected"'; ?>>General Store</option>
                                                <option <?php if ($retailer_type == "Chemist") echo 'selected="selected"'; ?>>Chemist</option>
                                                <option <?php if ($retailer_type == "Dairy") echo 'selected="selected"'; ?>>Dairy</option>
                                                <option <?php if ($retailer_type == "Wholesale") echo 'selected="selected"'; ?>>Wholesale</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status<span class="text-danger">*</span></label>
                                            <select name="status" class="form-control" disabled>
                                                <option <?php if ($status == "1") echo 'selected="selected"'; ?>>Active</option>
                                                <option <?php if ($status == "0") echo 'selected="selected"'; ?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address 1<span class="text-danger">*</span></label>
                                            <input type="text" name="address1" class="form-control" placeholder="Enter Address 1" value="<?php echo $address1 ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Address 2</label>
                                            <input type="text" name="address2" class="form-control" placeholder="Enter Address 2" value="<?php echo $address2 ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>City<span class="text-danger">*</span></label>
                                            <input type="text" name="city" class="form-control" placeholder="Enter City" value="<?php echo $city ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Pin Code<span class="text-danger">*</span></label>
                                            <input type="number" name="pincode" class="form-control" placeholder="Enter Pin Code" value="<?php echo $pincode ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>GST Number</label>
                                            <input type="text" name="gstno" class="form-control" placeholder="Enter GST Number" value="<?php echo $gstno ?>" disabled>
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