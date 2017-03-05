<?php
echo get_ol($data['pages']);

function get_ol ($array)
{
	$str = '';
	if (count($array)) {
		$str .= '<ol class="sortable">';
		
		foreach ($array as $item) {
			$str .= '<li id="list_' . $item['id'] .'">';
			$str .= '<div>' . $item['title'] .'</div>';

			if (isset($item['children']) && count($item['children'])) {
				$str .= '<ol>';

				for($i = 0; $i < count($item['children']); $i++)
				{
					$str .= '<li id="list_' . $item['children'][$i]['id'] .'">';
					$str .= '<div>' . $item['children'][$i]['title'] .'</div>';
					$str .= '</li>' . PHP_EOL;
				}

				$str .= '</ol>';
			}
			
			$str .= '</li>' . PHP_EOL;
		}
		
		$str .= '</ol>' . PHP_EOL;
	}
	
	return $str;
}
?>

<script>
$(document).ready(function(){

    $('.sortable').nestedSortable({
        handle: 'div',
        items: 'li',
        toleranceElement: '> div',
        maxLevels: 2
    });

});
</script>