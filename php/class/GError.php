<?php   
    class GError {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() {
            
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GError();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function check() {
            $m_error = true;
            if(GConfig::Instance()->existData("db") == true) {
                if(GData::Instance()->exist() == true) {
                    $m_error = false;
                }
            }
            
            if($m_error == true) {
                GConfig::Instance()->addBitTag("site_name", "ReadyShop");
                GConfig::Instance()->addBitTag("title", "ERROR");
                GTemplate::Instance()->build("header.html", "error.html", "footer.html");
                GHeader::Instance()->setup("Erreur");
                GParser::Instance()->parse();
                print GPage::Instance()->getContent();
                exit();
            }
        }
        //===============================================
    }
?>