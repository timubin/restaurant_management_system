<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Restaurant Website</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="style.css">
</head>
<body>

    <style>
     
		body {
			background-color: #f8f9fa;
			color: #212529;
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.5;
			margin: 0;
			padding: 0;
		}

		header {
			background-color: #fff;
			border-bottom: 1px solid #dee2e6;
			padding: 10px 0;
		}

		nav a {
			color: #212529;
			font-size: 18px;
			font-weight: 600;
			text-decoration: none;
			transition: all 0.3s ease;
		}

		nav a:hover {
			color: #007bff;
		}

		#hero {
			background-image: url('https://via.placeholder.com/1200x500');
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			height: 500px;
			position: relative;
			text-align: center;
		}

		#hero h1 {
			color: #fff;
			font-size: 60px;
			font-weight: 700;
			margin-top: 0;
			position: absolute;
			top: 50%;
			transform: translateY(-50%);
			width: 100%;
		}

		.menu-item {
			margin-bottom: 30px;
		}

		.menu-item img {
			max-width: 100%;
		}

		.menu-item h3 {
			color: #212529;
			font-size: 24px;
			font-weight: 700;
			margin-top: 0;
		}

		.menu-item p {
			color: #6c757d;
			font-size: 16px;
			line-height: 1.5;
			margin-bottom: 0;
		}

		.menu-item strong {
			color: #007bff;
			font-size: 18px;
			font-weight: 700;
		}

		#about {
			background-color: #fff;
			padding: 30px 0;
		}

		#about h2 {
			color: #212529;
			font-size: 36px;
			font-weight: 700;
			margin-bottom: 30px;
			text-align: center;
		}

		#about p {
			font-size: 18px;
			line-height: 1.5;
			margin-bottom: 30px;
			text-align: justify;
		}

		#contact {
			background-color: #f8f9fa;
			padding: 30px 0;
		}

		#contact h2 {
			color: #212529;
			font-size: 36px;
			font-weight: 700;
			margin-bottom: 30px;
			text-align: center;
		}

		form label {
			color: #212529;
			font-size: 18px;
			font-weight: 600;
			margin-bottom: 10px;
		}

    </style>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Restaurant</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Menu</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Contact</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{url('/login')}}">Login</a>
				</li>
			</ul>
		</div>
	</nav>

	<section id="home">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1>Welcome to Our Restaurant</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, augue vitae tempus eleifend, nisl nulla efficitur felis, id sollicitudin nulla elit ut risus.</p>
					<a href="#" class="btn btn-primary">View Menu</a>
				</div>
				<div class="col-md-6">
					<img src="https://via.placeholder.com/500x350" alt="Restaurant Image">
				</div>
			</div>
		</div>
	</section>

	<section id="menu">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Our Menu</h2>
					<div class="menu-item">
						<div class="row">
							<div class="col-md-4">
								<img src="https://via.placeholder.com/300x200" alt="Menu Item Image">
							</div>
							<div class="col-md-8">
								<h3>Menu Item 1</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, augue vitae tempus eleifend, nisl nulla efficitur felis, id sollicitudin nulla elit ut risus.</p>
								<p><strong>Price: $10.99</strong></p>
							</div>
						</div>
					</div>
					<div class="menu-item">
						<div class="row">
							<div class="col-md-4">
								<img src="https://via.placeholder.com/300x200" alt="Menu Item Image">
							</div>
                            <div class="col-md-8">
								<h3>Menu Item 2</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, augue vitae tempus eleifend, nisl nulla efficitur felis, id sollicitudin nulla elit ut risus.</p>
								<p><strong>Price: $8.99</strong></p>
							</div>
						</div>
					</div>
					<div class="menu-item">
						<div class="row">
							<div class="col-md-4">
								<img src="https://via.placeholder.com/300x200" alt="Menu Item Image">
							</div>
							<div class="col-md-8">
								<h3>Menu Item 3</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, augue vitae tempus eleifend, nisl nulla efficitur felis, id sollicitudin nulla elit ut risus.</p>
								<p><strong>Price: $12.99</strong></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="about">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>About Us</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, augue vitae tempus eleifend, nisl nulla efficitur felis, id sollicitudin nulla elit ut risus.</p>
				</div>
			</div>
		</div>
	</section>

	<section id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Contact Us</h2>
					<form action="#" method="POST">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control" id="name" name="name" required>
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" class="form-control" id="email" name="email" required>
						</div>
						<div class="form-group">
							<label for="message">Message:</label>
							<textarea class="form-control" id="message" name="message" rows="5" required></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Send Message</button>
					</form>
				</div>
			</div>
		</div>
	</section>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>&copy; 2023 Restaurant. All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- Custom JS -->
	<script src="script.js"></script>
</body>
</html

