[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/Zomato/functions?utm_source=RapidAPIGitHub_ZomatoFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)
# Zomato Package
Zomato APIs give you access to the freshest and most exhaustive information for over 1.5 million restaurants across 10,000 cities globally. With the Zomato APIs, you can : Search for restaurants by name, cuisine, or location; Display detailed information including ratings, location and cuisine;Use the Zomato Foodie Index to show great areas to dine in a city.
* Domain: [www.zomato.com](https://www.zomato.com)
* Credentials: apiKey

## How to get credentials: 
1. Register on [www.zomato.com](https://www.zomato.com).
2. After creation your account generate apiKey.
 
 ## Custom datatypes:
   |Datatype|Description|Example
   |--------|-----------|----------
   |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
   |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
   |List|Simple array|```["123", "sample"]```
   |Select|String with predefined values|```sample```
   |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 
## Zomato.getAllCategories
Get a list of categories. List of all restaurants categorized under a particular restaurant type can be obtained using getSearch endpoint with Category ID as inputs.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| API key.

## Zomato.searchCity
Find the Zomato ID and other details for a city. City Name in the Search Query - Returns list of cities matching the query. 

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| API key.
| searchQuery| String     | Query by city name.
| count      | Number     | Number of max results to display.

## Zomato.getCitiesByCoordinates
Find the Zomato ID and other details for a city. Using coordinates - Identifies the city details based on the coordinates of any location inside a city. 

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| API key.
| coordinates| Map        | The latitude and longitude of the find place.
| count      | Number     | Number of max results to display.

## Zomato.getCities
If you already know the Zomato City ID, this endpoint can be used to get other details of the city.

| Field  | Type       | Description
|--------|------------|----------
| apiKey | credentials| API key.
| cityIds| List       | List of city ids.

## Zomato.getCollection
Returns Zomato Restaurant Collections in a City by cityId.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| API key.
| cityId| Number     | Single city id.
| count | Number     | Number of max results to display.

## Zomato.getCollectionsByCoordinates
Returns Zomato Restaurant Collections in a City by coordinates.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| API key.
| coordinates| Map        | The latitude and longitude of the find place.
| count      | Number     | Number of max results to display.

## Zomato.getCuisines
Get a list of all cuisines of restaurants listed in a city by cityId.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| API key.
| cityId| Number     | Single city id.

## Zomato.getCuisinesByCoordinates
Get a list of all cuisines of restaurants listed in a city by coordinates.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| API key.
| coordinates| Map        | The latitude and longitude of the find place.

## Zomato.getEstablishments
Get a list of restaurant types in a city by id.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| API key.
| cityId| Number     | Single city id.

## Zomato.getEstablishmentsByCoordinates
Get a list of restaurant types in a city by coordinates.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| API key.
| coordinates| Map        | The latitude and longitude of the find place.

## Zomato.getLocationDetailsByCoordinates
Get Foodie and Nightlife Index, list of popular cuisines and nearby restaurants around the given coordinates.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| API key.
| coordinates| Map        | The latitude and longitude of the find place.

## Zomato.searchLocation
Search for Zomato locations by keyword. 

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| API key.
| searchQuery| String     | Suggestion for location name.
| coordinates| Map        | Provide coordinates to get better search results.
| count      | Number     | Number of max results to display.Default:1.

## Zomato.getLocationDetails
Get Foodie Index, Nightlife Index, Top Cuisines and Best rated restaurants in a given location.

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| API key.
| entityId  | Number     | Location id obtained from searchLocation,getLocationDetails or getLocationDetailsByCoordinates endpoints.
| entityType| Select     | Location type obtained from searchLocation,getLocationDetails or getLocationDetailsByCoordinates endpoints.Options - city,subzone,zone,metro,group,landmark.

## Zomato.getDailyMenu
Get daily menu using Zomato restaurant ID.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| API key.
| restaurantId| Number     | Id of restaurant whose details are requested.

## Zomato.getRestaurant
Get detailed restaurant information using Zomato restaurant ID.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| API key.
| restaurantId| Number     | Id of restaurant whose details are requested.

## Zomato.getReviews
Get restaurant reviews using the Zomato restaurant ID. Only 5 latest reviews are available under the Basic API plan.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| API key.
| restaurantId| Number     | Id of restaurant whose details are requested.
| count       | Number     | Number of max results to display.
| offset      | Number     | Fetch results after this offset.

## Zomato.search
The location input can be specified using Zomato location ID or coordinates. Cuisine / Establishment / Collection IDs can be obtained from respective api calls.Get up to 100 restaurants by changing the 'start' and 'count' parameters with the maximum value of count being 20. Partner Access is required to access photos and reviews.
To search for 'Italian' restaurants in 'Manhattan, New York City', set ```cuisines = 55, entity_id = 94741 and entity_type = zone```
To search for 'cafes' in 'Manhattan, New York City', set ```establishment_type = 1, entity_type = zone and entity_id = 94741```
Get list of all restaurants in 'Trending this Week' collection in 'New York City' by using ```entity_id = 280, entity_type = city and collection_id = 1```.

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| API key.
| entityId       | Number     | Location id from getLocation... endpoints.
| entityType     | Select     | Location type obtained from searchLocation,getLocationDetails or getLocationDetailsByCoordinates endpoints. Options - city,subzone,zone,metro,group,landmark.
| searchQuery    | String     | Search keyword.
| count          | Number     | Number of max results to display.
| offset         | Number     | Fetch results after this offset.
| coordinates    | Map        | The latitude and longitude of the find place.
| radiusSearch   | String     | Radius around (lat,lon); to define search area, defined in meters(M).
| cuisinesIds    | List       | List of cuisines ids.
| establishmentId| String     | Establishment id obtained from getEstablishments or getEstablishmentsByCoordinates endpoints.
| collectionId   | String     | Collection id obtained from getCollection or getCollectionById endpoint.
| categoryId     | String     | Category id obtained from getCategories endpoint.
| sort           | Select     | Sort restaurants by cost,rating,realDistance.                                                   				                                                    					
| order          | Select     | used with 'sort' parameter to order results. Options - descending,ascending.

