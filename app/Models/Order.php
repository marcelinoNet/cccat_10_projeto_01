<?php

namespace App\Models;

use Error;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = true;
    public $fillable = ['total', 'order_id', 'cupom_id'];


    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function cupom()
    {
        return $this->hasOne(Cupom::class);
    }



    public function createNewOrderAndReturnTotal(array $products, Cupom $cupom = null, string $cpf)
    {

      
        $validade_cpf = new CPF(['cpf' => $cpf]);
        if(!$validade_cpf->valid) return 'cpf invalido';

        $total = 0;
        foreach ($products as $product) {
            $total += $product['total'];
        }

        if($cupom) return $total - ($total * $cupom['desconto']/100);

        return $total;
    }
}
