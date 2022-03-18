<?php
include('../config.php');
$sql = "SELECT * From user_reg";
$result = mysqli_query($conn, $sql);
?>

<?php
include('includes/header.php');
?>

<div class="container-fluid mt-5">
    <h2>ALL USERS</h2>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <th>Username</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </thead>

        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['u_Username'] ?></td>
                    <td><?php echo $row['u_Phone']; ?></td>
                    <td><?php echo $row['u_Email']; ?></td>
                    <td><?php echo $row['u_Pass']; ?></td>
                    <td>
                    <a href="" class="btn btn-xs btn-primary user-view" data-id="<?php echo $row['user_Id']; ?>" data-toggle="modal" data-target="#user-detail"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-xs btn-danger delete_user" href="javascript:void();" data-id="<?php echo $row['user_Id']; ?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>

    </table>

</div>



<!-- Modal -->
<div class="modal fade" id="user-detail" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<!-- /Modal -->
<?php
include ('includes/Footer.php');
include ('includes/Scripts.php');
?>

