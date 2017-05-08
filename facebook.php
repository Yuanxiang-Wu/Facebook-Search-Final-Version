<?php
    header('Access-Control-Allow-Origin:*'); 
    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__ . '/php-graph-sdk-5.0.0/src/Facebook/autoload.php';
    $fb = new Facebook\Facebook([
        'app_id' => '248335022303052',
        'app_secret' => '8e254423c15ede506380a9123b1394ea',
        'default_graph_version' => 'v2.8',
        'default_access_token' => 'EAADh3ADKJ0wBALDA5eDgCELhaGeB0gHttq2qpw4rmPZBzOBRjvD05ez2ZAku7khx24QI9OZC1ZAwF1BpVUHxndLZA4VYsa5RAdOFfMO5FOuf9bsDC0mC7UqcqM9w7K0ZB5NTOI4rjVVuQLTE5MFGSIkZBuVtHbci8oZD',
    ]);
//    $requestUser = $fb->request('GET', '/search?q=usc&type=user&fields=id,name,picture.width(700).height(700)');
//    $requestPage = $fb->request('GET', '/search?q=usc&type=page&fields=id,name,picture.width(700).height(700)');
//    $batch = [
//        'users' => $requestUser,
//        'pages' => $requestPage,
//    ];
//    $responses = $fb -> sendBatchRequest($batch);
//    $Node = $responses->getGraphNode();
//    //var_dump($Node);
//    echo $Node[0]->getDecodedBody();
    

//    if($_GET['type'] == 'user') {
//        $target = '/search?q='.$_GET['key'].'&type=user&fields=id,name,picture.width(700).height(700)';
//        $response = $fb->get($target);
//        //$response = $fb->get('/search?q=usc&type=user&fields=id,name,picture.width(700).height(700)');
//        $reqUser = $response->getGraphEdge();
//        //var_dump($graphEdge);
//        echo $graphEdge;
//        //$next = $fb -> next($graphEdge);
//        //echo $next;
//    }
if (isset($_GET['pageNum'])) {
    if ($_GET['type'] == 'user'){
        $target = '/search?q='.$_GET['key'].'&type=user&fields=id,name,picture.width(700).height(700)';
        $response = $fb->get($target);
        $reqUser = $response->getGraphEdge();
        for ($i = 0; $i < $_GET['pageNum']; $i++) {
            $reqUser = $fb->next($reqUser);
        }
        echo $reqUser;
    }
    if ($_GET['type'] == 'page'){
        $target = '/search?q='.$_GET['key'].'&type=user&fields=id,name,picture.width(700).height(700)';
        $response = $fb->get($target);
        $reqUser = $response->getGraphEdge();
        for ($i = 0; $i < $_GET['pageNum']; $i++) {
            $reqUser = $fb->next($reqUser);
        }
        echo $reqUser;
    }
    if ($_GET['type'] == 'event'){
        $target = '/search?q='.$_GET['key'].'&type=user&fields=id,name,picture.width(700).height(700)';
        $response = $fb->get($target);
        $reqUser = $response->getGraphEdge();
        for ($i = 0; $i < $_GET['pageNum']; $i++) {
            $reqUser = $fb->next($reqUser);
        }
        echo $reqUser;
    }
    if ($_GET['type'] == 'group'){
        $target = '/search?q='.$_GET['key'].'&type=user&fields=id,name,picture.width(700).height(700)';
        $response = $fb->get($target);
        $reqUser = $response->getGraphEdge();
        for ($i = 0; $i < $_GET['pageNum']; $i++) {
            $reqUser = $fb->next($reqUser);
        }
        echo $reqUser;
    }
    if ($_GET['type'] == 'place'){
    $google_api_key = "&key=AIzaSyDyB6xNPmkVIfH3gvsr1pJSJLus1oZjqcM";
    $googleURL = "https://maps.googleapis.com/maps/api/geocode/json?address=".$_GET['key'].$google_api_key;
    $google_response = file_get_contents($googleURL);
    $json_array = json_decode($google_response, true);
    $lat = $json_array['results'][0]['geometry']['location']['lat'];
    $lng = $json_array['results'][0]['geometry']['location']['lng'];
    $target='/search?q='.$_GET['key'].'&type=place&fields=id,name,picture.width(700).height(700)&center='.$lat.",".$lng;
    $response = $fb->get($target);
    $reqPlace = $response->getGraphEdge();
    for ($i = 0; $i < $_GET['pageNum']; $i++) {
            $reqPlace = $fb->next($reqUser);
    }
    echo $reqPlace;
    }
    
    
} else {
    if (isset($_GET['key']) && $_GET['key']!='' && isset($_GET['type'])) {
    if ($_GET['type'] == 'user'){
    $target = '/search?q='.$_GET['key'].'&type=user&fields=id,name,picture.width(700).height(700)';
    $response = $fb->get($target);
    $reqUser = $response->getGraphEdge();
    echo $reqUser;
    }
    if ($_GET['type'] == 'page'){
    $target = '/search?q='.$_GET['key'].'&type=page&fields=id,name,picture.width(700).height(700)';
    $response = $fb->get($target);
    $reqPage = $response->getGraphEdge();
    echo $reqPage;
    }
    if ($_GET['type'] == 'event'){
    $target = '/search?q='.$_GET['key'].'&type=event&fields=id,name,picture.width(700).height(700)';
    $response = $fb->get($target);
    $reqEvent = $response->getGraphEdge();
    echo $reqEvent;
    }
    if ($_GET['type'] == 'group'){
    $target = '/search?q='.$_GET['key'].'&type=group&fields=id,name,picture.width(700).height(700)';
    $response = $fb->get($target);
    $reqGroup = $response->getGraphEdge();
    echo $reqGroup;
    }
    //place query
    if ($_GET['type'] == 'place'){
    $google_api_key = "&key=AIzaSyDyB6xNPmkVIfH3gvsr1pJSJLus1oZjqcM";
    $googleURL = "https://maps.googleapis.com/maps/api/geocode/json?address=".$_GET['key'].$google_api_key;
    $google_response = file_get_contents($googleURL);
    $json_array = json_decode($google_response, true);
    $lat = $json_array['results'][0]['geometry']['location']['lat'];
    $lng = $json_array['results'][0]['geometry']['location']['lng'];
    $target='/search?q='.$_GET['key'].'&type=place&fields=id,name,picture.width(700).height(700)&center='.$lat.",".$lng;
    $response = $fb->get($target);
    $reqPlace = $response->getGraphEdge();
    echo $reqPlace;
    }
//    $result = '{"users":'.$reqUser.', "pages": '.$reqPage.', "events":'.$reqEvent.', "places": '.$reqPlace.', "groups": '.$reqGroup.'}';
//    var_dump(json_decode($result)); 
//    echo json_decode($result);
    }
}

if (isset($_GET['id'])) {
    $target = "/".$_GET["id"]."?fields=albums.limit(5){name,photos.limit(2){name, picture}},posts.limit(5){created_time}";
    $response = $fb->get($target);
    $graphNode = $response->getGraphNode();
    echo $graphNode;
}
?>  