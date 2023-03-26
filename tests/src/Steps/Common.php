<?php

namespace Src\Steps;

use Behat\Behat\Context\Context;
use PHPUnit\Framework\Assert;
use Psr\Http\Message\ResponseInterface;
use Src\Service\ApiService;

class Common implements Context
{
    private ResponseInterface $response;

    /**
     * @Given que uma requisição foi realizada para o endpoint de health check da aplicação
     */
    public function que_uma_requisicao_foi_realizada_para_o_endpoint_de_health_check_da_aplicacao() : void
    {
        $this->response = ApiService::getInstance()->get('/health-check', null, null);
    }

    /**
     * @test
     * @Then confirmar retorno de status http 200
     */
    public function confirmar_retorno_de_status_http_200() : void
    {
        Assert::assertEquals(200, $this->response->getStatusCode());
    }
}
