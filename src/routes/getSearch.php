<?php


$app->post('/api/Zomato/getSearch', function ($request, $response) {


    $option = array(
        "apiKey" => "apiKey",
        "entityId" => "entity_id",
        "entityType" => "entity_type",
        "searchQuery" => "q",
        "offset" => "start",
        "count" => "count",
        "coordinates" => "coordinates",
        "radiusSearch" => "radius",
        "cuisinesIds" => "cuisines",
        "establishmentId" => "establishment_type",
        "collectionId" => "collection_id",
        "categoryId" => "category",
        "sort" => "sort",
        "order" => "order"

    );


    $arrayType = array("cuisinesIds" => ",");

    $url = '/search';
    $settings = $this->settings;
    $url = $settings['baseUrl'].$url;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey']);
    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $postData = $validateRes;
    }




    //Change alias and formatted array
    foreach($option as $alias => $value)
    {

        if(!empty($postData['args'][$alias]))
        {

            if(isset($arrayType[$alias]))
            {
                $postData['args'][$alias] = implode($arrayType[$alias],$postData['args'][$alias]);
            }

            $queryParam[$value] = $postData['args'][$alias];
        }
    }


    if(!empty($queryParam['sort']) && $queryParam['sort'] == 'realDistance')
    {
        $queryParam['sort'] = 'real_distance';
    }



    $client = $this->httpClient;
    $apiKey = $queryParam['apiKey'];
    if(!empty($queryParam['coordinates']))
    {
        $queryParam['lat']  = '';
        $queryParam['lon'] = '';
        $part = explode(',',$queryParam['coordinates']);
        if(!empty($part[0]) && !empty($part[1]))
        {
            $queryParam['lat'] = trim($part[0]);
            $queryParam['lon'] = trim($part[1]);
        }

        unset($queryParam['coordinates']);

    }


    try {

        $resp =  $client->request('GET', $url ,['query' => $queryParam,'headers' => ['user-key' => $apiKey]] );



        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {

            $dataBody = $resp->getBody()->getContents();

            $result['callback'] = 'success';
            $result['contextWrites']['to'] = array('result' => json_decode($dataBody) );




        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = $resp->getBody()->getContents();
        }
    } catch (\GuzzleHttp\Exception\ClientException $exception) {
        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;
    } catch (GuzzleHttp\Exception\ServerException $exception) {
        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;
    } catch (GuzzleHttp\Exception\ConnectException $exception) {
        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';
    }
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);



});
