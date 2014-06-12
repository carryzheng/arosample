<?php
class TraiilTaskTemplate extends SampleDataGenerator
{
    private function randType()
    {
        return rand(1, 3);
    }
    
    private function randOwner()
    {
        $owners = array(
            "Me", "Office Administration", "Listing Consultant", "Selling Consultant", "Consultant"
        );
        
        return $this->randFromArray($owners);
    }
    
    private function randRecipient()
    {
        $recipients = array(
            "Vendor", "Buyer", "Listing Consultant", "Selling Consultant", "Office Administration", "Manager", "IT", "Accounts", "Advertising", "Contracts", "Vendor's Solicitor", "Buyer's Solicitor"
        );
        
        return $this->randFromArray($recipients);
    }
    
    public function buildData($options = array())
    {
        $index = $options['index'];
        $start = $options['start'];
        $trailCount = $options['trailCount'];
        $documentCount = $options['documentCount'];
        $contactMemberMap = $options['contactMemberMap'];
        $trailContactMap = $options['trailContactMap'];
        $trailId = rand($start + 1, $start + $trailCount);
        $contactId = $trailContactMap[$trailId];
        $now = date('Y-m-d H:i:s', time());
        $data = array(
            'id' => $index + 1,
            'letter_template_id' => rand($start + 1, $start + $documentCount),
            'trail_task_type_id' => $this->randType(),
            'trail_id' => $trailId,
            'description' => $this->randString(20, 50),
            'owner_role' => $this->randOwner(),
            'recipientRole' => $this->randRecipient(),
            'notes' => $this->randString(20, 50),
            'days_from_start' => rand(0, 100),
            'created' => $now,
            'modified' => $now
        );
        if (isset($contactMemberMap[$contactId])) {
            $data['member_id'] = $contactMemberMap[$contactId];
        } else {
            $data['member_id'] = null;
        }
        return $data;
    }

    public function getTable()
    {
        return 'trail_task_templates';
    }

}
