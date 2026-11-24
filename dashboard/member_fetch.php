<?php
session_start();
require_once __DIR__ . '/../config.php';
include('includes/header.php');
include('includes/navbar.php');
?>
<!-- for members -->


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Member Profile
      </h6>
    </div>

    <div class="card-body">

      <?php
      if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
        echo '<h3 class="bg-primary text-white">' . $_SESSION['success'] . '<h3>';
        unset($_SESSION['success']);
      }

      if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '<h3 class="bg-danger text-white">' . $_SESSION['status'] . '<h3>';
        unset($_SESSION['status']);
      }

      ?>
      <div class="table-responsive">

        <?php
        $query = "SELECT * FROM data";
        $query_run = mysqli_query($connection, $query);
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> ID </th>
              <th> Username </th>
              <th>Email </th>
              <th>Password</th>
              <th>EDIT </th>
              <th>DELETE </th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>


                <tr>
                  <td>
                    <?php echo $row['id']; ?>
                  </td>
                  <td>
                    <?php echo $row['username']; ?>
                  </td>
                  <td>
                    <?php echo $row['email']; ?>
                  </td>
                  <td>
                    <?php echo $row['password']; ?>
                  </td>
                  <td>
                    <form action="regester_member_edit.php" method="post">
                      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                    </form>
                  </td>
                  <td>
                    <form action="admin_regester.php" method="post">
                      <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                    </form>
                  </td>
                </tr>
            <?php

              }
            } else "NO Record Found";
            ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>