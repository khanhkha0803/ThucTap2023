   <!-- Checkout Start -->
   <div class="container-fluid pt-5">
    <form action="index.php?action=confirm-checkout" method="post">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Địa Chỉ Nhận</h4>
                  
                    <div class="row">
                        <!-- <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div> -->
                        <div class="col-md-6 form-group">
                            <label style="font-weight: 600;">Tên Người Nhận</label>
                            <input  class="form-control text-primary" name="name" type="text" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']['fullname']; ?>" placeholder="Trần Trường Sinh">
                        </div>
                        <div class="col-md-6 form-group">
                            <label style="font-weight: 600;">E-mail</label>
                            <input class="form-control text-primary" name="email" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']['email']; ?>" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label style="font-weight: 600;">Số Điện Thoại</label>
                            <input class="form-control text-primary" name="phone" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']['tel']; ?>" type="text" placeholder="(+84) 456 789 425">
                        </div>
                        <div class="col-md-6 form-group">
                            <label style="font-weight: 600;">Địa Chỉ</label>
                            <input class="form-control text-primary" name="address" type="text" placeholder="Vui lòng nhập địa chỉ nhận hàng" require>
                        </div>

                    </div>                  
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tổng Đơn Hàng</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Sản phẩm</h5>

                        <?php
                        if(isset($_SESSION['cart'])&&($_SESSION['cart'])):
                          $tong = 0;
                          foreach ($_SESSION['cart'] as $cart):
                            $tong += $cart[5];

                             // Xác định giá trị giảm giá dựa trên giá trị của $tong
                            if ($tong >= 5000000) {
                                $discount = 0.1; // giảm giá 10%
                            } elseif ($tong >= 1000000) {
                                $discount = 0.05; // giảm giá 5%
                            } else {
                                $discount = 0; // không giảm giá
                            }

                            $shipping = 30000;
                            $discount_amount = $tong * $discount;
                            $total = $tong + $shipping - $discount_amount;
                        ?>

                        <div class="d-flex justify-content-between">
                            <p><?=$cart[1]?></p>
                            <p><?=number_format($cart[5])?> đ</p>
                        </div>

                        <?php
                          endforeach;
                        endif;
                        ?>

                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tổng phụ</h6>
                            <h6 class="font-weight-medium"><?=number_format($tong)?> đ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí vận chuyển</h6>
                            <h6 class="font-weight-medium">30,000 đ</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng Cộng</h5>
                            <h5 class="font-weight-bold"><?=number_format($total)?> đ</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Thanh Toán</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">App Bank</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="directcheck" name="payment" checked>
                                <label class="custom-control-label" for="directcheck">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Thẻ Vettel</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <input type="hidden" name="sumtotal" value="<?=$total?>">
                        <input type="hidden" name="idac" value="<?=$idac?>">
                        <input type="submit" name="confirm" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" value="Thanh Toán"></input>
                    </div>
                </div>
            </div>
        </div>
    </form>
  </div>
      <!-- Checkout End -->
    <!-- Checkout End -->