
<!-- Cart Start -->
<div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <form action="index.php?action=updatesoluong" method="post">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Hình Ảnh</th>
                            <th>Giá</th>
                            <th>Số Lượng</th>
                            <th>Tổng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                      <?php
                          $tong = 0;
                          $i = 0;
                          $shipping = 0;
                          $discount_amount = 0;
                          $total = 0;
                          $voucher = '';

                          foreach ($_SESSION['cart'] as $cart) :
                            $thanhtien = $cart[4]*$cart[5];
                            $tong += $thanhtien;
                            $xoasp = "index.php?action=delcart&idcart=".$i;

                            // Xác định giá trị giảm giá dựa trên giá trị của $tong
                            if ($tong >= 5000000) {
                                $discount = 0.1;
                                $voucher = 'Giảm giá 10% cho đơn hàng trên 5,000,000'; // giảm giá 10%
                            } elseif ($tong >= 1000000) {
                                $discount = 0.05; // giảm giá 5%
                                $voucher = 'Giảm giá 5% cho đơn hàng trên 1,000,000';
                            } else {
                                $discount = 0; // không giảm giá
                            }
                            $shipping = 30000;
                            
                            $discount_amount = $tong * $discount;
                            $total = $tong + $shipping - $discount_amount;
                          ?>
                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"> <?=$cart[1]?></td>
                            <td class="align-middle">
                                <img width="80px" height="80px" src="./upload/<?=$cart[3]?>" alt="Image">
                            </td>
                            <td class="align-middle"><?=number_format($cart[2])?> đ</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <!-- <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div> -->
                                    <input type="number" name="soluongcapnhat[]" min="1" class="form-control form-control-sm bg-secondary text-center" value="<?=$cart[4]?>">
                                    <input type="hidden" name ="idsp[]"  value="<?= $cart[0] ?>">
                                    <!-- <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div> -->
                                </div>
                            </td>
                            <td class="align-middle"><?=number_format($thanhtien)?> đ</td>
                            <td class="align-middle">
                            <a href="<?=$xoasp?>"><button class="btn btn-sm btn-primary"><i class="fas fa-trash-alt"></i></button></a>
                            </td>
                        </tr>
                        <?php
                          $i++;
                         endforeach;
                        ?>
                    </tbody>
                    
                </table>
                <a href="index.php?action=updatesoluong "><input type="submit" name="updatesoluong" value="cập nhật" class="btn btn-sm btn-primary"></input></a>
            </div>
            
        </form>
            
            
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Giỏ Hàng</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tổng phụ</h6>
                            <h6 class="font-weight-medium"><?=number_format($tong)?> đ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí vận chuyển</h6>
                            <h6 class="font-weight-medium"><?=$shipping?> đ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p><?=$voucher?></p>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng Cộng</h5>
                            <h5 class="font-weight-bold"><?=number_format($total)?> đ</h5>
                        </div>
                        <a href="index.php?action=checkout"><button class="btn btn-block btn-primary my-3 py-3">Tiến Hành Kiểm Tra</button></a>
                    </div>
                    <?php
                      if(isset($thongbao)&&($thongbao != ""))
                        echo '<p style="color: red; font-style: italic; font-size: 16px;">'.$thongbao.'</p>';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
