<?php

class ContractCommission extends SampleDataGenerator
{

    private function randContract($start, $contractCount)
    {
        return rand($start + 1, $start + $contractCount);
    }

    private function randMember($start, $contactMemberCount)
    {
        return rand($start + 1, $start + $contactMemberCount);
    }

    private function randContact($start, $contactCount)
    {
        return rand($start + 1, $start + $contactCount);
    }

    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];
        $contractCount = $options['contractCount'];
        $contactMemberCount = $options['contactMemberCount'];
        $contactCount = $options['contactCount'];

        return array(
            'id' => $index + 1,
            'contract_id' => $this->randContract($start, $contractCount),
            'consultant_id' => $this->randMember($start, $contactMemberCount),
            'author_id' => $this->randContact($start, $contactCount),
            'share' => rand(0, 100),
            'base_comm_rate' => rand(0, 100),
            'office_admin_percent' => rand(1, 100),
            'commission' => rand(0, 100),
            'incl_gst' => $this->randBoolean(),
            'gst' => rand(0, 100),
            'taxwithheld' => rand(0, 100),
            'payment' => rand(0, 100),
            'd_paid' => $this->randDate('2014-01-01', '2020-12-31'),
            'created' => $this->randDate('2014-01-01', '2020-12-31')
        );
    }

    public function getTable()
    {
        return 'contract_commission';
    }

}