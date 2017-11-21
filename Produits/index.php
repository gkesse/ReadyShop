<?php
    define("WEB_ROOT", $_SERVER["DOCUMENT_ROOT"]."/");
    require WEB_ROOT."php/class/GAutoloadRegister.php";
    GConfig::Instance()->setData("page", "product");
    GUrl::Instance()->read();
    
    GConfig::Instance()->addBitTag("site_name", "ReadyShop");
    GConfig::Instance()->addBitTag("title", "Produits");
    
    GConfig::Instance()->setData("db", "product");
    GConfig::Instance()->setData("prefix", "product_");
    GData::Instance()->filter(); 
    GError::Instance()->check();
    
    GTemplate::Instance()->build("header.html", "product.html", "footer.html");
    GParser::Instance()->addDataTag();
    
    GHeader::Instance()->setup("Produits");
    GParser::Instance()->parse();
    print GPage::Instance()->getContent();
?>    