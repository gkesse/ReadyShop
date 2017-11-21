<?php   
    class GUrlCategory extends GUrl {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() {
            
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GUrlCategory();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function read() {
            $m_path = "1";
            if(isset($_GET["path"]) == true) {
                if($_GET["path"] != "") {
                    $m_path = $_GET["path"];
                }
            }
            GConfig::Instance()->setParam("id", $m_path);
        }
        //===============================================
    }
?>