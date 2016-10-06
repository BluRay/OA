<HTML>
<HEAD>
    <TITLE>通讯录</TITLE>
    <META content="MSHTML 6.00.2800.1276" name=GENERATOR>
    <META http-equiv=Content-Type content="text/html; charset=utf-8">
    <META http-equiv=Content-Style-Type content=text/css>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<script type="text/javascript" src="template/public/js/jquery.js"></script>
<script type="text/javascript" src="template/public/js/common.js"></script>

	<LINK href="template/public/css/mainWincn.css" type=text/css  media=screen rel=stylesheet>
<LINK href="template/public/css/mainWin.css" type=text/css  media=screen rel=stylesheet>
<LINK href="template/public/css/0219.css" type=text/css  media=screen rel=stylesheet>

    <base target="_self">
</HEAD>
<body marginwidth="0" topmargin="0" leftmargin="0" onLoad="onLoad()" marginheight="0"><style>
	*{font: 12px '}宋体'}
	.tab_suggest{border:1px solid #333; background:#fff; position:absolute; z-index:101; visibility: hidden;}
	.tab_suggest th, .tab_suggest td{font:12px '宋体'; font-weight:normal; height:17px; text-align:left; line-height:17px; padding:2px 3px; white-space:nowrap; cursor: default;}
	.tab_suggest td{color:#008000; text-align:right;}
	.tab_suggest tr.cur{background:#36c; color:#fff}
	.tab_suggest tr.cur td{color:#fff}
	.th_suggest{color:#FF0000}</style>
	
	
		<DIV ID=Title_bar>
			<DIV ID=Title_bar_Head>
				<DIV ID=Title_Head>
				</DIV>
				<DIV ID=Title>
					<img border="0" src="template/public/images/title_arrow.gif" />
					人员选择
				</DIV>
				<DIV ID=Title_End>
				</DIV>
			</DIV>
			<DIV ID=Title_bar_bg_up>
				<DIV ID=Title_bar_bg>
				</DIV>
			</DIV>
			<DIV ID=Title_bar_Tail>
				<DIV ID=Title_FuncBar>
					<ul>
						<LI CLASS=line></LI>
						<LI CLASS=title>
    <div onClick="window.close();" class="Btn">
        关闭
    </div>

</LI>
						<LI CLASS=line></LI>
						<LI CLASS=title>
    <div onClick="writeReceiver(true);" class="Btn">
       <a href="javascript:actForm.submit();">确认选择</a> 
    </div>

</LI>
							<LI CLASS=line id=allID></LI>
						
					</ul>
				</DIV>
			</DIV>
		</DIV>
		<DIV ID=MainArea>
		
			<CENTER>
<form method="post" name="actForm" action="admin.php?ac=phonesavesms&fileurl=sms">		
   <DIV CLASS=OutsideBorder>
    <DIV CLASS=InsideBorder>
        <DIV CLASS=OperateArea STYLE="float: right;">
            <DIV ID=SelectedHead>
                <img border="0" src="template/public/images/selected.gif" />
                内部通迅录
            </DIV>
            
			
			<div style="float:left; width:216px; height:320px;overflow:hidden;overflow-y:scroll;">
			
			<table  style="width:216px;" cellspacing="0" class="datalist" id="list">
				<?foreach ($result as $row) {?>
				<tr id="row_<?php echo $row['uid']?>">
					<td align="center"><input type="checkbox" name="vid[]" value="<?php echo $row['vid']?>" style="border:0px;" onClick="check_all_sms(this,<?php echo $row['vid']?>)"/></td>
					
				  <td><input type="hidden" name="sms<?php echo $row['vid']?>" value="<?php echo $row['name']?>" style="border:0px;" /><?php echo $row['name']?></td>
					<td><input type="hidden" name="phone<?php echo $row['vid']?>" value="<?php echo $row['phone']?>" style="border:0px;" /><?php echo $row['phone']?></td>
				</tr>
				<?}?>
				
				
		  </table>
			
			
		</div>	
			
			
			
        </DIV>
  
</DIV>
</DIV>
<!--<DIV>
    <ul STYLE="margin:5px; float:left; padding-top: 60px;">
        <LI><img onclick="UserMove (0);" border="0" src="images/btn_to_right.gif" /></LI>
        <LI></LI>
        <LI><img onclick="UserMove (1);" border="0" src="images/btn_to_left.gif" /></LI>
        <LI></LI>
        <LI><img onclick="UserMove (2);" border="0" src="images/btn_all_right.gif" /></LI>
        <LI></LI>
        <LI><img onclick="UserMove (3);" border="0" src="images/btn_all_left.gif" /></LI>
    </ul>
</DIV> -->

<DIV CLASS=OutsideBorder>
    <DIV CLASS=InsideBorder>
        <DIV CLASS=OperateArea STYLE="float: right;">
            <DIV ID=SelectedHead>
                <img border="0" src="template/public/images/selected.gif" />
                通迅录
            </DIV>
            <div style="float:left; width:216px; height:320px;overflow:hidden;overflow-y:scroll;">
			
			<table  style="width:216px;" cellspacing="0" class="datalist" id="list">
				<?foreach ($communication2 as $row) {?>
				<tr id="row_<?php echo $row['id']?>">
					<td align="center"><input type="checkbox" name="c1vid[]" value="<?php echo $row['id']?>" style="border:0px;" onClick="check_all_c1sms(this,<?php echo $row['id']?>)"/></td>
					<!--hidden -->
				  <td><input type="hidden" name="c1sms<?php echo $row['id']?>" value="<?php echo $row['person']?>" style="border:0px;" /><?php echo $row['company']?></td>
					<input type="hidden" name="c1phone<?php echo $row['id']?>" value="<?php echo $row['phone']?>" style="border:0px;" />
				</tr>
				<?}?>
				
				
		  </table>
			
			
		</div>	
        </DIV>
    </DIV>
</DIV>
</form>

<DIV CLASS=OutsideBorder>
    <DIV CLASS=InsideBorder>
        <DIV CLASS=OperateArea STYLE="float: right;">
            <DIV ID=SelectedHead>
                信息筛选
            </DIV>
           
			
			<table  style="width:216px;" cellspacing="0" class="datalist" id="list">
			<form method="post" name="actFormsearch" action="admin.php?ac=phonesms&fileurl=sms&smstype=msg">
			  <input type="hidden" name="weburl" value="admin.php?ac=phonesms&fileurl=sms&smstype=msg">
			   <input type="hidden" name="do" value="list">
			  <tr>
					<td align="center">关键词:</td>
					<!--hidden -->
				  <td height="40"><input type="text" name="keyword" value="<?php echo $keyword?>" style="width:160px;" ></td>
			  </tr>
				<tr>
					<td align="center">部&nbsp;&nbsp;&nbsp;&nbsp;门:</td>
					<!--hidden -->
				  <td height="40"><select name="department" style="width:160px;" >
						  <option value="" selected="selected"></option>
						 <?php echo get_realdepalist(0,$department,0)?>
			              </select></td>
				</tr>
				
				<tr>
					<td align="center"></td>
					<!--hidden -->
				  <td height="40"><div class=FuncBtnHead></div><input type="submit" name="s" class="submit" value="查找" />
                      <div class=FuncBtnTail></div></td>
				</tr>
			  </form>
		  </table>
			
			
			
        </DIV>
    </DIV>
</DIV>



			</CENTER>
		</DIV>
	</body>
</HTML>