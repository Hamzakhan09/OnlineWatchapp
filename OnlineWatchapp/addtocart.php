<?php
if (isset($_SESSION)) {
	session_start();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link href="assets/cart-css/style.css" rel="stylesheet">
	<?php
	include 'Partial/file.php';
	?>
</head>

<body>

	<?php
	include 'Partial/__nav.php';
	include 'Partial/__search.php';
	?>

	<div class="page-area cart-page spad">
		<div class="container">
			<div class="cart-table">
				<table>
					<thead>
						<tr>
							<th class="product-th">Product</th>
							<th>Price</th>
							<th>Quantity</th>
							<th class="total-th">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						
						if (isset($_SESSION['shopping_cart']) > 0) {
							foreach ($_SESSION['shopping_cart'] as $key => $value) {
						?>
								<tr>
									<td class="product-col">
										<img src="img/product/cart.jpg" alt="">
										<div class="pc-title">
											<h4><?php echo $value["item_name"] ?></h4>
											<a href="#">Edit Product</a>
										</div>
									</td>
									<td class="price-col">Rs <?php echo $value["item_price"] ?>
										<input type="hidden" class="iprice" value="<?php echo $value["item_price"] ?>">
									</td>
									<td class="quy-col">
										<div class="quy-input">
											<form action="manage_cart.php" method="POST">

												<span>Qty</span>
												<input type="number" class="iquantity" name="Mod_quantity" onChange="this.form.submit()" value="<?php echo $value["quantity"] ?>" min="1" max="10">
												<input type="hidden" name="Item_name" value="<?php echo $value["item_name"] ?>">
											</form>
										</div>
									</td>
									<td class="total-col itotal">Rs </td>
									<td class="total-col">
										<form action="manage_cart.php" method="POST">
											<button type="sumbit" class="close" name="btn-remove">&times;</button>
											<input type="hidden" name="Item_name" value="<?php echo $value["item_name"] ?>">
										</form>
									</td>
								</tr>
						<?php
							}
						} else {
							echo "<div class='align-items-center bg-danger'><i>Your cart is empty!</i></div>";
						}
						?>

					</tbody>
				</table>
			</div>
			<div class="row cart-buttons">
				<div class="col-lg-5 col-md-5">
					<div class="site-btn btn-continue"><a href="Shop.php" style="color:aliceblue;">Continue Shopping</a></div>
				</div>
				<div class="col-lg-7 col-md-7 text-lg-right text-left">
					<div class="site-btn btn-clear"><a href="clear_cart.php" style="color: black;">Clear cart</a></div>
					<div class="site-btn btn-line btn-update">Update Cart</div>
				</div>
			</div>
		</div>

		<!-- <============ BILLING PROCESS ============> -->

		<form action="checkout.php" method="POST">
			<div class="card-warp">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="shipping-info">
								<h4>Shipping method</h4>
								<p>Select the one you want</p>
								<div class="shipping-chooes">
									<div class="sc-item">
										<input type="radio" name="sc" id="one">
										<label for="one">Next day delivery<span>$4.99</span></label>
									</div>
									<div class="sc-item">
										<input type="radio" name="sc" id="two">
										<label for="two">Standard delivery<span>$1.99</span></label>
									</div>
									<div class="sc-item">
										<input type="radio" name="sc" id="three">
										<label for="three">Personal Pickup<span>Free</span></label>
									</div>
								</div>
								<h4>Cupon code</h4>
								<p>Enter your cupone code</p>
								<div class="cupon-input">
									<input type="text">
									<button class="site-btn">Apply</button>
								</div>
							</div>
						</div>
						<div class="offset-lg-2 col-lg-6">
							<div class="cart-total-details">
								<h4>Cart total</h4>
								<p>Final Info</p>
								<ul class="cart-total-card">
									<li>Shipping<span>Free</span></li>
									<li class="total">Total<span id="gtotal"></span></li>
									<input type="hidden" name="total" value="<?php $_SESSION['total'] = $total; ?>" />
								</ul>
								<!-- <input  class="site-btn btn-full" href="checkout.php" name="checkout">Proceed to checkout</a> -->
								<!-------- <======== Modal ==========> ----->
								<button type="button" class="site-btn btn-full" data-toggle="modal" data-target="#staticBackdrop">
									Checkout
								</button>

								<!-- Modal -->
								<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Your Cart</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body d-flex justify-content-center">
												<table class="table table-striped ">
													<thead>
														<tr>
															<th>Product Name</th>
															<th>Product Price</th>
															<th>Product Quantity</th>
															
														</tr>
													</thead>
													<tbody>
														<?php
														if (isset($_SESSION['shopping_cart']) > 0) {
															foreach ($_SESSION['shopping_cart'] as $key => $value) {
														?>
                                                                 <tr>
																 <td class="price-col"><?php echo $value["item_name"] ?></td>
																 <td class="price-col"><?php echo $value["item_price"] ?></td>
																 <td class="price-col"><?php echo $value["quantity"] ?></td>
																 </tr>
															
														<?php
															}
														} else {
															echo "<tr>
															<td><div class='align-items-center bg-danger'><i>Your cart is empty!</i></div></td>
															</tr>";
														}
														?>
													</tbody>
												</table>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Later</button>
												<button type="submit" class="btn btn-primary" name="confirm">Pay</button>
											</div>
										</div>
									</div>
								</div>


								<!------- <====== Modal End Here =======> --->

							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>


	<!-- Page end -->


	<?php
	include 'Partial/__footer.php';
	?>

	<script>
		var gt = 0;
		var item_price = document.getElementsByClassName('iprice');
		var item_quantity = document.getElementsByClassName('iquantity');
		var item_total = document.getElementsByClassName('itotal');
		var grand_total = document.getElementById('gtotal');

		function subtotal() {
			gt = 0;
			for (i = 0; i < item_price.length; i++) {
				item_total[i].innerText = (item_price[i].value) * (item_quantity[i].value);
				gt = gt + (item_price[i].value) * (item_quantity[i].value);
			}
			grand_total.innerText = gt;
		}
		subtotal();
	</script>