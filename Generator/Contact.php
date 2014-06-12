<?php

class Contact extends SampleDataGenerator
{

  private $unArchivedContact = array();

  private function randCompany($companyCount, $start)
  {
    return rand($start + 1, $companyCount + $start);
  }

  public function getUnArchivedContact()
  {
    return $this->unArchivedContact;
  }

  public function buildData($options = array())
  {
    $index = $options['index'];
    $start = $options['start'];
    $companyCount = $options['companyCount'];
    $personCount = $options['personCount'];
    $now = date('Y-m-d H:i:s', time());
    $imageId = $index == 0 ? 1 : 0;
    $archived = $this->randBoolean();
    $id = $index + 1;
    if (!$archived) {
      $this->unArchivedContact[] = $id;
    }
    $data = array(
      'id' => $id,
      'author_id' => 1,
      'company_id' => $this->randCompany($companyCount, $start),
      'person_id' => rand($start + 1, $start + $personCount),
      'archived' => $archived,
      'best_time_to_call' => $this->randString(),
      'unsubscribe_from_all' => $this->randBoolean(),
      'notes' => $this->randString(50, 75),
      'position' => $this->randString(5, 7),
      'about' => $this->randString(30, 50),
      'created' => $now,
      'modified' => $now
    );
    if ($imageId > 0) {
      $data['image_id'] = $imageId;
      $data['thumbnail_id'] = $imageId;
    } else {
      $data['image_id'] = null;
      $data['thumbnail_id'] = null;
    }

    return $data;
  }

    public function getTable()
    {
        return 'contact';
    }

}