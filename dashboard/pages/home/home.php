<?php

require("../../db.php");

include("get.php")


?>

<form action="home/create.php">
    <button style="margin:10px;" class="btn btn-primary">ADD</button>
    </form>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Home</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
              <?php if(!empty($data)): ?>
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th style="text-align: center;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th style="text-align: center;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">TItle</th>
                      <th style="text-align: center;" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Logo</th>
                      <th style="text-align: center;" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Brief</th>
                      <th style="text-align: center;" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CV</th>
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
                        <p class="text-xs font-weight-bold mb-0"><?php echo $row['title'] ?></p>
                      </td>

                      <td style="text-align: center;">
                          <?php if (!empty($row['logo']) && file_exists("logos/" . $row['logo'])): ?>
                              <img src="<?php echo "logos/" . $row['logo']; ?>" alt="Logo" style="max-width: 100px; max-height: 100px;">
                          <?php else: ?>
                              <p>No logo available</p>
                          <?php endif; ?>
                      </td>


                      <td style="text-align: center;">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $row['brief'] ?></p>
                      </td>

                      <td style="text-align: center;">
                          <?php if (!empty($row['cv']) && file_exists("cvs/" . $row['cv'])): ?>
                              <a href="<?php echo "cvs/" . $row['cv']; ?>" download>Download CV</a>
                          <?php else: ?>
                              <p>No CV available</p>
                          <?php endif; ?>
                      </td>


                      <td style="text-align: center;">
                          <?php if (!empty($row['image']) && file_exists("images/" . $row['image'])): ?>
                              <img src="<?php echo "images/" . $row['image']; ?>" alt="images" style="max-width: 100px; max-height: 100px;">
                          <?php else: ?>
                              <p>No logo available</p>
                          <?php endif; ?>
                      </td>


                      <td style="text-align: center;">
                      <a href="home/edit.php?edit=<?php echo $row['id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                        <a href="home/delete.php?delete=<?php echo $row['id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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