<?php

define('VALIDATION',true);

function min_length($data, $n)
{
	if(strlen($data) >= $n)
		return true;
	else
	{
		$_SESSION['err'] .= $data . 'jest za krótki. Min:' . $n . ' znaki. </br>';
		return false;
	}	
}

function max_length($data, $n)
{
	if(strlen($data) <= $n)
		return true;
	else
	{
		$_SESSION['err'] .= $data . 'jest za długi. Max:' . $n . ' znaki. </br>';
		return false;
	}		
}

function alpha_numeric($str)
{
	if(ctype_alnum($str))
		return true;
	else
	{
		$_SESSION['err'] .= $data . 'może zawierać tylko znaki alfa-numeryczne. </br>';
		return false;
	}	
}

function xss_clean($data)
{
	// Fix &entity\n;
	$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
	$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
	$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
	$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

	// Remove any attribute starting with "on" or xmlns
	$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

	// Remove javascript: and vbscript: protocols
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

	// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

	// Remove namespaced elements (we do not need them)
	$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

	do
	{
		// Remove really unwanted tags
		$old_data = $data;
		$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
	}
	while ($old_data !== $data);

	// we are done...
	return $data;
}

function valid_email($email)
{
	if(filter_var($email, FILTER_VALIDATE_EMAIL))
		return true;
	else
	{
		$_SESSION['err'] .= $data . 'to nieprawidłowy adres email. </br>';
		return false;
	}		
}

function is_the_same($str, $str2)
{
	if($str === $str2)
		return true;
	else
	{
		$_SESSION['err'] .= 'Pola nie mają identycznych wartości. </br>';
		return false;
	}
}

function alpha_dash_space($str)
{
	return ( ! preg_match("/^([-a-z0-9_ ])+$/i", $str)) ? FALSE : TRUE;
}

function valid_file($type)
{

	$allowed_types = 'hqx|cpt|csv|bin|dms|lha|lzh|exe|class|psd|so|sea|dll|oda|pdf|ai|eps|ps|smi|smil|mif|xls|ppt|wbxml|wmlc|dcr|dir|dxr|dvi|gtar|gz|php|php4|php3|phtml|phps|js|swf|sit|tar|tgz|xhtml|xht|zip|mid|midi|mpga|mp2|mp3|aif|aiff|aifc|ram|rm|rpm|ra|rv|wav|bmp|gif|jpeg|jpg|jpe|png|tiff|tif|css|html|htm|shtml|txt|text|log|rtx|rtf|xml|xsl|mpeg|mpg|mpe|qt|mov|avi|movie|doc|docx|xlsx|word|xl|eml|ico|json|3gp|7z|aac|apk|dxf|torrent|bz|bz2|flv|jar|java|m3u|m4v|mdb|pptx|wmv|mid|ogg|odt|rar|rss|svg';

	$atp = explode('|', $allowed_types);

	if(in_array($type, $atp))
	{
		return true;
	}
	else
	{
		$_SESSION['err'] .= 'Nieprawidłowy typ pliku.';
		return false;
	}

} 