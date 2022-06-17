<!DOCTYPE html>
<html>
<head>
    <title>Welcome to SELECTED GEEKS PHP Challenge</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <form action="/?q=upload" method="post" enctype="multipart/form-data" id="form-upload">
        <div>
            <span>Select JSON file to upload:</span>
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>