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
		}else{ return true;}
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
	
	<form name="update" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" id="do" value="save" />
		<div class="ui-grid-21 ui-grid-right fn-clear" id="J-table-consume" coor="consumelist">
			<div class="ui-tab">
												<div class="ui-tab-trigger"> 
					<ul class="fn-clear"> 
<li class="ui-tab-trigger-item  ui-tab-trigger-item-current">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" class="ui-tab-trigger-text">数据备份</a></li>						
<li class="ui-tab-trigger-item "><a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=data_import" class="ui-tab-trigger-text">数据还原</a></li>
</ul>
				</div>
 
				<div class="ui-tab-container" id="myScene">
					<div class="ui-tab-container-item ui-tab-container-item-current">
						<table id="tradeRecordsIndex" class="ui-table">

							<thead>
								<tr>
									<th class="checkbox"></th>
									<th ></th>
									<th class="title">表名</th>
									<th class="checkbox"></th>
									<th ></th>
									<th class="title">表名</th>
									<th class="checkbox"></th>
									<th ></th>
									<th class="title">表名</th>
									<th class="checkbox"></th>
									<th ></th>
									<th class="title">表名</th>
								</tr>
							</thead>
							
							
							
							
							<tbody>
<tr>
<?php
$i = 1;
$m=0;
foreach($tbs as $tb){
$m++;
?>
																																								

<td class="checkbox"><input type="checkbox" name="choice[]" value="<?php echo $tb; ?>" /></td>
<td>
<?php echo $i; $i++; ?>
</td>
<td class="title"><a><?php echo $tb; ?></a></td>
<?php if($m%4==0){?>
</tr>
<tr>
<?php }?>						

<?}?>			
</tr>																									
</tbody>
		</table>
 
											</div>
					
					<div class="fn-clear">
						<!-- 图释 -->
					  <div class="iconTip fn-left" style="padding-left:5px;"><input type="checkbox" class="checkbox" value="1" name="checkall" id="CheckAll"/>全选 &nbsp;&nbsp;<input type="submit" name="sub" value="备份数据" onClick="return Sub(this.form)" />
						 
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
 

