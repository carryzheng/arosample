<?php

class TenantAlert extends SampleDataGenerator
{
    private function randContact($start, $contactCount)
    {
        return rand($start + 1, $start + $contactCount);
    }
    
    private function randAgency($start, $agencyCount)
    {
        return rand($start + 1, $start + $agencyCount);
    }
    
    private function randCarSpace()
    {
        return rand(29, 31);
    }
    
    private function randAreaUnit()
    {
        return rand(26, 28);
    }
    
    private function randOutlook()
    {
        return rand(1, 5);
    }
    
    private function randPortalCategory()
    {
        return rand(1, 16);
    }
    
    private function randCategory()
    {
        $num = rand(1, 15);
        if ($num == 6) {
            $num = 7;
        }
        
        return $num;
    }
    
    private function randSubCategory($categoryId)
    {
        $subs = array(
            1 => array(1, 13),
            2 => array(14, 28),
            3 => array(29, 41),
            4 => array(42, 45),
            5 => array(46, 61),
            7 => array(62, 65),
            8 => array(66, 70),
            9 => array(71, 85),
            10 => array(86, 99),
            11 => array(100, 117),
            12 => array(130, 147),
            13 => array(118, 129),
            14 => array(148, 169),
            15 => array(170, 178)
        );
        $sub = $subs[$categoryId];
        
        return rand($sub[0], $sub[1]);
    }
    
    private function randRuralCat()
    {
        return rand(1, 9);
    }
    
    private function randRange($minNum, $middleNum, $maxNum)
    {
        $min = rand($minNum, $middleNum);
        $max = rand($min + 1, $maxNum);
        
        return array($min, $max);
    }
    
    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];
        $contactCount = $options['contactCount'];
        $agencyCount = $options['agencyCount'];
        $categoryId = $this->randCategory();
        $subCategoryId = $this->randSubCategory($categoryId);
        $nBedrooms = $this->randRange(0, 9999, 32767);
        $nBathrooms = $this->randRange(0, 9999, 32767);
        $nCarSpaces = $this->randRange(0, 9999, 32767);
        $floorAreaM2 = $this->randRange(0, 1000000000, 1999999999);
        return array(
            'id' => $index + 1,
            'contact_id' => $this->randContact($start, $contactCount),
            'agency_id' => $this->randAgency($start, $agencyCount),
            'type_car_spaces' => $this->randCarSpace(),
            'outlook_id' => $this->randOutlook(),
            'author_id' => $this->randContact($start, $contactCount),
            'portal_category' => $this->randPortalCategory(),
            'category' => $categoryId,
            'sub_category' => $subCategoryId,
            'ruralcat_id' => $this->randRuralCat(),
            'reason_moving' => $this->randString(20, 40),
            'has_references' => $this->randBoolean(),
            'date_when_reqd' => $this->randDate('2014-01-01', '2014-12-31'),
            'max_rate' => rand(0, 100),
            'has_pets' => $this->randBoolean(),
            'furnished' => $this->randBoolean(),
            'pets_details' => $this->randString(5, 15),
            'min_n_bedrooms' => $nBedrooms[0],
            'max_n_bedrooms' => $nBedrooms[1],
            'min_n_bathrooms' => $nBathrooms[0],
            'max_n_bathrooms' => $nBathrooms[1],
            'min_n_car_spaces' => $nCarSpaces[0],
            'max_n_car_spaces' => $nCarSpaces[1],
            'min_floor_area_m2' => $floorAreaM2[0],
            'max_floor_area_m2' => $floorAreaM2[1],
            'ensuite' => $this->randBoolean(),
            'study' => $this->randBoolean(),
            'fenced' => $this->randBoolean(),
            'low_maintenance' => $this->randBoolean(),
            'close_beach' => $this->randBoolean(),
            'close_school' => $this->randBoolean(),
            'balcony' => $this->randBoolean(),
            'courtyard' => $this->randBoolean(),
            'pool' => $this->randBoolean(),
            'entertainment_area' => $this->randBoolean(),
            'other_requirements' => $this->randString(30, 80),
            'dt_created' => date('Y-m-d H:i:s', time()),

        );
    }

    public function getTable()
    {
        return 'tenant_alert';
    }

}
