<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<style>	
	.order_detail .fui-list-inner .title.has-address {		
		font-size: .7rem;		
		line-height: 1.2rem;		
		height: 1.2rem;		
		display: block;	
	}	
	.order_detail .fui-list-inner .text{		
		white-space: nowrap;		
		text-overflow: ellipsis;		
		overflow: hidden;	
	}	
	.order_detail .fui-list:before{		
		border: 0;	
	}	
	.order_detail .fui-list_title{		
		position: relative;		
		display: flex;		
		align-items: center;		
		line-height: normal;	
	}		
	.order_detail  .lineblock 
	{		
		position: relative;		
		overflow: hidden;	
	}	

	.order_detail  .lineblock:before {		
		content: "";		
		position: absolute;		
		left: .5rem;		
		top: 0;		
		right: .5rem;		
		height: 1px;		
		border-top: 1px solid #ebebeb;		
		-webkit-transform-origin: 0 100%;		
		-ms-transform-origin: 0 100%;		
		transform-origin: 0 100%;		
		-webkit-transform: scaleY(0.5);		
		-ms-transform: scaleY(0.5);		
		transform: scaleY(0.5);	
	}	

	.refuse_reason{		
		padding: 0.5rem;		
		background: #fdfce5;		
		/*background: #fff;*/		
		color: #999;		
		font-size: 0.7rem;		
		line-height: 1rem	
	}

	</style>

	<link rel="stylesheet" type="text/css" href="../addons/ewei_shopv2/template/mobile/default/static/css/orderdetail.css?v=2.0.0">

	<div class="fui-page cav order_detail">		

	<!-- <div class="fui-header">			
			
		<div class="title">订单详情</div>			

		<div class="fui-header-right"></div>		

	</div>	 -->	

		<div class="fui-content navbar <?php  echo $seckill_color;?>">			

		<!--状态-->			

		<div class="order_detail_header">				

			<div class="order_detail_ststus">					

				<div style="font-size: 0.85rem;">						
		           <!--  配货单详情 -->
				</div>

			</div>			

		</div>				
					
		<div class="fui-cell-group">

		</div>

	    <div>
	        <div style="padding:0.6rem;height:100%;min-height:10rem;width:100%;background: white;">
				<label class="fui-cell-info" >
				 配货单详情:<?php  echo $info['content'];?>
				</label>
			</div>
			<br/>
			<span style="float: right;"> 配货日期:<?php  echo $info['createtime'];?></span>
	
	    </div>	
					
	   </div>

   </div>

	<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>