<?php

class ContactAddress extends SampleDataGenerator
{
    private $primarys = array();
    
    private function randType()
    {
        return rand(1, 2);
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
        $address1 = $this->randAddress();
        $suburb = $this->randSuburb();
        $city = $this->randCity();
        $state = $this->randState();
        $postcode = $this->randPostcode();
        $countryCodeISO2 = 'AU';
        $compiled = $this->buildCompiled($address1, $suburb, $city, $postcode, $state, $countryCodeISO2);
        
        return array(
            'id' => $index + 1,
            'contact_id' => $contactId,
            'contact_address_type_id' => $this->randType(),
            'address1' => $address1,
            'suburb' => $suburb,
            'city' => $city,
            'state' => $state,
            'postcode' => $postcode,
            'countryCodeISO2' => $countryCodeISO2, 
            'address_compiled' => $compiled,
            'primary' => $this->primarys[$contactId],

        );
    }

    public function getTable()
    {
        return 'contact_address';
    }

}
