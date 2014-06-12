<?php

class Document extends SampleDataGenerator
{
    private function randCategory()
    {
        return rand(1, 15);
    }
    
    private function randType()
    {
        $types = array(
            "contact", "office", "property"
        );
        
        return $this->randFromArray($types);
    }
    
    private function randEntity($type, $start, $contactCount, $listingCount)
    {
        if ($type == 'contact') {
            return rand($start + 1, $start + $contactCount);
        }
        if ($type == 'property') {
            return rand($start + 1, $start + $listingCount);
        }
        return 0;
    }
    
    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];
        $contactCount = $options['contactCount'];
        $listingCount = $options['listingCount'];
        $type = $this->randType();
        $entityId = $this->randEntity($type, $start, $contactCount, $listingCount);
        
        $data = array(
            'id' => $index + 1,
            'file_id' => '96139fa6-cb5b-11e3-8c05-b8ca3a8fe385',
            'document_category_id' => $this->randCategory(),
            'document_library_id' => rand(1, 100),
            'type' => $type,
            'friendly_name' => $this->randString(7, 11),
            'description' => $this->randString(30, 50)
        );
        if ($entityId > 0) {
            $data['entity_id'] = $entityId;
        } else {
            $data['entity_id'] = null;
        }
        
        return $data;
    }

    public function getTable()
    {
        return 'document';
    }

}
