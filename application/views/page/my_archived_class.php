        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                      <li><a>My Classes (<?php 
                            $cnt = 0;
                            foreach($class as $row){
                                if($row->member != 2){
                                  $cnt++;
                                }
                            }
                            echo $cnt;
                        ?>)</a></strong></li>
                      <li><strong><a href="">My Archived Classes (<?php 
                            $cnt = 0;
                            foreach($Aclass as $row){
                                if($row->member == 2){
                                  $cnt++;
                                }
                              
                            }
                            echo $cnt;
                        ?>)</a></strong></li>
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
                    <h2>List of Classes</h2>
                    <hr>
                    <table class="table table-striped">
                            <thead>
                                <tr style="text-align:center;">
                                    <th>Class Code</th>
                                    <th>Class Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(!empty($class)){
                                        foreach($Aclass as $Crow){
                                          if($Crow->member == 2){
                                            ?>
                                                <tr style="text-align:center;">
                                                    <td><?php echo $Crow->code; ?></td>
                                                    <td><?php echo $Crow->class; ?></td>
                                                    <td>Left From Class</td>
                                                    <td><a href="<?php echo base_url(); ?>index.php/student/return_class/<?php echo $Crow->id; ?>">Rejoin</a>&nbsp;
                                                    
                                                    </td>
                                                </tr>
                                            <?php
                                          }else{
                                             ?>
                                        <tr style="text-align:center;">
                                            <td colspan="5">No Classes Joined</td>
                                        </tr>
                                        <?php
                                          }
                                        }
                                    }else{
                                        ?>
                                        <tr style="text-align:center;">
                                            <td colspan="5">No Classes Joined</td>
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