<?php   
    class GParser {
        //===============================================
        private static $m_instance = null;
        private $m_tagKeys = array();
        private $m_tagVals = array();
        //===============================================
        private function __construct() {
            
        }
        //===============================================
        public static function Instance() {
            if(is_null(self::$m_instance)) {
                self::$m_instance = new GParser();  
            }
            return self::$m_instance;
        }
        //===============================================
        public function parse() {
            $this->addBitTag();
            $this->parseData();
        }
        //===============================================
        public function parseData() {
            $m_content = GPage::Instance()->getContent();
            $m_content = str_replace($this->m_tagKey, $this->m_tagVal, $m_content);
            GPage::Instance()->setContent($m_content);
        }
        //===============================================
        public function addDataTag() {
            $m_dataMap = GData::Instance()->getData();
            $m_prefix = GConfig::Instance()->getData("prefix");
            foreach($m_dataMap as $key => $value) {
                $m_tag = "{".$m_prefix.$key."}";
                if(is_array($value) == true) $m_value = join(" ", $value);
                else $m_value = $value;
                $this->m_tagKey[] = $m_tag;
                $this->m_tagVal[] = $m_value;
            }
        }
        //===============================================
        public function addBlockTag($tag) {
            $m_dataMap = GData::Instance()->getData();
            $m_prefix = GConfig::Instance()->getData("prefix");
            $m_oldBlock = GPage::Instance()->getBlock($tag);            
            $m_newBlock = "";
            
            foreach($m_dataMap as $m_dataArr) {
                $m_tags = array();
                $m_values = array();
                
                foreach($m_dataArr as $key => $value) {
                    $m_tags[] = "{".$m_prefix.$key."}";
                    if(is_array($value) == true) $m_values[] = join(" ", $value);
                    else $m_values[] = $value;
                    
                    if(GConfig::Instance()->existData("header") == true) {
                        $m_header = GConfig::Instance()->getData("header");
                        $m_tags[] = "{".$m_prefix."active}";
                        if($key == "name") {
                            if($value == $m_header) $m_values[] = "active";
                            else $m_values[] = "";
                        }
                    }

                }
                $m_newBlock .= str_replace($m_tags, $m_values, $m_oldBlock);
            }
            GPage::Instance()->setBlock($tag, $m_newBlock);
        }
        //===============================================
        public function addBitTag() {
            $m_bitTag = GConfig::Instance()->getBitTag();
            foreach($m_bitTag as $tag => $value) {
                $this->m_tagKey[] = "{".$tag."}";
                $this->m_tagVal[] = $value;
            }
        }
        //===============================================
    }
?>