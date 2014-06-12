<?php

class ListingConsultantMap extends SampleDataGenerator
{
    private function randRole()
    {
        return rand(1, 4);
    }
    
    public function buildData($options = array())
    {
        $start = $options['start'];
        $consultantCount = $options['consultantCount'];
        $listingCount = $options['listingCount'];
        return array(
            'listing_id' => rand($start + 1, $start + $listingCount),
            'role_id' => $this->randRole(),
            'member_id' => rand($start + 1, $start + $consultantCount),
            'notes' => $this->randString(20, 50),
            'dt_linked' => date('Y-m-d H:i:s', time()),
            'priority' => $this->randBoolean()
        );
    }

    public function getTable()
    {
        return 'listing_consultant_map';
    }

}
