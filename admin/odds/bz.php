<?php
include_once( "../../global.php" );
$db = new rate( $mydbhost, $mydbuser, $mydbpw, $mydbname, ALL_PS, $mydbcharset );
$o_type = $_GET['o'];
if ( !$o_type )
{
		$o_type = 37;
}
$rate = $db->get_rate( $o_type, $_SESSION["uid".$c_p_seesion] );
$anmail = $db->get_animal_table( );
$u_id = $_SESSION["uid".$c_p_seesion];
echo "<html oncontextmenu=\"return false\" xmlns=\"http://www.w3.org/1999/xhtml\">\n<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gbk\">\n</head>\n<body>\n<!--";
echo "<s";
echo "pan id=\"view_caozuo\"></span>      -->\n<link href=\"../images/Index.css\" rel=\"stylesheet\" type=\"text/css\">\n     ";
echo "<s";
echo "tyle>\n        .yellow{\n            background-color: yellow;\n        }\n    </style>\n";
echo "<s";
echo "cript src=\"../js/jquery-1.4.3.min.js?i=0\" type=\"text/javascript\"></script>\n";
echo "<s";
echo "cript src=\"js/normal.js?i=9\" type=\"text/javascript\"></script>\n";
echo "\n<!--";
echo "<S";
echo "CRIPT type=\"text/javascript\">  \nfunction myrefresh() \n{ \n        var o=\"";
echo "\";\n        var url = 'bz.php';\n        url += \"?o=\"+o;\n        window.open(url,'_self');\n} \n    \niso();\nvar u_id=\"";
echo "\";\nvar type_id=\"";
echo "\";\nvar plate_num=\"";
echo "\";\nvar o_content=\"";
echo "\";\n\nfunction iso(){\n    var view_caozuo_true=\$(\".view_caozuo_true\").val();\n   // alert(view_caozuo_true);\n    if(view_caozuo_true!=1){\n    ajax_get_rate(u_id,type_id,plate_num,o_content);\n    }\n    setTimeout(\"iso()\",1000);\n}\n\nfunction ajax_get_rate(u_id,type_id,plate_num,o_content){\n    \$.post(\n    \"ajax_get_rate.php\",\n    {'tid':type_id,'u_id':u_id,'plate_num':plate_num,'o_content':o_content},\n ";
echo "   function (msg){\n        if(msg==1){\n            setTimeout('myrefresh()',1000); //指定1秒刷新一次 \n        }\n    });\n}\n</SCRIPT> -->\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n  <tbody>\n    <tr>\n      <td background=\"../images/tab_05.gif\" height=\"30\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n            <tr>\n              <td height=\"30\" width";
echo "=\"12\"><img src=\"../images/tab_03.gif\" height=\"30\" width=\"12\"></td>\n              <td><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n                  <tbody>\n                    <tr>\n                      <td valign=\"middle\" width=\"87%\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n                          <tbody>\n                            <tr>\n                         ";
echo "     <td width=\"1%\"><div align=\"center\"><img src=\"../images/tb.gif\" height=\"16\" width=\"16\"></div></td>\n                              <td class=\"F_bold\" width=\"150\">";
echo "<s";
echo "pan id=\"ftm1\">";
echo $db->get_otype_by_oid( $o_type );
echo "</span>賠率設置";
echo "<s";
echo "pan style=\"DISPLAY:\">\n                                </span></td>\n                              <td class=\"F_bold\"><button id=\"rtm1\" class=\"";
echo $o_type == 37 ? "button_a1" : "button_a";
echo "\" onclick=\"window.location.href='bz.php?o=37'\">五不中<!--[";
echo "<s";
echo "pan id=\"gold0\"><font color=\"ff6400\">0</font></span>]--></button>\n                                &nbsp;\n                                <button id=\"rtm2\" class=\"";
echo $o_type == 38 ? "button_a1" : "button_a";
echo "\" onclick=\"window.location.href='bz.php?o=38'\">六不中</button>\n                                &nbsp;\n                                <button id=\"rtm3\" class=\"";
echo $o_type == 39 ? "button_a1" : "button_a";
echo "\" onclick=\"window.location.href='bz.php?o=39'\">七不中</button>\n                                &nbsp;\n                                <button id=\"rtm4\" class=\"";
echo $o_type == 40 ? "button_a1" : "button_a";
echo "\" onclick=\"window.location.href='bz.php?o=40'\">八不中</button>\n                                &nbsp;\n                                <button id=\"rtm5\" class=\"";
echo $o_type == 41 ? "button_a1" : "button_a";
echo "\" onclick=\"window.location.href='bz.php?o=41'\">九不中</button>\n                                &nbsp;\n                                <button id=\"rtm6\" class=\"";
echo $o_type == 42 ? "button_a1" : "button_a";
echo "\" onclick=\"window.location.href='bz.php?o=42'\">十不中</button></td>\n                              <td class=\"F_bold\">&nbsp;</td>\n                              <td class=\"F_bold\">&nbsp;</td>\n                              <td class=\"F_bold\">&nbsp;</td>\n                            </tr>\n                          </tbody>\n                        </table></td>\n                    </tr>\n                  </tbody>\n   ";
echo "             </table></td>\n              <td width=\"16\"><img src=\"../images/tab_07.gif\" height=\"30\" width=\"16\"></td>\n            </tr>\n          </tbody>\n        </table></td>\n    </tr>\n    <tr>\n      <td><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n            <tr>\n              <td background=\"../images/tab_12.gif\" width=\"8\">&nbsp;</td>\n              <td align=\"center\" height=";
echo "\"50\"><!-- 開始  -->\n                <div id=\"result\">\n                  <table class=\"Ball_List Tab\" align=\"center\" bgcolor=\"ffffff\" border=\"0\" bordercolor=\"f1f1f1\" cellpadding=\"1\" cellspacing=\"1\" width=\"99%\">\n                   <tbody>\n                      <tr class=\"td_caption_1\">\n                        ";
$i = 0;
for ( ;	$i < 5;	++$i	)
{
		echo "                        <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" nowrap=\"nowrap\" width=\"50\"><div align=\"center\"> NO </div></td>\n                        <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" nowrap=\"nowrap\"><div align=\"center\">";
		echo $db->get_otype_by_oid( $o_type );
		echo "</div></td>\n                        ";
}
echo "                      </tr>\n                   ";
$i = 1;
for ( ;	$i < 11;	++$i	)
{
		echo "                         \n                      <tr style=\"background-color: rgb(255, 255, 255);\" onmouseover=\"this.style.backgroundColor='#FFFFA2'\" onmouseout=\"this.style.backgroundColor='ffffff'\" bgcolor=\"#FFFFFF\">\n                      ";
		$u = 0;
		for ( ;	$u < 5;	++$u	)
		{
				$j = $i + $u * 10;
				if ( $j < 10 )
				{
						$j = "0".$i;
				}
				if ( $j < "50" )
				{
						echo "                        <td bordercolor=\"cccccc\" class=\"ball ball_";
						echo $db->get_color( $j );
						echo "\" id=\"type_";
						echo $j;
						echo "\" align=\"center\" height=\"25\">";
						echo $j;
						echo "</td>\n                        <td align=\"center\" height=\"25\">\n                            <a style=\"\" onClick=\"UpdateRate(";
						echo $j;
						echo ",";
						echo $o_type;
						echo ",1,\$(this).next('input'),";
						echo $rate[$j][1];
						echo ",0.1);\">";
						echo "<s";
						echo "pan style=\"vertical-align:middle;\"><img src=\"../images/bvbv_01.gif\" border=\"0\" height=\"17\" width=\"19\"></span></a>\n                            <input onblur=\"UpdateRate(";
						echo $j;
						echo ",";
						echo $o_type;
						echo ",0,\$(this),";
						echo $rate[$j][1];
						echo ",0);\" class=\"rate_set rate_color\" type=\"text\" style=\"width:63px;\" value=\"";
						echo $rate[$j][1];
						echo "\" />\n                            <a style=\"\" onClick=\"UpdateRate(";
						echo $j;
						echo ",";
						echo $o_type;
						echo ",2,\$(this).prev('input'),";
						echo $rate[$j][1];
						echo ",0.1);\">";
						echo "<s";
						echo "pan style=\"vertical-align:middle;\"><img src=\"../images/bvbv_02.gif\" border=\"0\" height=\"17\" width=\"19\"></span></a>";
						echo "<s";
						echo "pan style=\"vertical-align:middle;\">\n                            </span><input type=\"hidden\" value=\"";
						echo $rate[$j][3];
						echo "\" />\n                        </td>\n                       ";
				}
		}
		echo "                      </tr>\n                      ";
}
echo "                    </tbody>\n                  </table>\n                    \n<TABLE class=\"ball_List Tab\"  border=\"1\" bordercolor=\"#b5d6e6\"  borderColorDark=#ffffff cellPadding=2 width=\"99%\" align=center  class=\"Tab\" >\n          <tbody>\n            <tr class=\"td_caption_1\" align=\"center\">\n              <TD bgColor=#c6d0ec borderColor=#cccccc colSpan=15 height=\"25\" align=center style=\"background:url(../i";
echo "mages/bg2.gif) repeat-x 0 0  ;\" class=\"al font_size12\">";
echo "<S";
echo "TRONG>賠率調設&nbsp;</strong></td>\n            </tr>\n            <tr align=\"center\">\n                ";
foreach ( $anmail as $key => $v )
{
		echo "              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"";
		echo ",".$v;
		echo "\" type=\"checkbox\" />\n                ";
		echo $key;
		echo " </td>\n                ";
}
echo "              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\">&nbsp;</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\">&nbsp;</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\">&nbsp;</td>\n            </tr>\n            <tr align=\"center\">\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" valu";
echo "e=\"01,07,13,19,23,29,35,45\" type=\"checkbox\" />\n                ";
echo "<s";
echo "pan class=\"Font_R\">紅单</span></td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"02,08,12,18,24,30,34,40,46\" type=\"checkbox\" />\n                ";
echo "<s";
echo "pan class=\"Font_R\">紅双</span></td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"29,30,34,35,40,45,46\" type=\"checkbox\" />\n                ";
echo "<s";
echo "pan class=\"Font_R\">紅大</span></td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"01,02,07,08,12,13,18,19,23,24\" type=\"checkbox\" />\n                ";
echo "<s";
echo "pan class=\"Font_R\">紅小</span></td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"03,09,15,25,31,37,41,47\" type=\"checkbox\" />\n                ";
echo "<s";
echo "pan class=\"STYLE2\">藍单</span></td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"04,10,14,20,26,36,42,48\" type=\"checkbox\" />\n                ";
echo "<s";
echo "pan class=\"STYLE2\">藍双</span></td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"25,26,31,36,37,41,42,47,48\" type=\"checkbox\" />\n                ";
echo "<s";
echo "pan class=\"STYLE2\">藍大</span></td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"03,04,09,10,14,15,20\" type=\"checkbox\" />\n                ";
echo "<s";
echo "pan class=\"STYLE2\">藍小</span></td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"05,11,17,21,27,33,39,43,49,49\" type=\"checkbox\" />\n                ";
echo "<s";
echo "pan class=\"STYLE8\">綠单</span></td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"06,16,22,28,32,38,44\" type=\"checkbox\" />\n                ";
echo "<s";
echo "pan class=\"STYLE8\">綠双</span></td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"27,28,32,33,38,39,43,44,49,49\" type=\"checkbox\" />\n                ";
echo "<s";
echo "pan class=\"STYLE8\">綠大</span></td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"05,06,11,16,17,21,22\" type=\"checkbox\" />\n                ";
echo "<s";
echo "pan class=\"STYLE8\">綠小</span></td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"01,07,13,19,23,29,35,45,02,08,12,18,24,30,34,40,46\" type=\"checkbox\" />\n                ";
echo "<s";
echo "pan class=\"Font_R\">";
echo "<s";
echo "trong>紅波</strong></span></td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"03,09,15,25,31,37,41,47,04,10,14,20,26,36,42,48\" type=\"checkbox\" />\n                ";
echo "<s";
echo "pan class=\"STYLE7\">藍波</span></td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"05,11,17,21,27,33,39,43,49,06,16,22,28,32,38,44,49\" type=\"checkbox\" />\n                ";
echo "<s";
echo "pan class=\"STYLE5\">綠波</span></td>\n            </tr>\n            <tr align=\"center\">\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"01,03,05,07,09,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39,41,43,45,47,49\" type=\"checkbox\" />\n                单號</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=";
echo "\"select_array(\$(this));\" value=\"02,04,06,08,10,12,14,16,18,20,22,24,26,28,30,32,34,36,38,40,42,44,46,48\" type=\"checkbox\" />\n                双號</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49\" type=\"checkbox\" />\n                大號</td>\n              <td";
echo " bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24\" type=\"checkbox\" />\n                小號</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"01,03,05,07,09,10,12,14,16,18,21,23,25,27,29,30,32,34,36,38,41,43,45,";
echo "47,49\" type=\"checkbox\" />\n                合单</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"02,04,06,08,11,13,15,17,19,20,22,24,26,28,31,33,35,37,39,40,42,44,46,48\" type=\"checkbox\" />\n                合双</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"01";
echo ",03,05,07,09,11,13,15,17,19,21,23\" type=\"checkbox\" />\n                小单</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"25,27,29,31,33,35,37,39,41,43,45,47,49\" type=\"checkbox\" />\n                大单</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"02,04,0";
echo "6,08,10,12,14,16,18,20,22,24\" type=\"checkbox\" />\n                小双</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"26,28,30,32,34,36,38,40,42,44,46,48\" type=\"checkbox\" />\n                大双</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"01,02,03,04,05,";
echo "06,07,08,09\" type=\"checkbox\" />\n                0頭</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"10,11,12,13,14,15,16,17,18,19\" type=\"checkbox\" />\n                1頭</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"20,21,22,23,24,25,26,27,28,29\" type=\"che";
echo "ckbox\" />\n                2頭</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"30,31,32,33,34,35,36,37,38,39\" type=\"checkbox\" />\n                3頭</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"40,41,42,43,44,45,46,47,48,49\" type=\"checkbox\" />\n            ";
echo "    4頭</td>\n            </tr>\n            <tr align=\"center\">\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"10,20,30,40\" type=\"checkbox\" />\n                0尾</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"01,11,21,31,41\" type=\"checkbox\" />\n                1尾";
echo "</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"02,12,22,32,42\" type=\"checkbox\" />\n                2尾</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"03,13,23,33,43\" type=\"checkbox\" />\n                3尾</td>\n              <td bordercolor=\"cccccc\" align=\"le";
echo "ft\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"04,14,24,34,44\" type=\"checkbox\" />\n                4尾</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"05,15,25,35,45\" type=\"checkbox\" />\n                5尾</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(";
echo "this));\" value=\"06,16,26,36,46\" type=\"checkbox\" />\n                6尾</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"07,17,27,37,47\" type=\"checkbox\" />\n                7尾</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"08,18,28,38,48\" type=\"checkbox\" />\n ";
echo "               8尾</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><input onclick=\"select_array(\$(this));\" value=\"09,19,29,39,49\" type=\"checkbox\" />\n                9尾</td>\n              <td bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\">&nbsp;</td>\n              <td colspan=\"4\" bordercolor=\"cccccc\" align=\"left\" bgcolor=\"#FFFFFF\"><table border=\"0\" cellpadding=\"0\" cellspaci";
echo "ng=\"0\">\n                  <tbody>\n                    <tr>\n                      <td>減</td>\n                      <td><input class=\"jj\" name=\"mv\" value=\"1\" checked=\"checked\" type=\"radio\"></td>\n                      <td><input id=\"jjh\" name=\"money\" class=\"input1 rate_color\" value=\"0.5\" size=\"4\"></td>\n                      <td><input class=\"jj\" name=\"mv\" value=\"2\" type=\"radio\"></td>\n                      <td>加</";
echo "td>\n                      <td>\n                          <form id=\"f1\" action=\"set_rate.php\" method=\"post\">\n                              <input type=\"hidden\" value=\"\" name=\"ocontent\" id=\"ocontent\" />\n                              <input type=\"hidden\" value=\"";
echo $o_type;
echo "\" name=\"o_type\" id=\"o_type\" />\n                                &nbsp;<input onclick=\"return go_select(\$('.jj:checked').val(),\$('#jjh').val(),";
echo $o_type;
echo ")\" name=\"button2\"  class=\"button_a\" value=\"送出\" type=\"submit\">\n                        </form>\n                      </td>\n                      <td>&nbsp;\n                        <input class=\"button_a\" value=\"取消\" name=\"reset\" onClick=\"unset_select();\" type=\"reset\"></td>\n                    </tr>\n                  </tbody>\n                </table></td>\n            </tr>\n          </tbody>\n        </table>";
echo "\n<form id=\"f2\" action=\"set_rate_by_all.php\" method=\"post\">\n    <input type=\"hidden\" value=\"";
echo $o_type;
echo "\" name=\"oid\" id=\"oid\" />\n        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"99%\">\n         \n          <tbody>\n            <tr>\n              <td align=\"center\" height=\"25\">";
echo "<s";
echo "pan class=\"STYLE1\">統一修改：</span>\n                <input name=\"dx\" value=\"1\" type=\"radio\">\n                单\n                <input name=\"dx\" value=\"2\" type=\"radio\">\n                双\n                <input name=\"dx\" value=\"3\" type=\"radio\">\n                大\n                <input name=\"dx\" value=\"4\" type=\"radio\">\n                小\n                <input name=\"dx\" value=\"5\" type=\"radio\">\n        ";
echo "        紅波\n                <input name=\"dx\" value=\"6\" type=\"radio\">\n                綠波\n                <input name=\"dx\" value=\"7\" type=\"radio\">\n                藍波\n                <input name=\"dx\" value=\"8\" checked=\"checked\" type=\"radio\">\n                全部 ";
echo "<s";
echo "pan class=\"STYLE1\">賠率</span>\n                <input name=\"bl\" class=\"input1 rate_color\" id=\"bl\" style=\"height: 18px;\" value=\"0\" size=\"6\">\n                &nbsp;\n                <input onclick=\"return chk_bl(\$('#bl').val())\" class=\"button_a\" name=\"Submit22\" value=\"統一修改\" type=\"submit\"></td>\n            </tr>\n          </tbody>\n        </table>\n</form>\n                </div>\n                <!-- 結束  --";
echo "></td>\n              <td background=\"../images/tab_15.gif\" width=\"8\">&nbsp;</td>\n            </tr>\n          </tbody>\n        </table></td>\n    </tr>\n    <tr>\n      <td background=\"../images/tab_19.gif\" height=\"35\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n          <tbody>\n            <tr>\n              <td height=\"35\" width=\"12\"><img src=\"../images/tab_18.gif\" height=\"35\" width=\"12\"></td>\n";
echo "              <td valign=\"top\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"30\" width=\"100%\">\n                  <tbody>\n                    <tr>\n                      <td align=\"center\">&nbsp;</td>\n                    </tr>\n                  </tbody>\n                </table></td>\n              <td width=\"16\"><img src=\"../images/tab_20.gif\" height=\"35\" width=\"16\"></td>\n            </tr>\n          </t";
echo "body>\n        </table></td>\n    </tr>\n  </tbody>\n</table>\n</body>\n</html>";
?>
