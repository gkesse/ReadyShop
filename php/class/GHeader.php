<?php   
    class GHeader {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() {
            
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GHeader();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function setup($header) {
            GConfig::Instance()->setData("db", "header");
            GConfig::Instance()->setData("prefix", "header_");
            GConfig::Instance()->setData("header", $header);
            GData::Instance()->all();
            GParser::Instance()->addBlockTag("header_list");
        }
        //===============================================
    }
?>