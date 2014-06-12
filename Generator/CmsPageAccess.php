<?php

class CmsPageAccess extends SampleDataGenerator
{
    private $map = array();
    
    private function randGroup()
    {
        return rand(1, 25);
    }
    
    public function buildData($options = array())
    {
        $restrictedPages = $options['restrictedPages'];
        if (count($restrictedPages) == 0) {
            return array();
        }
        $pageId = $this->randFromArray($restrictedPages);
        if (!isset($this->map[$pageId])) {
            $this->map[$pageId] = array();
        }
        $groupId = $this->randGroup();
        if (in_array($groupId, $this->map[$pageId])) {
            return array();
        }
        
        $this->map[$pageId][] = $groupId;
        return array(
            'cms_page_id' => $pageId,
            'restricted_group_id' => $groupId
        );
    }

    public function getTable()
    {
        return 'cms_page_access';
    }

}
