<?php
class Communication extends SampleDataGenerator
{
    private function randType()
    {
        return rand(1, 9);
    }
    
    private function randDirection()
    {
        $directions = array(
            "", "incoming", "outgoing"
        );

        return $this->randFromArray($directions);
    }
    
    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];
        $memberCount = $options['memberCount'];
        $contactCount = $options['contactCount'];
        return array(
            'id' => $index + 1,
            'member_id' => rand($start + 1, $start + $memberCount),
            'contact_id' => rand($start + 1, $start + $contactCount),
            'comm_type_id' => $this->randType(),
            'author_id' => rand($start + 1, $start + $contactCount),
            'dt_comm' => $this->randDate('2009-01-01', '2014-12-30'),
            'direction' => $this->randDirection(),
            'notes' => $this->randString(30, 80),
            'created' => date('Y-m-d H:i:s', time())
        );
    }

    public function getTable()
    {
        return 'communication';
    }

}
