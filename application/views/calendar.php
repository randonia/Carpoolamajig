<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>Carpoolamajig- Public Calendar</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<style type="text/css">
			.calendar {
				font-family: Arial, Verdana, Sans-serif;
				width: 100%;
				min-width: 960px;
				border-collapse: collapse;
			}

			.calendar tbody tr:first-child th {
				color: #505050;
				margin: 0 0 10px 0;
			}

			.day_header {
				font-weight: normal;
				text-align: center;
				color: #757575;
				font-size: 10px;
			}

			.calendar td {
				width: 14%;
				border:1px solid #CCC;
				height: 100px;
				vertical-align: top;
				font-size: 10px;
				padding: 0;
			}

			.calendar td:hover {
				background: #F3F3F3;
			}

			.day_listing {
				display: block;
				text-align: right;
				font-size: 12px;
				color: #2C2C2C;
				padding: 5px 5px 0 0;
			}

			div.today {
				background: #E9EFF7;
				height: 100%;
			}
			
			.events {
				align: center;
			}
		</style>
	</head>
	<body>

<a href=<?="$prevMonth"?>>Previous Month</a>
<a href=<?="$nextMonth"?>>Next Month</a>
		<?php echo $calendar;?>

	</body>
</html>