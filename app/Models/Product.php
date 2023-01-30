<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = ['descricao', 'preco', 'quantidade', 'total'];


    protected $product;

    
    public function __construct(array $attributes = array()){
        parent::__construct($attributes);
        $this->product = $this->createProduct();
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }


    public function createProduct(){
      
        $produto = [
            'descricao'=> $this->descricao,
            'preco'=>$this->preco,
            'quantidade'=>$this->quantidade,
            'total'=> $this->total
        ];

        return $produto;
    }

}
