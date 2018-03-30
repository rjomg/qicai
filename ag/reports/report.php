<?php
include_once( "../../global.php" );
$db = new rate( $mydbhost, $mydbuser, $mydbpw, $mydbname, ALL_PS, $mydbcharset );
$db_order = new orders( $mydbhost, $mydbuser, $mydbpw, $mydbname, ALL_PS, $mydbcharset );
$uid = $_SESSION['uid'.$c_p_seesion];
$new_plate=$db->get_one('select plate_num from plate order by id DESC');
$plate_num=$new_plate['plate_num'];
$user_id=$_GET['user_id']?$_GET['user_id']:$uid;

$_GET['power']=$_GET['power']?$_GET['power']:$_SESSION['user_power'.$c_p_seesion]+1;
//分公司
if ($user_id=="") {
  $orders=$db->get_all('select orders.* from orders left join users on orders.topf_id=users.user_id where orders.plate_num='.$plate_num);
  $users=$db->get_all('select * from users where user_power=2');
  $power="topf_id";
  $tuiz='f_tui';
  $user_power="3";
}
//股东
if ($user_id!=='' && $_GET['power']=='3') {
  $orders=$db->get_all('select orders.* from orders left join users on orders.topgd_id=users.user_id where orders.plate_num='.$plate_num);
  $users=$db->get_all('select * from users where user_power=3 and top_id='.$user_id);
  $power="topgd_id";
  $tuiz='gd_tui';
  $user_power="4";
}
//总代理
if ($user_id!=='' && $_GET['power']=='4') {
  $orders=$db->get_all('select orders.* from orders left join users on orders.topzd_id=users.user_id where orders.plate_num='.$plate_num);
  $users=$db->get_all('select * from users where user_power=4 and top_id='.$user_id);
  $power="topzd_id";
  $tuiz='zd_tui';
  $user_power="5";
}
//代理
if ($user_id!=='' && $_GET['power']=='5') {
  $orders=$db->get_all('select orders.* from orders left join users on orders.topd_id=users.user_id where orders.plate_num='.$plate_num);
  $users=$db->get_all('select * from users where user_power=5 and top_id='.$user_id);
  // var_dump('select * from users where user_id in (select id from orders where topd_id='.$user_id.') and user_power=5 and top_id='.$user_id);exit;
  $power="topd_id";
  $tuiz='d_tui';
  $user_power="6";
}
//代理
if ($user_id!=='' && $_GET['power']=='6') {
  $orders=$db->get_all('select orders.* from orders left join users on orders.user_id=users.user_id where orders.plate_num='.$plate_num);
  $users=$db->get_all('select * from users where user_power=6 and top_id='.$user_id);
  $power="user_id";
  $tuiz='h_tui';
  $user_power="";
}
// var_dump($orders);exit;
?>
<!Doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/admincg.css" rel="stylesheet" type="text/css" />
<style media=print> .Noprint{display:none;}</style>
<script src="../js/ajax.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/datepicker-zh-cn.js"></script>
<script data-pace-options='{ "ajax": true ,"startOnPageLoad": false}' src="../js/pace.min_1.js" ></script>
<link rel="stylesheet" href="css/pace-theme-loading-bar_1.css">
<link rel="stylesheet" href="css/jquery-ui.min.css">
<script src="../js/json2_3.js" type="text/javascript"></script>
<script type="text/javascript">
  function reportprint(){
    //window.open('print_reportadmin.php');
    window.print();
    return false;
  }
  function ReportAdminSearch(mode,send_data,agent,level,type){
    Pace.restart();
    Pace.track(function(){
      ajax('POST','ajax.php?action=ReportAdminSearch',true,'day_data=' + send_data + '&mode=' + mode + '&agent=' + agent + '&level=' + level + '&type=' + type,function(data){
        data = JSON.parse(data);
        document.getElementById('showReportAdmin').innerHTML = data;
        $( "#datepicker1" ).datepicker({dateFormat: "yy-mm-dd"});
        $( "#datepicker2" ).datepicker({dateFormat: "yy-mm-dd"});
      });
    });
  }
  function ChangeMode(mode,type){
    var send_data = {};
    if(mode == 'SingleDay'){
      send_data.statistics_start = '2017-01-24';
      send_data.statistics_end = '2017-01-24';
      send_data.issueno_start = 170124024;
      send_data.issueno_end = 170125023;
      send_data.supposed_start = '1485302400';
      send_data.supposed_end = '1485302400';
      ReportAdminSearch(mode,JSON.stringify(send_data),958,7,type);
    }else{
      ajax('POST','ajax.php?action=GetIssueMode',true,'mode=' + mode, function(data){
        data = JSON.parse(data);
        send_data.statistics_start = data['statistics_start'];
        send_data.statistics_end = data['statistics_end'];
        send_data.issueno_start = data['issueno_start'];
        send_data.issueno_end = data['issueno_end'];
        send_data.supposed_start = data['supposed_start'];
        send_data.supposed_end = data['supposed_end'];
        ReportAdminSearch(mode,JSON.stringify(send_data),958,7,type);
      });
    }
  }
  function SearchDayInterval(type){
    var statistics_start = $( "#datepicker1" ).datepicker({dateFormat: "yy-mm-dd"}).val();
    var statistics_end = $( "#datepicker2" ).datepicker({dateFormat: "yy-mm-dd"}).val();
    if(statistics_start > statistics_end){
      alert('日期先后填入有误!!');
      return false;
    }
    ajax('get','report.php?action=GetIssueMode',true,'mode=Selected&statistics_start=' + statistics_start + '&statistics_end=' + statistics_end,function(data){
      data = JSON.parse(data);
      var send_data = {};
      send_data.statistics_start = data['statistics_start'];
      send_data.statistics_end = data['statistics_end'];
      send_data.issueno_start = data['issueno_start'];
      send_data.issueno_end = data['issueno_end'];
      send_data.supposed_start = data['supposed_start'];
      send_data.supposed_end = data['supposed_end'];
      ReportAdminSearch('SingleDay',JSON.stringify(send_data),958,7,type);
    });
  }
  function ChangeType(mode){
    var type_value = document.getElementById('SelectType').value;
    var type = (type_value==0)?'Date':'Agent';
    ChangeMode(mode,type);
  }
  function hover1(obj){
    obj.className='hover1';
  }
  function hover2(obj){
    obj.className='hover';
  }
