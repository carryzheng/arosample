<?php

class ContactDetail extends SampleDataGenerator
{
    private $primarys = array();
    
    private function randType()
    {
      $num = rand(1, 9);
      if ($num == 3) {
        $num = 2;
      }

      return $num;
    }
    
    private function randValue($typeId)
    {
      if ($typeId < 5) {
        return $this->randPhone();
      } else if ($typeId == 7) {
        return $this->randUrl();
      } else {
        return $this->randMail();
      }
    }
    
    public function buildData($options = array())
    {
        $index = $options['index'];
        $contactCount = $options['contactCount'];
        $start = $options['start'];
        $contactId = $start + rand(1, $contactCount);
        if (isset($this->primarys[$contactId]) && !$this->primarys[$contactId]) {
            $this->primarys[$contactId] = $this->randBoolean();
        } else {
            $this->primarys[$contactId] = false;
        }
        $typeId = $this->randType();
        return array(
            'id' => $index + 1,
            'contact_id' => $contactId,
            'contact_detail_type_id' => $typeId,
            'value' => $this->randValue($typeId),
            'primary' => $this->primarys[$contactId],
        );
        
    }

    public function getTable()
    {
        return 'contact_detail';
    }

}
