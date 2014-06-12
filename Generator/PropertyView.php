<?php

class PropertyView extends SampleDataGenerator
{
    private function randSource()
    {
        return rand(1, 18);
    }
    
    private function randType()
    {
        $types = array(
            "Enquiry", "OFI", "Private Inspection"
        );
        
        return $this->randFromArray($types);
    }
    
    public function buildData($options = array())
    {
        $start = $options['start'];
        $contactCount = $options['contactCount'];
        $listings = $options['listings'];
        $ofi = $this->randFromArray(array_keys($listings));
        $listing = $listings[$ofi];
        
        return array(
            'contact_id' => rand($start + 1, $start + $contactCount),
            'listing_id' => $listing,
            'author_id' => rand($start + 1, $start + $contactCount),
            'source_id' => $this->randSource(),
            'note' => $this->randString(20, 50),
            'date' => $this->randDate('2014-01-01', '2014-12-31'),
            'type' => $this->randType(),
            'open_for_inspection_id' => $ofi,
        );
    }

    public function getTable()
    {
        return 'property_view';
    }

}
