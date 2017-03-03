@extends('layout.master')
@section('content')
<style>
	.jumbotron{
		background: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),url('{{asset('/img/banner.jpg')}}');
		background-size: cover;
		background-position: center;
	}

	.jumbotron .content p{
		font-size:16px;
		margin-top:20px;
		color:#fff;
	}
	.jumbotron .content h1{
		color:#fff;
	}
	.header-section{
		padding:0px;
	}
	.form-bordered .form-group.form-actions {
		background-color: #fff;
		border:none;}
		.form-bordered .form-group{
			border:none;
			padding: 10px 15px 0;
		}

</style>

<div id="page-content">
	<!-- Dashboard 2 Header -->

	<div class="content-header content-media">
		<div class="header-section">
			<div class="jumbotron" >

				<div class="content" style="padding:0px 40px;">
					<h1 style="text-transform: uppercase;">Salam <b>Perubahan</b></h1>
					

				</div>
			</div>
		</div>
	</div>
	<!-- <div class="content-header">
		<ul class="nav-horizontal text-center">
			<li class="active">
				<a href="javascript:void(0)"><i class="fa fa-home"></i> Home</a>
			</li>
			<li>
				<a href="javascript:void(0)"><i class="gi gi-charts"></i> Sales</a>
			</li>
			<li>
				<a href="javascript:void(0)"><i class="gi gi-briefcase"></i> Projects</a>
			</li>
			<li>
				<a href="javascript:void(0)"><i class="gi gi-video_hd"></i> Movies</a>
			</li>
			<li>
				<a href="javascript:void(0)"><i class="gi gi-music"></i> Music</a>
			</li>
			<li>
				<a href="javascript:void(0)"><i class="fa fa-cubes"></i> Apps</a>
			</li>
			<li>
				<a href="javascript:void(0)"><i class="fa fa-pencil"></i> Profile</a>
			</li>
			<li>
				<a href="javascript:void(0)"><i class="fa fa-cogs"></i> Settings</a>
			</li>
		</ul>
	</div> -->
	<!-- END Dashboard 2 Header -->
		<div class="row">
		<div class="col-md-6">
			<!-- Quick Post Block -->
			<div class="block">
			<p>
						Selamat datang di dashboard monitoring program budaya OJKway.
						Dashboard monitoring adalah sebuah media pelaporan program dan anggaran budaya satuan kerja. Program dan anggaran budaya dilaporkan secara rutin per triwulan di 2016 dengan tenggat sebagai berikut: 15 Maret, 15 Juni, 15 September, dan 15 November.Selamat menggunakan,</br>Direktorat Manajemen Perubahan
					</p>
			</div>
			</div>
			</div>
	<!-- Dashboard 2 Content -->
	<div class="row">
		<div class="col-md-6">
			<!-- Quick Post Block -->
			<div class="block">
				<!-- Quick Post Title -->
				<div class="block-title">
					<div class="block-options pull-right">
						<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Post Options"><i class="fa fa-pencil"></i></a>
					</div>
					<h2><strong>Bagikan</strong> Sesuatu</h2>
				</div>
				<!-- END Quick Post Title -->

				<!-- Quick Post Content -->
				<form action="index2.html" method="post" class="form-bordered" onsubmit="return false;">
					<!-- <div class="form-group">
						<input type="text" id="qpost-title" name="qpost-title" class="form-control" placeholder="Enter a title..">
					</div>
					<div class="form-group">
						<input type="text" id="qpost-tags" name="qpost-tags" class="input-tags" value="tutorial, learn, javascript">
					</div> -->
					<div class="form-group">
						<textarea id="qpost-content" name="qpost-content" rows="11" class="form-control" placeholder="Apa yang sedang anda pikirkan" style="max-height: 100px;"></textarea>
					</div>
					<div class="form-group form-actions">
						<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Kirim</button>
						<button type="submit" class="btn btn-sm btn-default"><i class="fa fa-camera"></i></button>
						<!-- <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button> -->
					</div>
				</form>
				<!-- END Quick Post Content -->
			</div>
			<!-- END Quick Post Block -->
		</div>
		<div class="col-md-6">
			<!-- Timeline Block -->
			<div class="block">
				<!-- Timeline Title -->
				<div class="block-title">
					<div class="block-options pull-right">
						<a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
					</div>
					<h2><strong>Berita</strong> Terhangat</h2>
				</div>
				<!-- END Timeline Title -->

				<!-- Timeline Content -->
				<div class="block-content-full">
					<div class="timeline">
						<ul class="timeline-list">
							<li class="active">
								<div class="timeline-icon"><i class="gi gi-airplane"></i></div>
								<div class="timeline-time"><small>just now</small></div>
								<div class="timeline-content">
									<p class="push-bit"><a href="page_ready_user_profile.html"><strong>Jordan Carter</strong></a></p>
									<p class="push-bit">The trip was an amazing and a life changing experience!!</p>
									<p class="push-bit"><a href="page_ready_article.html" class="btn btn-xs btn-primary"><i class="fa fa-file"></i> Read the article</a></p>
									<div class="row push">
										<div class="col-sm-6 col-md-4">
											<a href="" data-toggle="lightbox-image">
												<img src="{{asset('vendor/img/placeholders/photos/photo1.jpg')}}" alt="image">
											</a>
										</div>
										<div class="col-sm-6 col-md-4">
											<a href="img/placeholders/photos/photo22.jpg" data-toggle="lightbox-image">
												<img src="{{asset('vendor/img/placeholders/photos/photo22.jpg')}}" alt="image">
											</a>
										</div>
									</div>
								</div>
							</li>
							<li class="active">
								<div class="timeline-icon"><i class="fa fa-file-text"></i></div>
								<div class="timeline-time"><small>5 min ago</small></div>
								<div class="timeline-content">
									<p class="push-bit"><a href="page_ready_user_profile.html"><strong>Administrator</strong></a></p>
									<strong>Free courses</strong> for all our customers at A1 Conference Room - 9:00 <strong>am</strong> tomorrow!
								</div>
							</li>
							<li class="active">
								<div class="timeline-icon"><i class="gi gi-drink"></i></div>
								<div class="timeline-time"><small>3 hours ago</small></div>
								<div class="timeline-content">
									<p class="push-bit"><a href="page_ready_user_profile.html"><strong>Ella Winter</strong></a></p>
									<p class="push-bit"><strong>Happy Hour!</strong> Free drinks at <a href="javascript:void(0)">Cafe-Bar</a> all day long!</p>
									<div id="gmap-timeline-dash2" class="gmap" style="height: 220px;"></div>
								</div>
							</li>
							<li class="active">
								<div class="timeline-icon"><i class="fa fa-cutlery"></i></div>
								<div class="timeline-time"><small>yesterday</small></div>
								<div class="timeline-content">
									<p class="push-bit"><a href="page_ready_user_profile.html"><strong>Patricia Woods</strong></a></p>
									<p class="push-bit">Today I had the lunch of my life! It was delicious!</p>
									<div class="row push">
										<div class="col-sm-6 col-md-4">
											<a href="img/placeholders/photos/photo23.jpg" data-toggle="lightbox-image">
												<img src="{{asset('vendor/img/placeholders/photos/photo23.jpg')}}" alt="image">
											</a>
										</div>
									</div>
								</div>
							</li>
							<li class="active">
								<div class="timeline-icon"><i class="fa fa-smile-o"></i></div>
								<div class="timeline-time"><small>2 days ago</small></div>
								<div class="timeline-content">
									<p class="push-bit"><a href="page_ready_user_profile.html"><strong>Administrator</strong></a></p>
									To thank you all for your support we would like to let you know that you will receive free feature updates for life! You are awesome!
								</div>
							</li>
							<li class="active">
								<div class="timeline-icon"><i class="fa fa-pencil"></i></div>
								<div class="timeline-time"><small>1 week ago</small></div>
								<div class="timeline-content">
									<p class="push-bit"><a href="page_ready_user_profile.html"><strong>Nicole Ward</strong></a></p>
									<p class="push-bit">Consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate.</p>
									Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum.
								</div>
							</li>
							<li class="text-center">
								<a href="javascript:void(0)" class="btn btn-xs btn-default">View more..</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- END Timeline Content -->
			</div>
			<!-- END Timeline Block -->
		</div>
	</div>
	<!-- END Dashboard 2 Content -->
</div>
<!-- END Page Content -->
@endsection