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
                      <li><strong><a href="<?php echo base_url(); ?>index.php/teacher/class_lesson/<?php echo $this->uri->segment(3); ?>">Lessons</a></strong></li>
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
                           <hr>
                           <h5>Add Resources for the Lesson</h5>
                            <?php
                          }
                          
                          $attributes = array(
                            'class' => 'form-sample'
                        );
                        echo form_open_multipart('teacher/process_add_resources', $attributes);
                        
                        ?>
                        <?php 
                      if(!empty($this->uri->segment(5))){
                        if($this->uri->segment(5) == 'ok'){
                          ?>
                            <div class='alert alert-success' style='text-align: center;'>
                              Added a Lesson to the Class
                            </div>
                          <?php
                        }elseif($this->uri->segment(5) == 'no'){
                          ?>
                            <div class='alert alert-danger' style='text-align: center;'>
                              Error Occured During Uploading of File
                            </div>
                          <?php
                        }
                      }
                    ?>
                        <div class="form-group">
                               Resources: 
                                <input type="file" required class="form-control" name="userfile" style="width:50%;">
                            </div>
                            <input type="hidden" name="classID" value="<?php echo $this->uri->segment(3); ?>">
                            <input type="hidden" name="lessonID" value="<?php echo $this->uri->segment(4); ?>">
                            <input type="submit" class="btn btn-primary mr-2" value="Add Resources">
                        <?php
                        echo form_close();
                        
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
                    <h3>List of Resources for <?php 
                      foreach($lesson as $title){
                        echo $title->lesson;
                        
                      }
                    ?></h3>
                    <?php 
                      if(!empty($this->uri->segment(5))){
                        if($this->uri->segment(5) == 'a'){
                          ?>
                            <div class='alert alert-success' style='text-align: center;'>
                              Activated a Lesson in the Class
                            </div>
                          <?php
                        }elseif($this->uri->segment(5) == 'b'){
                          ?>
                            <div class='alert alert-danger' style='text-align: center;'>
                              Archived a Lesson in the Class
                            </div>
                          <?php
                        }
                      }
                    ?>
                    <hr>
                    <table class="table table-striped">
                            <thead>
                                <tr style="text-align:center;">
                                    <th>Resource ID</th>
                                    <th>File Name</th>
                                    <th>Date Added</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
                                if(!empty($resources)){
                                  
                                  foreach($resources as $row){
                                    ?>
                                      <tr style="text-align: center;">
                                        <td><?php echo $row->id; ?></td>
                                        <td><?php echo $row->file; ?></td>
                                        <td><?php echo $row->date_added; ?></td>
                                        <td><?php if($row->status == 0){
                                          echo 'Archived';
                                        }else{
                                          echo 'Active';
                                        } ?></td>
                                        <td>
                                        <?php 
                                          if($row->status == 0){
                                            ?>
                                              <a href="<?php echo base_url(); ?>index.php/teacher/active_resource/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $row->id; ?>">Activate</a>&nbsp;
                                          <?php
                                          }else{
                                            ?>
                                              <a href="<?php echo base_url(); ?>index.php/teacher/archive_resource/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $row->id; ?>">Archive</a>
                                        
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
                                    <td colspan='5'>No Resources Available for the Lesson</td>
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