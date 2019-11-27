<?php
namespace PHPMaker2020\p_keuangan_v1_0;
?>
<?php if ($v101_costsheet->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_v101_costsheetmaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($v101_costsheet->id->Visible) { // id ?>
		<tr id="r_id">
			<td class="<?php echo $v101_costsheet->TableLeftColumnClass ?>"><?php echo $v101_costsheet->id->caption() ?></td>
			<td <?php echo $v101_costsheet->id->cellAttributes() ?>>
<span id="el_v101_costsheet_id">
<span<?php echo $v101_costsheet->id->viewAttributes() ?>><?php echo $v101_costsheet->id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v101_costsheet->NoJO->Visible) { // NoJO ?>
		<tr id="r_NoJO">
			<td class="<?php echo $v101_costsheet->TableLeftColumnClass ?>"><?php echo $v101_costsheet->NoJO->caption() ?></td>
			<td <?php echo $v101_costsheet->NoJO->cellAttributes() ?>>
<span id="el_v101_costsheet_NoJO">
<span<?php echo $v101_costsheet->NoJO->viewAttributes() ?>><?php echo $v101_costsheet->NoJO->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v101_costsheet->Tagihan->Visible) { // Tagihan ?>
		<tr id="r_Tagihan">
			<td class="<?php echo $v101_costsheet->TableLeftColumnClass ?>"><?php echo $v101_costsheet->Tagihan->caption() ?></td>
			<td <?php echo $v101_costsheet->Tagihan->cellAttributes() ?>>
<span id="el_v101_costsheet_Tagihan">
<span<?php echo $v101_costsheet->Tagihan->viewAttributes() ?>><?php echo $v101_costsheet->Tagihan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v101_costsheet->Shipper->Visible) { // Shipper ?>
		<tr id="r_Shipper">
			<td class="<?php echo $v101_costsheet->TableLeftColumnClass ?>"><?php echo $v101_costsheet->Shipper->caption() ?></td>
			<td <?php echo $v101_costsheet->Shipper->cellAttributes() ?>>
<span id="el_v101_costsheet_Shipper">
<span<?php echo $v101_costsheet->Shipper->viewAttributes() ?>><?php echo $v101_costsheet->Shipper->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v101_costsheet->Qty->Visible) { // Qty ?>
		<tr id="r_Qty">
			<td class="<?php echo $v101_costsheet->TableLeftColumnClass ?>"><?php echo $v101_costsheet->Qty->caption() ?></td>
			<td <?php echo $v101_costsheet->Qty->cellAttributes() ?>>
<span id="el_v101_costsheet_Qty">
<span<?php echo $v101_costsheet->Qty->viewAttributes() ?>><?php echo $v101_costsheet->Qty->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v101_costsheet->Cont->Visible) { // Cont ?>
		<tr id="r_Cont">
			<td class="<?php echo $v101_costsheet->TableLeftColumnClass ?>"><?php echo $v101_costsheet->Cont->caption() ?></td>
			<td <?php echo $v101_costsheet->Cont->cellAttributes() ?>>
<span id="el_v101_costsheet_Cont">
<span<?php echo $v101_costsheet->Cont->viewAttributes() ?>><?php echo $v101_costsheet->Cont->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v101_costsheet->Status->Visible) { // Status ?>
		<tr id="r_Status">
			<td class="<?php echo $v101_costsheet->TableLeftColumnClass ?>"><?php echo $v101_costsheet->Status->caption() ?></td>
			<td <?php echo $v101_costsheet->Status->cellAttributes() ?>>
<span id="el_v101_costsheet_Status">
<span<?php echo $v101_costsheet->Status->viewAttributes() ?>><?php echo $v101_costsheet->Status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v101_costsheet->Doc->Visible) { // Doc ?>
		<tr id="r_Doc">
			<td class="<?php echo $v101_costsheet->TableLeftColumnClass ?>"><?php echo $v101_costsheet->Doc->caption() ?></td>
			<td <?php echo $v101_costsheet->Doc->cellAttributes() ?>>
<span id="el_v101_costsheet_Doc">
<span<?php echo $v101_costsheet->Doc->viewAttributes() ?>><?php echo $v101_costsheet->Doc->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v101_costsheet->Tujuan->Visible) { // Tujuan ?>
		<tr id="r_Tujuan">
			<td class="<?php echo $v101_costsheet->TableLeftColumnClass ?>"><?php echo $v101_costsheet->Tujuan->caption() ?></td>
			<td <?php echo $v101_costsheet->Tujuan->cellAttributes() ?>>
<span id="el_v101_costsheet_Tujuan">
<span<?php echo $v101_costsheet->Tujuan->viewAttributes() ?>><?php echo $v101_costsheet->Tujuan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v101_costsheet->Kapal->Visible) { // Kapal ?>
		<tr id="r_Kapal">
			<td class="<?php echo $v101_costsheet->TableLeftColumnClass ?>"><?php echo $v101_costsheet->Kapal->caption() ?></td>
			<td <?php echo $v101_costsheet->Kapal->cellAttributes() ?>>
<span id="el_v101_costsheet_Kapal">
<span<?php echo $v101_costsheet->Kapal->viewAttributes() ?>><?php echo $v101_costsheet->Kapal->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v101_costsheet->BM->Visible) { // BM ?>
		<tr id="r_BM">
			<td class="<?php echo $v101_costsheet->TableLeftColumnClass ?>"><?php echo $v101_costsheet->BM->caption() ?></td>
			<td <?php echo $v101_costsheet->BM->cellAttributes() ?>>
<span id="el_v101_costsheet_BM">
<span<?php echo $v101_costsheet->BM->viewAttributes() ?>><?php echo $v101_costsheet->BM->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>