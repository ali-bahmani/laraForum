<?php

namespace App\Http\Controllers\Api\V01\Chanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chanel;

class ChanelController extends Controller
{
    public function chanels()
    {
        return response()->json(Chanel::all(), 200);;
    }

    public function create(Request $request)
    {
        $validation = $request->validate([
            'name' => ['required'],
            'slug' => ['required']
        ]);

        Chanel::create([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        return response()->json([
            'message' => 'New chanel created successfully'
        ], 201);
    }

    public function edit(Request $request)
    {
        $validation = $request->validate([
            'name' => ['required'],
            'slug' => ['required']
        ]);

        $chanel = Chanel::find($request->id);
        $chanel->update([
            'name'=>$request->name,
            'slug'=>$request->slug
        ]);

        return response()->json([
            'message' => 'Chanel edited successfully'
        ], 200);
    }

    public function delete(Request $request)
    {
        Chanel::destroy($request->id);

        return response()->json([
            'message' => 'Chanel deleted successfully'
        ], 200);
    }
}
