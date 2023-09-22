
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="<?= base_url('assets/css/chat.css'); ?>">
<script>
	orang()

	function orang() {
		$.ajax({
			type: "post",
			url: "<?= base_url() ?>chat/getallorang",
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
						<li class="active coba" data-id=${d.id}>
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
	$(document).ready(function() {
		$('#action_menu_btn').click(function() {
			$('.action_menu').toggle();
		});


		pesan()

		function pesan() {
			var id_lawan = '<?= $data->id ?>'
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>chat/loadchat",
				data: {
					id_pengirim: '<?= $id ?>',
					id_lawan: id_lawan
				},
				dataType: "json",
			success: function(r) {
    var messages = [];
    var d = r.data;
    id= '<?= $id ?>';
    var today = new Date(); // Tanggal saat ini

    d.forEach(d => {
        var times = new Date(d.waktu);
        var time = times.toLocaleTimeString();
        var tanggal = String(times.getDate()).padStart(2, '0');
        var bulan = String(times.getMonth() + 1).padStart(2, '0');
        var tahun = times.getFullYear();
        var lengkapDB = tanggal + '-' + bulan + '-' + tahun;
        var kapan = "Today";
        var tanggal_bulan = tanggal + "-" + bulan;
        if (lengkapDB !== today.toLocaleDateString()) {
            kapan = tanggal_bulan;
        }

        var message = {
            id: d.id_pengirim,
            pesan: d.pesan,
            waktu: times,
            kapan: kapan,
            time: time
        };

        messages.push(message);
    });

    messages.sort(function(a, b) {
        return a.waktu - b.waktu;
    });

    var html = "";
    messages.forEach(message => {
        if (parseInt(message.id) === parseInt(id)) {
            html += `<div class="d-flex justify-content-end mb-4">
                        <div class="msg_cotainer_send">
                            ${message.pesan}
                            <span class="msg_time">${message.kapan}, ${message.time}</span>
                        </div>
                    </div>`;
        } else {
            html += `<div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                            <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                            ${message.pesan}                                
                            <span class="msg_time">${message.kapan}, ${message.time}</span>
                        </div>
                    </div>`;
        }
    });
					// console.log(html)
					$('#letakpesan').html(html);

				}
			});
		}
		setInterval(() => {
			pesan()
		}, 1000);

		$('.send_btn').click(function(e) {
			var pesan = $('.type_msg').val();
			var id = '<?= $id ?>'
			var id_lawan = '<?= $data->id ?>';
			if (pesan != "") {
				$.ajax({
					type: "post",
					url: "<?= base_url() ?>/chat/kirimpesan",
					data: {
						id,
						id_lawan,
						pesan
					},
					dataType: "json",
					success: function(r) {
						if (r.status) {
							$('.search_btn').trigger('click');
							$('.type_msg').val('');
							scrollToBottom()

						}

					}
				});
			}


		});
		scrollToBottom()

		function scrollToBottom() {
			$("#letakpesan").animate({
				scrollTop: 200000000000000000000000000000000
			}, "slow");
		}


		pesan()
		$('.search_btn').click(function(e) {
			pesan()
			// scrollToBottom()
		});
		$('.keluar').click(function(e) {

			Swal.fire({
				title: 'Anda Akan Keluar?',
				text: "Apakah Anda Yakin Akan keluar ? ",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						type: "post",
						url: "<?= base_url() ?>chat/logout",
						// data: "data",
						dataType: "json",
						success: function(r) {
							// console.log(r)
							// return false
							if (r) {
								Swal.fire(
									'success!',
									r.pesan,
									'success'
								)
								setTimeout(() => {
									location.href = '<?= base_url() ?>/auth/login';
								}, 1000);
							} else {
								'error!',
								r.pesan,
								'error'
							}

						}
					});

				}
			})

		});


		$('body').on('click', '.coba', function() {
			var id = $(this).attr('data-id');
			window.location.replace("<?= base_url() ?>chat/" + id);

		});


	});
</script>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

<script>
	window.onload = orang()
</script>

<body>
<div class="container-fluid h-100">
		<div class="row justify-content-center h-100">
	<div class="container-fluid h-100">
		<div class="row justify-content-center h-100">
			<div class="col-md-4 col-xl-3 chat">
				<div class="card card-warna mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<div class="input-group">

						</div>
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
										<span>Tes</span>
										<p>Tes is online</p>

										<!--Jika Pesan ini tampak berarti ada error atau data belum masuk !-->

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
					<div class="card-header  msg_head">
						<div class="d-flex bd-highlight">
							<div class="img_cont">
								<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
								<span class="online_icon"></span>
							</div>
							<div class="user_info">
								<span><?= $data->nama ?></span>
							</div>

						</div>

					</div>
					<div class="card-body msg_card_body" id="letakpesan">
					</div>
					<div class="card-footer">
						<div class="input-group">

							<textarea name="" class="form-control type_msg" placeholder="Type your message..."></textarea>
							<div class="input-group-append">
								<span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</div>
</div>