        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                      <li><a href="<?php echo base_url(); ?>index.php/teacher/class">Classes (<?php 
                            $cnt = 0;
                            foreach($class as $row){
                                $cnt++;
                            }
                            echo $cnt;
                        ?>)</a></li>
                        <li><a><strong><?php 
                          foreach($Uclass as $row1){
                            echo $row1->class;
                          }
                        ?></strong></a></li>
                      <li><a href="<?php echo base_url(); ?>index.php/teacher/join_class">Join Classes</a></li>
                      <li><a href="<?php echo base_url(); ?>index.php/teacher/archived_class">Archived Classes (<?php 
                            $cnt = 0;
                            foreach($Aclass as $row){
                                $cnt++;
                            }
                            echo $cnt;
                        ?>)</a></li>
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
                        <h1>Update Class</h1>
                        
                        <?php
                            if(!empty($message)){
                                ?>
                                <div class="<?php echo $type; ?>"><?php echo $message; ?></div>
                                <?php
                            }
                            if(!empty(validation_errors())){
                                ?>
                                <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
                                <?php
                            }
                            $attributes = array(
                                'class' => 'form-sample'
                            );
                            echo form_open('teacher/process_update_class', $attributes);
                            ?>
                            <?php 
                              foreach($Uclass as $row){
                                ?>
                                  <div class="form-group">
                                    Class Name: 
                                    <input type="text" required class="form-control" value="<?php echo $row->class; ?>" name="class" style="width:50%;">
                                  </div>
                                  <input type="hidden" name="classID" value="<?php echo $row->id; ?>">
                                <?php
                              }
                            ?>
                            <input type="submit" class="btn btn-primary mr-2" value="Update">

                            <?php
                            echo form_close();
                        ?>
                    </center>
                  </div>
                </div>
              </div>
            </div>
            