<?php
include_once( "../../global.php" );
error_reporting( 0 );
$power = $_GET['power'];
if ( !$power )
{
		$power = $_SESSION["user_power".$c_p_seesion] + 1;
}
$page = $_GET['page'];
if ( !$page )
{
		$page = 1;
}
$start = ( $page - 1 ) * 10;
$get_user_limit = $_GET['get_user_limit'];
$t1 = $_GET['t1'];
$t2 = $_GET['t2'];
$db = new action( $mydbhost, $mydbuser, $mydbpw, $mydbname, ALL_PS, $mydbcharset );
$user_char = $db->get_user_power_char( $power );
if ( $_GET['action'] == "selectlog" )
{
		$query = "select * from admin_users_action where phases =".$_GET['key'];
}
else
{
		$query = "select * from admin_users_action";
}
$result_all = mysql_query( $query );
$total = mysql_num_rows( $result_all );
pageft( $total, 10 );
if ( $firstcount < 0 )
{
		$firstcount = 0;
}
$result = mysql_query( "{$query} order by datetime desc limit  {$firstcount}, {$displaypg}" );
echo "<html oncontextmenu=\"return false\" xmlns=\"http://www.w3.org/1999/xhtml\"><head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n";
echo "<s";
echo "tyle type=\"text/css\">\n<!--\nbody {\n\tmargin-left: 0px;\n\tmargin-top: 0px;\n\tmargin-right: 0px;\n\tmargin-bottom: 0px;\n}\n-->\n</style>\n";
echo "<s";
echo "cript>\nif(self == top) {location = '/';} \nif(window.location.host!=top.location.host){top.location=window.location;}</script></head>\n\n<body  onselect=\"document.selection.empty()\"  onmouseover=\"self.status='歡迎光臨';return true\">\n<link href=\"../images/Index.css\" rel=\"stylesheet\" type=\"text/css\">\n ";
echo "<s";
echo "cript language=\"JavaScript\">\nfunction send_request(url){//初始化，指定處理函数，發送請求的函数\n    http_request=false;\n    //開始初始化XMLHttpRequest對象\n    if(window.XMLHttpRequest){//Mozilla瀏覽器\n     http_request=new XMLHttpRequest();\n     if(http_request.overrideMimeType){//設置MIME類別\n       http_request.overrideMimeType(\"text/xml\");\n     }\n    }\n    else if(window.ActiveXObject){//IE瀏覽�";
echo "鱘n     try{\n      http_request=new ActiveXObject(\"Msxml2.XMLHttp\");\n     }catch(e){\n      try{\n      http_request=new ActiveXobject(\"Microsoft.XMLHttp\");\n      }catch(e){}\n     }\n    }\n    if(!http_request){//異常，創建對象實例失敗\n     window.alert(\"創建XMLHttp對象失敗！\");\n     return false;\n    }\n    http_request.onreadystatechange=processrequest;\n    //確定發送請求方式，URL，及是否同步執行下段";
echo "代码\n    http_request.open(\"GET\",url,true);\n    http_request.send(null);\n  }\n  //處理返回信息的函数\n  function processrequest(){\n   if(http_request.readyState==4){//判斷對象狀態\n     if(http_request.status==200){//信息已成功返回，開始處理信息\n\t \tif(http_request.responseText == 1){\n\t\t\t\talert(\"删除成功！\");\n\t\t\t\thistory.go(0);\n\t\t\t}else{\n\t\t\t\talert(\"删除失败！\");\n\t\t\t\t}\n     //document.getElementById(re";
echo "obj).innerHTML=http_request.responseText;\n\t  \n     }\n     else{//頁面不正常\n      alert(\"您所請求的頁面不正常！\");\n     }\n   }\n  }\n  function dopage(obj,url){\n  // document.getElementById(obj).innerHTML=\"正在讀取数據...\";\n   send_request(url);\n   reobj=obj;\n   } \n   \n function C_Key(){\n\tvar key=document.all.key.value;\n\t\tif(key == \"\")\n\t\t{ alert(\"請輸入期数!!\"); return false; }\n\t//dopage('result','?";
echo "action=selectlog&key='+key+'&page=1');\n\tlocation.href='?action=selectlog&key='+key+'&page=1';\n\t\n}\n\n\n function C_Key1(){\n\tif(document.all.id1.value=='')\n \t\t{ alert(\"請輸入ID1編號!!\"); return false; }\n\t\tif(document.all.id2.value=='')\n \t\t{  alert(\"請輸入ID2編號!!\"); return false; }\n\t\n\tvar id1=document.all.id1.value;\n\tvar id2=document.all.id2.value;\n\t//alert(id1);\n\t//alert(id2);\n\tdopage('result','ajax";
echo ".php?action=dellog&id1='+id1+'&id2='+id2+'&page=1&del=DWQAZgRv');\n\tdocument.all.id1.value=\"\";\n\tdocument.all.id2.value=\"\";\n\t//alert(\"清除成功!!\");\n}\n</script>\n\n ";
echo "<s";
echo "tyle type=\"text/css\">\n<!--\n.STYLE1 {color: #CCCCCC}\n-->\n </style>\n\n <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n  <tbody>\n    <tr>\n      <td background=\"../images/tab_05.gif\" height=\"30\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n          <tr>\n            <td height=\"30\" width=\"12\"><img src=\"../images/tab_03.gif\" height=\"30\" width=\"12\"></td>\n          ";
echo "  <td><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n              <tbody>\n                <tr>\n                  <td valign=\"middle\" width=\"87%\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n                    <tbody>\n                      <tr>\n                        <td width=\"1%\"><div align=\"center\"><img src=\"../images/tb.gif\" height=\"16\" width=\"16\"></div></td>\n         ";
echo "               <td class=\"F_bold\" width=\"32%\">操作日誌</td>\n                        <td class=\"F_bold\" width=\"33%\">期数內容查詢\n                          <input name=\"key\" class=\"input1\" onBlur=\"return C_Key();\"  type=\"text\"></td>\n                        <td valign=\"middle\" width=\"34%\">\n                          <table cellpadding=\"0\" cellspacing=\"0\">\n                            <tbody><tr>\n               ";
echo "               <td colspan=\"2\" align=\"center\" nowrap=\"nowrap\">刪除数據ID編號：</td>\n                              <td colspan=\"6\" align=\"center\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n                                  <tbody><tr>\n                                    <td><input name=\"id1\" class=\"input1\" id=\"id1\" size=\"10\" type=\"text\">\n                                      --\n       ";
echo "                               <input name=\"id2\" class=\"input1\" id=\"id2\" size=\"10\" type=\"text\"></td>\n                                    <td align=\"center\" width=\"80\"><input value=\"刪除\" name=\"B12\" onClick=\"C_Key1();\" class=\"button_a\" style=\"width: 60px; height: 22px;\" ;=\"\" type=\"button\"></td>\n                                    <td>&nbsp;</td>\n                                  </tr>\n                     ";
echo "         </tbody></table></td>\n                            </tr>\n                          </tbody></table></td>\n                      </tr>\n                    </tbody>\n                  </table></td>\n                  </tr>\n              </tbody>\n            </table></td>\n            <td width=\"16\"><img src=\"../images/tab_07.gif\" height=\"30\" width=\"16\"></td>\n          </tr>\n        </tbody>\n      </table></td>\n    </t";
echo "r>\n    <tr>\n      <td><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n          <tr>\n            <td background=\"../images/tab_12.gif\" width=\"8\">&nbsp;</td>\n            <td align=\"center\" height=\"50\"><!-- 開始  --><div id=\"result\"><table class=\"Ball_List Tab\" align=\"center\" bgcolor=\"ffffff\" border=\"0\" bordercolor=\"f1f1f1\" cellpadding=\"1\" cellspacing=\"1\" width=\"99%\">\n          ";
echo "                <tbody><tr class=\"td_caption_1\">\n                            <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" width=\"100\"><div align=\"center\">\n                                ID編號\n                            </div></td>\n                            <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" width=\"150\"><div align=\"center\">期数</div></td>\n                            <td bordercolor=\"cccccc\" align=\"";
echo "center\" bgcolor=\"#DFEFFF\" width=\"150\">操作用戶</td>\n                            <td bordercolor=\"cccccc\" align=\"center\" bgcolor=\"#DFEFFF\" nowrap=\"nowrap\">操作內容</td>\n                            <td bordercolor=\"cccccc\" bgcolor=\"#DFEFFF\" nowrap=\"nowrap\" width=\"150\"><div align=\"center\">操作時間</div></td>\n                          </tr>\n\t\t\t\t\t\t   ";
while ( $row = mysql_fetch_array( $result ) )
{
		echo "    \n                         \n                                                    <tr style=\"background-color: rgb(255, 255, 255);\" onMouseOver=\"this.style.backgroundColor='#FFFFA2'\" onMouseOut=\"this.style.backgroundColor='ffffff'\" bgcolor=\"#FFFFFF\">\n                            <td bordercolor=\"cccccc\" height=\"25\"><div align=\"center\">\n                                ";
		echo $row['id'];
		echo "                             </div></td>\n                            <td bordercolor=\"cccccc\" align=\"center\" height=\"25\">";
		echo $row['phases'];
		echo "     </td>\n                            <td bordercolor=\"cccccc\" align=\"center\" height=\"25\">";
		$info = mysql_fetch_array( mysql_query( "select user_name,user_power from users where user_id =  ".$row['uid']."" ) );
		if ( $info['user_power'] == 1 )
		{
				$shenfen = "后台";
		}
		else if ( $info['user_power'] == 6 )
		{
				$shenfen = "前台";
		}
		else
		{
				$shenfen = "代理";
		}
		echo $info['user_name']."&nbsp;.".$shenfen;
		echo "  </td>\n                            <td bordercolor=\"cccccc\" align=\"center\">";
		echo $row['title'];
		echo " </td>\n                            <td bordercolor=\"cccccc\" align=\"center\" nowrap=\"nowrap\">";
		echo date( "Y-m-d H:i:s", $row['datetime'] );
		echo " </td>\n                          </tr>\n                          ";
}
echo "      \n                         \n                       <tr>\n                       \n                            <td colspan=\"5\" bordercolor=\"cccccc\" bgcolor=\"#FFFFFF\" height=\"25\"><div id=\"fm\" align=\"center\">\n                             ";
echo $pagenav;
echo "                  ";
echo "                            \n                            </div></td>\n                    </tr>\n                        \n                  </tbody></table>\n            \n             </div> <!-- 結束  --></td>\n            <td background=\"../images/tab_15.gif\" width=\"8\">&nbsp;</td>\n          </tr>\n        </tbody>\n      </table></td>\n    </tr>\n    <tr>\n      <td background=\"../images/tab_19.gif\" height=\"35\"><table bor";
echo "der=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n        <tbody>\n          <tr>\n            <td height=\"35\" width=\"12\"><img src=\"../images/tab_18.gif\" height=\"35\" width=\"12\"></td>\n            <td valign=\"top\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"30\" width=\"100%\">\n              <tbody>\n                <tr>\n                  <td align=\"center\"><div disabled=\"\" align=\"right\">註：如果要";
echo "刪除請輸入ID段來刪除!<div></div></div></td>\n                </tr>\n              </tbody>\n            </table></td>\n            <td width=\"16\"><img src=\"../images/tab_20.gif\" height=\"35\" width=\"16\"></td>\n          </tr>\n        </tbody>\n      </table></td>\n    </tr>\n  </tbody>\n</table>\n\n</body></html>";
?>
