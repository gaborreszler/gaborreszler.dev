<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Gabor Reszler | Full-Stack Web Developer</title>

		<!-- Favicons -->
		<link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon/favicon-16x16.png">
		<link rel="manifest" href="/assets/img/favicon/site.webmanifest">
		<link rel="shortcut icon" href="/assets/img/favicon/favicon.ico">

        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<!-- Introduction CSS -->
		<link href="{{ mix('assets/css/introduction.css') }}" rel="stylesheet">

		<!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,900&display=swap" rel="stylesheet">

		@if (app()->environment('production'))
		<!-- Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-147988961-1"></script>
		<script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-147988961-1');
		</script>
		@endif
    </head>

    <body>
		<header class="container">
			<section class="row align-items-center">
				<div class="col-sm-4 col-lg-5 text-sm-right text-center">
					<h1>Gabor</h1>
				</div>
				<div class="col-sm-4 col-lg-2 text-center">
					<img src="/assets/img/gabor-reszler.png" alt="Portrait picture of Gabor Reszler" />
				</div>
				<div class="col-sm-4 col-lg-5 text-sm-left text-center">
					<h1>Reszler</h1>
				</div>
			</section>
		</header>

		<main class="container">
			<section class="row">
				<article class="container-one col-12 col-md-6">
					<h2>Work experience</h2>
					<hr>
					<section class="content-one">
						<p>
							Full-Stack Web Developer @ <a href="#">VTL Design</a><br>
							<span class="additional-content content-grey">
								Developing & maintaining <code>Laravel</code>/<code>Symfony</code> websites
							</span>
						</p>
						<p class="content-grey">
							Junior Web Developer @ Cartographia
						</p>
					</section>
				</article>
				<article class="container-two col-12 col-md-6">
					<h2>About me</h2>
					<hr>
					<section class="content-two text-justify">
						<p>
							Since I was a kid I've always been interested in digital technology and it hasn't changed a <code>bit</code>.
							I'm eager to check out innovative and revolutionary developments those foresee the future we'll live in.<br>

							Nowadays I'm into server management as well as tinkering with any stuff that's related to web development in any way.
						</p>
					</section>
				</article>
			</section>
		</main>

		<footer>
			<section class="col-md-12 text-center">
				<small>
					@ 2019 <a href="#">gaborreszler.dev</a>
					<br>Built with <code>Bootstrap</code>
				</small>
			</section>
		</footer>
    </body>
</html>