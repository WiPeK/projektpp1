<?php

define("HEAD", true);

function base_url()
{
	return SERVER_ADDRESS;
}

function add_base_href()
{
	return "base href=\"" . SERVER_ADDRESS . "\" />";
}

function redirect($url)
{
    header("Location: " . SERVER_ADDRESS . $url, true);
    exit();
}

function get_segment($i)
{
	$segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
	if(!empty($segments[$i]) && $segments[$i] != 'index')
		return $segments[$i];
	else 
		return '';	 
}

function dateV($format,$timestamp=null){
    $to_convert = array(
        'l'=>array('dat'=>'N','str'=>array('Poniedziałek','Wtorek','Środa','Czwartek','Piątek','Sobota','Niedziela')),
        'F'=>array('dat'=>'n','str'=>array('styczeń','luty','marzec','kwiecień','maj','czerwiec','lipiec','sierpień','wrzesień','październik','listopad','grudzień')),
        'f'=>array('dat'=>'n','str'=>array('stycznia','lutego','marca','kwietnia','maja','czerwca','lipca','sierpnia','września','października','listopada','grudnia'))
    );
    if ($pieces = preg_split('#[:/.\-, ]#', $format)){  
        if ($timestamp === null) { $timestamp = time(); }
        foreach ($pieces as $datepart){
            if (array_key_exists($datepart,$to_convert)){
                $replace[] = $to_convert[$datepart]['str'][(date($to_convert[$datepart]['dat'],$timestamp)-1)];
            }else{
                $replace[] = date($datepart,$timestamp);
            }
        }
        $result = strtr($format,array_combine($pieces,$replace));
        return $result;
    }
}

function e($string){
    return htmlentities($string);
}

function slash_tags($item)
{
    $items = explode(',',$item);
    return $items;
}

function get_menu ($array, $child = FALSE)
{
    $str = '';
    
    if (count($array)) {
        $str .= $child == FALSE ? '<ul class="nav navbar-nav menu_ul">' . PHP_EOL : '<ul class="dropdown-menu" role="menu">' . PHP_EOL;
        
        foreach ($array as $item) {
            
           // $active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
            if (isset($item['children']) && count($item['children'])) {
                $str .= '<li class="dropdown">';
                $str .= '<a class="dropdown-toggle disabled" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" href="' . base_url() . 'home/index/' . e($item['slug']) . '">' . e($item['title']);
                $str .= '<b class="caret"></b></a>' . PHP_EOL;
                $str .= get_menu($item['children'], TRUE);
            }
            else {
                $str .= '<li>';
                $str .= '<a href="' . base_url() . 'home/index/' . $item['slug'] . '">' . e($item['title']) . '</a>';
            }
            $str .= '</li>' . PHP_EOL;
        }
        
        $str .= '</ul>' . PHP_EOL;
    }
    
    return $str;
}

function word_limiter($string, $word_limit)
{
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}

function btn_edit($uri)
{
    return '<a href="' . $uri . '"><i class="glyphicon glyphicon-edit"></i></a>';
}

function btn_delete($uri)
{
    return '<a onclick="return confirm(\'Czy napewno chcesz usunąć element. Nie będzie można tego cofnąć. Jesteś pewien?\');" href="' . $uri . '"><i class="glyphicon glyphicon-remove"></i></a>';
}