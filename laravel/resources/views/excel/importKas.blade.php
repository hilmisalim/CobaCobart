<!DOCTYPE html>
<html>
<head>
	<title>Import Excel</title>
</head>
<body>
	<form action="postImport" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="file" name="kas">
		<input type="submit" value="Import">
	</form>
</body>
</html>