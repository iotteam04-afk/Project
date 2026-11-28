<?php
require_once __DIR__ . '/security.php';

if(isset($_POST['delete_btn'])){
  $id = (int)($_POST['delete_id'] ?? 0);

  $stmt = $conn->prepare( "DELETE from order_items where order_id=? ");
  $stmt->execute([$id]);

  $stmt = $conn->prepare( "DELETE from `order` where id=? ");
  $stmt->execute([$id]);
  
  header('Location: admin_orders.php');
  exit;
}

include('includes/header.php');
include('includes/navbar.php');
?>
<!-- for members -->


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Placed Orders
      </h6>
    </div>

    <div class="card-body">

      <?php
      if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
        echo '<h3 class="bg-primary text-white">' . e($_SESSION['success']) . '</h3>';
        unset($_SESSION['success']);
      }

      if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        echo '<h3 class="bg-danger text-white">' . e($_SESSION['status']) . '</h3>';
        unset($_SESSION['status']);
      }

      ?>
      <div class="table-responsive">

        <?php
        $stmt = $conn->prepare( "SELECT * from `order`");
        $stmt->execute();
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              
              <th> Name </th>
              <th> Number </th>
              <th>Email</th>
              <th>Mode of Payment </th>
              <th>Address </th>
              <th>Total Price </th>
              <th>User ID</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (count($orders) > 0) {
              foreach ($orders as $row) {
            ?>


                <tr>
                  
                  <td>
                    <?php echo e($row['name']) ?>
                  </td>
                  <td>
                    <?php echo e($row['number']) ?>
                  </td>
                  <td>
                    <?php echo e($row['email']) ?>
                  </td>
                  <td>
                    <?php echo e($row['method']) ?>
                  </td>
                  <td>
                    <?php echo e($row['address']) ?>
                  </td>
                  <td>
                    <?php echo e($row['total_price']) ?>
                  </td>
                  <td>
                    <?php echo e($row['user_id']) ?>
                  </td>
                  
                  <td>
                    <form action="" method="post">
                      <input type="hidden" name="delete_id" value="<?php echo e($row['id']) ?>">
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