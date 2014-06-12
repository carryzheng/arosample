<?php

class ListingSale extends SampleDataGenerator
{
  public function buildData($options = array())
    {
        $index = $options['index'];
        $startDate = date('Y-m-d');
        $endDate = date('Y-m-d', strtotime('+3 months'));
        $presentationDate = $this->randDate($startDate, $endDate);
        $expiryDate = date('Y-m-d', strtotime($presentationDate) + 8640000);
        return array(
          'id' => $index + 1,
          'listing_id' => $index + 1,
          'd_presentation' => $presentationDate,
          'd_expiry' => $expiryDate,
          'rates' => rand(0, 1000),
          'rates_period_months' => rand(1, 12),
          'rates_accurate' => $this->randFromArray(array('Y', 'N', '')),
          'has_encumbrances' => $this->randBoolean(),
          'encumbrances_details' => $this->randString(8, 12),
          'vacant_possession_days' => rand(0, 100),
          'd_vacant_possession' => $this->randDate('2012-05-02', '2014-03-16'),
          'title_reference' => $this->randString(16, 30),
          'freehold' => $this->randFromArray(array('Y', 'N', '')),
          'local_govt' => $this->randString(16, 30)
        );
    }

    public function getTable()
    {
        return 'listing_sale';
    }
}