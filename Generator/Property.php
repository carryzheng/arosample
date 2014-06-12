<?php

class Property extends SampleDataGenerator
{
    private function randUnitType()
    {
        return rand(17, 23);
    }
    
    private function randStreetDirection()
    {
        return rand(1, 9);
    }
    
    private function randAuthor($start, $contactCount)
    {
        return rand($start + 1, $contactCount + $start);
    }
    
    private function randLotType()
    {
        $types = array(
            "Interior Lot", "Corner Lot", "Flag Lot", "Cul-de-Sac Lot", "Key Lot", "T-Intersection Lot"
        );
        
        return $this->randFromArray($types);
    }

    private function randStreetType()
    {
        $types = array(
            "Alley", "Avenue", "Chare", "Cobbled street", "crescent", "Cul-de-sac", "Esplanade", "Fore Street", "High Street", "Home zone", "Intelligent street", "Living street", "Lovers' lane", "Main Street", "Numbered street", "Pedway", "Processional walkway", "Prospekt", "Shared space", "Shared Zone", "Snickelway", "Walkway", "Woonerf"
        );
        
        return $this->randFromArray($types);
    }

    private function randSuburbId()
    {
        $suburbs = array_keys($this->getSuburbs());
        
        return $this->randFromArray($suburbs);
    }

    public function buildData($options = array())
    {
        $index = $options['index'];
        $contactCount = $options['contactCount'];
        $start = $options['start'];
        $address = $this->randAddress();
        
        return array(
            'id' => $index + 1,
            'unit_type' => $this->randUnitType(),
            'street_direction' => $this->randStreetDirection(),
            'author_id' => $this->randAuthor($start, $contactCount),
            'unit_num' => rand(0, 100),
            'block' => $this->randString(5, 8),
            'lot_type' => $this->randLotType(),
            'street_num' => rand(1, 100),
            'street' => $this->randString(5, 7),
            'street_type' => $this->randStreetType(),
            'locality' => $this->randString(5, 7),
            'address' => $address,
            'address_compiled' => $address,
            'suburb_id' => $this->randSuburbId(),
            'address_extraInfo' => $this->randString(20, 50),
            'property_code' => strtoupper($this->randString(7, 11)),
            'portal_category' => $this->randString(7, 15),
            'dt_created' => date('Y-m-d H:i:s', time()),
            'takings' => $this->randString(8, 16),
            'outgoings' => $this->randString(8, 16),
            'business_part' => strtoupper($this->randString(1, 1)),
            'key_number' => $this->randString(7, 15),

        );
    }

    public function getTable()
    {
        return 'property';
    }

}
