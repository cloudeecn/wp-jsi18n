<?php
/*
Plugin Name: JS i18n
Plugin URI: https://cirnoworks.com
Description: 提供jsi18n变量，保存当前的浏览器语言
Version: 0.01
Author: CirnoWorks.com
Author URI: https://cirnoworks.com
*/

function jsi18n_init()
{
	wp_enqueue_script('jsi18n', WP_CONTENT_URL.'/plugins/wp-jsi18n/jsi18n.js', false, '0.0.1');
}
function jsi18n_head(){?>
<script type="text/javascript">
//<![CDATA[
var jsi18n=[
	{}<?php
	$al = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
	if($al){
		$values = explode(',', $al);
		$accept_language = array();
		foreach ($values AS $lang) {
			$cnt = preg_match('/([-a-zA-Z]+)\s*;\s*q=([0-9\.]+)/', $lang, $matches);
			if ($cnt === 0)
				echo ",\n    {lang : '$lang', q : '1'}";
			else
				echo ",\n    {lang : '$matches[1]', q : '$matches[2]'}";
		}
	}
?>

];
jsi18n.splice(0,1);
jsi18n.sort(function(a,b){
    return b.q - a.q;
});
//]]>
</script>
<?php
}

function jsi18n_foot(){
	?>
<?php
}

add_action ('init', 'jsi18n_init');
add_filter('wp_head', 'jsi18n_head');
add_filter('wp_footer', 'jsi18n_foot');
?>
