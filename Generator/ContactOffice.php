<?php

class ContactOffice extends SampleDataGenerator
{
    private $companies = array();
    
    private function shuffleCompany($companyCount, $start)
    {
        if (empty($this->companies)) {
            for ($i = $start + 1; $i <= $companyCount + $start; $i++) {
                $this->companies[] = $i;
            }
            shuffle($this->companies);
        }
    }
    
    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];
        $companyCount = $options['companyCount'];
        $this->shuffleCompany($companyCount, $start);
        $companyId = $this->companies[$index - $start];
        return array(
            'id' => $index + 1,
            'company_id' => $companyId,
            'agency_id' => $companyId,
            'office_code' => strtoupper($this->randString(2, 3)),
            'enable_login' => $this->randBoolean(),
            'created' => date('Y-m-d H:i:s')
        );
    }

    public function getTable()
    {
        return 'contact_office';
    }

}
