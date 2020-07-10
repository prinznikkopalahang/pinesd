<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>
			<!-- header -->
			<header class="header clear" role="header">
        <div class="container">
            <!-- logo -->
  					<div class="logo">
  						<a href="<?php echo home_url(); ?>">
  							<svg enable-background="new 0 0 216 288" viewBox="0 0 216 288" xmlns="http://www.w3.org/2000/svg"><g fill="#fff200"><path d="m0 0v144h72v72h144v-216z"></path><path d="m0 216h72v72h-72z"></path></g></svg>
  						</a>
  					</div>
  					<!-- /logo -->
						<!-- nav -->
  					<nav class="nav desktop" role="navigation">
                <?php pinesd_nav('pinesd-header');?>
  					</nav>
						<div class="mobile-nav-toggle">
							<div class="hamburger">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
  					<!-- /nav -->
        </div>
			</header>

			<div class="mobile-nav">
				<div class="mobile-nav-toggle">
					<div class="hamburger">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
				<nav class="nav" role="navigation">
						<?php pinesd_nav('pinesd-header');?>
				</nav>
			</div>
