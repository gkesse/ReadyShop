<?php   
    class GConfig {
        //===============================================
        private static $m_instance = null;
        private $m_dataMap = array();
        private $m_bitTag = array();
        private $m_templateTag = array();
        private $m_paramKey = array();
        private $m_paramVal = array();
        //===============================================
        private function __construct() {
            
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GConfig();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function setData($key, $data) {
            $this->m_dataMap[$key] = $data;          
        }
        //===============================================
        public function getData($key) {
            return $this->m_dataMap[$key];          
        }
        //===============================================
        public function setParam($key, $data) {
            $this->m_paramKey[] = $key;          
            $this->m_paramVal[] = $data;          
        }
        //===============================================
        public function getParamKey($id) {
            return $this->m_paramKey[$id];          
        }
        //===============================================
        public function getParamVal($id) {
            return $this->m_paramVal[$id];          
        }
        //===============================================
        public function existData($key) {
            return isset($this->m_dataMap[$key]);          
        }
        //===============================================
        public function addBitTag($tag, $value) {
            $this->m_bitTag[$tag] = $value;          
        }
        //===============================================
        public function getBitTag() {
            return $this->m_bitTag;          
        }
        //===============================================
        public function addTemplateTag($tag, $value) {
            $this->m_templateTag[$tag] = $value;          
        }
        //===============================================
        public function getTemplateTag() {
            return $this->m_templateTag;          
        }
        //===============================================
    }
?>