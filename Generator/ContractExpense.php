<?php

class ContractExpense extends SampleDataGenerator
{

    private function randContract($start, $contractCount)
    {
        return rand($start + 1, $start + $contractCount);
    }

    private function randMember($start, $contactMemberCount)
    {
        return rand($start + 1, $start + $contactMemberCount);
    }

    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];
        $contractCount = $options['contractCount'];
        $contactMemberCount = $options['contactMemberCount'];

        return array(
            'id' => $index + 1,
            'contract_id' => $this->randContract($start, $contractCount),
            'consultant_id' => $this->randMember($start, $contactMemberCount),
            'description' => $this->randString(50, 99),
            'amount' => rand(0, 100),
            'approved' => $this->randBoolean()
        );
    }

    public function getTable()
    {
        return 'contract_expense';
    }

}