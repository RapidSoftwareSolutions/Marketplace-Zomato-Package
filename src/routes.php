<?php
$routes = [
    'metadata',
    'getAllCategories',
    'getCitiesBySearchQuery',
    'getCitiesByCoordinates',
    'getCities',
    'getCollection',
    'getCollectionsByCoordinates',
    'getCuisines',
    'getCuisinesByCoordinates',
    'getEstablishments',
    'getEstablishmentsByCoordinates',
    'getLocationDetailsByCoordinates',
    'getLocationBySearchQuery',
    'getLocationDetails',
    'getDailyMenu',
    'getRestaurant',
    'getReviews',
    'getSearch'




];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}
