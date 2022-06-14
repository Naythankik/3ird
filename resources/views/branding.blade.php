<!DOCTYPE html>
<html>
<head>
    <title>Branding</title>
</head>
<body>
<form method="post" action="/nath" enctype="multipart/form-data">
    @csrf
    <input type="text" name="brand" ><br>
    <input type="file" name="brand_image">
    <button type="submit">Submit</button>
</form>
</body>
</html>