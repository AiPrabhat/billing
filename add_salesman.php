<?php

session_start();

include './includes/header.php';
include './includes/sidebar.php';
include './includes/connection.php';
include './includes/function.php';

$first_name = '';
$last_name = '';
$phone = '';
$email = '';
$username = '';
$password = '';
$status = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "select * from retailers where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $first_name = $row['first_name'];
        $last_name= $row['last_name'];
        $phone = $row['phone'];
        $email = $row['email'];
        $username = $row['username'];
        $password = $row['password'];
        $status = $row['status'];
    } else {
        echo "<script type='text/javascript'>";
        echo "window.location = 'salesman.php';";
        echo "</script>";
    }
}

$msg = '';
if (isset($_POST['submit'])) {
    $first_name = get_safe_value($con, $_POST['first_name']);
    $last_name = get_safe_value($con, $_POST['last_name']);
    $phone = get_safe_value($con, $_POST['phone']);
    $email = get_safe_value($con, $_POST['email']);
    $username = get_safe_value($con, $_POST['username']);
    $password = get_safe_value($con, $_POST['password']);
    $status = get_safe_value($con, $_POST['status']);

    $res = mysqli_query($con, "select * from salesman where phone='$phone'");
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
            $query = "UPDATE retailers SET `first_name`='$first_name', last_name='$last_name', phone='$phone', email='$email', username='$username', `password`='$password', `status`='$status' WHERE id='$id'";
            mysqli_query($con, $query);
            $msg = "Salesman Updated Successfully";
        } else {
            $query = "INSERT INTO retailers(id,first_name,last_name,phone,email,username,`password`,`status`,created_at) VALUES (DEFAULT,'$first_name','$last_name','$phone','$email','$username','$password','$status',DEFAULT);";
            mysqli_query($con, $query);
            $msg = "Salesman Added Successfully";
        }
        echo "<script type='text/javascript'>";
        echo "window.location = 'salesman.php';";
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
                        <li class="breadcrumb-item"><a href="./salesman.php">Salesman</a></li>
                        <li class="breadcrumb-item active"> Add Salesman </li>
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
                            <h3 class="card-title">Salesman Information</h3>
                            <a href="./salesman.php" class="float-right">
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
                                            <label>First Name<span class="text-danger">*</span></label>
                                            <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="<?php echo $first_name ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name<span class="text-danger">*</span></label>
                                            <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="<?php echo $last_name ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone<span class="text-danger">*</span></label>
                                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="<?php echo $phone ?>" minlength="10" maxlength="10" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email<span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Username<span class="text-danger">*</span></label>
                                            <input type="text" name="username" class="form-control" placeholder="Enter Username" value="<?php echo $username ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Enter Password" value="<?php echo $password ?>" required>
                                        </div>
                                    </div>
                         
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status<span class="text-danger">*</span></label>
                                            <select name="status" class="form-control select2" required>
                                                <option value="1" <?php if ($status == "1") echo 'selected="selected"'; ?>>Active</option>
                                                <option value="0" <?php if ($status == "0") echo 'selected="selected"'; ?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-danger ml-2 mb-2"><b><?php echo $msg ?></b></div>
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn bg-primary btn-block">
                                            <i class="fas fa-save">&nbsp;</i> Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
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