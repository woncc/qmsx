<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<script src="./resource/js/jquery-timepicker.js"></script>
<style>
     .Hunter-time-picker{position:absolute;border:2px solid #c9cbce;width:390px;background:#fff;z-index:999999;font-size:0}.Hunter-time-picker:before,.Hunter-time-picker:after{content:'';display:block;width:0;height:0;border-width:10px;border-style:solid;position:absolute;left:20px;z-index:999999}.Hunter-time-picker:before{border-color:transparent transparent #fff;top:-17px;z-index:9999999}.Hunter-time-picker:after{border-color:transparent transparent #c9cbce;top:-20px}.Hunter-time-picker *{box-sizing:border-box;margin:0 auto;padding:0;color:#666;font-family:microsoft yahei;font-size:14px}.Hunter-time-picker ul{list-style:none}.Hunter-time-picker ul li{display:inline-block;position:relative;margin:4px;cursor:pointer}.Hunter-time-picker p{font-weight:700;padding:0 4px;margin-top:4px;margin-bottom:10px}.Hunter-time-picker .line{width:340px;margin:0 auto;margin-top:4px;border-bottom:1px solid #d8d8d8}.Hunter-time-picker .Hunter-wrap{position:relative;width:100%;background:#fff;padding:9px}.Hunter-time-picker .Hunter-hour-name{display:inline-block;width:50px;height:30px;text-align:center;line-height:30px;position:relative;background-color:#f5f5f5}.Hunter-time-picker .Hunter-hour-name:hover{color:#002dff}.Hunter-time-picker .Hunter-hour.active{z-index:999999999}.Hunter-time-picker .active .Hunter-hour-name{color:#fff;background-color:#3a7adb}.Hunter-time-picker .Hunter-minute-wrap{display:none;border:1px solid #d8d8d8;background:#fff;position:absolute;top:29px;width:370px;padding:10px 10px 5px}.Hunter-time-picker .Hunter-minute{width:50px;height:30px;text-align:center;line-height:30px;color:#999;background-color:#f5f5f5;overflow:hidden;white-space:nowrap;text-overflow:ellipsis}.Hunter-time-picker .Hunter-minute:hover{color:#002dff}.Hunter-time-picker .Hunter-minute.active{color:#fff;background-color:#3a7adb}.Hunter-time-picker .Hunter-clean-btn{width:108px;height:30px;background-color:#3a7adb!important;color:#fff;background-image:none!important;border:5px solid #3a7adb;border-radius:0}.Hunter-time-picker .Hunter-clean-btn:hover{background-color:#0b4b94!important;border-color:#3a7adb}
        .inputbox{ border:0.5px solid #378888;}
        .submit{margin-left: 20px;margin-top: 15%;}
</style>

<div class="page-header">
    当前位置：<span class="text-primary">下单时间管理</span>
</div>

<div class="page-content">
    <form action="" method="post" class="form-validate" id="form">
        <div class="table" id="datelist">
            <?php  if(is_array($date)) { foreach($date as $key => $vo) { ?>
                <div style="margin-left: 20px;">
                    <input type="text" class="time inputbox" name="start[]" value="<?php  echo $vo['0'];?>" readonly />
                    至
                   <input type="text" class="time inputbox" name="end[]" value="<?php  echo $vo['1'];?>" readonly />
                   <button onclick="$(this).parent().remove();" class="btn btn-default">删除</button>
                </div>
            <?php  } } ?>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">提示内容:</label>
            <div class="col-sm-9 col-xs-12">
                <textarea name="tips" id="tips" class="form-control richtext valid" rows="5" aria-invalid="false" value="<?php  echo $data['tips'];?>"><?php  echo $tips;?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">显示原价:</label>
            <div class="col-sm-9 col-xs-12">
                <label class="radio-inline"><input type="radio" name="isshow" value="1" <?php  if($isshow==1) { ?>checked<?php  } ?>>显示</label>
                <label class="radio-inline" ><input type="radio" name="isshow" value="0" <?php  if($isshow==0) { ?>checked<?php  } ?>>隐藏</label>
                <span class="help-block">前端页面竞价和报价页面是否显示原价</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12 col-xs-12">
                <input onclick="addItem()" class="btn btn-default" value="添加"/>
                <input id="submit" class="btn btn-success" value="保存"/>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">

addDate();

function addItem(){
    var _str = '<div style="margin: 20px">\n' +
        '        <input type="text" class="time inputbox" name="start[]" readonly > 至\n' +
        '        <input type="text" class="time inputbox" name="end[]" readonly >\n' +
        '        <button onclick="$(this).parent().remove();" class="btn btn-default">删除</button>\n' +
        '    </div>';
    $('#datelist').append(_str);
    addDate();
}

function  addDate() {
    $(".time").hunterTimePicker();
}

$('#submit').click(function(){

    var start =[];
    var end =[];
    var tips = $('#tips').val();
    var isshow = $("input[name='isshow']:checked").val();

    $("input[name='start[]']").each(function(){
        start.push($(this).val());
    });
   
    $("input[name='end[]']").each(function(){
        end.push($(this).val());
    });

    $.post("<?php  echo webUrl('sysset/ordersetting')?>", {start:start,end:end,tips:tips,isshow:isshow}, function (data) 
    {
        //console.log(data);
        if(data.result.status==0)
        {
           tip.msgbox.suc("修改失败");
        }else{
           tip.msgbox.suc("修改成功");
        }
     
    }, "json");
});

</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
