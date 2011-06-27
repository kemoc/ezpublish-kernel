<?php
/**
 * File contains Content Type Field (content class attribute) class
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2.0
 * @package ezp
 * @subpackage content
 */

/**
 * Content Type Field (content class attribute) class
 *
 * @property-read string $fieldTypeString
 */
namespace ezp\content;
class ContentTypeField extends AbstractField
{
    /**
     * @var array Readable of properties on this object
     */
    protected $readableProperties = array(
        'id' => false,
        'version' => false,
        'data_text1' => false,
        'data_text2' => false,
        'data_text3' => false,
        'data_text4' => false,
        'data_text5' => false,
        'data_int1' => false,
        'data_int2' => false,
        'data_int3' => false,
        'data_int4' => false,
        'data_float1' => false,
        'data_float2' => false,
        'data_float3' => false,
        'data_float4' => false,
        'identifier' => true,
        'fieldTypeString' => true,
        'contentFields' => false,
    );

    /**
     * @var array Dynamic properties on this object
     */
    protected $dynamicProperties = array(
        'type' => true,
        'contentType' => false,
        'contentTypeId' => false,
    );

    /**
     * Constructor, sets up empty contentFields collection and attach $contentType
     *
     * @param ContentType $contentType
     */
    public function __construct( ContentType $contentType )
    {
        $this->contentType = $contentType;
        $this->contentFields = new \ezp\base\TypeCollection( '\ezp\content\Field' );
    }

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $version;

    /**
     * @var string
     */
    public $identifier;

    /**
     * @var string
     */
    protected $data_text1;

    /**
     * @var string
     */
    protected $data_text2;

    /**
     * @var string
     */
    protected $data_text3;

    /**
     * @var string
     */
    protected $data_text4;

    /**
     * @var string
     */
    protected $data_text5;

    /**
     * @var int
     */
    protected $data_int1;

    /**
     * @var int
     */
    protected $data_int2;

    /**
     * @var int
     */
    protected $data_int3;

    /**
     * @var int
     */
    protected $data_int4;

    /**
     * @var float
     */
    protected $data_float1;

    /**
     * @var float
     */
    protected $data_float2;

    /**
     * @var float
     */
    protected $data_float3;

    /**
     * @var float
     */
    protected $data_float4;

    /**
     * @var string
     */
    public $fieldTypeString;


    /**
     * @var int
     */
    public $placement;

    /**
     * @var ContentField[]
     */
    protected $contentFields;

    /**
     * @var ContentType
     */
    protected $contentType;

    /**
     * Return content type object
     *
     * @return ContentType
     */
    protected function getContentType()
    {
        if ( $this->contentType instanceof Proxy )
        {
            $this->contentType = $this->contentType->load();
        }
        return $this->contentType;
    }

    /**
     * Return content type id
     *
     * @return int
     */
    protected function getContentTypeId()
    {
        if ( $this->contentType instanceof Proxy || $this->contentType instanceof ContentType )
        {
            return $this->contentType->id;
        }
        return 0;
    }

    /**
     * Called when subject has been updated
     *
     * @param \ezp\base\ObservableInterface $subject
     * @param string $event
     * @return ContentTypeField
     */
    public function update( \ezp\base\ObservableInterface $subject, $event = 'update' )
    {
        if ( $subject instanceof ContentType )
        {
            return $this->notify( $event );
        }
        return parent::update( $subject, $event );
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->identifier;
    }
}