<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\Curl;

class SearchController extends BaseController
{
    public function index()
    {
        $data['results'] = [];
        return view('search', $data);
    }

    public function search()
    {

        $type = $name = $this->request->getPost('type');

        // Load the cURL library
        $curl = new Curl();

        $url = '';
        if ($type == 'image') {
            $url = 'https://pixabay.com/api/?key=44973935-79aa34c8671af64f5665c49c8&q=' . $this->encodeURIComponent($this->request->getPost('search'));
        } 
        if ($type == 'video') {
            $url = 'https://pixabay.com/api/videos/?key=44973935-79aa34c8671af64f5665c49c8&q=' . $this->encodeURIComponent($this->request->getPost('search'));
        }
        
      
        $response = $curl->request($url, 'GET');

        // Process the response
        $results = json_decode($response);
        $data['results'] = $results->hits;

        return view('search', $data);
    }

    function encodeURIComponent($str) {
        $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
        return strtr(rawurlencode($str), $revert);
    }
}
