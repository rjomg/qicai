<?php
include_once( "../../global.php" );
$db = new rate( $mydbhost, $mydbuser, $mydbpw, $mydbname, ALL_PS, $mydbcharset );
$rate = array( );
$x = array( 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 );
$db->get_tops( $_SESSION["uid".$c_p_seesion] );
$user_top = $db->tops;
$queryusers = $db->select( "users", "is_odds,is_fly", "user_id={$user_top['branch']['user_id']}" );
$user = $db->fetch_array( $queryusers );
if ( $user['is_odds'] == 1 )
{
		$db->get_tops( $user_top['branch']['user_id'] );
		$gs = $db->tops;
		$u_id = $gs['company']['user_id'];
}
else
{
		$u_id = $user_top['branch']['user_id'];
}
$rate[0] = $db->get_rate( 57, $u_id );
$rate[1] = $db->get_rate( 58, $u_id );
$rate[2] = $db->get_rate( 59, $u_id );
$rate[3] = $db->get_rate( 60, $u_id );
$rate[4] = $db->get_rate( 61, $u_id );
$rate[5] = $db->get_rate( 62, $u_id );
$rate_c[0] = $db->get_rate( 57, $user_top['company']['user_id'] );
$rate_c[1] = $db->get_rate( 58, $user_top['company']['user_id'] );
$rate_c[2] = $db->get_rate( 59, $user_top['company']['user_id'] );
$rate_c[3] = $db->get_rate( 60, $user_top['company']['user_id'] );
$rate_c[4] = $db->get_rate( 61, $user_top['company']['user_id'] );
$rate_c[5] = $db->get_rate( 62, $user_top['company']['user_id'] );
echo "<html oncontextmenu=\"return false\" xmlns=\"http://www.w3.org/1999/xhtml\">\n<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gbk\">\n</head>\n\n<body>\n<!--";
echo "<s";
echo "pan id=\"view_caozuo\"></span>-->\n<link href=\"../images/Index.css\" rel=\"stylesheet\" type=\"text/css\">\n    ";
echo "<s";
echo "cript src=\"../js/jquery-1.4.3.min.js?i=0\" type=\"text/javascript\"></script>\n";
echo "<s";
echo "cript src=\"js/sx_ws.js?i=o\" type=\"text/javascript\"></script>\n";
echo " ";
echo "\n<!--";
echo "<S";
echo "CRIPT type=\"text/javascript\">  \nfunction myrefresh() \n{ \n        var url = 'wsl.php';\n        window.open(url,'_self');\n} \n    \niso();\nvar u_id=\"";
echo "\";\nvar o_type_ar=\"";
echo "\";\nvar plate_num=\"";
echo "\";\nvar o_content=\"";
echo "\";\n\nfunction iso(){\n    var view_caozuo_true=\$(\".view_caozuo_true\").val();\n   // alert(view_caozuo_true);\n    if(view_caozuo_true!=1){\n    ajax_get_rate(u_id,o_type_ar,plate_num,o_content);\n    }\n    setTimeout(\"iso()\",1000);\n}\n\nfunction ajax_get_rate(u_id,o_type_ar,plate_num,o_content){\n    \$.post(\n    \"ajax_get_rate_other.php\",\n    {'tid_ar':o_type_ar,'u_id':u_id,'plate_num':plate_num,'o_content";
echo "':o_content},\n    function (msg){\n        if(msg==1){\n            //alert(msg);\n            setTimeout('myrefresh()',1000); //指定1秒刷新一次 \n        }\n    });\n}\n</SCRIPT> -->\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n  <tbody>\n    <tr>\n      <td background=\"../images/tab_05.gif\" height=\"30\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n         ";
echo "   <tr>\n              <td height=\"30\" width=\"12\"><img src=\"../images/tab_03.gif\" height=\"30\" width=\"12\"></td>\n              <td><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n                  <tbody>\n                    <tr>\n                      <td valign=\"middle\" width=\"87%\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n                          <tbody>\n                ";
echo "            <tr>\n                              <td width=\"1%\"><div align=\"center\"><img src=\"../images/tb.gif\" height=\"16\" width=\"16\"></div></td>\n                              <td class=\"F_bold\" width=\"150\">";
echo "<s";
echo "pan id=\"ftm1\">尾数连</span>賠率設置";
echo "<s";
echo "pan style=\"DISPLAY:\">\n                                </span></td>\n                              <td class=\"F_bold\">&nbsp;</td>\n                              <td class=\"F_bold\">&nbsp;</td>\n                              <td class=\"F_bold\">&nbsp;</td>\n                            </tr>\n                          </tbody>\n                        </table></td>\n                    </tr>\n                  </tbody>\n    ";
echo "            </table></td>\n              <td width=\"16\"><img src=\"../images/tab_07.gif\" height=\"30\" width=\"16\"></td>\n            </tr>\n          </tbody>\n        </table></td>\n    </tr>\n    <tr>\n      <td><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n            <tr>\n              <td background=\"../images/tab_12.gif\" width=\"8\">&nbsp;</td>\n              <td align=\"center\" height=\"";
echo "50\"><!-- 開始  -->\n                <div id=\"result\">\n                  <table class=\"Ball_List Tab\" align=\"center\" bgcolor=\"ffffff\" border=\"0\" bordercolor=\"f1f1f1\" cellpadding=\"1\" cellspacing=\"1\" width=\"99%\">\n                    <form name=\"form1\" method=\"post\" action=\"?spul=XDNWCgBlAGACe1wiAiw!888&amp;save=CWEAZ1c5Uio!888&amp;x1=XJ0C2QfQBa0!888&amp;x2=XJ0O1QDXVf0!888\" target=\"downf\">\n                ";
echo "    </form>\n                    <tbody>\n                      <tr class=\"td_caption_1\">\n                        <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" nowrap=\"nowrap\" width=\"20\"><div align=\"center\"> NO </div></td>\n                        <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" nowrap=\"nowrap\"><div align=\"center\">二尾连[中]</div></td>\n<!--                        <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\"";
echo " nowrap=\"nowrap\" width=\"44\">總額</td>-->\n                        <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" nowrap=\"nowrap\"><div align=\"center\">二尾连[不中]</div></td>\n<!--                        <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" nowrap=\"nowrap\" width=\"44\">總額</td>-->\n                        <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" nowrap=\"nowrap\"><div align=\"center\">三尾连[中]</div></td>\n<!--     ";
echo "                   <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" nowrap=\"nowrap\" width=\"44\">總額</td>-->\n                        <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" nowrap=\"nowrap\"><div align=\"center\">三尾连[不中]</div></td>\n<!--                        <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" nowrap=\"nowrap\" width=\"44\">總額</td>-->\n                        <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" now";
echo "rap=\"nowrap\"><div align=\"center\">四尾连[中]</div></td>\n<!--                        <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" nowrap=\"nowrap\" width=\"44\">總額</td>-->\n                        <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" nowrap=\"nowrap\"><div align=\"center\">四尾连[不中]</div></td>\n<!--                        <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" nowrap=\"nowrap\" width=\"44\">總額</td>-->\n         ";
echo "             </tr>\n                   ";
foreach ( $x as $i => $k )
{
		echo "     \n                      <tr style=\"background-color: rgb(255, 255, 255);\" onmouseover=\"this.style.backgroundColor='#FFFFA2'\" onmouseout=\"this.style.backgroundColor='ffffff'\" bgcolor=\"#FFFFFF\">\n                     ";
		foreach ( $rate as $u => $v )
		{
				echo " \n                        ";
				if ( $u == 0 )
				{
						echo "                        <td bordercolor=\"cccccc\" class=\"ball_a\" align=\"center\" height=\"25\" style=\"width:45px;\">";
						echo $v[$k][0] ? $v[$k][0] : $v[$i][0];
						echo "</td>\n                        ";
				}
				echo "                        <td align=\"center\" height=\"25\">";
				echo "<s";
				echo "pan id=\"synchro_company_rate";
				echo ( ( $u + 10 ).$i )."100";
				echo "\"><font color=\"blue\">";
				echo $v[$k][1] ? $rate_c[$u][$k][1] : $rate_c[$u][$i][1];
				echo "</font></span>\n                            <input type=\"hidden\" value=\"";
				echo $v[$k][0] ? $v[$k][0] : $v[$i][0];
				echo "\" class=\"name";
				echo $u + 57;
				echo "\" />\n                            <a style=\"\" onClick=\"UpdateRate(";
				echo ( ( $u + 10 ).$i )."100";
				echo ",'";
				echo $v[$k][0] ? $v[$k][0] : $v[$i][0];
				echo "',";
				echo $u + 57;
				echo ",1,\$(this).next('input'),";
				echo $v[$k][1] ? $rate_c[$u][$k][1] : $rate_c[$u][$i][1];
				echo ",";
				echo $v[$k][1] ? ( double )$v[$k][1] : ( double )$v[$i][1];
				echo ",0.1);\">";
				echo "<s";
				echo "pan style=\"vertical-align:middle;\"><img src=\"../images/bvbv_01.gif\" border=\"0\" height=\"17\" width=\"19\"></span></a>\n                            <input onblur=\"UpdateRate(";
				echo ( ( $u + 10 ).$i )."100";
				echo ",'";
				echo $v[$k][0] ? $v[$k][0] : $v[$i][0];
				echo "',";
				echo $u + 57;
				echo ",0,\$(this),";
				echo $v[$k][1] ? $rate_c[$u][$k][1] : $rate_c[$u][$i][1];
				echo ",";
				echo $v[$k][1] ? ( double )$v[$k][1] : ( double )$v[$i][1];
				echo ",0);\" class=\"rate_set";
				echo $u + 57;
				echo " rate_color\" type=\"text\" style=\"width:63px;\" value=\"";
				echo $v[$k][1] ? ( double )$v[$k][1] : ( double )$v[$i][1];
				echo "\" />\n                            <a style=\"\" onClick=\"UpdateRate(";
				echo ( ( $u + 10 ).$i )."100";
				echo ",'";
				echo $v[$k][0] ? $v[$k][0] : $v[$i][0];
				echo "',";
				echo $u + 57;
				echo ",2,\$(this).prev('input'),";
				echo $v[$k][1] ? $rate_c[$u][$k][1] : $rate_c[$u][$i][1];
				echo ",";
				echo $v[$k][1] ? ( double )$v[$k][1] : ( double )$v[$i][1];
				echo ",0.1);\">";
				echo "<s";
				echo "pan style=\"vertical-align:middle;\"><img src=\"../images/bvbv_02.gif\" border=\"0\" height=\"17\" width=\"19\"></span></a>";
				echo "<s";
				echo "pan style=\"vertical-align:middle;\">\n                            <input onClick=\"UpdateRate(";
				echo ( ( $u + 10 ).$i )."100";
				echo ",'";
				echo $v[$k][0] ? $v[$k][0] : $v[$i][0];
				echo "',";
				echo $u + 57;
				echo ",3,\$(this),";
				echo $v[$k][1] ? $rate_c[$u][$k][1] : $rate_c[$u][$i][1];
				echo ",";
				echo $v[$k][1] ? ( double )$v[$k][1] : ( double )$v[$i][1];
				echo ",0);\" class=\"num_close";
				echo $u + 57;
				echo "\" name=\"checkbox\" ";
				echo ( $v[$k][0] ? $v[$k][2] : $v[$i][2] ) == 1 ? "checked=\"checked\"" : "";
				echo " style=\"\" title=\"關閉該項\"  value=\"TRUE\" type=\"checkbox\" />\n                        </span>\n                        </td>\n<!--                        <td align=\"center\" height=\"25\">";
				echo "<s";
				echo "pan id=\"gold";
				echo " ball\"><font class=\"odd_total";
				echo "\" color=\"ff6400\">";
				echo "</font></span></td>-->\n                    ";
		}
		echo "                    </tr>\n                 ";
}
echo "  \n                       \n                    </tbody>\n                  </table>\n                    <form action=\"set_rate_by_sxws.php\" name=\"form21\" method=\"post\">\n                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n                    <tbody>\n                      <tr>\n                        <td align=\"center\" height=\"25\">";
echo "<s";
echo "pan class=\"STYLE1\">統一修改：</span>\n                          <input name=\"dx\" value=\"57\" type=\"radio\">\n                          二尾连[中]\n                          <input name=\"dx\" value=\"58\" type=\"radio\">\n                          二尾连[不中]\n                          <input name=\"dx\" value=\"59\" type=\"radio\">\n                          三尾连[中]\n                          <input name=\"dx\" value=\"6";
echo "0\" type=\"radio\">\n                          三尾连[不中]\n                          <input name=\"dx\" value=\"61\" type=\"radio\">\n                          四尾连[中]\n                          <input checked=\"checked\" name=\"dx\" value=\"62\" type=\"radio\">\n                          四尾连[不中]\n                          ";
echo "<s";
echo "pan class=\"STYLE1\" id=\"ebl1\">賠率</span>\n                          <input name=\"bl\" class=\"input1 rate_color\" id=\"bl\" style=\"height: 18px;\" value=\"0\" size=\"6\">\n                          &nbsp;\n                          <input class=\"button_a\" name=\"Submit22\" value=\"統一修改\" type=\"submit\"></td>\n                      </tr>\n                    </tbody>\n                  </table>\n                         </f";
echo "orm>\n                </div>\n                <!-- 結束  --></td>\n              <td background=\"../images/tab_15.gif\" width=\"8\">&nbsp;</td>\n            </tr>\n          </tbody>\n        </table></td>\n    </tr>\n    <tr>\n      <td background=\"../images/tab_19.gif\" height=\"35\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n            <tr>\n              <td height=\"35\" width=\"12\"><img ";
echo "src=\"../images/tab_18.gif\" height=\"35\" width=\"12\"></td>\n              <td valign=\"top\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"30\" width=\"100%\">\n                  <tbody>\n                    <tr>\n                      <td align=\"center\">&nbsp;</td>\n                    </tr>\n                  </tbody>\n                </table></td>\n              <td width=\"16\"><img src=\"../images/tab_20.gif\" he";
echo "ight=\"35\" width=\"16\"></td>\n            </tr>\n          </tbody>\n        </table></td>\n    </tr>\n  </tbody>\n</table>\n</body>\n</html>";
?>
