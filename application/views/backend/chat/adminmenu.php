


<?php

$id = $_SESSION['id'];
$nama = $_SESSION['nama'];
?>


<link rel="stylesheet" href="<?= base_url('assets/css/chat.css'); ?>">

<body>
	<div class="container-fluid h-100">
		<div class="row justify-content-center h-100">
			<div class="col-md-4 col-xl-3 chat">
				<div class="card card-warna mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
					</div>
					
					<div class="card-body contacts_body">
						<ui class="contacts" id="yangAktif">
							<li class="active">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>Khalid</span>
										<p>Kalid is online</p>
									</div>
								</div>
							</li>
							<li class="active">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>Khalid</span>
										<p>Kalid is online</p>
									</div>
								</div>
							</li>
						</ui>

					</div>
					<div class="card-footer"></div>
				</div>
			</div>
			<div class="col-md-8 col-xl-6 chat">
				<div class="card card-warna">
					<div class="card-header msg_head">
					</div>
					<div class="card-body msg_card_body" id="letakpesan">
						<div class="d-flex justify-content-center align-items-center mb-4">
						<div class="text-center">
							<img src="<?= base_url('assets/backend/img/chat.png'); ?>" class="rounded-circle user_img_msg">
							<br>
							<p class="text-center" style="color:white" id="textnya">Halo, <?= $nama ?>, <br>Ayo Chat temanmu Sekarang !</p>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
</>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	$(document).ready(function() {
		
		orang()

		function orang() {
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>adminchat/getallorang",
				data: {
					id: '<?= $id ?>'
				},
				dataType: "json",
				success: function(r) {
					var html = "";
					var d = r.data;
					id = '<?= $id ?>';
					d.forEach(d => {
						html += `
						<li class="active coba" data-id="${d.id}">
								<div class="d-flex bd-highlight ">
									<div class="img_cont ">
										<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
										<span class="online_icon " ></span>
									</div>
									<div class="user_info ">	
										<span class="">${d.nama}</span>
									</div>
									
								</div>
							</li>`;

					});
					$('#yangAktif').html(html);
				}
			});
		}
		$('body').on('click', '.coba', function(event) {
  var id = $(event.target).closest('.coba').data('id');
  window.location.replace("<?= base_url() ?>adminchat/" + id);
});

	});
</script>

