<html>
<head>
<title>文件上传实例</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<form action="upload.php?name=<?php echo $_GET[name]?>&filenumber=<?php echo $_GET[filenumber]?>&officetype=<?php echo $_GET[officetype]?>" method="post" enctype="multipart/form-data">
<table border=0 cellPadding=3 cellSpacing=4 width=30%>
<tr>
<td width=10% nowrap>附件来源</td>
<td><input name="src" type="file"/></td>
</tr>
<tr>
<td colSpan=2 align=center><input type="submit" value="上传"></td>
</tr>
</table>
</form>
</body>
</html>
