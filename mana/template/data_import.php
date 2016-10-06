<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>信息操作页面</title>
<link type="text/css" media="screen" charset="utf-8" rel="stylesheet" href="template/default/content/css/style.account-1.1.css" />
<link charset="utf-8" rel="stylesheet" href="template/default/content/css/personal.record-1.0.css" media="all" />
<script src="template/default/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script type="text/javascript"> 

</script>
<script type="text/javascript">
$(function(){
		$('tbody tr td input').click(function() {
            if ($(this).parent().parent().hasClass('selected')) {
                 $(this).parent().parent()
                    .removeClass('selected')
                    //.find(':checkbox').attr('checked',false);
            }else{
                $(this).parent().parent()
                    .addClass('selected')
                    //.find(':checkbox').attr('checked',true);
            }
        });
        // 如果复选框默认情况下是选择的，则高色.
        // $('table :checkbox:checked').parent().parent().addClass('selected');
        //简化:
        $('table :checkbox:checked').parents("tr").addClass('selected');
        //$('tbody>tr:has(:checked)').addClass('selected');

		//全选反选
		$("#CheckAll").toggle(function(){
			$(":checkbox").attr('checked',true);
			$(".t").addClass('selected');
		},function(){
			$(":checkbox").attr('checked',false);
			$(".t").removeClass('selected');
		});

		//鼠标滑过表格背景切换颜色
		$('.hover').hover(function(){
			$(this).find("td").addClass('bg');
		},function(){
			$(this).find("td").removeClass('bg');
		})
});

//判断是否选择了操作对象
function Sub(form){
	var j = 0;
	for(var i=0; i<form.elements.length; i++){
		if(form.elements[i].name == "choice[]"){
			if(form.elements[i].checked){
				j++;
			}
		}
	}
	if(j == 0){
		alert("请选择操作对象！");
		return false;
	}else{
		//确认是否要删除备份
		var r = confirm("此功能不可恢复,您确认要删除选中的备份文件吗？");
		return r == true ? true : false;
	}
}

//确认是否要导入数据
function Confirm(){
	var r = confirm("备份恢复功能将覆盖原来的数据,您确认要导入备份数据吗？");
	return r == true ? true : false;
}
</script>
</head>
<!--[if lt IE 7]><body class="ie6"><![endif]--><!--[if IE 7]><body class="ie7"><![endif]--><!--[if IE 8]><body class="ie8"><![endif]--><!--[if !IE]><!--><body><!--<![endif]-->
<div id="container" class="ui-container">
 
<div id="content" class="ui-content fn-clear" coor="default" coor-rate="0.02">
	<div class="ui-grid-21" coor="content">
		<div class="ui-grid-21 ui-grid-right record-tit" coor="title">
			<h2 class="ui-tit-page">数据库备份</h2>
			
			<div class="record-tit-amount">
				
              </p>
			</div>
		</div>
		
	</div>
	
	<form name="update" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=update">
		<div class="ui-grid-21 ui-grid-right fn-clear" id="J-table-consume" coor="consumelist">
			<div class="ui-tab">
												<div class="ui-tab-trigger"> 
					<ul class="fn-clear"> 
<li class="ui-tab-trigger-item ">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" class="ui-tab-trigger-text">数据备份</a></li>						
<li class="ui-tab-trigger-item  ui-tab-trigger-item-current"><a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=data_import" class="ui-tab-trigger-text">数据还原</a></li>
</ul>
				</div>
 
				<div class="ui-tab-container" id="myScene">
					<div class="ui-tab-container-item ui-tab-container-item-current">
						<table id="tradeRecordsIndex" class="ui-table">

							<thead>
								<tr>
									<th class="checkbox"></th>
									<th class="title">文件名</th>
									<th class="info">备份时间</th>
									<th class="info">卷号</th>
									<th class="action">操作</th>
								</tr>
							</thead>
							
							
							
							
							<tbody>

<?php
$i = 1;
foreach($bakfile as $tb){
?>																																							
<tr>
<td class="checkbox"><input type="checkbox" name="choice[]" value="<?php echo $tb; ?>" /></td>
<td class="title">
<?php echo $tb; ?>
</td>
<td class="info"><?php
                	//取得备份时间
			  		if(!preg_match("/_part/", $tb)){
						$str = explode(".", $tb);
						$time = substr($str[0],-10);
						//设置用在脚本中所有日期/时间函数的默认时区。
						Date_default_timezone_set("PRC");//
						echo date("Y-m-d h:i",$time);
			  		}else{
			  			//分卷
			  			$str = explode("_part", $tb);
						$time = substr($str[0],-10);
						//设置用在脚本中所有日期/时间函数的默认时区。
						Date_default_timezone_set("PRC");//
						echo date("Y-m-d h:i",$time);
			  		}
                ?></td>
				<td class="info"><?php
			  		//取分卷号
			  		if(!preg_match("/_part/", $tb)){
			  			echo "1";
			  		}else{
			  			$str = explode(".", $tb);
						echo substr($str[0],-1);
			  		}
		  		?></td>
									<td class="action"><a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=import_save&fn=<?php echo $tb; ?>" onClick="return Confirm()">还原</a></td>

</tr>					

<?}?>			
																									
</tbody>
		</table>
 
											</div>
					
					<div class="fn-clear">
						<!-- 图释 -->
					  <div class="iconTip fn-left" style="padding-left:5px;"><input type="checkbox" class="checkbox" value="1" name="checkall" id="CheckAll"/>全选 &nbsp;&nbsp;<input type="submit" name="do" value="删 除" onClick="return Sub(this.form)" />
						 
</div>
			
						<!-- /分页 -->
											</div>
				</div>
			</div>
 
		
		</div>
		<!-- /交易记录-->
 </form>		
	</div>
 
 
	
</div>


</div>

                            

</body>
</html>
 

