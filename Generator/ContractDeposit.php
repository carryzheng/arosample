<?php

class ContractDeposit extends SampleDataGenerator
{

    private function randContract($start, $contractCount)
    {
        return rand($start + 1, $start + $contractCount);
    }

    private function randContact($start, $contactCount)
    {
        return rand($start + 1, $start + $contactCount);
    }

    private function randDepositType()
    {
        $types = array(
            "initial", "additional", "balance", "refund"
        );

        return $this->randFromArray($types);
    }

    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];
        $contractCount = $options['contractCount'];
        $contactCount = $options['contactCount'];

        return array(
            'id' => $index + 1,
            'contract_id' => $this->randContract($start, $contractCount),
            'received_by' => $this->randContact($start, $contactCount),
            'deposit_type' => $this->randDepositType(),
            'amount' => rand(0, 100),
            'receipt_num' => $this->randString(1, 9),
            'd_received' => $this->randDate('2014-01-01', '2020-12-31'),
            'transaction_id' => rand(0, 100)
        );
    }

    public function getTable()
    {
        return 'contract_deposit';
    }

}