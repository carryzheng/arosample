<?php

class CompanyContactDetail extends SampleDataGenerator
{

  private $primarys = array();

  private function randType()
  {
    $num = rand(1, 9);
    if ($num == 3) {
      $num = 2;
    }

    return $num;
  }

  private function getLabel($typeId)
  {
    $types = array(
      'Home Phone',
      'Work Phone',
      'Mobile Phone',
      'Fax',
      'Home Email',
      'Work Email',
      'Website',
      'Facebook',
      'Twitter'
    );

    return $types[$typeId - 1];
  }

  private function randValue($typeId)
  {
    if ($typeId < 5) {
      return $this->randPhone();
    } else if ($typeId == 7) {
      return $this->randUrl();
    } else {
      return $this->randMail();
    }
  }

  public function buildData($options = array())
  {
    $index = $options['index'];
    $companyId = floor($index / 4) + 1;
    $typeId = $this->randType();
    $label = $this->getLabel($typeId);
    $value = $this->randValue($typeId);
    if (isset($this->primarys[$companyId]) && !$this->primarys[$companyId]) {
        $this->primarys[$companyId] = $this->randBoolean();
    } else {
        $this->primarys[$companyId] = false;
    }
    return array(
      'id' => $index + 1,
      'company_id' => $companyId,
      'company_detail_type_id' => $typeId,
      'label' => $label,
      'value' => $value,
      'primary' => $this->primarys[$companyId]
    );
  }

    public function getTable()
    {
        return 'contact_company_contact_detail';
    }

}