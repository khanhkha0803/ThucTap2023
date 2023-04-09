<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- column -->
			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Thêm Nhà sản xuất</h3>
					</div>
					<!-- form start -->
					<form action="index.php?action=addproducer" method="post">
						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Mã Nhà sản xuất</label>
								<input type="email" class="form-control"placeholder="Auto number" disabled>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Tên Nhà sản xuất</label>
								<input type="text" class="form-control" name="namepc" placeholder="Nhập tên nhà sản xuất">
							</div>
						</div>
						<!-- /.card-body -->

						<div class="card-footer">
							<input type="submit" value="Thêm" name="add" class="btn btn-success mr-2" style="width: 100px;">
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