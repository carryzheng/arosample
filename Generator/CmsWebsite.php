<?php

class CmsWebsite extends SampleDataGenerator
{
    private function randTitlePattem()
    {
        $pattems = array(
            "{PageTitle} - {WebsiteTitle}", "{WebsiteTitle}: {PageTitle}", "{PageTitle}"
        );
        
        return $this->randFromArray($pattems);
    }
    
    private function randLayout()
    {
        $layouts = array(
            "1 Column + Sidebar", "2 Column + Sidebar"
        );
        
        return $this->randFromArray($layouts);
    }
    
    public function buildData($options = array())
    {
        $index = $options['index'];
        return array(
            'id' => $index + 1,
            'url' => $this->randUrl(),
            'name' => $this->randString(10, 30),
            'title' => $this->randString(10, 30),
            'description' => $this->randString(30, 50),
            'keywords' => $this->randString(5, 7),
            'title_pattem' => $this->randTitlePattem(),
            'layout' => $this->randLayout(),
            'robots' => $this->randString(20, 40),
            'default_website' => $this->randBoolean()
        );
    }

    public function getTable()
    {
        return 'cms_website';
    }

}
