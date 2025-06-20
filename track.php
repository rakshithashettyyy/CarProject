<!DOCTYPE html>
<html>
<head>
	<?php

	require "head.php";
	require_once "config.php";
	?>
	<title>Track</title>
</head>
<body>
	<?php require 'header.php'; ?>
	<div class="container flex_ margin-top-20 mobile-flex-direction">
		<div class="left_nav">
			<?php require_once "side_bar.php"; ?>
		</div>
		<div class="space-50"></div>
		<div class="right_content">
			<div class="checkout_right">
				<div>
					<h3 class="center">Order Summary</h3>
					<div class="products_">
						<div class="flex_ justify-bet">
							<div>Order ID</div>
							<div>Order Date</div>
							<div>Status</div>
						</div>
						<?php
						if (!isset($_SESSION['me'])) {
							header('Location:404.php');
						}
						$me = $_SESSION['me'];
						$sql = "SELECT DISTINCT order_id as ord_, status, order_time, id FROM orders WHERE u_id='$me' group by order_id ORDER BY id DESC ";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								$ord_id = $row['ord_'];
								$status = $row['status'];
								$time = $row['order_time'];

								echo '<div class="flex_ justify-bet">
											<div class="order_id_size">
												<a href="order_details.php?id='.$ord_id.'">'.$ord_id.'</a>
											</div>
											<div style="margin-right:0px;">'.$time.'</div>
											<div class="pro_price">'.$status.'</div>
										</div>';
							}
						} else {
							echo "<p class='flex_ justify-bet'>Nothing Ordered Yet!</p>";
						}
						$conn->close();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<?php require_once 'footer.php'; ?>
</body>
</html>
