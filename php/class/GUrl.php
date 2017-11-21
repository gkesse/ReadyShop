<?php   
    abstract class GUrl {
        //===============================================
        private function __construct() {
            
        }
        //===============================================
        public static function Instance() {
            $m_page = GConfig::Instance()->getData("page");
            if($m_page == "product") return GUrlProduct::Instance();
            else if($m_page == "category") return GUrlCategory::Instance();
            return null;
        }
        //===============================================
        abstract public function read();
        //===============================================
    }
?>