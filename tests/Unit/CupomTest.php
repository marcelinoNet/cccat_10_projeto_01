<?php

namespace Tests\Unit;

use App\Models\Cupom;
use Tests\TestCase;

class CupomTest extends TestCase
{

    public function test_create_cupom()
    {

        $cupom = new Cupom([
            'cupom'=>'CUPOM20',
            'desconto'=>20
        ]);
        $this->assertEquals('CUPOM20',$cupom['cupom'] );
        $this->assertEquals(20,$cupom['desconto'] );
       
    }


}
