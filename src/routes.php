<?php
$routes = [
    'metadata',
    'getAllCategories',
    'searchCity',
    'getCitiesByCoordinates',
    'getCities',
    'getCollection',
    'getCollectionsByCoordinates',
    'getCuisines',
    'getCuisinesByCoordinates',
    'getEstablishments',
    'getEstablishmentsByCoordinates',
    'getLocationDetailsByCoordinates',
    'searchLocation',
    'getLocationDetails',
    'getDailyMenu',
    'getRestaurant',
    'getReviews',
    'search'




];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}
