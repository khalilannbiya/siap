<!-- Main -->
<main>
	<!-- Section Welcoming -->
	<section id="welcoming-section">
		<div class="wrapper-welcoming">
			<div>
				<h1>Sistem Informasi Aduan Warga Desa Situdam</h1>
				<p>Sampaikan aduan Anda kepada kami dan ambil peran dalam mewujudkan pelayanan masyarakat yang lebih baik.</p>
				<div class="wrapper-cta">
					<?php if ($session_cek) : ?>
						<a href="<?= base_url(); ?>complaint/add" class="btn btn-primary btn-cta">Mulai buat aduan</a>
						<a href="<?= base_url(); ?>complaint/get" class="btn btn-outline-primary btn-cta-secondary">Lacak aduan</a>
					<?php else : ?>
						<a href="<?= base_url(); ?>auth" class="btn btn-primary btn-cta">Mulai buat aduan</a>
						<a href="#uniccode-search-section" class="btn btn-outline-primary btn-cta-secondary">Lacak aduan</a>
					<?php endif; ?>
				</div>
			</div>
			<img src="<?= base_url(); ?>assets/img/welcome.png" alt="Welcoming Image" />
		</div>
	</section>
	<?php if (!$session_cek) : ?>
		<!-- Section Lacak -->
		<section id="uniccode-search-section">
			<div class="wrapper-uniccode">
				<h1>Cari dan lacak aduan Anda!</h1>
				<p>Gunakan kode unik aduan untuk mengetahui kemajuan tindak lanjut aduan Anda. Kode unik ini didapatkan ketika aduan di kirim, silahkan cek kembali detail dari aduan yang anda kirimkan.</p>
				<div class="wrapper-form">
					<form action="<?= base_url(); ?>home/lacak" method="POST">
						<div id="otp" class="inputs">
							<input class="text-center form-control rounded" type="text" id="first" name="first" maxlength=" 1" />
							<input class="text-center form-control rounded" type="text" id="second" name="second" maxlength="1" />
							<input class="text-center form-control rounded" type="text" id="third" name="third" maxlength=" 1" />
							<span>-</span>
							<input class="text-center form-control rounded" type="text" id="fourth" name="fourth" maxlength="1" />
							<input class="text-center form-control rounded" type="text" id="fifth" name="fifth" maxlength=" 1" />
							<input class="text-center form-control rounded" type="text" id="sixth" name="sixth" maxlength=" 1" />
						</div>
						<button class="btn btn-primary" type="submit" name="lacak">Lacak</button>
					</form>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- Cards Step -->
	<section id="cards-step-section">
		<div class="wrapper-card__step">
			<div class="card-step">
				<div class="icon-step">
					<i class="bi bi-send-fill"></i>
				</div>
				<p>Tulis aduan Anda dengan lengkap dan jelas melalui web ini.</p>
				<h2>Kirim Aduan</h2>
			</div>
			<div class="card-step process-step">
				<div class="icon-step">
					<i class="bi bi-gear-fill"></i>
				</div>
				<p>Aduan anda akan otomatis tersampaikan kepada kami dan segera di tindak lanjuti.</p>
				<h2>Proses</h2>
			</div>
			<div class="card-step final-step">
				<div class="icon-step">
					<i class="bi bi-check2-all"></i>
				</div>
				<p>Jika tindak lanjut selesai maka kami akan menutup aduan Anda.</p>
				<h2>Selesai</h2>
			</div>
		</div>
	</section>

	<!-- Section Statistik -->
	<section id="section-statistik">
		<div class="wrapper-body">
			<div>
				<h2>Statistik aduan masyarakat Desa Situdam</h2>
			</div>
			<div class="wrapper-cards__statistik">
				<div class="card-statistik">
					<p><?= $statistik[0]; ?></p>
					<h3>Diterima</h3>
				</div>
				<div class="card-statistik">
					<p><?= $statistik[1]; ?></p>
					<h3>Diproses</h3>
				</div>
				<div class="card-statistik">
					<p><?= $statistik[2]; ?></p>
					<h3>Selesai</h3>
				</div>
			</div>
		</div>
	</section>

	<!-- Tentang kami -->
	<section id="about-us">
		<div class="wrapper-title">
			<h2>Tentang Kami</h2>
		</div>
		<div class="maps">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31720.13237171677!2d107.5054303402814!3d-6.391866164922786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e696c54664f5cdf%3A0x408f514bbba83324!2sKantor%20Kepala%20Desa%20Situdam!5e0!3m2!1sid!2sid!4v1649395151177!5m2!1sid!2sid" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		<div class="typograph-about-us">
			<p>
				Kami adalah Tim yang menampung aspirasi Anda agar bisa kita wujudkan bersama untuk Indonesia yang maju dan sejahtera. Melalui Aplikasi ini kami ingin berbagi, kami ingin anda menceritakan, memberitahu kami, memberi kami
				informasi terkini mengenai aspirasi yang anda harapkan. Kami memiliki unit yang akan siap merespon anda selama 24 jam, kami membangun layanan untuk memberi kebutuhan untuk Anda, agar bisa lebih dekat, lebih bisa mengontrol
				kinerja kami dan mampu memberi saran dan masukan bagi pengembangan kami dimasa depan.
			</p>
			<p>Terima kasih.</p>
		</div>
	</section>
</main>