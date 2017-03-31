<?php


/**
 * Class ImageMapImage
 */
class ImageMapImage extends DataExtension
{

    /**
     * @var array
     */
    private static $db = array(
        'ImageMapCoordinates' => 'Text'
    );


    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        $f = new ImageMapField($this->owner);
        if ($fields->hasTabSet()) {
            $fields->addFieldToTab('Root.Main', $f);
        } else {
            $fields->add($f);
        }
    }

}
