<!DOCTYPE html>
<html>
<head>
    <title>Welcome to SELECTED GEEKS PHP Challenge</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <div class="container">
        <div class="menu">
            <ul>
                <li>#</li>
                <li>
                    <a href="/">Upload File</a>
                </li>
                <li>
                    <a href="/?q=family">Family</a>
                </li>
                <li>
                    <a href="/?q=address">Address</a>
                </li>
            </ul>
        </div>
        <?php if(isset($_SESSION['success'])) { ?>
            <div class="alert"><?=$_SESSION['success']?></div>
            <?php unset($_SESSION['success']); ?>
        <?php } ?>