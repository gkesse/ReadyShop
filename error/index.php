<?php
    define("WEB_ROOT", $_SERVER["DOCUMENT_ROOT"]."/");
    require WEB_ROOT."php/class/GAutoloadRegister.php";
    GError::Instance()->check();
?>    