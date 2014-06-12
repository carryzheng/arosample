<?php

class Contract extends SampleDataGenerator
{

    private function randListing($start, $listingCount)
    {
        return rand($start + 1, $start + $listingCount);
    }

    private function randOffice($start, $contactOfficeCount)
    {
        return rand($start + 1, $start + $contactOfficeCount);
    }

    private function randMember($start, $contactMemberCount)
    {
        return rand($start + 1, $start + $contactMemberCount);
    }

    private function randContact($start, $contactCount)
    {
        return rand($start + 1, $start + $contactCount);
    }

    private function randCompany($start, $companyCount)
    {
        return rand($start + 1, $start + $companyCount);
    }

    private function randAreaUnit()
    {
        return rand(26, 28);
    }

    private function randStatus()
    {
        $types = array(
            "master",
            "in preparation",
            "conditional",
            "unconditional",
            "settled",
            "unsuccessful",
            "Under Contract"
        );

        return $this->randFromArray($types);
    }

    private function randHasSolicitor()
    {
        $types = array(
            "", 1, 2
        );

        return $this->randFromArray($types);
    }

    private function randDateString()
    {
        $types = array(
            "", "date", "days"
        );

        return $this->randFromArray($types);
    }

    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];
        $listingCount = $options['listingCount'];
        $contactOfficeCount = $options['contactOfficeCount'];
        $contactMemberCount = $options['contactMemberCount'];
        $contactCount = $options['contactCount'];
        $companyCount = $options['companyCount'];

        return array(
            'id' => $index + 1,
            'listing_id' => $this->randListing($start, $listingCount),
            'office_id' => $this->randOffice($start, $contactOfficeCount),
            'list_cons1_id' => $this->randMember($start, $contactMemberCount),
            'list_cons2_id' => $this->randMember($start, $contactMemberCount),
            'list_cons3_id' => $this->randMember($start, $contactMemberCount),
            'sell_cons1_id' => $this->randMember($start, $contactMemberCount),
            'sell_cons2_id' => $this->randMember($start, $contactMemberCount),
            'sell_cons3_id' => $this->randMember($start, $contactMemberCount),
            'seller_id' => $this->randContact($start, $contactCount),
            'seller_solicitor' => $this->randCompany($start, $companyCount),
            'buyer_id' => $this->randContact($start, $contactCount),
            'buyer_solicitor' => $this->randCompany($start, $companyCount),
            'land_area_unit' => $this->randAreaUnit(),
            'sender_id' => $this->randMember($start, $contactMemberCount),
            'author_id' => $this->randContact($start, $contactCount),
            'unit_contract' => $this->randBoolean(),
            'status' => $this->randStatus(),
            'd_contract' => $this->randDate('2014-01-01', '2020-12-31'),
            'sellers_agent_name' => $this->randFirstName(),
            'sellers_agent_address_line1' => $this->randAddress(),
            'sellers_agent_address_line2' => $this->randAddress(),
            'sellers_agent_acn' => strtoupper($this->randString(9, 11)),
            'sellers_agent_abn' => strtoupper($this->randString(9, 11)),
            'sellers_agent_phone' => $this->randPhone(),
            'sellers_agent_fax' => $this->randPhone(),
            'sellers_agent_mobile' => $this->randPhone(),
            'sellers_agent_email' => $this->randMail(),
            'sellers_agent_notices' => $this->randBoolean(),
            'sellers_agent_license_number' => strtoupper($this->randString(9, 11)),
            'd_sellers_agent_license_expiry' => $this->randDate('2014-01-01', '2020-12-31'),
            'seller_name' => $this->randFirstName(),
            'seller_address_line1' => $this->randAddress(),
            'seller_address_line2' => $this->randAddress(),
            'seller_acn' => strtoupper($this->randString(9, 11)),
            'seller_abn' => strtoupper($this->randString(9, 11)),
            'seller_phone' => $this->randPhone(),
            'seller_fax' => $this->randPhone(),
            'seller_mobile' => $this->randPhone(),
            'seller_email' => $this->randMail(),
            'seller_notices' => $this->randBoolean(),
            'seller_has_solicitor' => $this->randHasSolicitor(),
            'buyers_agent_name' => $this->randFirstName(),
            'buyers_agent_address_line1' => $this->randAddress(),
            'buyers_agent_address_line2' => $this->randAddress(),
            'buyers_agent_acn' => strtoupper($this->randString(9, 11)),
            'buyers_agent_abn' => strtoupper($this->randString(9, 11)),
            'buyers_agent_phone' => $this->randPhone(),
            'buyers_agent_fax' => $this->randPhone(),
            'buyers_agent_mobile' => $this->randPhone(),
            'buyers_agent_email' => $this->randMail(),
            'buyers_agent_notices' => $this->randBoolean(),
            'buyer_name' => $this->randFirstName(),
            'buyer_address_line1' => $this->randAddress(),
            'buyer_address_line2' => $this->randAddress(),
            'buyer_acn' => strtoupper($this->randString(9, 11)),
            'buyer_abn' => strtoupper($this->randString(9, 11)),
            'buyer_phone' => $this->randPhone(),
            'buyer_fax' => $this->randPhone(),
            'buyer_mobile' => $this->randPhone(),
            'buyer_email' => $this->randMail(),
            'buyer_notices' => $this->randBoolean(),
            'buyer_has_solicitor' => $this->randHasSolicitor(),
            'land_address_line1' => $this->randAddress(),
            'land_address_line2' => $this->randAddress(),
            'rpd_lot' => strtoupper($this->randString(5, 9)),
            'rpd_plan_type_code' => strtoupper($this->randString(2, 3)),
            'rpd_plan_number' => strtoupper($this->randString(5, 9)),
            'title_reference' => $this->randString(50, 99),
            'land_area' => rand(0, 100),
            'freehold' => $this->randBoolean(),
            'local_govt' => $this->randString(50, 99),
            'purchase_price' => rand(0, 100),
            'purchase_price_words' => $this->randString(50, 99),
            'initial_deposit' => rand(0, 100),
            'balance_deposit' => rand(0, 100),
            'payable_within_days' => rand(0, 100),
            'payable_within_date' => $this->randString(50, 99),
            'deposit_holder' => $this->randString(50, 99),
            'finance_amount' => $this->randString(10, 49),
            'finance_date_option' => $this->randDateString(),
            'finance_date' => $this->randDate('2014-01-01', '2020-12-31'),
            'finance_num_days_after_contract' => rand(0, 100),
            'lender' => $this->randString(20, 74),
            'pest_inspection_date' => $this->randString(20, 49),
            'pest_inspection_done' => $this->randBoolean(),
            'building_inspection_date' => $this->randString(20, 49),
            'building_inspection_done' => $this->randBoolean(),
            'location_survey_date' => $this->randString(20, 49),
            'location_survey_done' => $this->randBoolean(),
            'settlement_date_option' => $this->randString(50, 99),
            'settlement_date' => $this->randDate('2014-01-01', '2020-12-31'),
            'settlement_num_days_after_contract' => rand(0, 100),
            'settlement_place' => $this->randString(20, 49),
            'improvements' => $this->randString(50, 99),
            'exclusions_chattels' => $this->randString(50, 99),
            'exclusions_other' => $this->randString(50, 99),
            'inclusions_chattels' => $this->randString(50, 99),
            'inclusions_other' => $this->randString(50, 99),
            'tenancy_term' => $this->randString(20, 49),
            'tenancy_options' => $this->randString(20, 49),
            'weekly_rental_rate' => rand(0, 100),
            'tenant' => $this->randString(20, 49),
            'd_tenancy_commencement' => $this->randDate('2014-01-01', '2020-12-31'),
            'd_tenancy_completion' => $this->randDate('2014-01-01', '2020-12-31'),
            'rental_bond' => rand(0, 100),
            'use_is_residential' => $this->randBoolean(),
            'use_is_rural' => $this->randBoolean(),
            'use_is_vacant_land' => $this->randBoolean(),
            'use_is_rural_residential' => $this->randBoolean(),
            'use_other' => $this->randString(50, 99),
            'encumbrances_title' => $this->randString(20, 49),
            'encumbrances_other' => $this->randString(50, 99),
            'govt_orders1' => $this->randString(20, 49),
            'd_govt_orders1' => $this->randDate('2014-01-01', '2020-12-31'),
            'govt_orders2' => $this->randString(20, 49),
            'd_govt_orders2' => $this->randDate('2014-01-01', '2020-12-31'),
            'dividing_fences' => $this->randString(20, 49),
            'd_dividing_fences' => $this->randDate('2014-01-01', '2020-12-31'),
            'qls_contract_rate' => $this->randBoolean(),
            'interest_rate' => rand(0, 100),
            'safety_switch_installed' => $this->randBoolean(),
            'special_conditions' => $this->randString(50, 99),
            'dt_sent' => $this->randDate('2014-01-01', '2020-12-31'),
            'created' => $this->randDate('2014-01-01', '2020-12-31')
        );
    }

    public function getTable()
    {
        return 'contract';
    }

}