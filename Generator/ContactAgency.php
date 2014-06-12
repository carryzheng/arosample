<?php

class ContactAgency extends SampleDataGenerator
{
    private function randCommissionType()
    {
        return rand(155, 156);
    }
    
    private function randAuthor($start, $contactCount)
    {
        return rand($start, $contactCount + $start - 1);
    }


    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];
        $contactCount = $options['contactCount'];
        return array(
            'id' => $index + 1,
            'company_id' => $index + 1,
            'default_commission_type_id' => $this->randCommissionType(),
            'author_id' => $index + 1,
            'is_owner' => $this->randBoolean(),
            'licensee' => $this->randString(30, 70),
            'license' => $this->randString(30, 70),
            'archived' => $this->randBoolean(),
            'created' => date('Y-m-d H:i:s', time()),

        );
    }

    public function getTable()
    {
        return 'contact_agency';
    }

}
