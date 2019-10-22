        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                      <li><a href="<?php echo base_url(); ?>index.php/teacher/classes/<?php echo $this->uri->segment(3); ?>">Active Classes</a></li>
                      <li><a href="<?php echo base_url(); ?>index.php/teacher/class_members/<?php echo $this->uri->segment(3); ?>">Members</a></li>
                      <li><a  href="<?php echo base_url(); ?>index.php/teacher/class_lesson/<?php echo $this->uri->segment(3); ?>">Lessons</a></li>
                      <li><strong><a href="<?php echo base_url(); ?>index.php/teacher/class_assessment/<?php echo $this->uri->segment(3); ?>">Assessment</a></strong></li>
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
                    <h3>List of Lessons</h3>
                    <hr>
                    <table class="table table-striped">
                            <thead>
                                <tr style="text-align:center;">
                                    <th>Lesson ID</th>
                                    <th>Lesson</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
                                if(!empty($lessons)){
                                  
                                  foreach($lessons as $row){
                                    ?>
                                      <tr style="text-align: center;">
                                        <td><?php echo $row->id; ?></td>
                                        <td><a href="<?php echo base_url(); ?>index.php/teacher/assessment_lesson/<?php echo $this->uri->segment(3)?>/<?php echo $row->id;?>"><?php echo $row->lesson; ?></a></td>
                                      </tr>
                                    <?php
                                  }                                 
                                }else{
                                  
                                  ?>
                                  <tr style='text-align:center;'>
                                    <td colspan='2'>No Lessons Encoded to the Class</td>
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