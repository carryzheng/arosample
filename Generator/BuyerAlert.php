<?php

class BuyerAlert extends SampleDataGenerator
{
    
    private function randContact($start, $contactCount)
    {
        return rand($start + 1, $start + $contactCount);
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
        $categoryId = $this->randCategory();
        $prices = $this->randRange(100, 9999, 99999);
        $nBedrooms = $this->randRange(0, 9999, 32767);
        $nBathrooms = $this->randRange(0, 9999, 32767);
        $nCarSpaces = $this->randRange(0, 9999, 32767);
        $floorAreaM2 = $this->randRange(0, 1000000000, 1999999999);
        $landArea = $this->randRange(0, 5000000000, 9999999999);
        $underRoofArea = $this->randRange(0, 1000000000, 1999999999);
        $hardStandArea = $this->randRange(0, 1000000000, 1999999999);
        $start = $options['start'];
        $contactCount = $options['contactCount'];
        $index = $options['index'];
              
        return array(
            'id' => $index + 1,
            'contact_id' => $this->randContact($start, $contactCount),
            'type_car_spaces' => $this->randCarSpace(),
            'land_area_unit' => $this->randAreaUnit(),
            'outlook_id' => $this->randOutlook(),
            'portal_category' => $this->randPortalCategory(),
            'category' => $categoryId,
            'sub_category' => $this->randSubCategory($categoryId),
            'ruralcat_id' => $this->randRuralCat(),
            'author_id' => $this->randContact($start, $contactCount),
            'min_price' => $prices[0],
            'max_price' => $prices[1],
            'p_marketing' => $this->randBoolean(),
            'min_n_bedrooms' => $nBedrooms[0],
            'max_n_bedrooms' => $nBedrooms[1],
            'min_n_bathrooms' => $nBathrooms[0],
            'max_n_bathrooms' => $nBathrooms[1],
            'min_n_car_spaces' => $nCarSpaces[0],
            'max_n_car_spaces' => $nCarSpaces[1],
            'min_floor_area_m2' => $floorAreaM2[0],
            'max_floor_area_m2' => $floorAreaM2[1],
            'min_land_area' => $landArea[0],
            'max_land_area' => $landArea[1],
            'other_needs' => $this->randString(50, 99),
            'ensuite' => $this->randBoolean(),
            'study' => $this->randBoolean(),
            'pool' => $this->randBoolean(),
            'beach' => $this->randBoolean(),
            'fenced' => $this->randBoolean(),
            'low_maintegerenance' => $this->randBoolean(),
            'granny_flat' => $this->randBoolean(),
            'level_block' => $this->randBoolean(),
            'purpose' => $this->randString(30, 79),
            'time_looking' => $this->randString(1, 15),
            'date_when_reqd' => $this->randDate('2014-01-01', '2020-12-31'),
            'savings' => rand(0, 50),
            'finance_reqd' => $this->randBoolean(),
            'bought_in_qld_before' => $this->randBoolean(),
            'house_to_sell' => $this->randBoolean(),
            'market_appraisal_reqd' => $this->randBoolean(),
            'property_investment' => $this->randBoolean(),
            'property_comparison' => $this->randBoolean(),
            'property_comp_desc' => $this->randString(30, 80),
            'underroofarea_min' => $underRoofArea[0],
            'underroofarea_max' => $underRoofArea[1],
            'hardstandarea_min' => $hardStandArea[0],
            'hardstandarea_max' => $hardStandArea[1],
            'created' => date('Y-m-d H:i:s', time())
        );
    }

    public function getTable()
    {
        return 'buyer_alert';
    }

}