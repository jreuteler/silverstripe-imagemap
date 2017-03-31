<?php

/**
 * Class ImageMapField
 */
class ImageMapField extends FieldGroup
{

    /**
     * ImageMapField constructor.
     * @param Image $image
     */
    public function __construct(Image $image)
    {
        // framework
        Requirements::javascript(FRAMEWORK_DIR . '/thirdparty/jquery/jquery.js');
        Requirements::javascript(FRAMEWORK_DIR . '/thirdparty/jquery-entwine/dist/jquery.entwine-dist.js');

        // extension
        Requirements::javascript(IMAGEMAP_DIR . '/vendor/canvas-area-draw/jquery.canvasAreaDraw.min.js');
        // TODO: fix bug of not drawing image correctly after saving

        $coordinates = '';
        if ($this->owner && isset($this->owner->ImageMapCoordinates)) {
            $coordinates = $this->owner->ImageMapCoordinates;
        }

        $fields = array(
            TextareaField::create('ImageMapCoordinates')->addExtraClass('canvas-area')
                ->addExtraClass('input-xxlarge')
                ->setAttribute('data-image-url', $image->getURL())

                ->setValue($coordinates)
        );
        $this->setName('ImageMap');
        $this->setTitle(_t('ImageMapField.IMAGEMAP', 'Image Map'));


        parent::__construct($fields);
    }
}
