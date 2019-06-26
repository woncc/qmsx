<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header">当前位置：<span class="text-primary">供货商报价详情</span></div>

<div class="page-content">

<form method='post' class='form-horizontal form-validate'>

 <input type="hidden" name="id" value="<?php  echo $info['id'];?>" />

	<div class="tabs-container">

		<div class="tabs">

			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#tab-basic" aria-expanded="true"> 基本信息 </a></li>
			</ul>

			<div class="tab-content">
				<div id="tab-basic" class="tab-pane active">
					<div class="form-group">
					    <label class="col-lg control-label">供货商:</label>
					    <div class="col-sm-9 col-xs-12">
					        <div class="form-control-static"><?php  echo $info['suppliername'];?></div>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-lg control-label">OPENID:</label>
					    <div class="col-sm-9 col-xs-12">
					        <div class="form-control-static"><?php  echo $info['openid'];?></div>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-lg control-label">商品名称:</label>
					    <div class="col-sm-9 col-xs-12">
					        <div class="form-control-static"><?php  echo $info['goodsname'];?></div>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-lg control-label">商品原价:</label>
					    <div class="col-sm-9 col-xs-12">
					        <div class="form-control-static"><?php  echo $info['marketprice'];?></div>
					    </div>
					</div>
                    <div class="form-group">
					    <label class="col-lg control-label">报价价格:</label>
					    <div class="col-sm-9 col-xs-12">
					        <div class="form-control-static"><?php  echo $info['bidprice'];?></div>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-lg control-label">审核状态:</label>
					    <div class="col-sm-9 col-xs-12">
					        <div class="form-control-static"><?php  echo $info['verify'];?></div>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-lg control-label">报价说明:</label>
					    <div class="col-sm-9 col-xs-12">
					        <div name="desc" class='form-control-static' rows="5" name="desc" readonly="readonly"><?php  echo $info['desc'];?></div>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-lg control-label">报价时间:</label>
					    <div class="col-sm-9 col-xs-12">
					        <div class="form-control-static"><?php  echo date('Y-m-d H;i:s',$info['createtime']);?></div>
					    </div>
					</div>
					<!-- <div class="form-group">
					    <label class="col-lg control-label">修改时间:</label>
					    <div class="col-sm-9 col-xs-12">
					        <div class="form-control-static"><?php  echo $info['updatetime'];?></div>
					    </div>
					</div>	 -->				
				</div>
			</div>
		</div>
	</div>

	<div class="form-group"></div>	

    <div class="form-group">
		<label class="col-lg control-label"></label>
		<div class="col-sm-9 col-xs-12">
			<!-- <input type="submit"  value="保存" class="btn btn-primary"/> -->
			<input type="button" class="btn btn-default" name="submit" onclick="history.back();" value="返回列表" />
		</div>
	</div>
</form>

</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--913702023503242914-->