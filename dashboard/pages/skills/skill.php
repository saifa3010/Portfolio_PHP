<?php
require("../../db.php");

include("get.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<?php
// if (isset($_SESSION['success']) && $_SESSION['success'] === true) {
//   // Display Sweet Alert for success
//   echo "<script>
//           Swal.fire({
//              position: 'center',
//              icon: 'success',
//              title: 'Your work has been saved',
//              showConfirmButton: false,
//              timer: 1500
//           });
//        </script>";

//   // Reset the session variable to avoid showing the alert on subsequent page loads
//   unset($_SESSION['success']);
// }

?>
  

<form action="skills/create.php">
    <button style="margin:10px;" class="btn btn-primary">ADD</button>
    </form>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Skills</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
              <?php if(!empty($data)): ?>
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th style="text-align: center;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th style="text-align: center;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">experience</th>
                      <th style="text-align: center;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">level</th>
                      <th style="text-align: center;" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                      <th style="text-align: center;" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>

                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($data as $row): ?>

                    <tr>
                    <td style="text-align: center;">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $row['id'] ?></p>
                      </td>

                      <td style="text-align: center;">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $row['experience'] ?></p>
                      </td>

                      <td style="text-align: center;">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $row['level'] ?></p>
                      </td>

                      <td style="text-align: center;">
                          <?php if (!empty($row['image']) && file_exists("images/" . $row['image'])): ?>
                              <img src="<?php echo "images/" . $row['image']; ?>" alt="images" style="max-width: 100px; max-height: 100px;">
                          <?php else: ?>
                              <p>No logo available</p>
                          <?php endif; ?>
                      </td>


                      <td style="text-align: center;">
                      <a href="skills/edit.php?edit=<?php echo $row['id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-experience="Edit user">
                          Edit
                        </a>
                        <a href="skills/delete.php?delete=<?php echo $row['id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-experience="Edit user">
                          Delete
                        </a>
                      </td>
                    </tr>
                 <?php endforeach ?>
                  </tbody>
                </table>
                <?php else: ?>
     <p>No data available.</p>
    <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      
  
    </div>

    </body>
</html>