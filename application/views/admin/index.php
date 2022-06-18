<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	</div>

	<!-- Content Row -->
	<div class="row">
		<!-- Laporan Diterima Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Diterima
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?= $complaintsnum['0']; ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Laporan Diproses Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
								Diproses
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?= $complaintsnum['1']; ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Laporan Selesai Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
								selesai
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?= $complaintsnum['2']; ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Semua Laporan Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								semua
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<?= $complaintsnum['3']; ?>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row mb-4 mt-4">
		<!-- Table Data aduan -->
		<div class="col-xl col-md-12 col-sm">
			<h1 class="h3 mb-3 text-gray-800">Data Aduan</h1>
			<div class="table-responsive">
				<table class="table table-striped table-borderless">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama</th>
							<th scope="col">Email</th>
							<th scope="col">Kategori</th>
							<th scope="col">Status</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($complaints) : ?>
							<?php $i = 1;
							foreach ($complaints as $complaint) : ?>
								<tr>
									<th scope="row"><?= $i++; ?></th>
									<td><?= $complaint['name']; ?></td>
									<td><?= $complaint['categories']; ?></td>
									<?php if ($complaint['status'] == 'diterima') : ?>
										<td class="text-capitalize text-success font-weight-bold"><?= $complaint['status']; ?></td>
									<?php elseif ($complaint['status'] == 'diproses') : ?>
										<td class="text-capitalize text-warning font-weight-bold"><?= $complaint['status']; ?></td>
									<?php else : ?>
										<td class="text-capitalize text-danger font-weight-bold"><?= $complaint['status']; ?></td>
									<?php endif; ?>
									<td><?= date('d-m-Y', $complaint['date_created']); ?></td>
									<td>
										<a href="<?= base_url(); ?>admin/detailAduan/<?= $complaint['kode_unik']; ?>" class="btn btn-primary">Detail</a>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php else : ?>
							<div class="alert alert-danger" role="alert">
								Yahhhhhh, data nya belum ada!
							</div>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-xl col-md-12 col-sm">
			<h1 class="h3 mb-3 text-gray-800">Data User</h1>
			<div class="table-responsive">
				<table class="table table-striped table-borderless">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama</th>
							<th scope="col">Email</th>
							<th scope="col">NIK</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						foreach ($users as $user) : ?>
							<tr>
								<th scope="row"><?= $i++; ?></th>
								<td><?= $user['name']; ?></td>
								<td><?= $user['email']; ?></td>
								<td><?= $user['nik']; ?></td>
								<td>
									<a href="<?= base_url(); ?>admin/detailUser/<?= $user['id']; ?>" class="btn btn-primary">Detail</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
