<?php
require_once __DIR__ . '/security.php';

include('includes/header.php');
include('includes/navbar.php');
?>
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"> Edit Member Profiles </h6>
    </div>
    <div class="card-body">

      <?php

      if (isset($_POST['edit_btn'])) {
          $id = (int)($_POST['edit_id'] ?? 0);

        $stmt = $conn->prepare("SELECT id, username, email FROM data WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
      ?>

          <form action="admin_regester.php" method="POST">

            <input type="hidden" name="edit_id" value="<?php echo e($row['id']) ?>">

            <div class="form-group">
              <label> Username </label>
              <input type="text" name="edit_username" value="<?php echo e($row['username']) ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="edit_email" value="<?php echo e($row['email']) ?>" class="form-control" placeholder="Enter Email">
            </div>

            <a href="member_fetch.php" class="btn btn-danger"> CANCEL </a>
            <button type="submit" name="update_member_btn" class="btn btn-primary"> Update </button>

          </form>
      <?php
        }
      }
      ?>
    </div>
  </div>
</div>

</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>