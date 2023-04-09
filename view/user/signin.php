 <!-- Contact Start -->
 <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sign In With Your Account</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form action="index.php?action=signin" method="POST">
                        <div class="control-group d-flex px-3 py-1 m-0">
                            <i class="fas fa-user my-auto mr-2"></i>
                            <input type="email" class="form-control" name="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group d-flex px-3 py-1 m-0">
                            <i class="fas fa-unlock-alt my-auto mr-2"></i>
                            <input type="password" class="form-control" name="password" placeholder="Your Password"
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="text-center pt-4">
                            <input class="btn btn-primary py-2 px-4 w-50" type="submit" name="signin" value="Sign In"></input>
                        </div>
                    </form>

                    <?php  
                    if(isset($thongbao) && ($thongbao != "")) { ?>
                      <p style="color: red; display: flex; align-items: center;font-style: italic; font-size: 16px;"><i style="font-size: 2rem;" class='bx bxs-error-circle'></i><?=$thongbao?></p>
                  <?php }
                  ?>

                </div>
            </div>
            <div class="col-lg-5 mb-5">
              <div>
                <img class="w-100 h-100" src="view/img/signin-2.jpg" alt="Image">
              </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->