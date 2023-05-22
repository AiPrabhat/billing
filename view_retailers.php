<?php

session_start();

include './includes/header.php';
include './includes/sidebar.php';
include './includes/connection.php';
include './includes/function.php';

$name = '';
$phone = '';
$person = '';
$route = '';
$address1 = '';
$address2 = '';
$city = '';
$pincode = '';
$state = '';
$country = '';
$gstno = '';
$panno = '';
$retailer_type = '';
$status = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "select * from retailers where id='$id'");
    $row = mysqli_fetch_assoc($res);

    $name = $row['name'];
    $phone = $row['phone'];
    $person = $row['person'];
    $route = $row['route'];
    $address1 = $row['address1'];
    $address2 = $row['address2'];
    $city = $row['city'];
    $pincode = $row['pincode'];
    $state = $row['state'];
    $country = $row['country'];
    $gstno = $row['gstno'];
    $panno = $row['panno'];
    $retailer_type = $row['retailer_type'];
    $status = $row['status'];
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php // include('message.php'); 
    ?>
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
                        <form role="form" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name<span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" value="<?php echo $name ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone<span class="text-danger">*</span></label>
                                            <input type="text" name="phone" class="form-control" value="<?php echo $phone ?>" minlength="10" maxlength="10" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact Person</label>
                                            <input type="text" name="person" class="form-control" value="<?php echo $person ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Route<span class="text-danger">*</span></label>
                                            <select name="route" class="form-control select2" disabled>
                                                <option value="">Select Route</option>
                                                <?php
                                                $sql = "select * from routes where status=1 order by name asc;";
                                                $froute = mysqli_query($con, $sql);
                                                while ($frow = mysqli_fetch_assoc($froute)) { ?>
                                                    <option value="<?php echo $frow['name'] ?>" <?php if ($route == $frow['name']) echo 'selected="selected"'; ?>><?php echo $frow['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address 1<span class="text-danger">*</span></label>
                                            <input type="text" name="address1" class="form-control" value="<?php echo $address1 ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address 2</label>
                                            <input type="text" name="address2" class="form-control" value="<?php echo $address2 ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City<span class="text-danger">*</span></label>
                                            <input type="text" name="city" class="form-control" value="<?php echo $city ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pin Code<span class="text-danger">*</span></label>
                                            <input type="number" name="pincode" class="form-control" value="<?php echo $pincode ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State<span class="text-danger">*</span></label>
                                            <select name="state" class="form-control" disabled>
                                                <option value="Maharashtra" <?php if ($state == "Maharashtra") echo 'selected="selected"'; ?>>Maharashtra</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country<span class="text-danger">*</span></label>
                                            <select name="country" class="form-control" disabled>
                                                <option value="India" <?php if ($country == "India") echo 'selected="selected"'; ?>>India</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Retailer Type<span class="text-danger">*</span></label>
                                            <select name="retailer_type" class="form-control" disabled>
                                                <option value="">----- Retailer Type -----</option>
                                                <option value="General Store" <?php if ($retailer_type == "General Store") echo 'selected="selected"'; ?>>General Store</option>
                                                <option value="Chemist" <?php if ($retailer_type == "Chemist") echo 'selected="selected"'; ?>>Chemist</option>
                                                <option value="Dairy" <?php if ($retailer_type == "Dairy") echo 'selected="selected"'; ?>>Dairy</option>
                                                <option value="Wholesale" <?php if ($retailer_type == "Wholesale") echo 'selected="selected"'; ?>>Wholesale</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status<span class="text-danger">*</span></label>
                                            <select name="status" class="form-control" disabled>
                                                <option value="1" <?php if ($status == "1") echo 'selected="selected"'; ?>>Active</option>
                                                <option value="0" <?php if ($status == "0") echo 'selected="selected"'; ?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>GST Number</label>
                                            <input type="text" name="gstno" class="form-control" value="<?php echo $gstno ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>PAN Number</label>
                                            <input type="text" name="panno" class="form-control" value="<?php echo $panno ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
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