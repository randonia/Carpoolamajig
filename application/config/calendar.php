<?php

	$config = array(
				'day_type'=>'long'
			);
			
	$config['template'] = '
		{table_open}<table class="calendar">{/table_open}
		{week_day_cell}<th class="day_header">{week_day}</th>{/week_day_cell}
		{cal_cell_content}<a href="{content}"><span class="day_listing">{day}</span></a>{/cal_cell_content}
		{cal_cell_content_today}<div class="today"><a href="{content}"><span class="day_listing">{day}</span></a></div>{/cal_cell_content_today}
		{cal_cell_no_content}<span class="day_listing">{day}</span>&nbsp;{/cal_cell_no_content}
		{cal_cell_no_content_today}<div class="today"><span class="day_listing">{day}</span></div>{/cal_cell_no_content_today}
	';
	