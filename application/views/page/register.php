<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-6 mx-auto">
              <?php 
                if(!empty($message)){
                  ?>
                    <div class="<?php echo $type; ?>">
                      <center>
                        <?php 
                          echo $message;
                        ?>
                      </center>
                    </div>
                  <?php
                }
                if(!empty(validation_errors())){
                  ?>
                    <div class="alert alert-danger">
                      <center>
                        <?php 
                          echo validation_errors();
                        ?>
                      </center>
                    </div>
                  <?php
                }
              ?>
              <h2 class="text-center mb-4">REGISTER</h2>
              <div class="auto-form-wrapper">
                <form action="#">
                  <div class="text-block text-center my-3">
                      <button type="button" data-toggle="modal" data-target="#portfolioModal1" class="btn btn-primary btn-fw btn-lg">I'm a Teacher</button>
            
                      <button type="button" data-toggle="modal" data-target="#portfolioModal2" class="btn btn-success btn-fw btn-lg">I'm a Student</button>
                  </div>
                      <div class="text-block text-center my-3">
                    <span class="text-small font-weight-semibold">Already have an account ?</span>
                    <a href="<?php echo base_url(); ?>index.php/home/login" class="text-black text-small">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <!--Registration Form for Teachers-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="col-12 grid-margin">
                
                  <div class="card-body">
                    <h4 class="card-title">Register as Teacher</h4>
                    <form class="form-sample" action="<?php echo base_url(); ?>index.php/home/register_process" method="post">
                      <p class="card-description"> Personal info </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="username" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" name="email" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control" name="password" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control" name="confpassword" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="fname" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="lname" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="gender" required >
                                <option>Male</option>
                                <option>Female</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-9">
                              <input class="form-control" placeholder="dd/mm/yyyy" name="bdate" type="date" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <div class="col-sm-9">
                                <input type="submit" class="btn btn-primary" value="Register">
                            </div>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="role" value="1">
                    </form>
                </div>
              </div>
      </div>
    </div>
</div>
    <!--Registration Form for Students-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="col-12 grid-margin">
                
                  <div class="card-body">
                    <h4 class="card-title">Register as Student</h4>
                    <form class="form-sample" action="<?php echo base_url(); ?>index.php/home/register_process" method="post">
                      <p class="card-description"> Personal info </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="username" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" name="email" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control" name="password" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control" name="confpassword" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="fname" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="lname" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="gender" required >
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-9">
                              <input class="form-control" placeholder="dd/mm/yyyy" tpye="date" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Grade</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="grade" required >
                                <option value="0">Kinder</option>
                                <option value="1">Grade 1</option>
                                <option value="2">Grade 2</option>
                                <option value="3">Grade 3</option>
                                <option value="4">Grade 4</option>
                                <option value="5">Grade 5</option>
                                <option value="6">Grade 6</option>
                                <option value="7">Grade 7</option>
                                <option value="8">Grade 8</option>
                                <option value="9">Grade 9</option>
                                <option value="10">Grade 10</option>
                                <option value="11">Grade 11</option>
                                <option value="12">Grade 12</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <div class="col-sm-9">
                                <input type="submit" class="btn btn-primary" value="Register">
                            </div>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="role" value="2">
                    </form>
                </div>
              </div>
      </div>
    </div>
    </div>