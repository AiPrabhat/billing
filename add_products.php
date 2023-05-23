<?php

session_start();

include './includes/header.php';
include './includes/sidebar.php';
include './includes/connection.php';
include './includes/function.php';

$name = '';
$brand = '';
$mrp = '';
$rate = '';
$hsn_code = '';
$status = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
  $id = get_safe_value($con, $_GET['id']);
  $res = mysqli_query($con, "select * from products where id='$id'");
  $check = mysqli_num_rows($res);
  if ($check > 0) {
    $row = mysqli_fetch_assoc($res);
    $name = $row['name'];
    $brand = $row['brand'];
    $mrp = $row['mrp'];
    $rate = $row['rate'];
    $hsn_code = $row['hsn_code'];
    $status = $row['status'];
  } else {
    echo "<script type='text/javascript'>";
    echo "window.location = 'products.php';";
    echo "</script>";
  }
}

$msg = '';
if (isset($_POST['submit'])) {
  $name = get_safe_value($con, $_POST['name']);
  $brand = get_safe_value($con, $_POST['brand']);
  $mrp = get_safe_value($con, $_POST['mrp']);
  $rate = get_safe_value($con, $_POST['rate']);
  $hsn_code = get_safe_value($con, $_POST['hsn_code']);
  $status = get_safe_value($con, $_POST['status']);

  $res = mysqli_query($con, "select * from products where name='$name'");
  $check = mysqli_num_rows($res);

  if ($check > 0) {
    if (isset($_GET['id']) && $_GET['id'] != '') {
      $getData = mysqli_fetch_assoc($res);
      if ($id == $getData['id']) {
      } else {
        $msg = 'Product name already exist';
      }
    } else {
      $msg = 'Product name already exist';
    }
  }

  if ($msg == '') {
    if (isset($_GET['id']) && $_GET['id'] != '') {
      $query = "UPDATE products SET `name`='$name', brand='$brand', mrp='$mrp', rate='$rate', hsn_code='$hsn_code', `status`='$status' WHERE id='$id'";
      mysqli_query($con, $query);
    } else {
      $query = "INSERT INTO products(id, `name`, brand, mrp, rate, hsn_code, `status`, created_at) VALUES (DEFAULT,'$name','$brand','$mrp','$rate','$hsn_code','$status',DEFAULT)";
      mysqli_query($con, $query);
    }
    echo "<script type='text/javascript'>";
    echo "window.location = 'products.php';";
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
          <h1 class="m-0">Products</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./index.php"> Home </a></li>
            <li class="breadcrumb-item"><a href="./products.php">Products</a></li>
            <li class="breadcrumb-item active"> Add Products </li>
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
              <h3 class="card-title">Products Information</h3>
              <a href="./products.php" class="float-right">
                <button class="btn btn-primary" title="Go Back">
                  <i class="fas fa-flip-horizontal fa-fw fa-share"></i>&nbsp; Back
                </button>
              </a>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Name<span class="text-danger">*</span></label>
                      <input type="text" name="name" class="form-control" placeholder="Enter Products Name" value="<?php echo $name ?>" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Brand<span class="text-danger">*</span></label>
                      <select name="brand" class="form-control select2" required>
                        <option value="">Select Brand</option>
                        <?php
                        $sql = "select * from brands where status=1 order by brand asc;";
                        $fbrand = mysqli_query($con, $sql);
                        while ($brow = mysqli_fetch_assoc($fbrand)) { ?>
                          <option value="<?php echo $brow['brand'] ?>" <?php if ($brand == $brow['brand']) echo 'selected="selected"'; ?>><?php echo $brow['brand'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>MRP<span class="text-danger">*</span></label>
                      <input type="number" name="mrp" class="form-control" placeholder="Enter Product MRP" value="<?php echo $mrp ?>" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rate<span class="text-danger">*</span></label>
                      <input type="number" name="rate" class="form-control" placeholder="Enter Product Rate" value="<?php echo $rate ?>" step=".01" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>HSN Code<span class="text-danger">*</span></label>
                      <input type="text" name="hsn_code" class="form-control" placeholder="Enter Product Code" value="<?php echo $hsn_code ?>" required>
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