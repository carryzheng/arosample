<?php

class MemberGroup extends SampleDataGenerator
{
    
    private function randGroup()
    {
        return rand(1, 12);
    }
    
    public function buildData($options = array())
    {
        $start = $options['start'];
        $memberCount = $options['memberCount'];
        return array(
            'member_id' => $start + rand(1, $memberCount),
            'group_id' => $this->randGroup(),
        );
    }

    public function getTable()
    {
        return 'member_group_map';
    }

}
