<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupom extends Model
{
    use HasFactory;

    public $fillable = ['cupom', 'desconto'];

    protected $cupom;
      
    public function __construct(array $attributes = array()){
        parent::__construct($attributes);
        $this->cupom = $this->createCupom();
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    private function createCupom(){
        $cupom = [
            'cupom'=>$this->cupom,
            'desconto'=>$this->desconto
        ];

        return $cupom;
    }
}
