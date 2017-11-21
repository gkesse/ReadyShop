<?php   
    class GUrlProduct extends GUrl {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() {
            
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GUrlProduct();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function read() {
            $m_path = "Machine_A_Cafe/Machine_A_Cafe_A_Dosette";
            if(isset($_GET["path"]) == true) {
                if($_GET["path"] != "") {
                    $m_path = $_GET["path"];
                }
            }
            GConfig::Instance()->setParam("path", $m_path);
        }
        //===============================================
    }
?>