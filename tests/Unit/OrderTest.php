<?php

namespace Tests\Unit;

use App\Models\Cupom;
use App\Models\Order;
use App\Models\Product;

use Tests\TestCase;

class OrderTest extends TestCase
{

    public function test_create_new_order_with_3_products()
    {

        $product1_preco = 5;
        $product1_quantidade = 2;

        $product1 = new Product([
            'descricao' => 'b',
            'preco' => $product1_preco,
            'quantidade' => $product1_quantidade,
            'total' => $product1_preco * $product1_quantidade
        ]);

        $product2_preco = 7;
        $product2_quantidade = 5;

        $product2 = new Product([
            'descricao' => 'b',
            'preco' => $product2_preco,
            'quantidade' => $product2_quantidade,
            'total' => $product2_preco * $product2_quantidade
        ]);

        $product3_preco = 2;
        $product3_quantidade = 10;

        $product3 = new Product([
            'descricao' => 'c',
            'preco' => $product3_preco,
            'quantidade' => $product3_quantidade,
            'total' => $product3_preco * $product3_quantidade
        ]);

        $order = new Order();
        $cpf = '880.951.380-02';
        $total = $order->createNewOrderAndReturnTotal([$product1, $product2, $product3],null,$cpf);

        $expect_total = 65;

        $this->assertEquals($expect_total, $total);
    }

    public function test_create_new_order_with_3_products_and_cupom_20_porcent()
    {
        $product1_preco = 5;
        $product1_quantidade = 2;

        $product1 = new Product([
            'descricao' => 'b',
            'preco' => $product1_preco,
            'quantidade' => $product1_quantidade,
            'total' => $product1_preco * $product1_quantidade
        ]);

        $product2_preco = 7;
        $product2_quantidade = 5;

        $product2 = new Product([
            'descricao' => 'b',
            'preco' => $product2_preco,
            'quantidade' => $product2_quantidade,
            'total' => $product2_preco * $product2_quantidade
        ]);

        $product3_preco = 2;
        $product3_quantidade = 10;

        $product3 = new Product([
            'descricao' => 'c',
            'preco' => $product3_preco,
            'quantidade' => $product3_quantidade,
            'total' => $product3_preco * $product3_quantidade
        ]);

        $cupom = new Cupom([
            'cupom' => 'CUPOM20',
            'desconto' => 20
        ]);

        $order = new Order();
        $cpf = '880.951.380-02';
        $total = $order->createNewOrderAndReturnTotal([$product1, $product2, $product3], $cupom, $cpf);

        $expect_total = 52;

        $this->assertEquals($expect_total, $total);
    }

    public function test_can_not_create_new_order_with_cpf_invalid()
    {
        $product1_preco = 5;
        $product1_quantidade = 2;

        $product1 = new Product([
            'descricao' => 'b',
            'preco' => $product1_preco,
            'quantidade' => $product1_quantidade,
            'total' => $product1_preco * $product1_quantidade
        ]);

        $product2_preco = 7;
        $product2_quantidade = 5;

        $product2 = new Product([
            'descricao' => 'b',
            'preco' => $product2_preco,
            'quantidade' => $product2_quantidade,
            'total' => $product2_preco * $product2_quantidade
        ]);

        $product3_preco = 2;
        $product3_quantidade = 10;

        $product3 = new Product([
            'descricao' => 'c',
            'preco' => $product3_preco,
            'quantidade' => $product3_quantidade,
            'total' => $product3_preco * $product3_quantidade
        ]);

        $cupom = new Cupom([
            'cupom' => 'CUPOM20',
            'desconto' => 20
        ]);

        $order = new Order();
        $cpf = '111.111.111-11';
        $total = $order->createNewOrderAndReturnTotal([$product1, $product2, $product3], $cupom, $cpf);
        $expect_result = 'cpf invalido';
        $this->assertEquals($expect_result, $total);
    }
}
