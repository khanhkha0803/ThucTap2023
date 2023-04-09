    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">K</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link ">Trang chủ</a>
                            <a href="index.php?action=shop&idcg=0" class="nav-item nav-link">Cửa hàng</a>
                            <a href="index.php?action=shop&idcg=41" class="nav-item nav-link">Phụ kiện</a>
            
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <?php
                                if(isset($_SESSION['user'])){
                                  extract($_SESSION['user']);
                                  echo ' <div class="nav-item dropdown">
                                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">'.$fullname.'</a>
                                  <div class="dropdown-menu rounded-0 m-0">
                                      <a href="index.php?action=profile" class="dropdown-item">Thông tin</a>
                                      <a href="index.php?action=mybill" class="dropdown-item">Đơn hàng</a>
                                      <a href="index.php?action=logout" class="dropdown-item">Đăng xuất</a>
                                  </div>
                              </div> ';  
                                    }else{
                                      echo '  <a href="index.php?action=signin" class="nav-item nav-link">Đăng nhập</a>
                                      <a href="index.php?action=signup" class="nav-item nav-link">Đăng ký</a> ';
                                    }
                            ?>
                       
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
