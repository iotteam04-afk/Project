<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>
<!-- for members -->


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ordered Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <form action="admin_regester.php" method="POST"> -->

        <!-- <div class="modal-body">

          <div class="form-group">
            <label> Username </label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
          </div> -->

        <!-- </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form> -->

    </div>
  </div>
</div>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Placed Orders
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
           Member   Profile
        </button> -->
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
        $connection = mysqli_connect("localhost", "root", "", "sheights");
        $query = "SELECT * FROM `order`";
        $query_run = mysqli_query($connection, $query);
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
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>


                <tr>
                  
                  <td>
                    <?php echo $row['name']; ?>
                  </td>
                  <td>
                    <?php echo $row['number']; ?>
                  </td>
                  <td>
                    <?php echo $row['email']; ?>
                  </td>
                  <td>
                    <?php echo $row['method']; ?>
                  </td>
                  <td>
                    <?php echo $row['address']; ?>
                  </td>
                  <td>
                    <?php echo $row['total_price']; ?>
                  </td>
                  <td>
                    <?php echo $row['user_id']; ?>
                  </td>
                  
                  <td>
                    <form action="" method="post">
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

<?php 
if(isset($_POST['delete_btn'])){
  $id = $_POST['delete_id'];
  $query = "DELETE from `order` where id='$id' ";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
          $message[] = "Order deleted successfully";
        }
}


?>



<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>