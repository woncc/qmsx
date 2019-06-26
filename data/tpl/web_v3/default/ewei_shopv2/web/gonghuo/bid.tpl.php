<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>    
.popover{        
	width:170px;        
	font-size:12px;        
	line-height: 21px;        
	color: #0d0706;    
}    
.popover span{
	color: #b9b9b9;   
}    
.nickname{
	display: inline-block;        
	max-width:200px;        
	overflow: hidden;        
	text-overflow:ellipsis;        
	white-space: nowrap;        
	vertical-align: middle;    
}
.tooltip-inner{        
	border:none;    
}
</style>
<div class="page-header">当前位置：<span class="text-primary">供货商竞价列表</span></div>
<div class="page-content">    
<div class="fixed-header"> 
	<div style="width:25px;"></div>        
	<div style="width:150px;">供货商</div>
	<!-- <div class="flex1">openid</div>  -->
	<div class="flex1">商品名称</div>
	<div class="flex1">商品原价</div>
	<div class="flex1">商品竞价</div>
	<div class="flex1">涨跌</div>
	<div class="flex1">已读未读</div>
	<div class="flex1">是否审核</div>
	<div class="flex1">创建时间</div>   
	<div class="flex1">修改时间</div>            
	<div style="width: 125px;text-align: center;">操作</div>    
</div>    
<form action="./index.php" method="get" class="form-horizontal table-search" role="form">
	<input type="hidden" name="c" value="site"/>
	<input type="hidden" name="a" value="entry"/>
	<input type="hidden" name="m" value="ewei_shopv2"/>
	<input type="hidden" name="do" value="web"/>
	<input type="hidden" name="r" value="gonghuo.bid"/>
	<input type="hidden" name="id" value="<?php  echo $id;?>"/>
	<div class="page-toolbar">
		<div class="input-group col-sm-6 pull-right">                
			<input type="text" class="form-control " name="title" value="<?php  echo $_GPC['title'];?>" placeholder="商品名称">
			<span class="input-group-btn">
				<button class="btn btn-primary" type="submit"> 搜索</button>
				<!-- <button type="submit" name="export" value="1" class="btn btn-success ">导出</button> -->
			</span>
		</div>
	</div>
