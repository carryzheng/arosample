<?php

class ContractUnit extends SampleDataGenerator
{

    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];

        return array(
            'id' => $index + 1,
            'contract_id' => $index + 1,
            'buyers_agent_license_number' => $this->randString(10, 19),
            'd_buyers_agent_license_expiry' => $this->randDate('2014-01-01', '2020-12-31'),
            'scheme' => $this->randString(20, 49),
            'community_titles_scheme' => $this->randString(20, 49),
            'present_use' => $this->randString(15, 24),
            'bc_contribution_for_lot' => rand(0, 100),
            'bc_contribution_aggregate' => rand(0, 100),
            'bc_interest_for_lot' => rand(0, 100),
            'bc_interest_aggregate' => rand(0, 100),
            'insurer' => $this->randString(20, 49),
            'policy_num' => $this->randString(10, 19),
            'building_insurance' => rand(0, 100),
            'publicLiability_insurance' => rand(0, 100),
            'additional_insurance_desc' => $this->randString(20, 49),
            'additional_insurance' => rand(0, 100),
            'contractor_a' => $this->randString(20, 49),
            'reqd_service_a' => $this->randString(15, 29),
            'fee_a' => rand(0, 100),
            'pay_period_a' => $this->randString(5, 9),
            'contractor_b' => $this->randString(20, 49),
            'reqd_service_b' => $this->randString(15, 29),
            'fee_b' => rand(0, 100),
            'pay_period_b' => $this->randString(5, 9),
            'contractor_c' => $this->randString(20, 49),
            'reqd_service_c' => $this->randString(15, 29),
            'fee_c' => rand(0, 100),
            'pay_period_c' => $this->randString(5, 9),
            'contractor_d' => $this->randString(20, 49),
            'reqd_service_d' => $this->randString(15, 29),
            'fee_d' => rand(0, 100),
            'pay_period_d' => $this->randString(5, 9),
            'warranty1' => $this->randString(55, 99),
            'warranty2' => $this->randString(55, 99),
            'warranty3' => $this->randString(55, 99),
            'disclosure' => $this->randString(55, 99)
        );
    }

    public function getTable()
    {
        return 'contract_unit';
    }

}