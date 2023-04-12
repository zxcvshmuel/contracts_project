<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContractController extends Controller
{

    public function show(Contract $contract, Request $request){

        if (!$contract->opened)
        {
            $contract->opened = true;
            $contract-> open_at = date('Y-m-d H:i:s');
            $contract->save();
        }

        $data = [
            'contract' => $contract,
            'event' => $contract->event,
            'customer' => $contract->event->customer,
            'user' => $contract->event->customer->user,
        ];

        return view('contract.show', compact('data'));
    }

    public function update(Contract $contract, Request $request)
    {


        $request->validate(['data' => 'required']);
        $imageName = time().'id'.$contract->id.'.png';
        //$image = \Image::make($request->data);
        $image = explode(',', $request->data)[1];
        if ($contract->signed_url === null || Storage::disk('local')->put('public/signatures/'. $imageName, base64_decode($image)))
        {
            $contract->signe_data = $request;
            $contract->signed = true;
            $contract->signe_at = date('Y-m-d H:i:s');
            $contract->signed_url = $imageName;
            $contract->save();

            $status = 200;
            $response = $contract->signed_url;
        }else{
            $status = 200;
            $response = 'failed';
        }



        return response()->json([$response], $status);
    }
}
