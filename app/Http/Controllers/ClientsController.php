<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Clients;

class ClientsController extends Controller
{
    //

    public function allClient(){
        $clients = Clients::all();
        return view('Clients.allclients', [
            'clients' => $clients
        ]);
    }

    public function newClient(){
        return view('Clients.newclient');
    }

    public function createClient(Request $request){

        $client = New Clients;
        $client->client_name = $request->client_name;
        $client->brands = $request->brands;
        $client->save();

        return redirect('/clients');
    }

    public function updateClient($id){
        $client = Clients::where('client_id', '=', $id)->first();
        return view('Clients.editclient', [
            'client' => $client
        ]);
    }

    public function updateClientPost(Request $request){
        Clients::where('client_id', '=', $request->client_id)->update([
            'client_name' => $request->client_name,
            'brands' => $request->brands
        ]);

        return redirect('/clients');
    }


    /*===================================================================================
    ================================ API CALLS ==========================================
    ===================================================================================*/

    public function allClientsAPI(){
        $clients = Clients::all();
        return response()->json($clients);
    }

    public function clientBrandsAPI($clientName){
        $brands = Clients::where('client_name', '=', $clientName)->first();
        return response()->json(explode(",", $brands->brands));

    }
    


}
