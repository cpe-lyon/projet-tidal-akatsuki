<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    include_once(PATH_MODELS . 'pathologie.php');


    $param = $_GET["param"];
    $patho = new pathologie($bdd);
    $patho->lirePatho($param);
    $url = $_SERVER['REQUEST_URI'];
    $url = explode('=', $url);
    $url = explode('/', $url[0]);
    $categorie = $url[2];

    if ($patho->idp != null) {

        $pathogie = [
            "id" => $patho->idp,
            $categorie . " " . $param => $patho->pathos
        ];
        // OK
        http_response_code(200);

        echo json_encode($pathogie);
    } else {
        // Erreur
        http_response_code(404);
        echo json_encode(array("message" => "Non existant"));
    }
} else {
    // Methode différente de GET
    http_response_code(405);
    echo json_encode(["message" => "méthode non autorisée"]);
}
