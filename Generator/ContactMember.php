<?php

class ContactMember extends SampleDataGenerator
{
    private $contacts = array();
    
    private $contactMemberMap = array();
    private $employedMembers = array();
    private $employedMemberIds = array();
    
    public function getContactMemberMap()
    {
        return $this->contactMemberMap;
    }
    
    // This is all contacts from members
    public function getEmployedMembers()
    {
        return $this->employedMembers;
    }

    public function getEmployedMemberIds()
    {
        return $this->employedMemberIds;
    }
    
    private function shuffleContact($contactCount, $start)
    {
        if (empty($this->contacts)) {
            for ($i = $start + 1; $i <= $contactCount + $start; $i++) {
                $this->contacts[] = $i;
            }
            shuffle($this->contacts);
        }
    }
    
    public function buildData($options = array())
    {
        $contactCount = $options['contactCount'];
        $unArchivedContact = $options['unArchived'];
        $start = $options['start'];
        $this->shuffleContact($contactCount, $start);
        $index = $options['index'];
        $contact = $this->contacts[$index - $start];
        $id = $index + 1;
        $this->contactMemberMap[$contact] = $id;
        $employed = $id == 1 ? 1 : $this->randBoolean();
        //if ($employed == 1 && in_array($contact, $unArchivedContact)) {
            $this->employedMembers[] = $contact;
        //}
        if ($employed == 1 && in_array($contact, $unArchivedContact)) {
            $this->employedMemberIds[] = $id;
        }
        return array(
            'id' => $id,
            'contact_id' => $contact,
            'author_id' => $contact,
            'employed' => $employed,
            'date_of_birth' => $this->randDate('1949-10-01', '1989-09-30'),
            'display_welcome' => $this->randString(5, 9),
            'display_on_website' => $this->randBoolean(),
            'display_on_website_order' => rand(0, 99999),
            'webonly' => $this->randBoolean(),
            'email_signature' => $this->randString(50, 90),
            'email_signature_include_headshot' => $this->randBoolean(),
            'created' => date('Y-m-d H:i:s', time())
        );
    }

    public function getTable()
    {
        return 'contact_member';
    }

}
