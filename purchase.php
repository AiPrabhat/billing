<?php

session_start();

include './includes/header.php';
include './includes/sidebar.php';
include './includes/connection.php';
include './includes/function.php';

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);

    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "delete from retailers where id='$id';";
        mysqli_query($con, $delete_sql);
    }
}

$sql = "select * from `retailers` order by id asc;";
$res = mysqli_query($con, $sql);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Retailers </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php"> Home </a></li>
                        <li class="breadcrumb-item active"><a href="./retailers.php"></a> Retailers </li>
                        <li class="breadcrumb-item active"> Manage Retailers </li>
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
                            <h3 class="card-title"> Manage Retailers </h3>
                            <a href="./add_retailers.php" class="btn btn-primary float-right">
                                <i class="fas fa-plus-circle">&nbsp;&nbsp;</i> Add Retailers
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting sorting_asc">#</th>
                                                    <th class="sorting">Name</th>
                                                    <th class="sorting">Phone</th>
                                                    <th class="sorting">Ret. Type</th>
                                                    <th class="sorting">Address 1</th>
                                                    <th class="sorting">City</th>
                                                    <th class="sorting">Pincode</th>
                                                    <th class="sorting">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                ?>
                                                    <tr>
                                                        <th><?php echo $i ?></th>
                                                        <td><?php echo $row['name'] ?></td>
                                                        <td><?php echo $row['phone'] ?></td>
                                                        <td><?php echo $row['retailer_type'] ?></td>
                                                        <td><?php echo $row['address1'] ?></td>
                                                        <td><?php echo $row['city'] ?></td>
                                                        <td><?php echo $row['pincode'] ?></td>
                                                        <td class="text-center">
                                                            <a href="view_retailers.php?id=<?php echo $row['id'] ?>" class="btn btn-info" title="View">
                                                                <i class="fas fa-eye text-white"></i>
                                                            </a>
                                                            <a href="add_retailers.php?id=<?php echo $row['id'] ?>" class="btn btn-warning" title="Edit">
                                                                <i class="fas fa-edit text-white"></i>
                                                            </a>
                                                            <!-- <a href="?type=delete&id=" class="btn btn-sm btn-danger" data-toggle="tooltip" data-original-title="Delete">
													<i class="fas fa-times text-white">&nbsp;</i>
												</a> -->
                                                        </td>
                                                    </tr>
                                                    <?php $i++ ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
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