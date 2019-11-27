<?php //echo $q; ?>

<style>
.bd-placeholder-img {
	font-size: 1.125rem;
	text-anchor: middle;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

@media (min-width: 768px) {
	.bd-placeholder-img-lg {
		font-size: 3.5rem;
	}
}

.themed-grid-col {
	padding-top: 5px;
	padding-bottom: 5px;
	background-color: rgba(86, 61, 124, .15);
	border: 1px solid rgba(86, 61, 124, .2);
}
</style>

<?php
// cetak header PERIODE
if (isset($_SESSION['Periode']) and $_SESSION['Periode'] != '') {
	// echo '<h6>Periode '.$_SESSION['Periode'].'</h6>';
}

// cetak header NoJO
if (isset($_SESSION['NoJO']) and $_SESSION['NoJO'] != '') {
	// echo '<h6>No. JO '.$_SESSION['NoJO'].'</h6>';
}

// cetak header PERIODE & No. JO
// if ((isset($_SESSION['Periode']) and $_SESSION['Periode'] != '') and (isset($_SESSION['NoJO']) and $_SESSION['NoJO'] != '')) {
// 	echo '<h5>Periode '.$_SESSION['Periode'].' - No. JO '.$_SESSION['NoJO'].'</h5>';
// }

?>

<div class="table-responsive">

	<table class="table">
		<thead>

			<!-- baris 1 -->
			<tr>
				<th scope="col" colspan="3">COST SHEET</th>
			</tr>

			<!-- baris 2 -->
			<tr>
				<td scope="col">No. JO</td>
				<td>:</td>
				<td><?php echo $r_costsheet->fields('NoJO'); ?></td>
			</tr>

			<!-- baris 3 -->
			<tr>
				<td scope="col">VSL / VOY</td>
				<td>:</td>
				<td><?php echo $r_costsheet->fields('Kapal'); ?></td>
			</tr>

			<!-- baris 4 -->
			<tr>
				<td scope="col">POL / POD</td>
				<td>:</td>
				<td><?php echo $r_costsheet->fields('Tujuan'); ?></td>
			</tr>

			<!-- baris 5 -->
			<tr>
				<td scope="col">LINER</td>
				<td>:</td>
				<td><?php //echo $r_costsheet->fields('Kapal'); ?></td>
			</tr>

			<!-- baris 6 -->
			<tr>
				<td scope="col">BL No.</td>
				<td>:</td>
				<td><?php //echo $r_costsheet->fields('Kapal'); ?></td>
			</tr>

			<!-- baris 7 -->
			<tr>
				<td scope="col">SHIPPER</td>
				<td>:</td>
				<td><?php echo $r_costsheet->fields('Shipper'); ?></td>
			</tr>

			<!-- baris 8 -->
			<tr>
				<td scope="col">VOL</td>
				<td>:</td>
				<td><?php echo $r_costsheet->fields('Qty') . ' x ' . $r_costsheet->fields('Cont'); ?></td>
			</tr>
		</thead>
	</table>

	<table class="table">
		<thead>
			<!-- baris 9 -->
			<tr>
				<th scope="col" rowspan="2">CHARGE CODE</th>
				<th scope="col" rowspan="2">NOTE</th>
				<th scope="col" colspan="2">PAID TO LINER</th>
				<th scope="col" colspan="2">RECEIVED FROM CUSTOMER</th>
			</tr>

			<!-- baris 10 -->
			<tr>
				<th scope="col">AMOUNT</th>
				<th scope="col">TOTAL</th>
				<th scope="col">AMOUNT</th>
				<th scope="col">TOTAL</th>
			</tr>

		</thead>

		<tbody>

			<?php

			$subtotal = 0;

			while (!$r_costsheet->EOF) { // looping data MUTASI

				echo '<tr>';
				echo '  <td scope="row">'.$r_costsheet->fields('jns_nama').'</td>';
				echo '  <td scope="row">'.$r_costsheet->fields('Comment').'</td>';
				echo '  <td scope="row">&nbsp;</td>';
				echo '  <td scope="row" align="right">'.number_format($r_costsheet->fields('Keluar')).'</td>';
				echo '  <td scope="row">&nbsp;</td>';
				echo '  <td scope="row">&nbsp;</td>';
				echo '</tr>';

				$subtotal += $r_costsheet->fields('Keluar');

				$r_costsheet->MoveNext();
			}

			?>

			<tr>
				<th scope="row" colspan="2">GRAND TOTAL</th>
				<th scope="row">&nbsp;</th>
				<th scope="row" style="text-align: right"><?php echo number_format($subtotal) ?></th>
				<th scope="row">&nbsp;</th>
				<th scope="row">&nbsp;</th>
			</tr>

		</tbody>
	</table>

</div>
<!-- <p>&nbsp;</p>
<button type="button" class="btn btn-primary">Cetak</button>
<p>&nbsp;</p> -->