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
                    <h2>List of Archived Classes</h2>
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
                                        foreach($Aclass as $Crow){
                                            ?>
                                                <tr style="text-align:center;">
                                                    <td><?php echo $Crow->id; ?></td>
                                                    <td><?php echo $Crow->code; ?></td>
                                                    <td><?php echo $Crow->class; ?></td>
                                                    <td><a href="<?php echo base_url(); ?>index.php/teacher/restore_class/<?php echo $Crow->id; ?>">Restore</a></td>
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