</form>    
<?php  if(empty($list)) { ?>        
<div class="panel panel-default">
  <div class="panel-body empty-data">未查询到相关数据</div>        
</div>    
<?php  } else { ?>        
<div class="row">            
<div class="col-md-12">                
	<!-- <div class="page-table-header">
	<input type="checkbox">
	<div class="btn-group">
	  <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('gonghuo/delete')?>">
	  <i class="icow icow-shanchu1"></i> 批量删除
	  </button>
	</div>
	</div>-->             
	<table class="table table-responsive">                    
	<thead>                    
	<tr>
	<th style="width:25px;"></th>                        
	<th style="width:150px;">供货商</th> 
	<!-- <th style="width:180px;">openid</th> -->
	<th style="">商品名称</th>
	<th style="">商品原价</th>
	<th style="">商品竞价</th>
	<th style="">涨跌</th>
	<th style="">已读未读</th>
	<th style="">是否审核</th>
	<th style="">创建时间</th>
	<th style="">修改时间</th>
	<th style="width: 125px;text-align:center;">操作</th>                    
	</tr>
	</thead>
		<tbody>
		<?php  if(is_array($list)) { foreach($list as $row) { ?>                        
		<tr>
		<td style="position: relative; "><input type='checkbox' value="<?php  echo $row['id'];?>" class="checkone"/></td>                
		<td style="overflow: visible">
			<span><?php  echo $row['suppliername'];?></span>                           
		</td> 
		<!-- <td>
			<span><?php  echo $row['openid']?></span>                          
		</td>       -->                     
		<td>
			<span><?php  echo $row['goodsname']?></span>                          
		</td> 
		<td>
	    	<span><?php  echo $row['marketprice']?></span>
		</td>
		<td>
			<a href='javascript:;' data-toggle='ajaxEdit' data-href="<?php  echo webUrl('gonghuo/change',array('type'=>'bidprice','id'=>$row['id']))?>" ><?php  echo $row['bidprice'];?></a>
            <i class="icow icow-weibiaoti-- " data-toggle="ajaxEdit2"></i>
		</td>
		<td>
			<span><?php  echo $row['change'];?></span>
		</td>
		<td>
		   <span class='label <?php  if($row['isread']==1) { ?>label-primary<?php  } else { ?>label-default<?php  } ?>'

                  <?php if(cv('gonghuo.quote')) { ?>

                      data-toggle='ajaxSwitch'

                      data-switch-value='<?php  echo $row['isread'];?>'

                      data-switch-value0='0|未读|label label-default|<?php  echo webUrl('gonghuo/isread',array('isread'=>1,'type'=>'bid','id'=>$row['id']))?>'

                      data-switch-value1='1|已读|label label-primary|<?php  echo webUrl('gonghuo/isread',array('isread'=>0,'type'=>'bid','id'=>$row['id']))?>'

                  <?php  } ?> >

                  <?php  if($row['isread']==1) { ?>已读<?php  } else { ?>未读<?php  } ?>

            </span>
		</td>
		<td>
			<span><?php  echo $row['verify']?></span>                          
		</td>  
		<td>
			<span style="text-align: center;">
			<?php  echo date('Y-m-d',$row['createtime'])?>
			  <br/>
			<?php  echo date('H:i:s',$row['createtime'])?>
			</span>                          
		</td> 
		<td>
			<span>
			<?php  echo $row['updatetime'];?>
			</span>               
		</td>    

		<td style="overflow:visible;text-align: center;">                                
			<div class="btn-group">                                        
				<a class="btn  btn-op btn-operation" href="<?php  echo webUrl('gonghuo/bid_info',array('id' => $row['id']));?>" title="">
				<span data-toggle="tooltip" data-placement="top" title="" data-original-title="详情">
					<i class='icow icow-chakan2'></i>
				</span>
				</a>
				<?php  if($row['verify']=='未审核') { ?>
					<a class="btn btn-op btn-operation" data-toggle='ajaxRemove' href="<?php  echo webUrl('gonghuo/verify',array('id' => $row['id'],'verify'=>1));?>" data-confirm="确定审核通过吗？">
						<span data-toggle="tooltip" data-placement="top" title="通过" data-original-title="通过">
						   <i class='icow icow-chenggong'></i>
						</span>                                        
					</a>
					<a class="btn btn-op btn-operation" data-toggle='ajaxRemove' href="<?php  echo webUrl('gonghuo/verify',array('id' => $row['id'],'verify'=>2));?>" data-confirm="确定审核拒绝吗？">
						<span data-toggle="tooltip" data-placement="top" title="拒绝" data-original-title="拒绝">
						   <i class='icow icow-shibai'></i>
						</span>                                        
					</a>
					<?php  } else { ?>

				<?php  } ?>                             
			</div>                            
		</td>
		</tr>
		<?php  } } ?>                    
		</tbody>                    
		<tfoot>                    
			<tr>                        
				<!--<td><input type="checkbox"></td>-->            
				<td colspan="7">                            
					<!-- <div class="btn-group">                                
					<?php if(cv('gonghuo.bid_delete')) { ?>
						<button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('gonghuo/delete')?>">
						<i class="icow icow-shanchu1"></i> 批量删除                                
						</button>
					<?php  } ?>                                                        
					</div>  -->                       
				</td>                        
				<td colspan="3" style="text-align: right"><?php  echo $pager;?>                        
				</td>                    
			</tr>                    
		</tfoot>                
	</table>            
	</div>        
</div>    
<?php  } ?>
<div class="form-group">
	<label class="col-lg control-label"></label>
	<div class="col-sm-9 col-xs-12">
	    <input type="button" class="btn btn-default" name="submit" onclick="history.back();" value="返回列表" />
	</div>
</div>
</div>
<script type="text/javascript">

$(document).on("click", '[data-toggle="ajaxEdit2"]',

        function (e) {

            var _this = $(this)

            $(this).addClass('hidden')

            var obj = $(this).parent().find('a'),

                url = obj.data('href') || obj.attr('href'),

                data = obj.data('set') || {},

                html = $.trim(obj.text()),

                required = obj.data('required') || true,

                edit = obj.data('edit') || 'input';

            var oldval = $.trim($(this).text());

            e.preventDefault();



            submit = function () {

                e.preventDefault();

                var val = $.trim(input.val());

                if (required) {

                    if (val == '') {

                        tip.msgbox.err(tip.lang.empty);

                        return;

                    }

                }

                if (val == html) {

                    input.remove(), obj.html(val).show();

                    //obj.closest('tr').find('.icow').css({visibility:'visible'})

                    return;

                }

                if (url) {

                    $.post(url, {

                        value: val

                    }, function (ret) {

                        ret = eval("(" + ret + ")");

                        if (ret.status == 1) {

                            obj.html(val).show();

                        } else {

                            tip.msgbox.err(ret.result.message, ret.result.url);

                        }

                        input.remove();

                    }).fail(function () {

                        input.remove(), tip.msgbox.err(tip.lang.exception);

                    });

                } else {

                    input.remove();

                    obj.html(val).show();

                }

                obj.trigger('valueChange', [val, oldval]);

            },

            obj.hide().html('<i class="fa fa-spinner fa-spin"></i>');

            var input = $('<input type="text" class="form-control input-sm" style="width: 80%;display: inline;" />');

            if (edit == 'textarea') {

                input = $('<textarea type="text" class="form-control" style="resize:none;" rows=3 width="100%" ></textarea>');

            }

            obj.after(input);

            input.val(html).select().blur(function () {

                submit(input);

                _this.removeClass('hidden')

            }).keypress(function (e) {

                if (e.which == 13) {

                    submit(input);

                    _this.removeClass('hidden')

                }
            });
        })

</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>