<?php

class Listing extends SampleDataGenerator
{
    private function randConfiguration()
    {
        return rand(1, 7);
    }
    
    private function randGradient()
    {
        return rand(1, 6);
    }
    
    private function randListingType()
    {
        return rand(1, 8);
    }
    
    private function randPositionCode()
    {
        return rand(1, 10);
    }
    
    private function randPropertyType()
    {
        return rand(1, 15);
    }
    
    private function randRpdPlanTypeCode()
    {
        return rand(1, 30);
    }
    
    private function randStage()
    {
        return rand(1, 7);
    }
    
    private function randStyle()
    {
        return rand(1, 11);
    }
    
    private function randZoning()
    {
        return rand(1, 26);
    }
    
    private function randPropertyCat()
    {
        $cats = array('stock', 'farmed', 'permanent', 'holiday' );
        
        return $this->randFromArray($cats);
    }
    
    public function buildData($options = array())
    {
        $index = $options['index'];
        $latLng = $this->randLatLng();
        $price = rand(100, 99999);
        $displayPrice = money_format('%i', $price);
        $nCarSpacesGarage = rand(0, 100);
        $nCarSpacesCarport = rand(0, 100);
        $nCarSpacesSecure = rand(0, 100);
        $nCarSpacesOnStreet = rand(0, 100);
        $nCarSpacesOffStreet = rand(0, 100);
        $nCarSpacesOther = rand(0, 100);
        $nCarSpacesTotal = $nCarSpacesGarage + $nCarSpacesCarport + $nCarSpacesSecure + $nCarSpacesOnStreet + $nCarSpacesOffStreet + $nCarSpacesOther;
        return array(
            'id' => $index + 1,
            'configuration_id' => $this->randConfiguration(),
            'gradient_id' => $this->randGradient(),
            'listing_type_id' => $this->randListingType(),
            'position_code' => $this->randPositionCode(),
            'property_id' => $index + 1,
            'property_type_id' => $this->randPropertyType(),
            'rpd_plan_type_code' => $this->randRpdPlanTypeCode(),
            'stage_id' => $this->randStage(),
            'style_id' => $this->randStyle(),
            'zoning_id' => $this->randZoning(),
            'listing_code' => strtoupper($this->randString(3, 5)),
            'listing_cat' => $this->randPropertyCat(),
            'active' => $this->randBoolean(),
            'farmed' => $this->randBoolean(),
            'd_created' => $this->randDate('2009-01-01', '2014-12-31'),
            'd_listing' => $this->randDate('2009-01-01', '2014-12-31'),
            'd_available' => $this->randDate('2009-01-01', '2014-12-31'),
            'd_withdrawn' => $this->randDate('2009-01-01', '2014-12-31'),
            'display_listing' => $this->randBoolean(),
            'display_full_address' => $this->randBoolean(),
            'display_suburb' => $this->randBoolean(),
            'display_title' => $this->randstring(8, 12),
            'desc_preview' => $this->randString(30, 50),
            'desc_full' => $this->randString(50, 80),
            'sms_notification' => $this->randString(18, 40),
            'notes' => $this->randString(30, 80),
            'virtual_tourUrl' => $this->randUrl(),
            'video_tour_url' => $this->randUrl(),
            'map_lat' => $latLng[0],
            'map_long' => $latLng[1],
            'map_zoom' => rand(0, 19),
            'map_positioning' => $this->randPositioning(),
            'map_accuracy' => $this->randMapAccuracy(),
            'map_display_on_web' => $this->randBoolean(),
            'dt_auction' => $this->randDate('2014-01-01', '2014-12-30'),
            'online_auction' => $this->randBoolean(),
            'auction_reserve' => floor($price / 2),
            'auction_starting_bid' => floor($price / 10),
            'display_price' => $displayPrice,
            'search_price' => $price,
            'archive_box' => strtoupper($this->randString(3, 4)),
            'sign_displayed' => strtoupper($this->randString(1, 1)),
            'insp_call_consultant' => $this->randBoolean(),
            'insp_notice_reqd' => $this->randBoolean(),
            'insp_instructions' => $this->randString(30, 80),
            'year_built' => rand(1, 10),
            'floor_area_m2' => rand(0, 999999),
            'land_area' => $this->randString(10, 20),
            'land_area_unit' => 'm2',
            'crossover' => $this->randString(8, 20),
            'frontage' => $this->randString(8, 20),
            'right_depth' => $this->randString(8, 20),
            'left_depth' => $this->randString(8, 20),
            'rear_depth' => $this->randString(8, 20),
            'rpd_lot' => $this->randString(5, 7),
            'rpd_plan_number' => rand(1, 99),
            'configuration_other' => $this->randString(11, 18),
            'style_other' => $this->randString(11, 18),
            'position_other' => $this->randString(11, 18),
            'aspect_code' => strtoupper($this->randString(2, 2)),
            'car_spaces_garage' => $nCarSpacesGarage,
            'car_spaces_carport' => $nCarSpacesCarport,
            'car_spaces_secure' => $nCarSpacesSecure,
            'car_spaces_onstreet' => $nCarSpacesOnStreet,
            'car_spaces_offstreet' => $nCarSpacesOffStreet,
            'car_spaces_other' => $nCarSpacesOther,
            'car_spaces_total' => $nCarSpacesTotal,
            'car_parking_extra_info' => $this->randString(20, 50),
            'appliances_extra_info' => $this->randString(20, 50),
            'services_extra_info' => $this->randString(20, 50),
            'features_extra_info' => $this->randString(20, 50),
            'facilities_extra_info' => $this->randString(20, 50),
            'rooms_extra_info' => $this->randString(20, 50),
            'ext_walls_extra_info' => $this->randString(20, 50),
            'roof_extra_info' => $this->randString(20, 50),
            'int_walls_extra_info' => $this->randString(20, 50),
            'floors_extra_info' => $this->randString(20, 50),
            'design_extra_info' => $this->randString(20, 50),
            'starenergyrating' => $this->randString(11, 18),
        );
    }

    public function getTable()
    {
        return 'listing';
    }

}
