<?php

/**
 * Assume that:
 * $content's mainLocale is eng-GB
 */

use ezp\Base\Service\Container;

$sc = new Container();
$contentService = $sc->getRepository()->getContentService();
$content = $contentService->load( 2 );

$content->mainLocale = ezp\Base\Locale::get( 'fre-FR' );

$contentService->update( $content );
