<?php
if ($_GET['randomId'] != "mvw0E96Z4TqZflhHTNXQOJtx2hl4gWEPnql_49nDrtKN7_h3a8PkAefhCZP2VlWV") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
