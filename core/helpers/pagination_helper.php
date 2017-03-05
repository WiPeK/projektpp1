<?php

define("PAGINATION", true);

function create_links($pages, $url, $segment)
{
	$pag = "";
	$pag .= '<section class="pagination">' . PHP_EOL;
	$pag .= '<ul class="pagination">' . PHP_EOL;

	if($segment >= 10)
	{
		$pag .= '<li>' . PHP_EOL;
		$a = (int)$segment - 10;
		$pag .= '<a href="' . $url . $a . '">';
		$pag .=	'<'; 
		$pag .= '</a>' . PHP_EOL;
		$pag .= '</li>' . PHP_EOL;
	}

	for($i = 0; $i <= $pages; $i++)
	{
		$pag .= '<li>' . PHP_EOL;
		//$pag .= '<a href="' . $url . $i ? $i*10 : "" . '">';
		$pag .= '<a href="' . $url . $i*10 . '">';
		$pag .=	$i+1; 
		$pag .= '</a>' . PHP_EOL;
		$pag .= '</li>' . PHP_EOL;
	}
	$a = (int)$segment+10;
	if($a >= $pages)
	{
		$pag .= '<li>' . PHP_EOL;
		$pag .= '<a href="' . $url . $a . '">';
		$pag .=	'>'; 
		$pag .= '</a>' . PHP_EOL;
		$pag .= '</li>' . PHP_EOL;
		$pag .= '</ul>' . PHP_EOL;
		$pag .=	'</section>' . PHP_EOL;
	}
	return $pag;
}