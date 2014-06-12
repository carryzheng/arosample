<?php

class ContactOfficeMemberMap extends SampleDataGenerator
{
    private $offices = array();
    private $members = array();
    
    private function shuffleArray($type, $count, $start)
    {
        $array = $type == 'office' ? $this->offices : $this->members;
        if (empty($array)) {
            for ($i = $start + 1; $i <= $count + $start; $i++) {
                $array[] = $i;
            }
            shuffle($array);
        }
    }
    
    public function buildData($options = array())
    {
        $officeCount = $options['officeCount'];
        $memberCount = $options['memberCount'];
        $start = $options['start'];
        return array(
            'office_id' => $start + rand(1, $officeCount),
            'member_id' => $start + rand(1, $memberCount),
            'created' => date('Y-m-d H:i:s')
        );
    }

    public function getTable()
    {
        return 'contact_office_member_map';
    }

}
