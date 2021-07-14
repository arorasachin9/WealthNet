<?php include_once("project2.php") ?>
<?php include_once("navbar.php") ?>



<body>


	<div class="container">
		<div class="row">
			<div class="col-md-6 mx-auto py-5">
				<div class="card">
					<div class="card-header bg-primary text-white text-center font-weight-bold">
						SIP Calculator
					</div>

					<div class="card-body">
						<form action="" method="post">
							<div class="form-group">
								<input type="number" name="invesmet" placeholder="Monthly Investment" required="" class="form-control" value="<?php if (!empty($invesmet)) : echo $invesmet;
																																				endif; ?>">
							</div>
							<div class="form-group">
								<input type="number" name="return_rate" placeholder="Expected Return Rate" required="" class="form-control" value="<?php if (!empty($annualRate)) : echo $annualRate;
																																					endif; ?>">
							</div>
							<div class="form-group">
								<input type="number" name="year" placeholder="Time Period" required="" class="form-control" value="<?php if (!empty($years)) : echo $years;
																																	endif; ?>">
							</div>
							<div class="form-group text-center">
								<input type="submit" name="submit" class="btn btn-success" value="Calculate">
							</div>
						</form>
					</div>
					<div class="card-footer bg-white">
						<table class="table table-bordered table-hover">
							<tr>
								<th>Invested Amount</th>
								<th>&#8377; <?php echo number_format(@$invesmet_amonut); ?></th>
							</tr>
							<tr>
								<th>Est. Returns</th>
								<th>&#8377; <?php echo number_format(@$est_rtn); ?></th>
							</tr>
							<tr>
								<th>Total Value</th>
								<th>&#8377; <?php echo number_format(@$futureValue); ?></th>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>

</body>

