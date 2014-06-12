<?php

class ContractChecklist extends SampleDataGenerator
{

    private function randConjType()
    {
        return rand(1, 6);
    }

    private function randAgency($start, $contactAgencyCount)
    {
        return rand($start + 1, $start + $contactAgencyCount);
    }

    private function randChequesOption()
    {
        $types = array(
            "sent", "received"
        );

        return $this->randFromArray($types);
    }

    private function randCommGstStructure()
    {
        $types = array(
            "Inc", "Ex"
        );

        return $this->randFromArray($types);
    }

    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];
        $contactAgencyCount = $options['contactAgencyCount'];

        return array(
            'id' => $index + 1,
            'contract_id' => $index + 1,
            'conj_type_id' => $this->randConjType(),
            'conj_agency1_id' => $this->randAgency($start, $contactAgencyCount),
            'conj_agency2_id' => $this->randAgency($start, $contactAgencyCount),
            'sale_number' => $this->randString(1, 9),
            'd_under_contract' => $this->randDate('2014-01-01', '2020-12-31'),
            'd_scheduled_unc' => $this->randDate('2014-01-01', '2020-12-31'),
            'unc_reminder_id' => rand(0, 100),
            'd_unconditional' => $this->randDate('2014-01-01', '2020-12-31'),
            'd_scheduled_settlement' => $this->randDate('2014-01-01', '2020-12-31'),
            'settlement_reminder_id' => rand(0, 100),
            'd_settlement' => $this->randDate('2014-01-01', '2020-12-31'),
            'payments_calculated' => $this->randBoolean(),
            'cooling_off_period_expiry' => $this->randBoolean(),
            'd_cooling_off_period_expiry' => $this->randDate('2014-01-01', '2020-12-31'),
            'finance_notification_recvd' => $this->randBoolean(),
            'd_finance_notification_recvd' => $this->randDate('2014-01-01', '2020-12-31'),
            'bldg_and_pest_complete' => $this->randBoolean(),
            'd_bldg_and_pest_complete' => $this->randDate('2014-01-01', '2020-12-31'),
            'solicitors_advised_final_dep' => $this->randBoolean(),
            'unc_on_website' => $this->randBoolean(),
            'cb_adv_owed' => $this->randBoolean(),
            'adv_owed' => $this->randString(1, 1),
            'adv_amount_owed' => rand(0, 100),
            'cb_enough_deposit_comm' => $this->randBoolean(),
            'enough_deposit_comm' => $this->randString(1, 1),
            'account_sales_sent' => $this->randBoolean(),
            'd_account_sales_sent' => $this->randDate('2014-01-01', '2020-12-31'),
            'notice_recvd' => $this->randBoolean(),
            'cheques_done' => $this->randBoolean(),
            'cheques_option' => $this->randChequesOption(),
            'letters_sent' => $this->randBoolean(),
            'invoice_filed' => $this->randBoolean(),
            'settled_on_website' => $this->randBoolean(),
            'settlement_price' => rand(0, 100),
            'special_arrangements' => $this->randString(50, 99),
            'listing_type_id' => rand(1, 8),
            'conjunction' => $this->randBoolean(),
            'conj_agency1_percent' => rand(0, 100),
            'conj_agency2_percent' => rand(0, 100),
            'listing_percent' => rand(0, 100),
            'selling_percent' => rand(0, 100),
            'list_cons1_percent' => rand(0, 100),
            'list_cons2_percent' => rand(0, 100),
            'list_cons3_percent' => rand(0, 100),
            'sell_cons1_percent' => rand(0, 100),
            'sell_cons2_percent' => rand(0, 100),
            'sell_cons3_percent' => rand(0, 100),
            'total_comm' => rand(0, 100),
            'total_gst' => rand(0, 100),
            'conj_agency1_comm' => rand(0, 100),
            'conj_agency2_comm' => rand(0, 100),
            'our_comm' => rand(0, 100),
            'our_gst' => rand(0, 100),
            'office_admin_fee' => rand(0, 100),
            'gross_sales_comm' => rand(0, 100),
            'office_comm' => rand(0, 100),
            'office_gst' => rand(0, 100),
            'percentages_entered' => $this->randBoolean(),
            'commission_gst_structure' => $this->randCommGstStructure()
        );
    }

    public function getTable()
    {
        return 'contract_checklist';
    }

}