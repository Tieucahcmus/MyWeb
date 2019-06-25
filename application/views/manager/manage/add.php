<?php
$this->load->helper('url');
$this->load->library('session');
if($this->session->has_userdata('userSession')){
	$session =(array)$_SESSION['userSession'];
}
?>


<div class="col-lg-4">
	<form method="post" action="<?=base_url()?>index.php/manager/add_post">
		<label>User Post</label>
		<input readonly class="form-control" value="<?=$session['name']?>">
		<label>Post Name</label>
		<input name="post_name" required class="form-control">
		<label>Content</label>
		<textarea name="content" required class="form-control"></textarea>
		<label>Image Link</label>
		<input name="image" required class="form-control">
		<label>Category</label>
		<select name="cat_id" class="form-control text-uppercase">
			<option class="optional" value="0">--</option>
			<?php foreach ($categories as $category){?>
			<option class="optional text-uppercase" value="<?= $category['id']?>"><?= $category['name']?></option>
			<?php } ?>
		</select>
		<label>Status</label>
		<select name="status" class="form-control">
			<option class="optional" value="0">--</option>
			<option class="optional" value="0">Posted</option>
			<option class="optional" value="1">Wait for accept</option>
		</select><br>
		<div class="col-lg-15">
			<input class="form-control btn-primary text-center" type="submit" value="Save">
		</div>
	</form>
</div>

<div class="col-lg-8">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">A Few New Post</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
						<tr>
							<th>Post Name</th>
							<th>Content</th>
							<th>Category</th>
							<th>Status</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ( $somePostNear as $item) {?>
							<tr>
								<td><?= $item['postName'] ?></td>
								<td><?= $item['content'] ?></td>
								<td><?= $item['name'] ?></td>
								<td>
									<?php
									if($item['status'] == 0 )
										echo '<a class=" btn-primary form-control">Posted</a>';
									else
										echo '<a class=" btn-warning form-control">Loading</a>';
									?>
								</td>
							</tr>
						<?php } ?>
						</tbody>
						<tfoot>
						<tr>
							<th>Post Name</th>
							<th>Content</th>
							<th>Image</th>
							<th>Category</th>
						</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</div>
