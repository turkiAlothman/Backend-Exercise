<?php

namespace App\Http\Controllers;

use App\Http\Requests\createRequest;
use App\Http\Requests\updateRequest;
use App\Models\Property;
use http\Env\Response;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public static function index(Request $request , Property $Property){
        return \response()->json($Property->toArray());
}
    public static function getProperties(Request $request){
        $QueryParameters = $request->query();
        $Properties = Property::getAll($QueryParameters);
        return \response()->json($Properties->toArray());
    }
    public static function delete(Request $request, Property $Property){
        # no need to check whether the user exist or not . automatically will response with 404.
        $Property->delete();
        return \response()->json(["message"=>"Property with id deleted successfully"]);
    }
    public static function create(createRequest $request){
        Property::manage($request->all());
        return \response()->json(["message"=>"Property created successfully"]);
    }
    public static function update(updateRequest $request , Property $Property){
        Property::manage($request->all(),$Property->id);
        return \response()->json(["message"=>"Property updated successfully"]);
    }

}
