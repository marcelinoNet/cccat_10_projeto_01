<?php

namespace Tests\Unit;

use App\Models\Product;

use Tests\TestCase;

class ProductTest extends TestCase
{
    
    public function test_create_new_product()
    {



        $product = new Product([
            'descricao'=> 'a',
            'preco'=>3.5,
            'quantidade'=>2,
            'total'=>(3.5*2)
        ]);
       
        $this->assertEquals('a',$product['descricao'] );
        $this->assertEquals(3.5,$product['preco'] );
        $this->assertEquals(2,$product['quantidade'] );
        $this->assertEquals(7.0,$product['total'] );

    }

    public function test_create_new_product_and_check_total_is_correct()
    {

        $preco = 5;
        $quantidade = 4;

        $newProduct = new Product([
            'descricao'=> 'b',
            'preco'=>$preco,
            'quantidade'=>$quantidade,
            'total'=>$preco*$quantidade
        ]);
        $expect_total = 20.00;

        $this->assertEquals($expect_total, $newProduct['total']);
    }

}
