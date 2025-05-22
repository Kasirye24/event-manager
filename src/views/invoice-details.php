<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="Gambolthemes">
		<meta name="author" content="Gambolthemes">		
		<title><?= $title ?></title>
		
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="/assets/images/logo-vc.png">
		
		<!-- Stylesheets -->
		<link rel="preconnect" href="https://fonts.googleapis.com/">
		<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
		<link href='/assets/vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
		<link href="/assets/css/style.css" rel="stylesheet">
		<link href="/assets/css/responsive.css" rel="stylesheet">
		<link href="/assets/css/night-mode.css" rel="stylesheet">
		
		<!-- Vendor Stylesheets -->
		<link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
		<link href="/assets/vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
		<link href="/assets/vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
		<link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">		
		
	</head>

<body class="d-flex flex-column h-100">
	<!-- Invoice Start-->
	<div class="invoice clearfix">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-lg-8 col-md-10">
					<div class="invoice-header justify-content-between">
						<div class="invoice-header-logo">
							<img src="/assets/images/logo-vc.png" alt="invoice-logo">
						</div>
						<div class="invoice-header-text">
							<a href="#" class="download-link">Download</a>
						</div>
					</div>
					<div class="invoice-body">
						<div class="invoice_dts">
							<div class="row">
								<div class="col-md-12">
									<h2 class="invoice_title">Ticket Details</h2>
								</div>
								<div class="col-md-6">
									<div class="vhls140">
										<ul>
											<li><div class="vdt-list">Ticket to <?= $details['full_name'] ?></div></li>
											<li><div class="vdt-list"><?= $details['email'] ?></div></li>
											<li><div class="vdt-list"><?= $details['phone'] ?></div></li>
											<li><div class="vdt-list"><?= $details['organization'] ?? 'No organization' ?></div></li>
										</ul>
									</div>
								</div>
								<div class="col-md-6">
									<div class="vhls140">
										<ul>
											<li><div class="vdt-list">Ticket Number : <?= $details['ticket_number'] ?></div></li>
											<li><div class="vdt-list">Order Date : <?= date('D M, Y',strtotime($details['created_at'])) ?></div></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="main-table bt_40">
							<div class="table-responsive">
								<table class="table">
									<thead class="thead-dark">
										<tr>
											<th scope="col">#</th>
											<th scope="col">Event Details</th>
											<th scope="col">Seat Number</th>
											<th scope="col">Qty</th>
											<th scope="col">Unit Price</th>
											<th scope="col">Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>										
											<td>1</td>	
											<td><a href="/events/<?= $details['event_id'] ?>" target="_blank"><?= $details['title'] ?></a></td>	
											<td><?= $details['seat_number'] ?></td>
											<td>1</td>
											<td>UGX <?= number_format($details['amount']) ?></td>
											<td>UGX<?= number_format($details['amount']) ?></td>
										</tr>
										<tr>
											<td colspan="1"></td>
											<td colspan="5">
												<div class="user_dt_trans text-end pe-xl-4">
													<div class="totalinv2">Ticket Total : UGX<?= number_format($details['amount']) ?></div>
													<p>Paid via <?= $details['payment_method'] ?></p>
												</div>
											</td>
										</tr>
									</tbody>									
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/assets/vendor/OwlCarousel/owl.carousel.js"></script>
	<script src="/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>	
	<script src="/assets/js/custom.js"></script>
	<script src="/assets/js/night-mode.js"></script>
</body>

</html>