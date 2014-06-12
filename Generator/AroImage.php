<?php

class AroImage extends SampleDataGenerator
{    
    public function getImages()
    {
        return array(
            array(
                'fileId' => '96139fa6-cb5b-11e3-8c05-b8ca3a8fe385',
                'width' => 767,
                'height' => 366
            )
        );
    }
    
    public function buildData($options = array())
    {
        $index = $options['index'];
        $images = $this->getImages();
        return array(
            'file_id' => $images[$index]['fileId'],
            'width' => $images[$index]['width'],
            'height' => $images[$index]['height']
        );
    }

    public function getTable()
    {
        return 'image';
    }

}
