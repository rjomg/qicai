<?php
include_once( "../../../global.php" );
include_once( "rate.class.php" );
$db = new rate0( $mydbhost, $mydbuser, $mydbpw, $mydbname, ALL_PS, $mydbcharset );
$o_type = 14;
$r = array( "红单", "红双", "红大", "红小" );
$g = array( "绿单", "绿双", "绿大", "绿小" );
$b = array( "蓝单", "蓝双", "蓝大", "蓝小" );
$rate = $db->get_rate( $o_type );
echo "<html oncontextmenu=\"return false\" xmlns=\"http://www.w3.org/1999/xhtml\">\n<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gbk\">\n</head>\n    \n<body>\n\n<link href=\"../../images/Index.css\" rel=\"stylesheet\" type=\"text/css\">\n    ";
echo "<s";
echo "tyle>\n        .yellow{\n            background-color: yellow;\n        }\n    </style>\n";
echo "<s";
echo "cript src=\"../../js/jquery-1.4.3.min.js?i=0\" type=\"text/javascript\"></script>\n";
echo "<s";
echo "cript src=\"js/normal.js\" type=\"text/javascript\"></script>\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n  <tbody>\n    <tr>\n      <td background=\"../../images/tab_05.gif\" height=\"30\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n            <tr>\n              <td height=\"30\" width=\"12\"><img src=\"../../images/tab_03.gif\" height=\"30\" width=\"12\"></td>\n       ";
echo "       <td><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n                  <tbody>\n                    <tr>\n                      <td valign=\"middle\" width=\"87%\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n                          <tbody>\n                            <tr>\n                              <td width=\"1%\"><div align=\"center\"><img src=\"../../images/tb.gif\" heig";
echo "ht=\"16\" width=\"16\"></div></td>\n                              <td class=\"F_bold\" width=\"150\">";
echo "<s";
echo "pan id=\"ftm1\">半波</span>賠率設置</td>\n                              <td class=\"F_bold\"></td>\n                              <td class=\"F_bold\"></td>\n                              <td class=\"F_bold\">&nbsp;</td>\n                              <td class=\"F_bold\">&nbsp;</td>\n                            </tr>\n                          </tbody>\n                        </table></td>\n                    </tr>\n           ";
echo "       </tbody>\n                </table></td>\n              <td width=\"16\"><img src=\"../../images/tab_07.gif\" height=\"30\" width=\"16\"></td>\n            </tr>\n          </tbody>\n        </table></td>\n    </tr>\n    <tr>\n      <td><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n            <tr>\n              <td background=\"../../images/tab_12.gif\" width=\"8\">&nbsp;</td>\n              <t";
echo "d align=\"center\" height=\"50\"><!-- 開始  -->\n                <div id=\"result\">\n               \n                <table align=\"center\" bgcolor=\"ffffff\" border=\"0\" bordercolor=\"f1f1f1\" cellpadding=\"1\" cellspacing=\"1\" width=\"99%\" border=\"1\" bordercolor=\"#b5d6e6\" class=\"Tab\">\n                <tbody>\n                <TR class=td_caption_1>\n                    <TD bgColor=#dfefff borderColor=#cccccc noWrap styl";
echo "e=\"background:url(../../images/bg2.gif) repeat-x 0 0  ;\" class=\"al font_size12\"><DIV align=center>NO </DIV></TD>\n                    <TD bgColor=#dfefff borderColor=#cccccc width=\"15%\" noWrap style=\"background:url(../../images/bg2.gif) repeat-x 0 0  ;\" class=\"al font_size12\"><DIV align=center>賠率/封號</DIV></TD>\n                    <TD bgColor=#dfefff borderColor=#cccccc width=\"7%\" noWrap align=center st";
echo "yle=\"background:url(../../images/bg2.gif) repeat-x 0 0  ;\" class=\"al font_size12\">下註總額</TD>\n                    <TD bgColor=#dfefff borderColor=#cccccc noWrap style=\"background:url(../../images/bg2.gif) repeat-x 0 0  ;\" class=\"al font_size12\"><DIV align=center>NO </DIV></TD>\n                    <TD bgColor=#dfefff borderColor=#cccccc width=\"15%\" noWrap style=\"background:url(../../images/bg2.gif) rep";
echo "eat-x 0 0  ;\" class=\"al font_size12\"><DIV align=center>賠率/封號</DIV></TD>\n                    <TD bgColor=#dfefff borderColor=#cccccc width=\"7%\" noWrap align=center style=\"background:url(../../images/bg2.gif) repeat-x 0 0  ;\" class=\"al font_size12\">下註總額</TD>\n                    <TD bgColor=#dfefff borderColor=#cccccc noWrap style=\"background:url(../../images/bg2.gif) repeat-x 0 0  ;\" class=\"al fon";
echo "t_size12\"><DIV align=center>NO </DIV></TD>\n                    <TD bgColor=#dfefff borderColor=#cccccc width=\"15%\" noWrap style=\"background:url(../../images/bg2.gif) repeat-x 0 0  ;\" class=\"al font_size12\"><DIV align=center>賠率/封號</DIV></TD>\n                    <TD bgColor=#dfefff borderColor=#cccccc width=\"7%\" noWrap align=center style=\"background:url(../../images/bg2.gif) repeat-x 0 0  ;\" class=\"al f";
echo "ont_size12\">下註總額</TD>\n                  </TR>\n     ";
foreach ( $r as $i => $k )
{
		echo "           \n                  <tr style=\"background-color: rgb(255, 255, 255);\" onMouseOver=\"this.style.backgroundColor='#FFFFA2'\" onMouseOut=\"this.style.backgroundColor='ffffff'\" bgcolor=\"#FFFFFF\">\n                   <td bordercolor=\"cccccc\" class=\"Font_R ball\" align=\"center\" height=\"25\">";
		echo "<s";
		echo "trong>";
		echo $rate[$k][0];
		echo "</strong></td>\n                    <td align=\"center\" height=\"25\">\n                        <a style=\"\" onClick=\"UpdateRate(";
		echo $o_type;
		echo ",1,\$(this).next('input'),0.1);\">";
		echo "<s";
		echo "pan style=\"vertical-align:middle;\"><img src=\"../../images/bvbv_01.gif\" border=\"0\" height=\"17\" width=\"19\"></span></a>\n                        <input onblur=\"UpdateRate(";
		echo $o_type;
		echo ",1,\$(this),0);\" class=\"rate_set rate_color\" type=\"text\" style=\"width:63px;\"  value=\"";
		echo $rate[$k][1];
		echo "\" />\n                        <a style=\"\" onClick=\"UpdateRate(";
		echo $o_type;
		echo ",2,\$(this).prev('input'),0.1);\">";
		echo "<s";
		echo "pan style=\"vertical-align:middle;\"><img src=\"../../images/bvbv_02.gif\" border=\"0\" height=\"17\" width=\"19\"></span></a>";
		echo "<s";
		echo "pan style=\"vertical-align:middle;\">\n                      <input onClick=\"UpdateRate(";
		echo $o_type;
		echo ",3,\$(this),0);\" class=\"num_close\" name=\"checkbox\" ";
		echo $rate[$k][2] == 1 ? "checked=\"checked\"" : "";
		echo " style=\"\" title=\"關閉該項\"  value=\"TRUE\" type=\"checkbox\" />\n                        </span>\n                    </td>\n                    <td align=\"center\" height=\"25\">";
		echo "<s";
		echo "pan id=\"gold";
		echo $i - 1;
		echo " ball\"><font class=\"odd_total\" color=\"ff6400\">";
		echo $rate[$k][3];
		echo "</font></span></td>\n                    \n                    <td bordercolor=\"cccccc\" class=\"STYLE5 ball\" align=\"center\" height=\"25\">";
		echo $rate[$g[$i]][0];
		echo "</td>\n                    <td align=\"center\" height=\"25\">\n                        <a style=\"\" onClick=\"UpdateRate(";
		echo $o_type;
		echo ",1,\$(this).next('input'),0.1);\">";
		echo "<s";
		echo "pan style=\"vertical-align:middle;\"><img src=\"../../images/bvbv_01.gif\" border=\"0\" height=\"17\" width=\"19\"></span></a>\n                        <input onblur=\"UpdateRate(";
		echo $o_type;
		echo ",1,\$(this),0);\" class=\"rate_set rate_color\" type=\"text\" style=\"width:63px;\"  value=\"";
		echo $rate[$g[$i]][1];
		echo "\" />\n                        <a style=\"\" onClick=\"UpdateRate(";
		echo $o_type;
		echo ",2,\$(this).prev('input'),0.1);\">";
		echo "<s";
		echo "pan style=\"vertical-align:middle;\"><img src=\"../../images/bvbv_02.gif\" border=\"0\" height=\"17\" width=\"19\"></span></a>";
		echo "<s";
		echo "pan style=\"vertical-align:middle;\">\n                      <input onClick=\"UpdateRate(";
		echo $o_type;
		echo ",3,\$(this),0);\" class=\"num_close\" name=\"checkbox\" ";
		echo $rate[$g[$i]][2] == 1 ? "checked=\"checked\"" : "";
		echo " style=\"\" title=\"關閉該項\"  value=\"TRUE\" type=\"checkbox\" />\n                        </span>\n                    </td>\n                    <td align=\"center\" height=\"25\">";
		echo "<s";
		echo "pan id=\"gold";
		echo $i - 1;
		echo " ball\"><font class=\"odd_total\" color=\"ff6400\">";
		echo $rate[$g[$i]][3];
		echo "</font></span></td>\n                \n                    <td bordercolor=\"cccccc\" class=\"ball_a ball\" align=\"center\" height=\"25\">";
		echo $rate[$b[$i]][0];
		echo "</td>\n                    <td align=\"center\" height=\"25\">\n                        <a style=\"\" onClick=\"UpdateRate(";
		echo $o_type;
		echo ",1,\$(this).next('input'),0.1);\">";
		echo "<s";
		echo "pan style=\"vertical-align:middle;\"><img src=\"../../images/bvbv_01.gif\" border=\"0\" height=\"17\" width=\"19\"></span></a>\n                        <input onblur=\"UpdateRate(";
		echo $o_type;
		echo ",1,\$(this),0);\" class=\"rate_set rate_color\" type=\"text\" style=\"width:63px;\"  value=\"";
		echo $rate[$b[$i]][1];
		echo "\" />\n                        <a style=\"\" onClick=\"UpdateRate(";
		echo $o_type;
		echo ",2,\$(this).prev('input'),0.1);\">";
		echo "<s";
		echo "pan style=\"vertical-align:middle;\"><img src=\"../../images/bvbv_02.gif\" border=\"0\" height=\"17\" width=\"19\"></span></a>";
		echo "<s";
		echo "pan style=\"vertical-align:middle;\">\n                      <input onClick=\"UpdateRate(";
		echo $o_type;
		echo ",3,\$(this),0);\" class=\"num_close\" name=\"checkbox\" ";
		echo $rate[$b[$i]][2] == 1 ? "checked=\"checked\"" : "";
		echo " style=\"\" title=\"關閉該項\"  value=\"TRUE\" type=\"checkbox\" />\n                        </span>\n                    </td>\n                    <td align=\"center\" height=\"25\">";
		echo "<s";
		echo "pan id=\"gold";
		echo $i - 1;
		echo " ball\"><font class=\"odd_total\" color=\"ff6400\">";
		echo $rate[$b[$i]][3];
		echo "</font></span></td>\n                \n                  </tr>\n    ";
}
echo "                </tbody>\n        </table>\n<form id=\"f2\" action=\"set_rate_by_all.php\" method=\"post\">\n    <input type=\"hidden\" value=\"";
echo $o_type;
echo "\" name=\"oid\" id=\"oid\" />\n        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"99%\">\n         \n          <tbody>\n            <tr>\n              <td align=\"center\" height=\"25\">";
echo "<s";
echo "pan class=\"STYLE1\">統一修改：</span>\n                <input name=\"dx\" value=\"11\" type=\"radio\">\n                单\n                <input name=\"dx\" value=\"12\" type=\"radio\">\n                双\n                <input name=\"dx\" value=\"13\" type=\"radio\">\n                大\n                <input checked=\"checked\" name=\"dx\" value=\"14\" type=\"radio\">\n                小\n                ";
echo "<s";
echo "pan class=\"STYLE1\">賠率</span>\n                <input name=\"bl\" class=\"input1 rate_color\" id=\"bl\" style=\"height: 18px;\" value=\"0\" size=\"6\">\n                &nbsp;\n                <input onclick=\"return chk_bl(\$('#bl').val())\" class=\"button_a\" name=\"Submit22\" value=\"統一修改\" type=\"submit\"></td>\n            </tr>\n          </tbody>\n        </table>\n</form>\n        </div>\n        <!-- 結束  --></td>\n      <td b";
echo "ackground=\"../../images/tab_15.gif\" width=\"8\">&nbsp;</td>\n    </tr>\n  </tbody>\n</table>\n</td>\n</tr>\n<tr>\n  <td background=\"../../images/tab_19.gif\" height=\"35\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n      <tbody>\n        <tr>\n          <td height=\"35\" width=\"12\"><img src=\"../../images/tab_18.gif\" height=\"35\" width=\"12\"></td>\n          <td valign=\"top\"><table border=\"0\" cellpadding=\"0\" cel";
echo "lspacing=\"0\" height=\"30\" width=\"100%\">\n              <tbody>\n                <tr>\n                  <td align=\"center\">&nbsp;</td>\n                </tr>\n              </tbody>\n            </table></td>\n          <td width=\"16\"><img src=\"../../images/tab_20.gif\" height=\"35\" width=\"16\"></td>\n        </tr>\n      </tbody>\n    </table></td>\n</tr>\n</tbody>\n</table>\n</body>\n</html>";
?>
