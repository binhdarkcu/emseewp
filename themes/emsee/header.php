
<head>
	<title><?php wp_title(); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="author" content="Result Driven SEO" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> <?php wp_head(); ?>
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/assessment.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

  	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/function-new-assessment.js"></script>

</head>

<body <?php body_class(); ?>>

  <header class="bg-light">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-lg-2 col-md-2 col-6">
					<div class="logo">
						<a href="#" class="custom-logo-link" rel="home" aria-current="page">
							<img width="231" height="58" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/assessment-logo.png" class="custom-logo" alt="Australian Menopause Centre " decoding="async" title="australian-menopause-centre - Australian Menopause Centre">
						</a>
					</div>
				</div>
				<div class="col-lg-10 col-md-10  col-6 d-flex justify-content-end">
					<nav class="navbar navbar-expand-lg navbar-light">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
							</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link" href="/">Home</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= home_url()?>/assessment">Take the Assessment</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>

			</div>

		</div>
	</header>
