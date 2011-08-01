<?php
use ezp\Base\Service\Container;

$sc = new Container();
$locationService = $sc->getRepository()->getLocationService();

$newParentLocationId = 40;
$locationId = 60;

try
{
    $newParentLocation = $locationService->load( $newParentLocationId );
    $location = $locationService->load( $locationId );
    $locationService->move( $location, $newParentLocation );
}
catch ( ezp\Base\Exception\Forbidden $e )
{
    echo "Permission issue occurred: {$e->getMessage()}\n";
    exit;
}
?>
