<?php

class OFI extends SampleDataGenerator
{
    private $listings = array();
    
    public function getListings()
    {
        return $this->listings;
    }
    
    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];
        $contactCount = $options['contactCount'];
        $listingCount = $options['listingCount'];
        $consultantCount = $options['consultantCount'];
        $id = $index + 1;
        $listing = rand($start + 1, $start + $listingCount);
        $this->listings[$id] = $listing;
        $dOpen = $this->randDate('2014-01-01', '2014-12-31');
        $tBegin = rand(0, 23) . ':' . rand(0, 59) . ':' . rand(0, 59);
        $tEnd = date('H:i:s', rand(strtotime($dOpen . ' ' . $tBegin), strtotime($dOpen . ' 23:59:59')));
        return array(
            'id' => $id,
            'author_id' => rand($start + 1, $start + $contactCount),
            'listing_id' => $listing,
            'ofi_consultant_id' => rand($start + 1, $start + $consultantCount),
            'd_open' => $dOpen,
            't_begin' => $tBegin,
            't_end' => $tEnd
        );
    }

    public function getTable()
    {
        return 'open_for_inspection';
    }

}
