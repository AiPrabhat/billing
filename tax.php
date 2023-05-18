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
        $delete_sql = "delete from tax where id='$id';";
        mysqli_query($con, $delete_sql);
    }
}

$sql = "select * from tax order by id asc;";
$res = mysqli_query($con, $sql);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Tax </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php"> Home </a></li>
                        <li class="breadcrumb-item active"><a href="./tax.php"></a> Tax </li>
                        <li class="breadcrumb-item active"> Manage Tax </li>
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
                            <h3 class="card-title"> Manage Tax </h3>
                            <a href="./add_tax.php" class="btn btn-primary float-right">
                                <i class="fas fa-plus-circle">&nbsp;&nbsp;</i> Add Tax
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
                                                    <th class="sorting">CGST</th>
                                                    <th class="sorting">SGST</th>
                                                    <th class="sorting">Status</th>
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
                                                        <td><?php echo $row['cgst'] ?></td>
                                                        <td><?php echo $row['sgst'] ?></td>
                                                        <td>
                                                            <?php
                                                            if ($row['status'] == 1) {
                                                                echo '<span class="badge badge-success">Active</span>';
                                                            } else {
                                                                echo '<span class="badge badge-danger">Inactive</span>';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="view_tax.php?id=<?php echo $row['id'] ?>" class="btn btn-info" title="View">
                                                                <i class="fas fa-eye text-white"></i>
                                                            </a>
                                                            <a href="add_tax.php?id=<?php echo $row['id'] ?>" class="btn btn-warning" title="Edit">
                                                                <i class="fas fa-edit text-white"></i>
                                                            </a>
                                                            <!-- <a href="?type=delete&id=" class="btn btn-sm btn-danger" title="Delete">
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