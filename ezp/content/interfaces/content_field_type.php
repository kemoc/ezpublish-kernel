<?php
/**
 * File contains Interface for Content Field Type
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2.0
 * @package ezp
 * @subpackage content
 */

/**
 * Interface for Content Field Type (Content Attribute Datatype class)
 *
 * @package ezp
 * @subpackage content
 */
namespace ezp\content;
interface ContentFieldTypeInterface
{
    /**
     * Called when content object field type is constructed
     *
     * This function can safely set default values, as values from db will be set afterwards if this is not a new object
     *
     * @param ContentFieldDefinitionInterface $contentTypeFieldType
     */
    public function __construct( ContentFieldDefinitionInterface $contentTypeFieldType );
}