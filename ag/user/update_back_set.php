<?php
include_once( "../../global.php" );
$callback = "branch.php?power=".$_POST['power'];
$user_id = $_POST['user_id'];
$db = new action( $mydbhost, $mydbuser, $mydbpw, $mydbname, ALL_PS, $mydbcharset );
$down_users = $db->loweralluser_arr( $user_id );
$down_user_arr = explode( ",", $down_users );
foreach ( $_POST['cname'] as $i => $v )
{
		$sql = "update back_set set \n        percent_a=".$_POST['percent_a'][$i].",\n            percent_b=".$_POST['percent_b'][$i].",\n                percent_c=".$_POST['percent_c'][$i].",\n                    percent_d=".$_POST['percent_d'][$i].",\n                        bottom_limit=".$_POST['bottom_limit'][$i].",\n                            top_limit=".$_POST['top_limit'][$i].",\n                                odd_limit=".$_POST['odd_limit'][$i]." where user_id=".$user_id." and set_name='".$v."'";
		$db->query( $sql );
		if ( !empty( $down_user_arr[0] ) )
		{
				$db->down_tuishui_update( $down_user_arr, $_POST['percent_a'][$i], $_POST['percent_b'][$i], $_POST['percent_c'][$i], $_POST['percent_d'][$i], $v );
		}
}
$db->get_admin_msg( $callback, "保存操作成功！" );
?>
