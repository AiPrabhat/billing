<?php

session_start();

include './includes/header.php';
include './includes/sidebar.php';
include './includes/connection.php';
include './includes/function.php';

$name = '';
$username = '';
$password = '';
$status = '';

$user = $_SESSION['ADMIN_USERNAME'];
$res = mysqli_query($con, "select * from admin_users where username='$user'");
$row = mysqli_fetch_assoc($res);
$id = $row['id'];
$name = $row['name'];
$username = $row['username'];
$password = $row['password'];
$status = $row['status'];

$msg = '';
if (isset($_POST['submit'])) {
    $id = $row['id'];
    $name = get_safe_value($con, $_POST['name']);
    $username = get_safe_value($con, $_POST['username']);
    $password = get_safe_value($con, $_POST['password']);
    $status = get_safe_value($con, $_POST['status']);

    $res = mysqli_query($con, "select * from admin_users where username='$username'");
    $check = mysqli_num_rows($res);

    if ($check > 0) {
        if ($username == $_POST['username']) {
        } else {
            $msg = 'Username already exist';
        }
    }

    if ($msg == '') {
        $query = "UPDATE admin_users SET `name`='$name', username='$username', `password`='$password', `status`='$status' WHERE id='$id'";
        mysqli_query($con, $query);
        echo "<script type='text/javascript'>";
        echo "window.location = 'logout.php';";
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
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php"> Home </a></li>
                        <li class="breadcrumb-item active"> My Account </li>
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
                            <h3 class="card-title">Users Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name<span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $name ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Username<span class="text-danger">*</span></label>
                                            <input type="text" name="username" class="form-control" placeholder="Enter Username" value="<?php echo $username ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password<span class="text-danger">*</span></label>
                                            <input type="password" name="password" class="form-control" placeholder="Enter Password" value="<?php echo $password ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Status<span class="text-danger">*</span></label>
                                            <select name="status" class="form-control" required>
                                                <option value="1" <?php if ($status == "1") echo 'selected="selected"'; ?>>Active</option>
                                                <option value="0" <?php if ($status == "0") echo 'selected="selected"'; ?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-danger ml-3 mb-2"><b><?php echo $msg ?></b></div>
                                    <div class="form-group col-md-12">
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