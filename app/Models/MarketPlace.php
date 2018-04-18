<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MarketPlace extends Model
{
    protected $table = "market_place_tbl";
    public $primaryKey = "id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = [
        'id','market_name',"market_logo"
    ];
    
    function __construct()
    {
        
    }
    //
    static function all_MarketPlace()
    {
       
        $MarketPlace = DB::table('market_place_tbl')->get();
        return $MarketPlace;
    }

    static function all_MarketPlace_by_market_id($id)
    {
       
        $MarketPlace = DB::table('market_place_tbl')->where('id',$id)->first();
        return $MarketPlace;
    }

    static function detail_MarketPlace($id)
    {
        $MarketPlace = DB::table('market_place_tbl')->where('id',$id)->first();
        return $MarketPlace;
    }

    public function insert_MarketPlace($data)
    {
        $market_name     = $data["market_name"];
        $market_logo     = $data["market_logo"]; 

        return DB::table('market_place_tbl')->insert([
            'market_name' => $market_name, 
            'market_logo' => $market_logo
        ]);
    }

    public function update_MarketPlace($data)
    {
        $market_name     = $data["market_name"];
        $market_logo     = $data["market_logo"];

        return DB::table($table)->where('id',$data['id'])->update([
            'market_name' => $market_name, 
            'market_logo' => $market_logo
        ]);
    }


    function delete_MarketPlace($MarketPlace_id)
    {
        DB::table('market_place_tbl')->where($this->primaryKey, $MarketPlace_id)->delete();
    }

    static function get_market_by_id_product($id)
    {
        $MarketPlace = DB::table('detail_product_market_palce_tbl')->where('product_id',$id)->get();
        return $MarketPlace;
    }

}
