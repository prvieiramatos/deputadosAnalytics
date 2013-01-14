<?php

namespace DA\Tests\Scrapper;

include_once(realpath(__DIR__.'/../../../base/Scrapper.php'));

/**
 * @backupGlobals disabled
 */
class DeputadoTest extends \Base\Scrapper
{
    
    protected function setUp() {
        parent::setUp('DA\Scrapper\Deputado');        
    }
    
    public function testGetMainInfo()
    {
        $this->setDataFromUrl('url.deputados');
        $data = $this->scrapper->getMainInfo();        
        $deputados = $data['deputados'];
        
        $this->assertTrue(is_array($deputados[0]));
        $this->assertTrue(is_numeric($deputados[0]['matricula']));
        $this->assertTrue(is_string($deputados[0]['nome']));
        $this->assertTrue(is_numeric($deputados[0]['numero']));
        $this->assertTrue(is_numeric($deputados[0]['identificacao']));
        $this->assertTrue(is_string($deputados[0]['estado']));
        $this->assertTrue(is_string($deputados[0]['partido']));
        $this->assertEquals(513,count($deputados));
        
        $this->assertEquals('54', $data['legislatura']);
        
    }
    
}
