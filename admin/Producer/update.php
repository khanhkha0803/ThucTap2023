<?php
    if(isset($producer)&&is_array($producer)){
        extract($producer);
    }
?>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- column -->
			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Sửa Nhà sản xuất</h3>
					</div>
					<!-- form start -->
					<form action="index.php?action=updateproducer" method="post">
						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Mã nhà sản xuất</label>
								<input type="email" class="form-control" value="<?=$id?>" disabled>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Tên nhà sản xuất</label>
								<input type="text" class="form-control" name="namepc" value="<?=$namepc?>" placeholder="Nhập tên nhà sản xuất">
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<input type="hidden" name="id" value="<?=$id?>">
							<input type="submit" value="Lưu" name="update" class="btn btn-success mr-2" style="width: 100px;">
							<a href="index.php?action=listproducer"><input type="button" value="Danh sách" name="" class="btn btn-warning" style="width: 100px;color:#fff;"></a>
						</div>
					</form>
					<!-- end form -->
				</div>
			</div>
			<?php
				if(isset($thongbao)&&($thongbao!="")) echo '<p class="text-danger">'.$thongbao.'</p>';
			?>

			<!-- stary button -->

			<!-- end buttom -->
		</div>

	</div>
</section>