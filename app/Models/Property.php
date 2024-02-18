<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\Schema;

class Property extends Model
{
    use HasFactory;

protected $fillable = [
    "title",
    "address",
    "price",
    "bedrooms",
    "bathrooms",
    "type",
    "status",
];

public const  TYPE_OPTIONS = ["Apartment","Villa","Townhouse","Duplex","Loft","Studio","Bungalow"];
public const  STATUS_OPTIONS = ["Available","Under Construction","Rented","Sold","Under Offer"];

private static function getTableAttributes(){
    return Schema::getColumnListing((new Property())->getTable());
}

public static function getAll($filters =[] , $limit = 30){
   $query =  self::query();
   foreach ($filters as $key => $value)
        if(in_array($key , self::getTableAttributes()))
            $query->where($key ,"=",$value);
   return $query->limit($limit)->orderByDesc("created_at")->get();
}

public static function manage($attributes , $id = null){
    $property = null;
    if ($id){
        $property = self::find($id);
        if(! $property)
            return false;
    }
    else
        $property = new self();

    foreach ($attributes as $key => $value)
        if (in_array($key , self::getTableAttributes()))
            $property->$key = $value;

    $property->save();
    return $property->id;
}

public static function deleteById($id){
    $Property = self::find($id);
    if (!$Property)
        return false;
    $Property->delete();
}

}
