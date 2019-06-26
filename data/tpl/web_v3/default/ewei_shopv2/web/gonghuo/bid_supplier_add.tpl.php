<?php defined('IN_IA') or exit('Access Denied');?><style type='text/css'>
    .select-group {height: 28px;padding-top:2px;}
</style>
<form class="form-horizontal form-validate" action="<?php  echo webUrl('gonghuo/bid_supplier_add')?>" method="post" enctype="multipart/form-data">
	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">添加竞价供货商</h4>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">选择供货商:</label>
                    <div class="col-sm-9 col-xs-12">
                        <select class="form-control" name="id" id="id">
                            <?php  if(is_array($list)) { foreach($list as $value) { ?>
                              <option value="<?php  echo $value['id'];?>"><?php  echo $value['name'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">保存</button>
                <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
            </div>
        </div>
    </div>
</form>
<!--6Z2S5bKb5piT6IGU5LqS5Yqo572R57uc56eR5oqA5pyJ6ZmQ5YWs5Y+4-->