<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Medical Center</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <strong>  <img src="/images/logo_medi.png" class="mainlogo"></strong>
                </a>
                <a class="navbar-brand" href="{{ url('/') }}">
                Home</a>
                </a>
                <a class="navbar-brand" href="{{ url('/') }}">
                <a class="navbar-brand" href="{{ route('home') }}">Dashboard</a>
                </a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<!----------------------------------------------------------------------------------------->


			  <section id="banner">
				<div class="inner">
					<h1>Care More - Because We Do.</h1>
					<p>Your health is your mood, a healthy body is a healthy mind, as we like to say!<br />
					</p>
				</div>

			</section>

			 <section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>Our Services & Facilities </h2>
						<p>We have a wide range of services and facilities within our hospital to cater for you! Whether it's an over-night stay or just a check-up, we are there for you always!</p>
					</header>
					<div class="highlights">
						<section>
							<div class="content">
								<header>
									<a href="#" class="icon fa-wifi"><span class="label">Icon</span></a>
									<h3>Wi-Fi</h3>
								</header>
								<p>We offer fast and reliable Wi-Fi throughout the hospital! Surf the web all day!.</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="#" class="icon fa-cutlery"><span class="label">Icon</span></a>
									<h3>Restaurant</h3>
								</header>
								<p>Eat at our hospital's top class restaurant today, we have menus for all ages too!.</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="#" class="icon fa-gift"><span class="label">Icon</span></a>
									<h3>Gift Shop</h3>
								</header>
								<p>Want to remember your stay? Great! We have just the thing, check out our hospital's gift shop for range of souveniers</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="#" class="icon fa-child"><span class="label">Icon</span></a>
									<h3>Kids Playground</h3>
								</header>
								<p>Let the children run free in our large indoor playground! A great way to pass the time.</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="#" class="icon fa-newspaper-o"><span class="label">Icon</span></a>
									<h3>Newsagents</h3>
								</header>
								<p>Grab a coffee or whatever it may be while you wait for your appointment, we won't keep you waiting!</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="#" class="icon fa-phone"><span class="label">Icon</span></a>
									<h3>Telephones</h3>
								</header>
								<p>Need to make a call? That's no problem, we have telephones located on every floor of the hospital.</p>
							</div>
						</section>
					</div>
				</div>
			</section>


			 <section id="cta" class="wrapper">
				<div class="inner">
					<h2>ABOUT US - OUR ROOTS.</h2>
					<p>Care More is a Dublin based medical center located in the Ballybrack area. We have been open for more than 7 years and we have enjoyed every second helping you! We began as a small medical center in the suburbs of Manchester, England. From there we grew as a company and now own over 6 different branches across Ireland and England.</p>
				</div>
			</section>


			<section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>Patient Testimonials</h2>
						<p>Read about what our friendly patient's have to say about us! We appriciate any and all feedback.</p>
					</header>
					<div class="testimonials">
						<section>
							<div class="content">
								<blockquote>
									<p>Care More was there for me when I needed a helping hand. The doctors couldn't have been more friendly and I was in and out in under 20 minutes, it was great!</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/pic03.jpg" alt="" />
									</div>
									<p class="credit">- <strong>Mo Che</strong> <span>CEO - IADT.</span></p>
								</div>
							</div>
						</section>
						<section>
							<div class="content">
								<blockquote>
									<p>Care More is one of the best medical centers around! I live around the corner from it which is great and easy! I can feel safe about my health knowing that Care More is there!</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/pic01.jpg" alt="" />
									</div>
									<p class="credit">- <strong>Mary Anne</strong> <span>Loyal patient.</span></p>
								</div>
							</div>
						</section>
						<section>
							 <div class="content">
								<blockquote>
									<p>Last year I broke my leg in two places and was admiited here, the customer service I recieved was outstanding! Definetly my favourite medical center and it's easy to get to!</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/pic02.jpg" alt="" />
									</div>
									<p class="credit">- <strong>Janet Smith</strong> <span>CEO - ABC Inc.</span></p>
								</div>
							</div>
						</section>
					</div>
				</div>
			</section>


			 <footer id="footer">
				<div class="inner">
					<div class="content">
						<section>
							<h3>Accumsan montes viverra</h3>
							<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing. Lorem ipsum dolor vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing sed feugiat eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida.</p>
						</section>
						<section>
							<h4>Contact information</h4>
							<ul class="alt">
								<li><a href="#">Phone: (01) 435 6353.</a></li>
								<li><a href="#">Email: caremore@info.ie.</a></li>

							</ul>
						</section>
						<section>
							 <h4>Our Social Medias</h4>
							<ul class="plain">
								<li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
								<li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
								<li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>

							</ul>
						</section>
					</div>
					<div class="copyright">
						&copy; Care More Ireland</a>.
					</div>
				</div>
			</footer>





        <main >
            @yield('content')
        </main>
    </div>
</body>
</html>
