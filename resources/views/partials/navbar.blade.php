<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark posit">
	<!-- Navbar Brand-->
	<div class="container">
		<div class="d-flex justify-content-start">

			<img height="50" width="50" src="{{ asset('/img/logo.png') }}" alt="">
			<a class="navbar-brand ps-3" href="/" style="color: rgba(255, 182, 14, 1)">Rm. JagoSore</a>
			
			@auth
			<!-- Sidebar Toggle-->
			<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
		</div>
		<div class="d-flex justify-content-end">
			<!-- Navbar Search-->

			<!-- Navbar-->
			  <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item text-capitalize">Selamat datang, {{ auth()->user()->name }} </a></li>
						<li><hr class="dropdown-divider" /></li>
						<li>
							<form method="post" action="/logout">
								@csrf
									  <button class="dropdown-item">
										 <li><i class="bi bi-box-arrow-right"></i> Logout</li>
									  </button>
								</form>
						</li>
					</ul>
				</li>
			  </ul>
			@else
		
			@endauth
		</div>
	</div>
</nav>
        
