<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Project;

class PageController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('pages/home', compact('user'));
    }

    public function results(Request $request) {
        
        $search = $request->search;
  
        return redirect('search/'.urlencode($search));
    }

    public function search(Request $request, $keyword) {

        $client = new Client();

        $res = $client->request('GET', "https://api.behance.net/v2/projects?q=".urlencode($keyword)."&client_id=".env("BEHANCE_KEY")."&field=".urlencode("web design"));

        $data = $res->getBody();
        $data = json_decode($data);
        $filteredData = $data->projects;

        $inspirationsArray = Project::where('user_id', Auth::id())->where('active', 1)->first();
        $inspirationsArray = $inspirationsArray->inspirations;
        $inspiArrayInfo = [];

        foreach($inspirationsArray as $image) {
            array_push($inspiArrayInfo, $image->image_info);
        }

        //return $inspiArrayInfo;

        $user = Auth::user();
        return view('pages/results', compact('user', 'filteredData', 'keyword', 'inspiArrayInfo'));
    }
}
