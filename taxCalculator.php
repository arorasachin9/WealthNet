<?php
if (isset($_POST['submit1'])) :
	$age = $_POST['age'];
	$monetary = $_POST['monetary'];
	$investment = $_POST['investment'];
	$meds1 = $_POST['meds1'];
	$meds2 = $_POST['meds2'];
	$home = $_POST['home'];

	$tax = 0;
	//2019-2020
	if ($monetary <= 500000) {
		$tax = 0;
	} else if (500000 < $monetary && $monetary <= 750000) {
		$tax = 12500 + ($monetary - 500000) * (0.1);
	} else if (750000 < $monetary && $monetary <= 1000000) {
		$tax = 37500 + ($monetary - 750000) * (1.5);
	} else if (1000000 < $monetary && $monetary <= 1250000) {
		$tax = 75000 + ($monetary - 1000000) * (0.2);
	} else if (1250000 < $monetary && $monetary <= 1500000) {
		$tax = 125000 + ($monetary - 1250000) * (2.5);
	} else {
		$tax = 187500 + ($monetary - 1500000) * (3);
	}

	if ($investment >= 150000) {
		$investment = 150000;
	}

	if($meds2>25000)
	{
		$meds2=25000;
	}

	if($meds1>50000)
	{
		$meds1=50000;
	}

	if ($home >= 200000) {
		$home = 200000;
	}

	$total = $tax - $investment - $meds - $home-$meds1-$meds2;
	if ($total < 0) {
		$total = 0;
	}

	$tax_amonut = $total;

endif;
?>
<?php include_once("navbar.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Tax Calculator</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="design1.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6 mx-auto py-5">
				<div class="card">
					<div class="card-header bg-primary text-white text-center font-weight-bold">
						TAX Calculator
					</div>

					<div class="card-body">
						<form action="" method="post">
							<div class="form-group">
								<input type="number" name="monetary" placeholder="Gross Total Income" required="" class="form-control" value="<?php if (!empty($monetary)) : echo $monetary;
																																				endif; ?>">
							</div>
							<div class="form-group">
								<input type="number" name="investment" placeholder="Investment in FDs,PPFs etc." required="" class="form-control" value="<?php if (!empty($investment)) : echo $taxsaving;
																																							endif; ?>">
							</div>
							<div class="form-group">
								<input type="number" name="meds1" placeholder="Medical Bills(non-senior citizens)" required="" class="form-control" value="<?php if (!empty($meds1)) : echo $meds1;
																																							endif; ?>">
							</div>
							<div class="form-group">
								<input type="number" name="meds2" placeholder="Medical Bills(senior citizens)" required="" class="form-control" value="<?php if (!empty($meds2)) : echo $meds2;
																																						endif; ?>">
							</div>
							<div class="form-group">
								<input type="number" name="home" placeholder="Home Loans" required="" class="form-control" value="<?php if (!empty($home)) : echo $home;
																																	endif; ?>">
							</div>
							<div class="form-group text-center">
								<input type="submit" name="submit1" class="btn btn-success" value="Calculate">
							</div>
						</form>
					</div>
					<div class="card-footer bg-white">
						<table class="table table-bordered table-hover">
							<tr>
								<th>Tax Amount</th>
								<th>&#8377; <?php echo number_format(@$tax_amonut); ?></th>
							</tr>

						</table>
					</div>
				</div>
			</div>
		</div>

	</div>

</body>

</html>