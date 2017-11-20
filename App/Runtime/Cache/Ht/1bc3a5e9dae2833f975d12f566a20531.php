<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link href="/minimeidea_duo/Public/ht/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/minimeidea_duo/Public/ht/js/jquery.js"></script>
<script type="text/javascript" src="/minimeidea_duo/Public/ht/js/action.js"></script>
<script type="text/javascript" src="/minimeidea_duo/Public/plugins/xheditor/xheditor-1.2.1.min.js"></script>
<script type="text/javascript" src="/minimeidea_duo/Public/plugins/xheditor/xheditor_lang/zh-cn.js"></script>
<script>
if(<?= $_SESSION['appkey'];?> == 1607 && <?= $id;?> <= 0){
	$(function(){
		var id = $('#city').val();
		aaa_china_city_ajax(id,'quyu');
	})
}
</script>
<style>
  .pro_2_logo{width:<?php echo $logo['width'];?>px; height:<?php echo $logo['height'];?>px;}
  .pro_2_vip{width:<?php echo $vip_width;?>px; height:<?php echo $vip_height;?>px;}
</style>
</head>
<body>

<div class="aaa_pts_show_1">【 店铺管理 】</div>

<div class="aaa_pts_show_2">
    

    <div class="aaa_pts_3">
      <form action="<?php echo U('Shangchang/add');?>" method="post" onsubmit="return ac_from();" enctype="multipart/form-data">
      <ul class="aaa_pts_5">
         <li>
         <div style="color:#c00; font-size:14px; padding-left:20px;">
            说明：店铺添加修改
         </div>
         </li>
         <li>
            <div class="d1">店铺名称:</div>
            <div>
              <input class="inp_1" name="name" id="name" value="<?php echo ($shangchang["name"]); ?>"/>
            </div>
         </li>
         
         <li>
          <div class="d1">所 在 地:</div>
          <div>
				    <select class="inp_1 inp_3" id="sheng" name="sheng" onchange="china_city_ajax(this.value,'city')">
			      <option value="">省份</option>
				      <?php echo ($output_sheng); ?>
            </select>
            <select class="inp_1 inp_3" name="city" id="city" onchange="china_city_ajax(this.value,'quyu')">
			      <option value="">城市</option>
              <?php echo ($output_city); ?> 
            </select>
            <select class="inp_1 inp_3"  id="quyu" name="quyu">
			        <option value="">区</option>
              <?php echo ($output_quyu); ?> 
            </select>
            <div style="width:100%; margin-top:5px;">
              <input class="inp_1" name="address" id="address" value="<?php echo ($shangchang["address"]); ?>"/>
            </div>
          </div>
         </li>
         <li>
            <div class="d1">经纬度:</div>
            <div>
              <input class="inp_1" name="location" id="location" value="<?php echo ($shangchang["location_x"]); ?>,<?php echo ($shangchang["location_y"]); ?>"/>
              <input type="button" value="选择位置" class="aaa_pts_web_3" style="margin-left:15px;" onclick="win_open('<?php echo U('Baidumap/index');?>',1280,800)">
            </div>
         </li>
         <li>
            <div class="d1">联系电话:</div>
            <div>
              <input class="inp_1" name="tel" id="tel" value="<?php echo ($shangchang["tel"]); ?>"/>
              &nbsp;&nbsp;&nbsp;“11位的手机号”或者按 “区号加电话号码” 的格式，例如“02028783721”
            </div>
         </li>
         <li>
            <div class="d1">负责人:</div>
            <div>
              <input class="inp_1" name="uname" id="uname" value="<?php echo ($shangchang["uname"]); ?>"/>
            </div>
         </li>
         <li>
            <div class="d1">负责人手机:</div>
            <div>
              <input class="inp_1" name="utel" id="utel" value="<?php echo ($shangchang["utel"]); ?>"/>
              &nbsp;&nbsp;&nbsp;“11位的手机号”
            </div>
         </li>
         <li>
            <div class="d1">QQ:</div>
            <div>
              <input class="inp_1" name="qq" id="qq" value="<?php echo ($shangchang["qq"]); ?>"/>
           
            </div>
         </li>

          <li>
            <div style="color:#c00; font-size:14px; padding-left:20px;">logo大小：100px * 100px 或者等比例,限1000*1000以下</div>
         </li>
         <li>
            <div class="d1">店铺LOGO:</div>
            <div>
              <?php if ($shangchang['logo']) { ?>
                  <img src="/minimeidea_duo/Data/<?php echo $shangchang['logo']; ?>" width="80" height="80" style="margin-bottom: 3px;" /><br />
              <?php } ?>
              <input type="file" name="logo" id="logo" style="width:160px;" />
            </div>
         </li>
         
         <li>
            <div class="d1">店铺介绍:</div>
            <div>
              <textarea class="inp_1 inp_2" name="content" id="content"/><?php echo ($shangchang["content"]); ?></textarea>
            </div>
         </li>
<?php if($_SESSION['admininfo']['qx']==4){ ?>
         <li>
            <div class="d1">排序:</div>
            <div>
              <input class="inp_1" name="sort" id="sort" value="<?php echo ($shangchang["sort"]); ?>"/> &nbsp;&nbsp;
            </div>
         </li>
<?php }?>
         <li>
            <div class="d1">状态:</div>
            <div>
                <input type="checkbox" name="status" <?php echo !$shangchang['status'] && $id>0 ? null : 'checked="checked"' ?>/> 显示/隐藏
            </div>
         </li>
         <li><input type="submit" name="submit" value="提交" class="aaa_pts_web_3" border="0">
            <input type="hidden" name="id" value="<?php echo ($shangchang["id"]); ?>">
         </li>
      </ul>
      </form>
         
    </div>
    
</div>
<script>
function ac_from(){

  var name=document.getElementById('name').value;
  
  if(name.length<3){
	  alert('店铺名称不能少于3个字符');
	  return false;
	  } 
  
  var sheng=document.getElementById('sheng').value;
  var city=document.getElementById('city').value;
  if(!sheng || !city){
	  alert('请选择区域');
	  return false;
	} 
  
  var utel=document.getElementById('utel').value;
  if(utel!=''){
	  if(!utel.match(/^[0-9]{11}$/)){
		  alert('负责人手机号码格式不正确');
		  return false;
		 }
  } 
  
}

//初始化编辑器
$('#content').xheditor({
  skin:'nostyle' ,
  upImgUrl:'<?php echo U("Upload/xheditor");?>'
});

//区域选择
function china_city_ajax(id,obj_id){
   $('#district').html('<option value="">区</option>');
   $.ajax({
		 url:'<?php echo U("Public/china_city");?>',
		 type:'GET',
		 timeout:30000,
		 data:{'id':id},
		 dataType:"json",
		 error: function(){
			$('#loding').hide();
			alert('请求失败，请检查网络');
		 },
		 success:function(data){
			var text=obj_id=='city' ? '<option value="">城市</option>' : '<option value="">区</option>';
			$.each(data,function (a,b){
				text+='<option value="'+b.id+'">'+b.name+'</option>';
			});
			$('#'+obj_id).html(text);
		 }
	 });
}

</script>
</body>
</html>