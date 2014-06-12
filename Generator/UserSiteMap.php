<?php

class UserSiteMap extends SampleDataGenerator
{
    public function buildData($options = array())
    {
        $index = $options['index'];
        return array(
            'user_id' => $index + 1,
            'site_id' => 1,
            'enabled' => $this->randBoolean(),
            'created' => date('Y-m-d H:i:s', time())
        );
    }

    public function getTable()
    {
        return 'user_site_map';
    }

}