</script>
<style>
  .content{
    text-align:left;
    font-size: 14px;
    font-family: Microsoft JhengHei;
  }
  .account_name{
    font-size: 16px;
    font-family: Microsoft JhengHei;
  }
</style>
</head>
<body leftmargin="10" topmargin="10" >
  <div id="append_parent"></div>
  <table width="99%" align=center border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td>
        <table class="Noprint" width="100%"  border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="guide">
        <tr  style="border:none;">
          <td style="font-size:16px;font-family:Microsoft JhengHei;border:none;" width=15%><a href="#" onClick="window.location.href='report.php?bet=1'">位置</a>&nbsp;&raquo;&nbsp;<?php echo $bet_name;?></td>
          <td width='39%' style='font-size:16px;font-family:Microsoft JhengHei;border:none;'>
            <marquee scrolldelay=400 style='height:18px;font-weight: bold;'>您好，目前报表已增加上下层连结，以及周报表，自选日查询。</marquee>
          </td>
          <td width=46% style="font-size:16px;font-family:Microsoft JhengHei;border:none;text-align:right;padding-right:10px;">
            <a href="javascript:window.location.href='report.php?bet=1';"><b>日报表</b></a> | 
            <!-- <a href="report.php?bet=3"><b>周报表</b></a> |  -->
            <a href="report.php?bet=5"><b>月报表</b></a>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table><br/>   
  <div id="showReportAdmin">
   <table border="0" cellpadding="0" cellspacing="0" class="tableborder" width="100%" style="table-layout: auto;">
    <tbody>
     <tr class="header">
      <td colspan="2">右方显示层级可以点击，方便您在各层之间移动</td>
      <td colspan="18"> <a onclick="" style="color:red;"><?php switch ($_GET['power']) {case '3':echo '分公司报表';break;case '4':echo '股东报表';break;case '5':echo '总代理报表';break;case '6':echo '代理报表';break;default:echo '管理员报表';break;}?></a></td>
     </tr>
     <tr class="reportTop">
      <td rowspan="2" width="5%"><?php switch ($_GET['power']) {case '3':echo '股东';break;case '4':echo '总代理';break;case '5':echo '代理';break;case '6':echo '会员';break;default:echo '分公司';break;}?></td>
      <td colspan="3" class="reportmember" width="24%">会员</td>
      <?php if($_GET['power']==5 || $_GET['power']==6 || $_GET['power']==''){?>
      <td colspan="<?php if ($_GET['power']==6){echo '4';}else{echo '2';}?>" class="reportNow" width="32%">代理</td>
      <?php }?>
      <?php if($_GET['power']==4 || $_GET['power']==6 || $_GET['power']==5 || $_GET['power']==''){?>
      <td colspan="<?php if ($_GET['power']==5){echo '4';}else{echo '2';}?>" class="reportLevel" width="16%">总代理</td>
      <?php }?>
      <?php if ($_GET['power']==3 || $_GET['power']==5 || $_GET['power']==4 || $_GET['power']==''){?>
      <td colspan="<?php if ($_GET['power']==4){echo '4';}else{echo '2';}?>" class="reportNow_z" width="16%">股东</td>
      <?php }?>
      <?php if ($_GET['power']==2 || $_GET['power']==4 || $_GET['power']==3 || $_GET['power']==''){?>
      <td colspan="<?php if ($_GET['power']==3){echo '4';}else{echo '2';}?>" class="reportLevel" width="16%">分公司</td>
      <?php }?>
      <?php if ($_GET['power']==1 || $_GET['power']=='' || $_GET['power']==2 || $_GET['power']==3){?>
      <td colspan="<?php if ($_GET['power']==2){echo '4';}else{echo '2';}?>" class="reportNow_z" width="16%">总公司</td>
      <?php }?>
     </tr>
     <tr class="reportTop">
      <td class="reportmember" width="3%">笔数</td>
      <td class="reportmember" width="3%">总投</td>
      <td class="reportmember" width="3%">盈亏</td>
      <?php if ($_GET['power']==5 || $_GET['power']==''){?>
      <td class="reportNow" width="3%">总投</td>
      <td class="reportNow" width="3%">盈亏</td>
      <?php }?>
      <?php if ($_GET['power']==6){?>
        <td class="reportNow" width="3%">占成</td>
        <td class="reportNow" width="3%">占成盈亏</td>
        <td class="reportNow" width="3%">赚水</td>
        <td class="reportNow" width="3%">总盈亏</td>
      <?php }?>
      <?php if($_GET['power']==4 || $_GET['power']==6 || $_GET['power']==''){?>
      <td class="reportLevel" width="3%">总投</td>
      <td class="reportLevel" width="3%">盈亏</td>
      <?php }?>
      <?php if ($_GET['power']==5){?>
        <td class="reportLevel" width="3%">占成</td>
        <td class="reportLevel" width="3%">占成盈亏</td>
        <td class="reportLevel" width="3%">赚水</td>
        <td class="reportLevel" width="3%">总盈亏</td>
      <?php }?>
      <?php if ($_GET['power']==3 || $_GET['power']==5 || $_GET['power']==''){?>
      <td class="reportNow_z" width="3%">总投</td>
      <td class="reportNow_z" width="3%">盈亏</td>
      <?php }?>
      <?php if ($_GET['power']==4){?>
        <td class="reportNow_z" width="3%">占成</td>
        <td class="reportNow_z" width="3%">占成盈亏</td>
        <td class="reportNow_z" width="3%">赚水</td>
        <td class="reportNow_z" width="3%">总盈亏</td>
      <?php }?>
      <?php if ($_GET['power']==2 || $_GET['power']==4 || $_GET['power']==''){?>
      <td class="reportLevel" width="3%">总投</td>
      <td class="reportLevel" width="3%">盈亏</td>
      <?php }?>
      <?php if ($_GET['power']==3){?>
        <td class="reportLevel" width="3%">占成</td>
        <td class="reportLevel" width="3%">占成盈亏</td>
        <td class="reportLevel" width="3%">赚水</td>
        <td class="reportLevel" width="3%">总盈亏</td>
      <?php }?>
    <?php if ($_GET['power']==1 || $_GET['power']==3 || $_GET['power']==''){?>
      <td class="reportNow_z" width="3%">总投</td>
      <td class="reportNow_z" width="3%">盈亏</td>
      <?php if ($_GET['power']==2){?>
        <td class="reportNow_z" width="3%">占成</td>
        <td class="reportNow_z" width="3%">占成盈亏</td>
      <?php }?>
      <?php }?>
     </tr>
     <?php $dbnum = new action( $mydbhost, $mydbuser, $mydbpw, $mydbname, ALL_PS, $mydbcharset );$dby = new action( $mydbhost, $mydbuser, $mydbpw, $mydbname, ALL_PS, $mydbcharset );?>
     <?php 
      $huiyuan=array();
      $daili=array();
      $zondaili=array();
      $gudong=array();
      $fengonshi=array();
      $zongonshi=array();
     ?>
     <?php $i=0; foreach($users as $key => $row){?>
     <?php
     $aa=$db->get_all('select id from orders where user_id='.$row['user_id'].' or topd_id='.$row['user_id'].' or topzd_id='.$row['user_id'].' or topgd_id='.$row['user_id'].' or topf_id='.$row['user_id'].' and plate_num='.$plate_num);
     if (empty($aa)) {
       continue;
     }
      $num = $dbnum->select( "orders", "count(*) as c ","{$power}={$row['user_id']} and plate_num={$plate_num} and stattuima=0");
      $order_y = $dby->select( "orders", "SUM(orders_y) as order_y,SUM(shuying_y) as shuying_y ","{$power}={$row['user_id']} and plate_num={$plate_num} and stattuima=0");
      // $tui=$db->get_one('select SUM(h_tui) as h_tui,SUM(d_tui) as d_tui,SUM(zd_tui) as zd_tui,SUM(gd_tui) as gd_tui,SUM(f_tui) as f_tui from orders where stattuima=0 and plate_num='.$plate_num.' and '.$power.'='.$row['user_id']);
      // $zj=$db->get_one('select SUM(orders_p) as order_p from orders where stattuima=0 and is_win=1 and plate_num='.$plate_num.' and '.$power.'='.$row['user_id']);
      // var_dump($zj);
      $order_num = $dbnum->fetch_array( $num );
      $amount = $dby->fetch_array( $order_y );

      $win_bs=$db->get_one('select SUM(orders_y) as orders_y from orders where is_win=1 and stattuima=0 and is_win=1 and plate_num='.$plate_num.' and '.$power.'='.$row['user_id']);
      // var_dump($win_bs['c']);
      $zj=(int)$win_bs['orders_y']*$zj['order_p'];
      $huiyuan['bs']=$order_num['c']+$huiyuan['bs'];
      $huiyuan['zt']=$amount['order_y']+$huiyuan['zt'];
      $h_sy=$zj-$amount['order_y']+$tui['h_tui']+$h_sy;
      $d_sy=$zj-$amount['order_y']+$tui['d_tui']+$tui['h_tui']+$d_sy;
      $zd_sy=$zj-$amount['order_y']+$tui['zd_tui']+$tui['d_tui']+$tui['h_tui']+$zd_sy;
      $gd_sy=$zj-$amount['order_y']+$tui['gd_tui']+$tui['zd_tui']+$tui['d_tui']+$tui['h_tui']+$gd_sy;
      $f_sy=$zj-$amount['order_y']+$tui['f_tui']+$tui['gd_tui']+$tui['zd_tui']+$tui['d_tui']+$tui['h_tui']+$f_sy;
      // $g_sy=$amount['order_y']-$tui['f_tui']-$zj+$g_sy;
      $g_sy=$amount['order_y']-($tui['f_tui']+$tui['gd_tui']+$tui['zd_tui']+$tui['d_tui']+$tui['h_tui'])+$g_sy-$zj;


      $h_tui=$db_order->get_son_user($row['user_id'],$row['user_power'],$plate_num); //获取会员的注单
      // var_dump($h_tui);
      $f_tuishui=0;
    $gd_tuishui=0;
    $zd_tuishui=0;
    $d_tuishui=0;
    $tuishui=0;
      $zj=0;
      $tui['b']=0;
    $orders_y=0;
      foreach ($h_tui as $k => $value) {
        $f_tuishui +=($value['f_tui']*$value['orders_y']);
        $gd_tuishui +=($value['gd_tui']*$value['orders_y']);
        $zd_tuishui +=($value['zd_tui']*$value['orders_y']);
        $d_tuishui +=($value['d_tui']*$value['orders_y']);
        $tuishui =$value['h_tui']*$value['orders_y'];
        $orders_y +=$value['orders_y'];
        if ($value['is_win']==1) {
          $zj=$value['orders_y']*$value['orders_p']+$zj;
        }
        // echo $tuiz;
        if ($row['user_power']=='3') {
          $tui['b'] +=$value['f_tui']*$value['orders_y']; /*获取显示的本级账号赚水*/
        }
        if ($row['user_power']=='4') {
          $tui['b'] +=$value['gd_tui']*$value['orders_y']; /*获取显示的本级账号赚水*/
        }
        if ($row['user_power']=='5') {
          $tui['b'] +=$value['zd_tui']*$value['orders_y']; /*获取显示的本级账号赚水*/
        }
        if ($row['user_power']=='6') {
          $tui['b'] +=$value['d_tui']*$value['orders_y']; /*获取显示的本级账号赚水*/
        }
        // echo $row['user_power'].','.$tui['b'].','.$d_tuishui.','.$zj.'/';
      }
      // var_dump($d_tuishui);
     ?>
     <tr onmouseover="hover1(this);" onmouseout="hover2(this);" class="hover">
     <?php 
      $zd=0;
      $dl=0;
      $fg=0;

     ?>
      <td class="account_name"><font color="#0000FF"><b>[<?php $i=$i+1; echo $i;?>]</b></font>
      <?php if ($user_power==''){?>
        <a href="awardreadadmin.php?issueno_start=<?php echo $start_time;?>&amp;issueno_end=<?php echo time();?>&amp;company=<?php echo $_SESSION['uid'.$c_p_seesion]?>&amp;user_id=<?php echo $row['user_id'];?>"><?php echo $row['user_name'];?></a>
      <?php }else {?>
      <a href="report.php?user_id=<?php echo $row['user_id'];?>&power=<?php echo $user_power;?>"><?php echo $row['user_name'];?>()</a>
      <?php }?>
      </td>
      <td class="reportmember content"><?php echo $order_num['c'];?></td>
      <td class="reportmember content"><?php echo $amount['order_y'];?></td>
      <td class="reportmember content"><?php if($h_tui[0]['history_is_account']=='1'){ $hy=($tuishui+$zj)-$orders_y;echo round($hy);}?></td>
      <?php if ($_GET['power']==5 || $_GET['power']==''){?>
      <td class="reportNow content"><?php echo $amount['order_y'];?></td>
      <td class="reportNow content"><?php if($h_tui[0]['history_is_account']=='1'){$dl=($hy);echo $_GET['power']=='' ? $dl=round(-$dl) : round($dl);}?></td>
      <?php }?>
      <?php if ($_GET['power']==6){?>
        <td class="reportNow content"></td>
        <td class="reportNow content"></td>
        <td class="reportNow content"><?php if(round($tui['b'])<=1 && $tui['b']!=0){$tui['b']=1;} echo round($tui['b']);?></td>
        <td class="reportNow content"><?php if(round($tui['b'])<=1 && $tui['b']!=0){$tui['b']=1;} echo round($tui['b']);?></td>
      <?php }?>
      <?php if ($_GET['power']==4 || $_GET['power']==6 || $_GET['power']==''){?>
      <td class="reportLevel content"><?php echo $amount['order_y'];?></td>
      <td class="reportLevel content"><?php if($h_tui[0]['history_is_account']=='1'){$zd=($d_tuishui+$hy);echo $_GET['power']==6 ? $zd=round(-$zd) : round($zd);}?></td>
      <?php }?>
      <?php if ($_GET['power']==5){?>
        <td class="reportLevel content"></td>
        <td class="reportLevel content"></td>
        <td class="reportLevel content"><?php if(round($tui['b'])<=1 && $tui['b']!=0){$tui['b']=1;} echo round($tui['b']);?></td>
        <td class="reportLevel content"><?php if(round($tui['b'])<=1 && $tui['b']!=0){$tui['b']=1;} echo round($tui['b']);?></td>
      <?php }?>
      <?php if ($_GET['power']==3 || $_GET['power']==5 || $_GET['power']==''){?>
      <td class="reportNow_z content"><?php echo $amount['order_y'];?></td>
      <td class="reportNow_z content"><?php if($h_tui[0]['history_is_account']=='1'){$gd=($zd_tuishui+$d_tuishui+$hy);echo $_GET['power']==5 ? $gd=round(-$gd) :  round($gd);}?></td>
      <?php }?>
      <?php if ($_GET['power']==4){?>
        <td class="reportNow_z content"></td>
        <td class="reportNow_z content"></td>
        <td class="reportNow_z content"><?php if(round($tui['b'])<=1 && $tui['b']!=0){$tui['b']=1;} echo round($tui['b']);?></td>
        <td class="reportNow_z content"><?php if(round($tui['b'])<=1 && $tui['b']!=0){$tui['b']=1;} echo round($tui['b']);?></td>
      <?php }?>
      <?php if ($_GET['power']==2 || $_GET['power']==4 || $_GET['power']==''){?>
      <td class="reportLevel content"><?php echo $amount['order_y'];?></td>
      <td class="reportLevel content"><?php if($h_tui[0]['history_is_account']=='1'){$fg=($gd_tuishui+$zd_tuishui+$d_tuishui+$hy);echo $_GET['power']==4 ? $fg=round(-$fg) : round($fg);}?></td>
      <?php }?>
      <?php if ($_GET['power']==3){?>
        <td class="reportLevel content"></td>
        <td class="reportLevel content"></td>
        <td class="reportLevel content"><?php if(round($tui['b'])<=1 && $tui['b']!=0){$tui['b']=1;} echo round($tui['b']);?></td>
        <td class="reportLevel content"><?php if(round($tui['b'])<=1 && $tui['b']!=0){$tui['b']=1;} echo round($tui['b']);?></td>
      <?php }?>
      <?php if ($_GET['power']==1 || $_GET['power']==3 || $_GET['power']==''){?>
      <td class="reportNow_z content"><?php echo $amount['order_y'];?></td>
      <td class="reportNow_z content"><?php if($h_tui[0]['history_is_account']=='1'){$fg=($gd_tuishui+$zd_tuishui+$d_tuishui+$hy);echo $_GET['power']==3 ? $fg=round(-$fg) : round($fg);}?></td>
      <?php if ($_GET['power']==2){?>
        <td class="reportNow_z content"></td>
        <td class="reportNow_z content"></td>
      <?php }?>
      <?php }?>
     </tr>
     <?php 
      // 统计每列
      $z_tuiz=round($tui['b'])+$z_tuiz;
      $z_hy=$hy+$z_hy;
      $z_dl=$dl+$z_dl;
      $z_zd=$zd+$z_zd;
      $z_gd=$gd+$z_gd;
      $z_fg=$fg+$z_fg;
     ?>
  <?php }?> 
     <tr class="reportFooter">
      <td style="text-align:center;">合计</td>
      <td class="content"><?php echo $huiyuan['bs'];?></td>
      <td class="content"><?php echo $huiyuan['zt'];?></td>
      <td class="content"><?php echo round($z_hy);?></td>
      <?php if ($_GET['power']==5 || $_GET['power']==''){?>
      <td class="content"><?php echo $huiyuan['zt'];?></td>
      <td class="content"><?php echo round($z_dl);?></td>
      <?php }?>      
      <?php if ($_GET['power']==6){?>
        <td class="content"></td>
        <td class="content"></td>
        <td class="content"><?php echo $z_tuiz;?></td>
        <td class="content"><?php echo $z_tuiz;?></td>
      <?php }?>
      <?php if ($_GET['power']==4 || $_GET['power']==6 || $_GET['power']==''){?>
      <td class="content"><?php echo $huiyuan['zt'];?></td>
      <td class="content"><?php echo round($z_zd);?></td>
      <?php }?>
      <?php if ($_GET['power']==5){?>
        <td class="content"></td>
        <td class="content"></td>
        <td class="content"><?php echo $z_tuiz;?></td>
        <td class="content"><?php echo $z_tuiz;?></td>
      <?php }?>
      <?php if ($_GET['power']==3 || $_GET['power']==5 || $_GET['power']==''){?>
      <td class="content"><?php echo $huiyuan['zt'];?></td>
      <td class="content"><?php echo round($z_gd);?></td>
      <?php }?>
      <?php if ($_GET['power']==4){?>
        <td class="content"></td>
        <td class="content"></td>
        <td class="content"><?php echo $z_tuiz;?></td>
        <td class="content"><?php echo $z_tuiz;?></td>
      <?php }?>
      <?php if ($_GET['power']==2 || $_GET['power']==4 || $_GET['power']==''){?>
      <td class="content"><?php echo $huiyuan['zt'];?></td>
      <td class="content"><?php echo round($z_fg);?></td>
      <?php }?>
      <?php if ($_GET['power']==3){?>
        <td class="content"></td>
        <td class="content"></td>
        <td class="content"><?php echo $z_tuiz;?></td>
        <td class="content"><?php echo $z_tuiz;?></td>
      <?php }?>
      <?php if ($_GET['power']==1 || $_GET['power']==3 || $_GET['power']==''){?>
      <td class="content"><?php echo $huiyuan['zt'];?></td>
      <td class="content"><?php echo round($z_fg);?></td>
      <?php if ($_GET['power']==2){?>
        <td class="content"></td>
        <td class="content"></td>
      <?php }?>
      <?php }?>
     </tr>
    </tbody>
   </table>
  </div>
      </td>
    </tr>
  </table>
</body>
<script type="text/javascript">
  var mode = 'Today';
  var type = 'Agent';
  ChangeMode(mode,type);
</script>
</html>
