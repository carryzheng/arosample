<?php

class CmsSiteMapItem extends SampleDataGenerator
{
    private $websiteItemMap = array();
    
    private function randTarget()
    {
        $targets = array(
            "_self", "_blank", "_parent", "_top"
        );
        
        return $this->randFromArray($targets);
    }
    
    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];
        $sitemapCount = $options['sitemapCount'];
        $sitePageMap = $options['sitePageMap'];
        $webSiteMap = $options['webSiteMap'];
        $id = $index + 1;
        $sitemapId = rand($start + 1, $start + $sitemapCount);
        $websiteId = $webSiteMap[$sitemapId];
        $pageId = 0;
        if (isset($sitePageMap[$websiteId])) {
            $pageId = $this->randFromArray($sitePageMap[$websiteId]);
        }
        $parentId = 0;
        if (isset($this->websiteItemMap[$websiteId])) {
            $parentId = $this->randFromArray($this->websiteItemMap[$websiteId]);
            if ($parentId == $id) {
                $parentId = 0;
            }
        }
        if (!isset($this->websiteItemMap[$websiteId])) {
            $this->websiteItemMap[$websiteId] = array();
        }
        $this->websiteItemMap[$websiteId][] = $id;
        $data = array(
            'id' => $id,
            'cms_sitemap_id' => $sitemapId,
            'name' => $this->randString(5, 7),
            'url' => $this->randUrl(),
            'target' => $this->randTarget()
        );
        if ($parentId > 0) {
            $data['parent_cms_sitemapitem_id'] = $parentId;
        } else {
            $data['parent_cms_sitemapitem_id'] = null;
        }
        if ($pageId > 0) {
            $data['cms_page_id'] = $pageId;
        } else {
            $data['cms_page_id'] = null;
        }
        
        return $data;
    }

    public function getTable()
    {
        return 'cms_sitemap_item';
    }

}
