<?php require_once 'header.tpl' ?>
<?php if(isset($_SESSION['success'])) { ?>
    <div class="alert"><?=$_SESSION['success']?></div>
    <?php unset($_SESSION['success']); ?>
<?php } ?>
<form action="/?q=upload" method="post" enctype="multipart/form-data" id="form-upload">
    <div>
        <span>Select JSON file to upload:</span>
        <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <input type="submit" value="Upload File" name="submit">
</form>
<?php require_once 'footer.tpl' ?>