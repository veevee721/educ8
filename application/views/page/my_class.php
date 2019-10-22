        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                      <li><a href="<?php echo base_url(); ?>index.php/student/class">Classes (<?php 
                            $cnt = 0;
                            foreach($class as $row){
                                $cnt++;
                            }
                            echo $cnt;
                        ?>)</a></li>
                      <li><a href="<?php echo base_url(); ?>index.php/student/join_class">Join Classes</a></li>
                      <li><a href="<?php echo base_url(); ?>index.php/student/archived_class">Archived Classes (<?php 
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
                        <h1>Add Class</h1>
                        
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
                            echo form_open('teacher/add_class', $attributes);
                            ?>
                            <div class="form-group">
                                Class Name: 
                                <input type="text" class="form-control" placeholder="Enter Class Name Here" name="class" style="width:50%;">
                            </div>
                            <input type="submit" class="btn btn-success mr-2">

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
                    <h2>List of Classes</h2>
                    <hr>
                    <table class="table table-striped">
                            <thead>
                                <tr style="text-align:center;">
                                    <th>Class ID</th>
                                    <th>Class Code</th>
                                    <th>Class Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(!empty($class)){
                                        foreach($class as $Crow){
                                            ?>
                                                <tr style="text-align:center;">
                                                    <td><?php echo $Crow->id; ?></td>
                                                    <td><?php echo $Crow->code; ?></td>
                                                    <td><?php echo $Crow->class; ?></td>
                                                    <td><a href="<?php echo base_url(); ?>index.php/teacher/archive_class/<?php echo $Crow->id; ?>">Archive</a>&nbsp;
                                                    <a href="<?php echo base_url(); ?>index.php/teacher/update_class/<?php echo $Crow->id; ?>">Update</a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                        <tr style="text-align:center;">
                                            <td colspan="4">No Classes Created</td>
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