<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<h3>File Diffs</h3>

<p>This is the diff between the two files. Red means deleted. Green means changed. Lines with diffs will show - the top line the stock template (in /core/templates), the one below in the current active skin. You can use this to get an approximate of what is different. </p>
<style type="text/css">

table.code {
	border: 1px solid #ddd;
	border-spacing: 0;
	border-top: 0;
	empty-cells: show;
	font-size: 12px;
	line-height: 110%;
	padding: 0;
	margin: 0;
	width: 100%;
}

table.code th {
	background: #eed;
	color: #886;
	font-weight: normal;
	padding: 0 .5em;
	text-align: right;
	border-right: 1px solid #d7d7d7;
	border-top: 1px solid #998;
	font-size: 11px;
	width: 35px;
}

table.code td {
	background: #fff;
	font: normal 11px monospace;
	overflow: auto;
	padding: 1px 2px;
}

table.code td.del {
	background-color: #FDD;
	border-left: 1px solid #C00;
	border-right: 1px solid #C00;
}
table.code td.del.first {
	border-top: 1px solid #C00;
}
table.code td.ins {
	background-color: #DFD;
	border-left: 1px solid #0A0;
	border-right: 1px solid #0A0;
}
table.code td.ins.first {
	border-top: 1px solid #0A0;
}
table.code td.del_end {
	border-top: 1px solid #C00;
}
table.code td.ins_end {
	border-top: 1px solid #0A0;
}
table.code td.truncated {
	background-color: #f7f7f7;
}
</style>