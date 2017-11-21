<?php
    define("WEB_ROOT", $_SERVER["DOCUMENT_ROOT"]."/");
    require WEB_ROOT."php/class/GAutoloadRegister.php";
    GConfig::Instance()->setData("page", "category");
    GUrl::Instance()->read();

    GConfig::Instance()->addBitTag("site_name", "ReadyShop");
    GConfig::Instance()->addBitTag("title", "Categories");
        
    GConfig::Instance()->setData("db", "category");
    GConfig::Instance()->setData("prefix", "category_");
    GData::Instance()->filter();
    GError::Instance()->check();

    GConfig::Instance()->addTemplateTag("category_product", "category_product.html");    
    GTemplate::Instance()->build("header.html", "category.html", "footer.html");
    GParser::Instance()->addDataTag();

    GConfig::Instance()->setData("db", "product");
    GConfig::Instance()->setData("prefix", "product_");
    GData::Instance()->all();
    GParser::Instance()->addBlockTag("product_list");

    GHeader::Instance()->setup("Categories");
    GParser::Instance()->parse();
    print GPage::Instance()->getContent();
?>    