<?php

class CmsSiteMap extends SampleDataGenerator
{
    private $webSiteMap = array();
    
    public function getWebSiteMap()
    {
        return $this->webSiteMap;
    }
    
    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];
        $websiteCount = $options['websiteCount'];
        $websiteId = rand($start + 1, $start + $websiteCount);
        $id = $index + 1;
        $this->webSiteMap[$id] = $websiteId;
        return array(
            'id' => $id,
            'cms_website_id' => $websiteId,
            'name' => $this->randString(7, 9),
            'sort' => $index + 1
        );
    }

    public function getTable()
    {
        return 'cms_sitemap';
    }

}
