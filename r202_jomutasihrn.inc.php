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
	echo '<h6>Periode '.$_SESSION['Periode'].'</h6>';
}

// cetak header NoJO
if (isset($_SESSION['NoJO']) and $_SESSION['NoJO'] != '') {
	echo '<h6>No. JO '.$_SESSION['NoJO'].'</h6>';
}

// cetak header PERIODE & No. JO
// if ((isset($_SESSION['Periode']) and $_SESSION['Periode'] != '') and (isset($_SESSION['NoJO']) and $_SESSION['NoJO'] != '')) {
// 	echo '<h5>Periode '.$_SESSION['Periode'].' - No. JO '.$_SESSION['NoJO'].'</h5>';
// }

?>

<div class="table-responsive">
	<table class="table">
		<thead>

			<!-- header baris pertama -->
			<tr>

				<th scope="col" rowspan="2" style="vertical-align: top">Job Order</th>
				<th scope="col" rowspan="2" style="text-align: right; vertical-align: top;">Tagihan</th>

				<!-- menghitung jumlah banyaknya JENIS PENGELUARAN -->
				<!-- digunakan untuk nilai colspan -->
				<?php $jumlah_kolom = 0; ?>
				<?php while (!$r_jenis->EOF) { ?>
				<?php     ++$jumlah_kolom; ?>
				<?php     $r_jenis->MoveNext(); ?>
				<?php } ?>
				<th scope="col" colspan="<?php echo ++$jumlah_kolom; ?>" style="text-align: center">Pengeluaran</th>
				
				<th scope="col" rowspan="2" style="text-align: right; vertical-align: top;">Margin</th>

			</tr>

			<!-- header baris kedua -->
			<tr>

				<!-- menampilkan header sesuai dengan NAMA JENIS PENGELUARAN -->
				<!-- looping berdasarkan seluruh data JENIS PENGELUARAN -->
				<?php $r_jenis->MoveFirst(); ?>
				<?php while (!$r_jenis->EOF) { ?>
				<?php     echo '<th scope="col" style="text-align: right">'.$r_jenis->fields('Nama').'</th>'; ?>
				<?php     $r_jenis->MoveNext(); ?>
				<?php } ?>

				<th scope="col" style="text-align: right" >Sub Total</th>

			</tr>
		</thead>
		<tbody>
			<?php
			// setup variabel
			$total_tagihan     = 0; // total tagihan
			$total_pengeluaran = 0; // total pengeluaran
			$total_margin      = 0; // total margin
			$id                = 1; // index untuk keperluan show modal detail JOB ORDER
			$id_comment        = 1; // index untuk keperluan show modal detail PENGELUARAN LAIN-LAIN

			while (!$r_mutasi->EOF) { // looping data MUTASI

				$NoJO           = $r_mutasi->fields('NoJO'); // data Nomor Job Order
				$tagihan        = $r_mutasi->fields('Tagihan'); // data Jumlah Tagihan
				$total_tagihan += $tagihan; // proses akumulasi jumlah TAGIHAN, untuk menampilkan total TAGIHAN

				echo '<tr>';
				echo '<th scope="row"><a href="#" data-toggle="modal" data-target="#id'.$id.'" style="text-decoration: none; color: inherit;">'.$NoJO.'</a></th>';

				// data modal per JOB ORDER
				echo '
					<div class="modal fade" id="id'.$id++.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Job Order Detail Info</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="row">Shipper&nbsp;<b>'.$r_mutasi->fields('Shipper').'</b></div>
									<div class="row">Qty.&nbsp;<b>'.$r_mutasi->fields('Qty').'</b></div>
									<div class="row">Cont.&nbsp;<b>'.$r_mutasi->fields('Cont').'</b></div>
									<div class="row">Status&nbsp;<b>'.$r_mutasi->fields('Status').'</b></div>
									<div class="row">Tujuan&nbsp;<b>'.$r_mutasi->fields('Tujuan').'</b></div>
									<div class="row">Kapal&nbsp;<b>'.$r_mutasi->fields('Kapal').'</b></div>
									<div class="row">Doc&nbsp;<b><a target="_blank" href="files/'.$r_mutasi->fields('Doc').'">'.$r_mutasi->fields('Doc').'</a></b></div>
								</div>
								<div class="modal-footer">
								</div>
							</div>
						</div>
					</div>';
				// end data modal

				echo '<td align="right"><b>'.number_format($tagihan).'</b></td>'; // tampilkan data JUMLAH TAGIHAN

				$data = array(); // untuk menampung data jumlah MUTASI
				$comment = array(); // untuk menampung data detail PENGELUARAN LAIN-LAIN

				// flag
				while ($NoJO == $r_mutasi->fields('NoJO')) { // looping data MUTASI, untuk disimpan di array

					// pendefinisan nilai mutasi
					$jumlah = $r_mutasi->fields('total_masuk') - $r_mutasi->fields('total_keluar'); // total masuk - total keluar
					$jumlah = ($jumlah < 0 ? $jumlah * -1 : $jumlah); // jika minus => maka dibuat plus dengan dikalikan -1

					// simpan nilai MUTASI ke array, sesuai NOMOR KOLOM JENIS PENGELUARAN
					// $data[1] = 100,000 (jenis pengeluaran nomor 1)
					// $data[2] = 200,000 (jenis pengeluaran nomor 2)
					$data[$r_mutasi->fields('NoKolom')] = $jumlah;
					
					// if ($r_mutasi->fields('Nama') == 'Lain-lain') { // jika jenis pengeluaran == 'Lain-lain'
					// penyimpanan data comment

					$comment[$r_mutasi->fields('NoKolom')] = $r_mutasi->fields('Comment'); // simpan data COMMENT
					// }

					$r_mutasi->MoveNext();
				}

				// untuk nilai SUBTOTAL PENGELUARAN
				$subtotal = 0;

				// data JENIS PENGELUARAN diloop lagi dari awal
				// looping data JENIS PENGELUARAN
				$r_jenis->MoveFirst();
				while (!$r_jenis->EOF) {

					// apakah index array nya ada ?
					if (isset($data[$r_jenis->fields('NoKolom')])) {

						// pengambilan no kolom
						$id_nokolom = $r_jenis->fields('NoKolom');

						// check apakah jenis pengeluaran == 'Lain-lain'
						// jika jenis pengeluaran == 'Lain-lain', maka diberi fungsi tampilkan modal Comment
						// if ($r_jenis->fields('Nama') == 'Lain-lain') {
							echo '<td align="right"><a href="#" data-toggle="modal" data-target="#comment'.$id_nokolom.$id_comment.'" style="text-decoration: none; color: inherit;">'.number_format($data[$r_jenis->fields('NoKolom')]).'</a></td>';
							echo '
								<div class="modal fade" id="comment'.$id_nokolom.$id_comment++.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">'.$r_jenis->fields('Nama').'</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="row">'.$comment[$r_jenis->fields('NoKolom')].'</div>
											</div>
											<div class="modal-footer">
											</div>
										</div>
									</div>
								</div>';
						// }
						// else {

						// 	// tampilkan hanya NILAI MUTASI
						// 	echo '<td align="right">'.number_format($data[$r_jenis->fields('NoKolom')]).'</td>';
						// }

						// akumulasi nilai SUBTOTAL
						$subtotal += $data[$r_jenis->fields('NoKolom')];
					}
					else {

						// jika tidak ada data MUTASI, hanya menampilkan nilai 0
						echo '<td align="right">0</td>';
					}

					// looping data JENIS PENGELUARAN
					$r_jenis->MoveNext();
				}

				// menampilkan nilai SUBTOTAL PENGELUARAN
				echo '<td align="right"><b>'.number_format($subtotal).'</b></td>';

				// menampilkan nilai MARGIN
				echo '<td align="right" '.(($tagihan - $subtotal) < 0 ? 'style="color: red"' : '').'><b>'.number_format($tagihan - $subtotal).'</b></td>';
				echo '</tr>';

				// akumulasi nilai SUBTOTAL
				$total_pengeluaran += $subtotal;

				// akumulasi nilai MARGIN
				$total_margin += ($tagihan - $subtotal);
			}
			?>

			<!-- menampilkan semua nilai TOTAL -->
			<tr>
				<th scope="col" style="text-align: right"><b>Total</b></th>
				<th scope="col" style="text-align: right"><b><?php echo number_format($total_tagihan); ?></b></th>
				<th scope="col" colspan="<?php echo --$jumlah_kolom; ?>">&nbsp;</th>
				<th scope="col" style="text-align: right"><b><?php echo number_format($total_pengeluaran); ?></b></th>
				<th scope="col" style="text-align: right"><b><?php echo number_format($total_margin); ?></b></th>
			</tr>
		</tbody>
	</table>
</div>