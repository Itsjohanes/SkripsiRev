
<!------ Include the above in your HEAD tag ---------->


<style>
	.profileku {
		width: 100% !important;
		/* padding: 5px 10px; */
		/* margin-bottom: 15px !important;*/
		height: 80%;
		background-color: rgba(0, 0, 0, 0.3);
	}

	.user_img_ku {
		height: 40px;
		width: 40px;
		border: 1.5px solid #f5f6fa;
	}

	.chat {
		margin-top: auto;
		margin-bottom: auto;
	}

	.card {
		
	}
	.card-warna{

		height: 750px;
		border-radius: 15px !important;
		background-color: rgba(34, 34, 36, 0.9) !important;

	}

	.contacts_body {
		padding: 0.75rem 0 !important;
		overflow-y: auto;
		white-space: nowrap;
	}

	.msg_card_body {
		overflow-y: auto;
	}

	.card-header {
		border-radius: 15px 15px 0 0 !important;
		border-bottom: 0 !important;
		background-color: rgba(34, 34, 36, 0) !important;

	}

	.card-footer {
		border-radius: 0 0 15px 15px !important;
		border-top: 0 !important;
	}

	.container {
		align-content: center;
	}

	.search {
		border-radius: 15px 0 0 15px !important;
		background-color: rgba(0, 0, 0, 0.3) !important;
		border: 0 !important;
		color: white !important;
	}

	.search:focus {
		box-shadow: none !important;
		outline: 0px !important;
	}

	.type_msg {
		background-color: rgba(0, 0, 0, 0.3) !important;
		border: 0 !important;
		color: white !important;
		height: 60px !important;
		overflow-y: auto;
	}

	.type_msg:focus {
		box-shadow: none !important;
		outline: 0px !important;
	}

	.attach_btn {
		border-radius: 15px 0 0 15px !important;
		background-color: rgba(0, 0, 0, 0.3) !important;
		border: 0 !important;
		color: white !important;
		cursor: pointer;
	}

	.send_btn {
		border-radius: 0 15px 15px 0 !important;
		background-color: rgba(0, 0, 0, 0.3) !important;
		border: 0 !important;
		color: white !important;
		cursor: pointer;
	}

	.search_btn {
		border-radius: 0 15px 15px 0 !important;
		background-color: rgba(0, 0, 0, 0.3) !important;
		border: 0 !important;
		color: white !important;
		cursor: pointer;
	}

	.contacts {
		list-style: none;
		padding: 0;
	}

	.contacts li {
		width: 100% !important;
		padding: 5px 10px;
		margin-bottom: 15px !important;
	}

	.active {
	}

	.user_img {
		height: 70px;
		width: 70px;
		border: 1.5px solid #f5f6fa;

	}

	.user_img_msg {
		height: 40px;
		width: 40px;
		border: 1.5px solid #f5f6fa;

	}

	.img_cont {
		position: relative;
		height: 70px;
		width: 70px;
	}

	.img_cont_msg {
		height: 40px;
		width: 40px;
	}

	.online_icon {
		position: absolute;
		height: 15px;
		width: 15px;
		background-color: #4cd137;
		border-radius: 50%;
		bottom: 0.2em;
		right: 0.4em;
		border: 1.5px solid white;
	}

	.offline {
		background-color: #c23616 !important;
	}

	.user_info {
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 15px;
	}

	.user_info_ku {
		/* margin-top: auto; */
		margin-bottom: auto;
		margin-left: 15px;
	}

	.user_info_ku span {
		font-size: 20px;
		color: white;
	}


	.user_info span {
		font-size: 20px;
		color: white;
	}

	.user_info_ku p {
		font-size: 10px;
		color: rgba(255, 255, 255, 0.6);
	}

	.user_info p {
		font-size: 10px;
		color: rgba(255, 255, 255, 0.6);
	}

	.video_cam {
		margin-left: 50px;
		margin-top: 5px;
	}

	.video_cam span {
		color: white;
		font-size: 20px;
		cursor: pointer;
		margin-right: 20px;
	}

	.msg_cotainer {
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 10px;
		border-radius: 25px;
		background-color: #82ccdd;
		padding: 10px;
		position: relative;
	}

	.msg_cotainer_send {
		margin-top: auto;
		margin-bottom: auto;
		margin-right: 10px;
		border-radius: 25px;
		background-color: #78e08f;
		padding: 10px;
		position: relative;
	}

	.msg_time {
		position: absolute;
		left: 0;
		bottom: -15px;
		color: rgba(255, 255, 255, 0.5);
		font-size: 10px;
	}

	.msg_time_send {
		position: absolute;
		right: 0;
		bottom: -15px;
		color: rgba(255, 255, 255, 0.5);
		font-size: 10px;
	}

	.msg_head {
		position: relative;
	}

	#action_menu_btn {
		position: absolute;
		right: 10px;
		top: 10px;
		color: white;
		cursor: pointer;
		font-size: 20px;
	}

	.action_menu {
		z-index: 1;
		position: absolute;
		padding: 15px 0;
		background-color: rgba(0, 0, 0, 0.5);
		color: white;
		border-radius: 15px;
		top: 30px;
		right: 15px;
		display: none;
	}

	.action_menu ul {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	.action_menu ul li {
		width: 100%;
		padding: 10px 15px;
		margin-bottom: 5px;
	}

	.action_menu ul li i {
		padding-right: 10px;

	}

	.action_menu ul li:hover {
		cursor: pointer;
		background-color: rgba(0, 0, 0, 0.2);
	}

	@media(max-width: 576px) {
		.contacts_card {
			margin-bottom: 15px !important;
		}
	}
</style>


<head>
	<title>Chat</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
</head>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!--Coded With Love By Mutiullah Samim-->

<body>
	<div class="container-fluid h-100">
		<div class="row justify-content-center h-100">
			<div class="col-md-4 col-xl-3 chat">
				<div class="card card-warna mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<div class="input-group">
							<input type="text" placeholder="Search..." name="" class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div>
					<div class="card-body contacts_body">
						<ui class="contacts">
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
						<div class="d-flex bd-highlight">
							<div class="img_cont">
								<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
								<span class="online_icon"></span>
							</div>
							<div class="user_info">
								<span>Lawan</span>
								<p>xx</p>
							</div>
							<div class="video_cam">
								<span><i class="fas fa-video"></i></span>
								<span><i class="fas fa-phone"></i></span>
							</div>
						</div>
						<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
						<div class="action_menu">
							<ul>
								<li><i class="fas fa-user-circle"></i> View profile</li>
								<li><i class="fas fa-users"></i> Add to close friends</li>
								<li><i class="fas fa-plus"></i> Add to group</li>
								<li><i class="fas fa-ban"></i> Block</li>
							</ul>
						</div>
					</div>
					<div class="card-body msg_card_body" id="letakpesan">
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
							</div>
							<div class="msg_cotainer">
								Hi, how are you samim?
								<span class="msg_time">8:40 AM, Today</span>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-4">
							<div class="msg_cotainer_send">
								Hi Khalid i am good tnx how about you?
								<span class="msg_time_send">8:55 AM, Today</span>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
							</div>
							<div class="msg_cotainer">
								I am good too, thank you for your chat template
								<span class="msg_time">9:00 AM, Today</span>
							</div>
						</div>
					</div>



					<div class="card-footer">
						<div class="input-group">
							<div class="input-group-append">
								<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
							</div>
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
</body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css" integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
	$(document).ready(function() {
		$('#action_menu_btn').click(function() {
			$('.action_menu').toggle();
		});

		$('.send_btn').click(function(e) {
			var pesan = $('.type_msg').val();
			if (pesan != "") {
				$.ajax({
					type: "post",
					url: "<?= base_url() ?>/chat/kirimpesankesatu",
					data: {
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
		const messages = document.getElementById('letakpesan');



		scrollToBottom()

		function scrollToBottom() {
			$("#letakpesan").animate({
				scrollTop: 200000000000000000000000000000000
			}, "slow");
		}


		pesan()
		$('.search_btn').click(function(e) {
			pesan()
		});

		// test()

		function pesan() {
			$.ajax({
				type: "post",
				url: "<?= base_url() ?>chat/loadchat",
				data: {
					id: 2
				},
				dataType: "json",
				success: function(r) {
					var html = "";
					var d = r.data;
					id = 2;
					d.forEach(d => {

						if (parseInt(d.id) == id) {
							html += `<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
							</div>
							<div class="msg_cotainer">
								${d.isi}
								<span class="msg_time">8:40 AM, Today</span>
							</div>
						</div>`;

						} else {
							html += `<div class="d-flex justify-content-end mb-4">
							<div class="msg_cotainer_send">
								${d.isi}
								<span class="msg_time_send">8:55 AM, Today</span>
							</div>
						</div>`;
						}

					});
					// console.log(html)
					$('#letakpesan').html(html);

				}
			});
		}

	});
</script>

