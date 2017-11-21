<?php   
    class GTemplate {
        //===============================================
        private static $m_instance = null;
        //===============================================
        private function __construct() { 
            
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GTemplate();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function build() {
            $m_args = func_get_args();
            $m_content = "";
            foreach($m_args as $m_template) {
                $m_file = WEB_ROOT."templates/".$m_template;
                $m_content .= file_get_contents($m_file);
            }
            GPage::Instance()->setContent($m_content);
            $this->add();
        }
        //===============================================
        public function add() {
            $m_templateTag = GConfig::Instance()->getTemplateTag();
            if(empty($m_templateTag) == true) return;
            $m_content = "";
            foreach($m_templateTag as $tag => $template) {
                $m_tag = "{".$tag."}";
                $m_file = WEB_ROOT."templates/".$template;
                $m_value = file_get_contents($m_file);
                $m_content = GPage::Instance()->getContent();
                $m_content = str_replace($m_tag, $m_value, $m_content);
                GPage::Instance()->setContent($m_content);
            }
            GPage::Instance()->setContent($m_content);
        }
        //===============================================
    }
?>