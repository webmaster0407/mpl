<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>test admin</title>
	@include('admin.inc.header_style')
</head>
<body>
	@include('admin.inc.aside')

	@yield('content')

	@include('admin.inc.footer_script')
</body>
</html>