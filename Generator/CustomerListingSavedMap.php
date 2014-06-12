<?php

class CustomerListingSavedMap extends SampleDataGenerator
{
    private $map = array();
    
    public function buildData($options = array())
    {
        $index = $options['index'];
        $contactId = $index + 1;
        $listingId = $index + 1;
        return array(
            'listing_id' => $listingId,
            'contact_id' => $contactId,
            'created' => date('Y-m-d H:i:s', time())
        );
    }

    public function getTable()
    {
        return 'contact_listing_saved_map';
    }

}
