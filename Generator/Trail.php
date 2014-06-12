<?php
class Trail extends SampleDataGenerator
{
    private $trailContactMap = array();
    
    private function randType()
    {
        return rand(1, 2);
    }
    
    public function getTrailContactMap()
    {
        return $this->trailContactMap;
    }
    
    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];
        $consultants = $options['consultants'];
        $contactCount = $options['contactCount'];
        $members = $options['members'];
        $now = date('Y-m-d H:i:s', time());
        $consultantId = $this->randFromArray($consultants);
        $contactId = rand($start + 1, $start + $contactCount);
        $id = $index + 1;
        $this->trailContactMap[$id] = $contactId;
        return array(
            'id' => $id,
            'author_id' => $contactId,
            'trail_type_id' => $this->randType(),
            'consultant_id' => $consultantId,
            'member_id' => $this->randFromArray($members),
            'name' => $this->randString(10, 30),
            'reference' => $this->randString(20, 50),
            'library_id' => rand(0, 1),
            'created' => $now,
            'modified' => $now
        );
    }

    public function getTable()
    {
        return 'trails';
    }

}
