
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<!-- column -->
			<div class="col-md-6 mb-3">
				<a href="index.php?action=addproducer"><button type="button" class="btn btn-warning">Thêm mới</button></a>
			</div>
			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Danh Sách Nhà Sản Xuất</h3>
					</div>
					<!-- form start -->
					<table class="table">
						<thead>
							<tr>
								<th style="width: 10px">ID</th>
								<th>Name</th>
								<th style="width: 120px"> &nbsp;</th>
							</tr>
						</thead>
						<tbody>
						<?php
                foreach($listproducer as $producer):
                  extract($producer);

                  $editproducer = "index.php?action=editpc&id=".$id;
                  $deleteproducer = "index.php?action=deletepc&id=".$id;
						?>
							<tr>
								<td><?=$id?></td>
								<td><?=$namepc?></td>
								<td>
									<a class="btn btn-primary mr-2" href="<?=$editproducer?>"><i class="fas fa-edit"></i></a>
                	<a class="btn btn-danger" href="<?=$deleteproducer?>"><i class="fas fa-trash"></i></a>
								</td>
							</tr>
						<?php
						 endforeach;
						?>
						</tbody>
					</table>
					<!-- end form -->
					<!-- start page -->

					<!-- end page -->
				</div>
				<div style="background-color: transparent;" class="card-footer clearfix">
						<ul class="pagination pagination-sm m-0 float-right">
							<li class="page-item"><a class="page-link" href="#">«</a></li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">»</a></li>
						</ul>
					</div>
			</div>

			<!-- stary button -->

			<!-- end buttom -->
		</div>

	</div>
</section>