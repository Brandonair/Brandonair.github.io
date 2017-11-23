<?php
/*
 * DO NOT EDIT THIS TEMPLATE UNLESS:
 *   1. YOU HAVE ALOT OF TIME
 *   2. YOU DON'T MIND LOSING SOME HAIR
 *   3. YOU HAVE BIG BALLS MADE OF STEEL
 *
 *	It can cause incontinence
 *
 *	YOU HAVE BEEN WARNED!!!
 */
?><?php Template::Show('finance_header.tpl'); ?>
<h3><font color="0075DB"><?php echo $title?></font></h3>
<?php

	$total = 0;
	
	$profit = array();
	$pilot_pay = array();
	$revenue = array();	
	$expenses = array();
	$flightexpenses = array();
	$fuelexpenses = array();
	$months=array();
	
?>
<table width="750px" align="center" class="ocean_table" cellpadding="0" cellspacing="0">

	<tr class="balancesheet_header" style="text-align: center">
		<th align="left">Month</th>
		<th align="center">Flights</th>
		<th align="left">Revenue</th>
		<th align="center" nowrap>Pilot Pay</th>
		<th align="left">Expenses</th>
		<th align="left">Fuel</th>
		<th align="center">Total</th>
	</tr>
	
<?php 
echo '<pre>';
//print_r($allfinances);
echo '</pre>';
foreach ($allfinances as $month)
{
?>
	<tr>
		<td align="right">
			<?php 
			echo $month->ym;
			?>
		</td>
		<td align="center">
		<?php 
			echo $month->total;
		?>
		</td>
		<td align="right" nowrap>
			<?php 
			echo FinanceData::FormatMoney($month->gross);
			?>
		</td>
		<td align="right" nowrap>
			<?php 
			echo FinanceData::FormatMoney($month->pilotpay);
			?>
		</td>
		<td align="right" nowrap>
			<?php 
			echo FinanceData::FormatMoney((-1) * $month->expenses_total);
			?>
		</td>
		<td align="right" nowrap>
			<?php 
			echo FinanceData::FormatMoney((-1) * $month->fuelprice);
			?>
		</td>
		<td align="right" nowrap>
			<?php 
			$profit[] = round($month->revenue, 2);
			$total += $month->revenue;
			echo FinanceData::FormatMoney($month->revenue);
			?>
		</td>
	</tr>
<?php
}
?>
<tr class="balancesheet_header" style="border-bottom: 1px dotted">
	<td align="" colspan="8" style="padding: 1px;"></td>
</tr>
	
<tr>
	<td align="right" colspan="6"><strong><font color="045B21">Total:</strong></font></td>
	<td align="right" colspan="2"><strong><font color="045B21"><?php echo FinanceData::FormatMoney($total);?></font></strong></td>
</tr>
	
</table>

<h3><font color="0075DB">Breakdown</font></h3>
<div align="center">
<?php
/*
	Added in 2.0!
*/
$chart_width = '800';
$chart_height = '500';

/* Don't need to change anything below this here */
?>
<div align="center" style="width: 100%;">
	<div align="center" id="summary_chart"></div>
</div>

<script type="text/javascript" src="<?php echo fileurl('/lib/js/ofc/js/json/json2.js')?>"></script>
<script type="text/javascript" src="<?php echo fileurl('/lib/js/ofc/js/swfobject.js')?>"></script>
<script type="text/javascript">
swfobject.embedSWF("<?php echo fileurl('/lib/js/ofc/open-flash-chart.swf');?>", 
	"summary_chart", "<?php echo $chart_width;?>", "<?php echo $chart_height;?>", 
	"9.0.0", "expressInstall.swf", 
	{"data-file":"<?php echo actionurl('/finances/viewmonthchart?'.$_SERVER['QUERY_STRING']); ?>"});
</script>
<?php
/* End added in 2.0
*/
?>
</div>