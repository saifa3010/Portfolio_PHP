
<?php



include("get.php")

?>




<form action="experience/create.php">
    <button style="margin:10px;" class="btn btn-primary">ADD</button>
    </form>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Experience</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
              <?php if(!empty($data)): ?>
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                    <th style="text-align: center;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th style="text-align: center;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">certificates</th>
                      <th style="text-align: center;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">enterprise</th>
                      <th style="text-align: center;" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">description</th>
                      <th style="text-align: center;" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">start_date</th>
                      <th style="text-align: center;" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">end_date</th>
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
                 
                        <p class="text-xs font-weight-bold mb-0"><?php echo $row['position'] ?></p>
                      </td>
                     
                      <td style="text-align: center;">
                       
                        <p class="text-xs font-weight-bold mb-0"><?php echo $row['company'] ?></p>

                      </td>

                      <td style="text-align: center;">
                      <p class="text-xs font-weight-bold mb-0"><?php echo $row['description'] ?></p>

                      </td>
                     

                      <td style="text-align: center;">
                      <p class="text-xs font-weight-bold mb-0"><?php echo $row['start_date'] ?></p>

                      </td>

                      <td style="text-align: center;">
                      <p class="text-xs font-weight-bold mb-0"><?php echo $row['end_date'] ?></p>

                      </td>

                     
 
                      <div class="d-flex px-5 py-1">
                      <td style="text-align: center;">
                        <a href="experience/edit.php?edit=<?php echo $row['id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                        <a href="experience/delete.php?delete=<?php echo $row['id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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