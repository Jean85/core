<?php

namespace AsyncAws\Core\Sts\Result;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

trait GetCallerIdentityResponseTrait
{
    protected function populateResult(ResponseInterface $response, ?HttpClientInterface $httpClient): void
    {
        $data = new \SimpleXMLElement($response->getContent(false));
        $data = $data->GetCallerIdentityResult;

        $this->UserId = $this->xmlValueOrNull($data->UserId, 'string');
        $this->Account = $this->xmlValueOrNull($data->Account, 'string');
        $this->Arn = $this->xmlValueOrNull($data->Arn, 'string');
    }
}
