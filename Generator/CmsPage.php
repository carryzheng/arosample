<?php

class CmsPage extends SampleDataGenerator
{
    private $websitePageMap = array();
    private $restrictedPages = array();
    
    public function getWebsitePageMap()
    {
        return $this->websitePageMap;
    }
    
    public function getRestrictedPages()
    {
        return $this->restrictedPages;
    }
    
    private function randTemplate()
    {
        $templates = array(
            "Default", "Template 1"
        );
        
        return $this->randFromArray($templates);
    }
    
    private function randLayout()
    {
        $layouts = array(
            "1 Column + Sidebar", "2 Column + Sidebar"
        );
        
        return $this->randFromArray($layouts);
    }
    
    private function randSecurity()
    {
        $securities = array(
            "public", "restricted"
        );
        
        return $this->randFromArray($securities);
    }


    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];
        $websiteCount = $options['websiteCount'];
        $id = $index + 1;
        $websiteId = rand($start + 1, $start + $websiteCount);
        $this->websitePageMap[$websiteId][] = $id;
        $security = $this->randSecurity();
        if ($security == 'restricted') {
            $this->restrictedPages[] = $id;
        }
        return array(
            'id' => $id,
            'cms_website_id' => $websiteId,
            'url' => $this->randUrl(),
            'language' => 'en',
            'name' => $this->randString(5, 7),
            'title' => $this->randString(9, 11),
            'description' => $this->randString(30, 50),
            'keywords' => $this->randString(5, 9),
            'header_js_block' => $this->randString(10, 30),
            'footer_js_block' => $this->randString(10, 30),
            'header_css_block' => $this->randString(10, 30),
            'footer_css_block' => $this->randString(10, 30),
            'template' => $this->randTemplate(),
            'layout' => $this->randLayout(),
            'structure' => $this->randString(20, 50),
            'security' => $security,
            'hide_restricted' => $this->randBoolean(),
        );
    }

    public function getTable()
    {
        return 'cms_page';
    }

}
