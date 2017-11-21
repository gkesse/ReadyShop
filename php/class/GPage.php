<?php   
    class GPage {
        //===============================================
        private static $m_instance = null;
        private $m_content = "";
        //===============================================
        private function __construct() {
            
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GPage();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function setContent($content) {
            $this->m_content = $content;          
        }
        //===============================================
        public function getContent() {
            return $this->m_content;          
        }
        //===============================================
        public function getBlock($tag) {
            $m_pattern = '#<!-- START '.$tag .' -->(.+?)<!-- END '.$tag .' -->#si';
            preg_match ($m_pattern, $this->m_content, $m_block);
            return $m_block[1];
        }
        //===============================================
        public function setBlock($tag, $block) {
            $m_pattern = '#<!-- START '.$tag .' -->(.+?)<!-- END '.$tag .' -->#si';
            preg_match ($m_pattern, $this->m_content, $m_block);
            $m_content = str_replace($m_block[0], $block, $this->m_content);
            $this->m_content = $m_content;
        }
        //===============================================
    }
?>