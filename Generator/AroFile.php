<?php

class AroFile extends SampleDataGenerator
{    
    public function getFiles()
    {
        return array(
            array(
                'id' => '96139fa6-cb5b-11e3-8c05-b8ca3a8fe385',
                'storage' => 1,
                'typeId' => 3,
                'name' => '94a761e4-cb75-11e3-8c05-b8ca3a8fe385_thumb.png',
                'path' => '/aro_software_dev/contacts/3/images/94a761e4-cb75-11e3-8c05-b8ca3a8fe385_thumb.png',
                'url' => 'https://arosoftwaredev.s3-ap-southeast-2.amazonaws.com/aro_software_dev/contacts/3/images/94a761e4-cb75-11e3-8c05-b8ca3a8fe385_thumb.png',
                'size' => 3780,
                'mime_type' => 'image/webp',
                'ext' => 'png'
            )
        );
    }
    
    public function buildData($options = array())
    {
        $index = $options['index'];
        $files = $this->getFiles();
        return array(
            'id' => $files[$index]['id'],
            'storage_repo_id' => $files[$index]['storage'],
            'file_type_id' => $files[$index]['typeId'],
            'file_name' => $files[$index]['name'],
            'extension' => $files[$index]['ext'],
            'file_path' => $files[$index]['path'],
            'file_url' => $files[$index]['url'],
            'size' => $files[$index]['size'],
            'mime_type' => $files[$index]['mime_type']
        );
    }

    public function getTable()
    {
        return 'file';
    }

}
