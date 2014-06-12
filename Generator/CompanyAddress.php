<?php
class CompanyAddress extends SampleDataGenerator
{
    private $primarys = array();
    
    private function randType()
    {
        return rand(1, 2);
    }
    
    public function buildData($options = array())
    {
        $companyCount = $options['companyCount'];
        $start = $options['start'];
        $index = $options['index'];
        $companyId = $start + rand(1, $companyCount);
        if (isset($this->primarys[$companyId]) && !$this->primarys[$companyId]) {
            $this->primarys[$companyId] = $this->randBoolean();
        } else {
            $this->primarys[$companyId] = false;
        }
        $address1 = $this->randAddress();
        $suburb = $this->randSuburb();
        $city = $this->randCity();
        $state = $this->randState();
        $postcode = $this->randPostcode();
        $countryCodeISO2 = 'AU';
        $compiled = $this->buildCompiled($address1, $suburb, $city, $postcode, $state, $countryCodeISO2);
        $latLng = $this->randLatLng();
        
        return array(
            'id' => $index + 1,
            'company_id' => $companyId,
            'company_address_type_id' => $this->randType(),
            'address1' => $address1,
            'suburb' => $suburb,
            'city' => $city,
            'state' => $state,
            'postcode' => $postcode,
            'countryCodeISO2' => $countryCodeISO2, 
            'address_compiled' => $compiled,
            'primary' => $this->primarys[$companyId],
            'map_lat' => $latLng[0],
            'map_lng' => $latLng[1],
            'map_zoom' => rand(0, 19),
            'map_accuracy' => $this->randMapAccuracy(),
            'map_display' => $this->randBoolean(),
            'map_positioning' => $this->randPositioning()
        );
    }

    public function getTable()
    {
        return 'contact_company_address';
    }

}
