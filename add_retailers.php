<?php

session_start();

include './includes/header.php';
include './includes/sidebar.php';
include './includes/connection.php';
include './includes/function.php';

$name = '';
$phone = '';
$person = '';
$address1 = '';
$address2 = '';
$city = '';
$pincode = '';
$gstno = '';
$retailer_type = '';
$status = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "select * from retailers where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $name = $row['name'];
        $phone = $row['phone'];
        $person = $row['person'];
        $address1 = $row['address1'];
        $address2 = $row['address2'];
        $city = $row['city'];
        $pincode = $row['pincode'];
        $gstno = $row['gstno'];
        $retailer_type = $row['retailer_type'];
        $status = $row['status'];
    } else {
        echo "<script type='text/javascript'>";
        echo "window.location = 'retailers.php';";
        echo "</script>";
    }
}

$msg = '';
if (isset($_POST['submit'])) {
    $name = get_safe_value($con, $_POST['name']);
    $phone = get_safe_value($con, $_POST['phone']);
    $person = get_safe_value($con, $_POST['person']);
    $address1 = get_safe_value($con, $_POST['address1']);
    $address2 = get_safe_value($con, $_POST['address2']);
    $city = get_safe_value($con, $_POST['city']);
    $pincode = get_safe_value($con, $_POST['pincode']);
    $gstno = get_safe_value($con, $_POST['gstno']);
    $retailer_type = get_safe_value($con, $_POST['retailer_type']);
    $status = get_safe_value($con, $_POST['status']);

    $res = mysqli_query($con, "select * from retailers where phone='$phone'");
    $check = mysqli_num_rows($res);

    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = 'Phone number already exist';
            }
        } else {
            $msg = 'Phone number already exist';
        }
    }

    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $query = "UPDATE retailers SET `name`='$name', phone='$phone', person='$person', address1='$address1', address2='$address2', city='$city', pincode='$pincode', gstno='$gstno', retailer_type='$retailer_type', `status`='$status' WHERE id='$id'";
            mysqli_query($con, $query);
        } else {
            $query = "INSERT INTO retailers(id,`name`, phone, person, address1, address2, city, pincode, gstno, retailer_type, `status`, created_at) VALUES (DEFAULT,'$name','$phone','$person','$address1','$address2','$city','$pincode','$gstno','$retailer_type','$status',DEFAULT);";
            mysqli_query($con, $query);
        }
        echo "<script type='text/javascript'>";
        echo "window.location = 'retailers.php';";
        echo "</script>";
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php 
    // include('message.php');
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
                        <li class="breadcrumb-item active"> Add Retailers </li>
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
                            <h3 class="card-title">Retailers Information</h3>
                            <a href="./retailers.php" class="float-right">
                                <button class="btn btn-primary" title="Go Back">
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
                                            <input type="text" name="name" class="form-control" placeholder="Enter Retailers Name" value="<?php echo $name ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone<span class="text-danger">*</span></label>
                                            <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number" value="<?php echo $phone ?>" minlength="10" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Person</label>
                                            <input type="text" name="person" class="form-control" placeholder="Enter Contact Person" value="<?php echo $person ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Retailer Type<span class="text-danger">*</span></label>
                                            <select name="retailer_type" class="form-control" required>
                                                <option value="">- - - - Select - - - -</option>
                                                <option value="General Store" <?php if ($retailer_type == "General Store") echo 'selected="selected"'; ?>>General Store</option>
                                                <option value="Chemist" <?php if ($retailer_type == "Chemist") echo 'selected="selected"'; ?>>Chemist</option>
                                                <option value="Dairy" <?php if ($retailer_type == "Dairy") echo 'selected="selected"'; ?>>Dairy</option>
                                                <option value="Wholesale" <?php if ($retailer_type == "Wholesale") echo 'selected="selected"'; ?>>Wholesale</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status<span class="text-danger">*</span></label>
                                            <select name="status" class="form-control" required>
                                                <option value="1" <?php if ($status == "1") echo 'selected="selected"'; ?>>Active</option>
                                                <option value="0" <?php if ($status == "0") echo 'selected="selected"'; ?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address 1<span class="text-danger">*</span></label>
                                            <input type="text" name="address1" class="form-control" placeholder="Enter Address 1" value="<?php echo $address1 ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Address 2</label>
                                            <input type="text" name="address2" class="form-control" placeholder="Enter Address 2" value="<?php echo $address2 ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>City<span class="text-danger">*</span></label>
                                            <input type="text" name="city" class="form-control" placeholder="Enter City" value="<?php echo $city ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Pin Code<span class="text-danger">*</span></label>
                                            <input type="number" name="pincode" class="form-control" placeholder="Enter Pin Code" value="<?php echo $pincode ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>GST Number</label>
                                            <input type="text" name="gstno" class="form-control" placeholder="Enter GST Number" value="<?php echo $gstno ?>">
                                        </div>
                                    </div>
                                    <div class="text-danger ml-3 mb-3"><b><?php echo $msg ?></b></div>
                                    <div class="col-md-12 mt-2">
                                        <button type="submit" name="submit" class="btn bg-primary btn-block">
                                            <i class="fas fa-save">&nbsp;</i> Save
                                        </button>
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