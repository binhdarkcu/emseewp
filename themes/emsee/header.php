<?php /* Template Name: Health Assessment Quiz */?> <html>

<head>
	<title><?php wp_title(); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="author" content="Result Driven SEO" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> <?php wp_head(); ?>
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/assessment.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

  	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/bootstrap.min.js"></script>

</head>

<body <?php body_class(); ?>>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/">Take the Assessment</a>
          </li>
        </ul>
      </div>
    </nav>
