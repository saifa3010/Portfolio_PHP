
<?php


require("get.php");

// if(isset($_GET["delete"])){
//    $id = $_GET["delete"];
//    $delete = $con->query("DELETE FROM user_info WHERE id=$id") ;

//    if($delete){
//     header('location:user.php');
// }
// }

?>





<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">User Information</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
              <?php if(!empty($data)): ?>
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                    <th style="text-align: center;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th style="text-align: center;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                      <th style="text-align: center;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th style="text-align: center;" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                      <th style="text-align: center;" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                      <th style="text-align: center;" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Age</th>
                      <th style="text-align: center;" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Experience</th>
                      <th style="text-align: center;" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>

                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($data as $row): ?>
                    <tr >
                    <td style="text-align: center;">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $row['id'] ?></p>
                      </td>
                      <td style="text-align: center;">
                 
                        <p class="text-xs font-weight-bold mb-0"><?php echo $row['username'] ?></p>
                      </td>
                     
                      <td style="text-align: center;">
                       
                        <p class="text-xs font-weight-bold mb-0"><?php echo $row['email'] ?></p>

                      </td>

                      <td style="text-align: center;">
                      <p class="text-xs font-weight-bold mb-0"><?php echo $row['address'] ?></p>

                      </td>
                     

                      <td style="text-align: center;">
                      <p class="text-xs font-weight-bold mb-0"><?php echo $row['phone'] ?></p>

                      </td>

                      <td style="text-align: center;">
                      <p class="text-xs font-weight-bold mb-0"><?php echo $row['age'] ?></p>

                      </td>

                      <td style="text-align: center;">
                     
                        <p class="text-xs font-weight-bold mb-0"><?php echo $row['experience'] ?></p>

                      </td>
 
                      <div class="d-flex px-5 py-1">
                      <td style="text-align: center;">
                        <a href="user/edit.php?edit=<?php echo $row['id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                        <a href="user/delete.php?delete=<?php echo $row['id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Delete
                        </a>
                      </td>
                    </tr>
                  </div>
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