<?php
namespace PHPMaker2020\p_keuangan_v1_0;
?>
<?php if ($t001_jo->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_t001_jomaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($t001_jo->NoJO->Visible) { // NoJO ?>
		<tr id="r_NoJO">
			<td class="<?php echo $t001_jo->TableLeftColumnClass ?>"><?php echo $t001_jo->NoJO->caption() ?></td>
			<td <?php echo $t001_jo->NoJO->cellAttributes() ?>>
<span id="el_t001_jo_NoJO">
<span<?php echo $t001_jo->NoJO->viewAttributes() ?>><?php echo $t001_jo->NoJO->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t001_jo->Status->Visible) { // Status ?>
		<tr id="r_Status">
			<td class="<?php echo $t001_jo->TableLeftColumnClass ?>"><?php echo $t001_jo->Status->caption() ?></td>
			<td <?php echo $t001_jo->Status->cellAttributes() ?>>
<span id="el_t001_jo_Status">
<span<?php echo $t001_jo->Status->viewAttributes() ?>><?php echo $t001_jo->Status->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t001_jo->Tagihan->Visible) { // Tagihan ?>
		<tr id="r_Tagihan">
			<td class="<?php echo $t001_jo->TableLeftColumnClass ?>"><?php echo $t001_jo->Tagihan->caption() ?></td>
			<td <?php echo $t001_jo->Tagihan->cellAttributes() ?>>
<span id="el_t001_jo_Tagihan">
<span<?php echo $t001_jo->Tagihan->viewAttributes() ?>><?php echo $t001_jo->Tagihan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t001_jo->NoBL->Visible) { // NoBL ?>
		<tr id="r_NoBL">
			<td class="<?php echo $t001_jo->TableLeftColumnClass ?>"><?php echo $t001_jo->NoBL->caption() ?></td>
			<td <?php echo $t001_jo->NoBL->cellAttributes() ?>>
<span id="el_t001_jo_NoBL">
<span<?php echo $t001_jo->NoBL->viewAttributes() ?>><?php echo $t001_jo->NoBL->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t001_jo->Shipper->Visible) { // Shipper ?>
		<tr id="r_Shipper">
			<td class="<?php echo $t001_jo->TableLeftColumnClass ?>"><?php echo $t001_jo->Shipper->caption() ?></td>
			<td <?php echo $t001_jo->Shipper->cellAttributes() ?>>
<span id="el_t001_jo_Shipper">
<span<?php echo $t001_jo->Shipper->viewAttributes() ?>><?php echo $t001_jo->Shipper->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t001_jo->Qty->Visible) { // Qty ?>
		<tr id="r_Qty">
			<td class="<?php echo $t001_jo->TableLeftColumnClass ?>"><?php echo $t001_jo->Qty->caption() ?></td>
			<td <?php echo $t001_jo->Qty->cellAttributes() ?>>
<span id="el_t001_jo_Qty">
<span<?php echo $t001_jo->Qty->viewAttributes() ?>><?php echo $t001_jo->Qty->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t001_jo->Cont->Visible) { // Cont ?>
		<tr id="r_Cont">
			<td class="<?php echo $t001_jo->TableLeftColumnClass ?>"><?php echo $t001_jo->Cont->caption() ?></td>
			<td <?php echo $t001_jo->Cont->cellAttributes() ?>>
<span id="el_t001_jo_Cont">
<span<?php echo $t001_jo->Cont->viewAttributes() ?>><?php echo $t001_jo->Cont->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t001_jo->BM->Visible) { // BM ?>
		<tr id="r_BM">
			<td class="<?php echo $t001_jo->TableLeftColumnClass ?>"><?php echo $t001_jo->BM->caption() ?></td>
			<td <?php echo $t001_jo->BM->cellAttributes() ?>>
<span id="el_t001_jo_BM">
<span<?php echo $t001_jo->BM->viewAttributes() ?>><?php echo $t001_jo->BM->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t001_jo->Tujuan->Visible) { // Tujuan ?>
		<tr id="r_Tujuan">
			<td class="<?php echo $t001_jo->TableLeftColumnClass ?>"><?php echo $t001_jo->Tujuan->caption() ?></td>
			<td <?php echo $t001_jo->Tujuan->cellAttributes() ?>>
<span id="el_t001_jo_Tujuan">
<span<?php echo $t001_jo->Tujuan->viewAttributes() ?>><?php echo $t001_jo->Tujuan->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t001_jo->Kapal->Visible) { // Kapal ?>
		<tr id="r_Kapal">
			<td class="<?php echo $t001_jo->TableLeftColumnClass ?>"><?php echo $t001_jo->Kapal->caption() ?></td>
			<td <?php echo $t001_jo->Kapal->cellAttributes() ?>>
<span id="el_t001_jo_Kapal">
<span<?php echo $t001_jo->Kapal->viewAttributes() ?>><?php echo $t001_jo->Kapal->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t001_jo->Doc->Visible) { // Doc ?>
		<tr id="r_Doc">
			<td class="<?php echo $t001_jo->TableLeftColumnClass ?>"><?php echo $t001_jo->Doc->caption() ?></td>
			<td <?php echo $t001_jo->Doc->cellAttributes() ?>>
<span id="el_t001_jo_Doc">
<span<?php echo $t001_jo->Doc->viewAttributes() ?>><?php echo GetFileViewTag($t001_jo->Doc, $t001_jo->Doc->getViewValue(), FALSE) ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>