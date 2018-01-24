<?php

namespace App\Http\Controllers\Ebay;

use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp;

class EbayTaxonomyAPI extends Controller {
    
    private static function getDefaultCategoryTreeId() {
        $client = new GuzzleHttp\Client(['headers' => ['Authorization' => 'Bearer ' . self::authenticate()]]);
        $response = $client->get('https://api.ebay.com/commerce/taxonomy/v1_beta/get_default_category_tree_id?marketplace_id=EBAY_US');
        
        return json_decode((string)$response->getBody());
    }
    
    private static function authenticate(){
        $base64Auth = base64_encode('PugVentu-Primary-PRD-d5d7504c4-fe7871e2:PRD-5d7504c42790-3986-4fac-a791-e208');
        $client = new GuzzleHttp\Client(['headers' => ['Content-Type' => 'application/x-www-form-urlencoded', 'Authorization' => 'Basic ' . $base64Auth]]);
        $response = $client->post('https://api.ebay.com/identity/v1/oauth2/token', ['body' => 'grant_type=client_credentials&redirect_uri=Pug_Ventures__L-PugVentu-Primar-sqsmzjswb&scope=https://api.ebay.com/oauth/api_scope']);
        return json_decode((string)$response->getBody())->access_token;
    }
    
    public static function getCategoryTree() {
        $client = new GuzzleHttp\Client(['headers' => ['Authorization' => 'Bearer ' . self::authenticate(), 'Accept-Encoding' => 'application/gzip']]);
        $response = $client->get('https://api.ebay.com/commerce/taxonomy/v1_beta/category_tree/' . self::getDefaultCategoryTreeId()->categoryTreeId);
        
        return json_decode((string)$response->getBody());
    }
    
    public static function getCategorySubTree($categoryId) {
        $client = new GuzzleHttp\Client(['headers' => ['Authorization' => 'Bearer ' . self::authenticate(), 'Accept-Encoding' => 'application/gzip']]);
        $response = $client->get('https://api.ebay.com/commerce/taxonomy/v1_beta/category_tree/' . self::getCategoryTree()->categoryTreeId . '/get_category_subtree?category_id=' . $categoryId);
        
        return json_decode((string)$response->getBody());
    }
    
    public static function getCategorySuggestions(Request $request) {
        $client = new GuzzleHttp\Client(['headers' => ['Authorization' => 'Bearer ' . self::authenticate(), 'Accept-Encoding' => 'application/gzip']]);
        $response = $client->get('https://api.ebay.com/commerce/taxonomy/v1_beta/category_tree/' . self::getCategoryTree()->categoryTreeId . '/get_category_suggestions?q=' . $request->get('title'));
        
        return $response->getBody();
    }
    
    public static function getCategoryItemAspects(Request $request) {
        $client = new GuzzleHttp\Client(['headers' => ['Authorization' => 'Bearer ' . self::authenticate()]]);
        $response = $client->get('https://api.ebay.com/commerce/taxonomy/v1_beta/category_tree/' . self::getCategoryTree()->categoryTreeId . '/get_item_aspects_for_category?category_id=' . $request->get('categoryId'));
        
        return $response->getBody();
    }

}