<?php
Template::Show('finance_header.tpl'); 
?>
<h3><font color="0075DB"><?php echo $title?></font></h3>
<table width="750px" class="ocean_table" cellpadding="0" cellspacing="0">

	<tr class="balancesheet_header">
		<th align="" colspan="2">Cash and Sales</th>
	</tr>
	<tr>
		<td align="right">Gross Revenue Flights: <br />
			Total number of flights: <?php echo $month_data->total; ?>
		</td>
		<td align="right" valign="top"><?php echo FinanceData::FormatMoney($month_data->gross);?></td>
	</tr>
	
	<tr>
		<td align="right">Pilot Payments: </td>
		<td align="right"> <?php echo str_replace('$', Config::Get('MONEY_UNIT'), FinanceData::FormatMoney(-1*$month_data->pilotpay));?></td>
	</tr>
	<tr>
		<td align="right">Fuel Costs: </td>
		<td align="right"> <?php echo str_replace('$', Config::Get('MONEY_UNIT'), FinanceData::FormatMoney(-1*$month_data->fuelprice));?></td>
	</tr>
	
	<tr class="ocean_table" style="border-bottom: 1px dotted">
		<th align="" colspan="2" style="padding: 1px;"></th>
	</tr>
	
	<tr>
		<td align="right"><strong><font color="0075DB">Total:</font></strong></td>
		<td align="right"> <?php 
		$running_total = $month_data->gross - $month_data->pilotpay - $month_data->fuelprice;
		echo str_replace('$', Config::Get('MONEY_UNIT'), FinanceData::FormatMoney($running_total));?></td>
	</tr>
	
	<tr class="ocean_table">
		<th align="" colspan="2">Expenses (Monthly)</th>
	</tr>

<?php
	/* COUNT EXPENSES */
	if(!is_array($month_data->expenses))
	{
		$month_data->expenses = array();
		?>
		<tr>
		<td align="right">None</td>
		<td align="right"> <?php echo str_replace('$', Config::Get('MONEY_UNIT'), FinanceData::FormatMoney(0));?></td>
	</tr>
	<?php
	}
		
	$type = Config::Get('EXPENSE_TYPES');
	
	foreach($month_data->expenses as $expense)
	{
	?>		
	<tr>
		<td align="right"><?php echo $expense->name.'<br />'.$type[$expense->type]; ?>: </td>
		<td align="right"> <?php echo str_replace('$', Config::Get('MONEY_UNIT'), FinanceData::FormatMoney(-1 * $expense->total));?></td>
	</tr>
	<?php
		# Load charts data too
		OFCharts::add_data_set($expense->name, $expense->total);		
	}
	?>
	<tr class="ocean_table" style="border-bottom: 1px dotted">
		<th align="" colspan="2" style="padding: 1px;"></th>
	</tr>
	<tr>
		<td align="right"><strong><font color="045B21">Expenses Total:</font></strong></td>
		<td align="right"> <font color="045B21"><?php echo str_replace('$', Config::Get('MONEY_UNIT'), FinanceData::FormatMoney(-1 * $month_data->expenses_total));?></font></td>
	</tr>
	
	<tr class="ocean_table">
		<th align="" colspan="2">Totals</th>
	</tr>
	
	<tr class="ocean_table" style="border-bottom: 1px dotted">
		<th align="" colspan="2" style="padding: 1px;"></th>
	</tr>
	<tr>
		<td align="right"><strong><font color="045B21">Total:</strong></font></td>
		<td align="right"> <font color="045B21"><?php echo str_replace('$', Config::Get('MONEY_UNIT'), FinanceData::FormatMoney($month_data->revenue)); ?></font></td>
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
	{"data-file":"<?php echo actionurl('/finances/viewexpensechart?'.$_SERVER['QUERY_STRING']); ?>"});
</script>
<?php
/* End added in 2.0
*/
?>
</div>