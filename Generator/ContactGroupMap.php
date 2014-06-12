<?php

class ContactGroupMap extends SampleDataGenerator
{
    private function randGroup()
    {
        return rand(1, 47);
    }
    
    public function buildData($options = array())
    {
        $contactCount = $options['contactCount'];
        $start = $options['start'];
        return array(
            'contact_id' => $start + rand(1, $contactCount),
            'group_id' => $this->randGroup(),
            'dt_unsubscribing' => $this->randDate('2014-01-01', '2014-12-31'),
            'created' => date('Y-m-d H:i:s', time())
        );
    }

    public function getTable()
    {
        return 'contact_group_map';
    }

}
