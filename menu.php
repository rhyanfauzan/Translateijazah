<div class="navigation">
	<h5 class="title">Dashboard</h5>
	<!-- /.title -->
	<ul class="menu js__accordion">
		<?php
		if($_SESSION['level'] == 1){
			?>
			<li> <!--  class="current" -->
				<a class="waves-effect" href="index.php"><i class="menu-icon ti-user"></i><span>Data Mahasiswa</span></a>
			</li>
			<li>
				<a class="waves-effect" href="?page=pengajuan"><i class="menu-icon ti-files"></i><span>Pengajuan</span><?php echo $objek->notif();?></a>
			</li>
			<li>
				<a class="waves-effect parent-item" href="?page=lulusan"><i class="menu-icon ti-receipt"></i><span>Lulusan</span></a>
				<!-- /.sub-menu js__content -->
			</li>
			<?php
		}
		?>
		<?php
		if($_SESSION['level'] == 2){
			?>
			<li>
				<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon ti-user"></i><span>Profile</span></a>
				<!-- /.sub-menu js__content -->
			</li>
			<?php
		}
		?>
	</ul>
</div>