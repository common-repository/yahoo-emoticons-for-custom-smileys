<?php
require_once('../../../wp-load.php');

//echo get_option('siteurl');
$imagesdirurl = get_option('siteurl') . '/wp-includes/images/smilies/';
$clcs_smilies = get_option('clcs_smilies');
if ($clcs_smilies == false) {
	$clcs_smilies = array(
	':)' => '1.gif',
	':(' => '2.gif',
	';)' => '3.gif',
	':D' => '4.gif',
	';;)' => '5.gif',
	'>:D<' => '6.gif',
	':-/' => '7.gif',
	':x' => '8.gif',
	':blush' => '9.gif',
	':P' => '10.gif',
	':-*' => '11.gif',
	'=((' => '12.gif',
	':-O' => '13.gif',
	'X(' => '14.gif',
	':>' => '15.gif',
	'B-)' => '16.gif',
	':-S' => '17.gif',
	'#:-S' => '18.gif',
	'>:)' => '19.gif',
	':((' => '20.gif',
	':))' => '21.gif',
	':|' => '22.gif',
	'/:)' => '23.gif',
	'=))' => '24.gif',
	'O:-)' => '25.gif',
	':-B' => '26.gif',
	'=;' => '27.gif',
	'I-)' => '28.gif',
	'8-|' => '29.gif',
	'L-)' => '30.gif',
	':-&' => '31.gif',
	':-$' => '32.gif',
	'[-(' => '33.gif',
	':O)' => '34.gif',
	'8-}' => '35.gif',
	'<:-P' => '36.gif',
	'(:|' => '37.gif',
	'=P~' => '38.gif',
	':-?' => '39.gif',
	'#-o' => '40.gif',
	'=D>' => '41.gif',
	':-SS' => '42.gif',
	'@-)' => '43.gif',
	':^o' => '44.gif',
	':-w' => '45.gif',
	':-<' => '46.gif',
	'>:P' => '47.gif',
	'<):)' => '48.gif',
	':@)' => '49.gif',
	'3:-O' => '50.gif',
	':(|)' => '51.gif',
	'~:>' => '52.gif',
	'@};-' => '53.gif',
	'%%-' => '54.gif',
	'**==' => '55.gif',
	'(~~)' => '56.gif',
	'~O)' => '57.gif',
	'*-:)' => '58.gif',
	'8-X' => '59.gif',
	'=:)' => '60.gif',
	'>-)' => '61.gif',
	':-L' => '62.gif',
	'[-O<' => '63.gif',
	'$-)' => '64.gif',
	':whistle' => '65.gif',
	'b-(' => '66.gif',
	':)>-' => '67.gif',
	'[-X' => '68.gif',
	':dance' => '69.gif',
	'>:/' => '70.gif',
	';))' => '71.gif',
	'o->' => '72.gif',
	'o=>' => '73.gif',
	'o-+' => '74.gif',
	'(%)' => '75.gif',
	':-@' => '76.gif',
	'^:)^' => '77.gif',
	':-j' => '78.gif',
	'(*)' => '79.gif',
	':)]' => '100.gif',
	':-c' => '101.gif',
	'~X(' => '102.gif',
	':-h' => '103.gif',
	':-t' => '104.gif',
	'8->' => '105.gif',
	':-??' => '106.gif',
	'%-(' => '107.gif',
	':o3' => '108.gif',
	'X_X' => '109.gif',
	':!!' => '110.gif',
	':rock' => '111.gif',
	':-q' => '112.gif',
	':-bd' => '113.gif',
	'^#(^' => '114.gif',
	':bz' => '115.gif',
	':ar!' => '116.gif',
	'[..]' => '117.gif',
	);
}


$smilies_sum = count($clcs_smilies);
$smilies_counter = 0;
$smilies_col = 5;
$smilies_row = ceil($smilies_sum/5);
$smilies_space = $smilies_row * $smilies_col - $smilies_sum;
?>
var smilies_list4post = "\
<table border=\"0\" cellspacing=\"0\" cellpadding=\"4\">\
<?php foreach ($clcs_smilies as $k => $v) : ?>
<?php if ($smilies_count % $smilies_col == 0) { ?>
	<tr>\
<?php }?>
		<td><a href=\"javascript:grin('<?php echo $k?>', 'content');smilies_win_hide();void(0);\"><img src=\"<?php echo $imagesdirurl; ?><?php echo $v?>\" border=\"0\" alt=\"smilies\" title=\"smilies\" /></a></td>\
<?php
if ($smilies_count >= $smilies_sum - 1) {
	for ($i = 0; $i < $smilies_space; $i++) {
		echo "		<td></td>\\\n";
		$smilies_count++;
	}
}
?>
<?php if ($smilies_count % $smilies_col == $smilies_col - 1) { ?>
	</tr>\
<?php }?>
<?php $smilies_count++; ?>
<?php endforeach; ?>
</table>";