<?php   
    class GData {
        //===============================================
        private static $m_instance = null;
        private $m_data = array();
        //===============================================
        private function __construct() {
            
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GData();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function getData() {
            return $this->m_data;
        }
        //===============================================
        public function all() {
            $m_file = GConfig::Instance()->getData("db").".json";
            $this->m_data = GJson::Instance()->getData($m_file);
        }
        //===============================================
        public function filter() {
            $m_file = GConfig::Instance()->getData("db").".json";
            $m_dataMap = GJson::Instance()->getData($m_file);
            
            $m_dataArr = array_filter($m_dataMap, function($data) {
                $m_filter = false;
                $m_key = GConfig::Instance()->getParamKey(0);
                $m_val = GConfig::Instance()->getParamVal(0);
                if($data[$m_key] == $m_val) {
                    $m_filter = true;
                }
                return $m_filter;
            });
            foreach($m_dataArr as $data) {
               $this->m_data = $data;
            }
        }
        //===============================================
        public function exist() {
            return (empty($this->m_data) == false);
        }
        //===============================================
    }
?>