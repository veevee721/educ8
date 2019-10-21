        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                      <li><a>Active Classes</a></li>
                      <li><strong><a href="<?php echo base_url(); ?>index.php/teacher/class_members/<?php echo $this->uri->segment(3); ?>">Members</a></strong></li>
                      <li><a href="<?php echo base_url(); ?>index.php/teacher/class_lesson/<?php echo $this->uri->segment(3); ?>">Lessons</a></li>
                      <li><a href="<?php echo base_url(); ?>index.php/teacher/class_assessment/<?php echo $this->uri->segment(3); ?>">Assessment</a></li>
                      <li><a href="<?php echo base_url(); ?>index.php/teacher/class_scores/<?php echo $this->uri->segment(3); ?>">Scores</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <center>
                        <?php 
                          foreach($Aclass as $title){
                            ?>

                           <h1><?php echo $title->class;?></h1>
                           <h4><?php echo "Class Code: ".$title->code;?></h4>
                            <?php
                          }
                        ?>
                        
                        
                        
                    </center>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h3>Class Members</h3>
                    <?php 
                      if(!empty($this->uri->segment(3))){
                        if($this->uri->segment(4) == 'ok'){
                          ?>
                            <div class='alert alert-success' style='text-align: center;'>
                              Student Accepted to the Class
                            </div>
                          <?php
                        }elseif($this->uri->segment(4) == 'no'){
                          ?>
                            <div class='alert alert-danger' style='text-align: center;'>
                              Student Removed to the Class
                            </div>
                          <?php
                        }
                      }
                    ?>
                    <hr>
                    <table class="table table-striped">
                            <thead>
                                <tr style="text-align:center;">
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Gender</th>
                                    <th>Birthdate</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
                                if(!empty($members)){
                                  foreach($members as $row){
                                    ?>
                                      <tr style="text-align: center;">
                                        <td><?php echo $row->id; ?></td>
                                        <td><?php echo $row->lname.', '.$row->fname; ?></td>
                                        <td><?php if($row->gender == 1){
                                          echo 'Female';
                                        }else{
                                          echo 'Male';
                                        } ?></td>
                                        <td><?php echo $row->bdate; ?></td>
                                        <td><?php if($row->status == 0){
                                          echo 'Pending';
                                        }elseif($row->status == 1){
                                          echo 'Active';
                                        }else{
                                          echo 'Removed';
                                        } ?></td>
                                        <td>
                                        <?php 
                                          if($row->status == 0){
                                            ?>
                                              <a href="<?php echo base_url(); ?>index.php/teacher/accept_member/<?php echo $this->uri->segment(3); ?>/<?php echo $row->id; ?>">Accept</a>&nbsp;
                                          <?php
                                          }

                                          if($row->status != 2){
                                            ?>
                                              <a href="<?php echo base_url(); ?>index.php/teacher/remove_member/<?php echo $this->uri->segment(3); ?>/<?php echo $row->id; ?>">Remove</a>
                                        
                                            <?php
                                          }
                                          
                                        ?>
                                        </td>
                                      </tr>
                                    <?php
                                  }                                 
                                }else{
                                  ?>
                                  <tr style='text-align:center;'>
                                    <td colspan='6'>No Students Enrolled to the Class</td>
                                  </tr>
                                  <?php
                                }
                              ?>
                            </tbody>
                            </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  