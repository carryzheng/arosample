<?php

class ContactConsultant extends SampleDataGenerator
{
    private $employedCons = array();

    public function getEmployedCons()
    {
        return $this->employedCons;
    }

    public function buildData($options = array())
    {
        $index = $options['index'];
        $id = $index + 1;
        $memberId = $index + 1;
        $employedMemberIds = $options['employedMemberIds'];
        if (in_array($memberId, $employedMemberIds)) {
            $this->employedCons[] = $id;
        }
        return array(
            'id' => $id,
            'member_id' => $memberId,
            'comm_rate' => $this->randBoolean(),
            'excl_comm_rate' => rand(0, 99),
            'open_comm_rate' => rand(0, 99),
            'auct_comm_rate' => rand(0, 99),
            'incl_gst' => $this->randBoolean(),
            'incl_super' => $this->randBoolean(),
            'office_admin_percent' => rand(0, 99),
            'salary' => rand(100, 9999),
            'paycycle' => $this->randString(7, 15)
        );
    }

    public function getTable()
    {
        return 'contact_consultant';
    }

}
