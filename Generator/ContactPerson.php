<?php

class ContactPerson extends SampleDataGenerator
{

  // aro_software_dev.config_occupation
  private function randOccupation()
  {
    return rand(1, 29);
  }

  // aro_software_dev.config_source
  private function randSource()
  {
    return rand(1, 18);
  }

  private function randTitle()
  {
    $titles = array(
      'Mr', 'Mrs', 'Miss', 'Ms', 'Dr', 'Prof.'
    );

    return $this->randFromArray($titles);
  }

  private function buildLegalName($title1, $firstName1, $middleName1, $lastName1, $title2, $firstName2, $middleName2, $lastName2)
  {
    return sprintf('%s %s %s %s and %s %s %s %s', $title1, $firstName1, $middleName1, $lastName1, $title2, $firstName2, $middleName2, $lastName2);
  }

  private function buildGeneralName($preferredName1, $lastName1, $preferredName2, $lastName2)
  {
    return sprintf('%s %s and %s %s', $preferredName1, $lastName1, $preferredName2, $lastName2);
  }

  public function buildData($options = array())
  {
    $index = $options['index'];
    $title1 = $this->randTitle();
    $firstName1 = $this->randFirstName();
    $middleName1 = $this->randMiddleName();
    $lastName1 = $this->randLastName();
    $preferredName1 = $this->randPreferredName();
    $title2 = $this->randTitle();
    $firstName2 = $this->randFirstName();
    $middleName2 = $this->randMiddleName();
    $lastName2 = $this->randLastName();
    $preferredName2 = $this->randPreferredName();
    $legalName = $this->buildLegalName($title1, $firstName1, $middleName1, $lastName1, $title2, $firstName2, $middleName2, $lastName2);
    $generalName = $this->buildGeneralName($preferredName1, $lastName1, $preferredName2, $lastName2);
    $now = date('Y-m-d H:i:s', time());
    $birthDay = $this->randDate('1949-10-01', '1989-09-30');
    $birthDayWithoutYear = date('md', strtotime($birthDay));
    return array(
      'id' => $index + 1,
      'occupation_id' => $this->randOccupation(),
      'source_id' => $this->randSource(),
      'title1' => $title1,
      'first_name1' => $firstName1,
      'middle_name1' => $middleName1,
      'preferred_name1' => $preferredName1,
      'last_name1' => $lastName1,
      'title2' => $title2,
      'first_name2' => $firstName2,
      'middle_name2' => $middleName2,
      'preferred_name2' => $preferredName2,
      'last_name2' => $lastName2,
      'legal_name' => $legalName,
      'general_name' => $generalName,
      'formal_salutation' => 'Dear ' . $title1 . ' ' . $lastName1 . ' and ' . $title2 . ' ' . $lastName2,
      'informal_salutation' => 'Dear ' . $preferredName1  . ' and ' . $preferredName2,
      'birth_day' => $birthDay,
      'birth_day_without_year' => $birthDayWithoutYear,
      'create_time' => $now,
      'update_time' => $now
    );
  }

  public function getTable()
  {
    return 'contact_person';
  }
}

?>