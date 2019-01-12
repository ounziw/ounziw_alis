<?php
namespace Concrete\Package\OunziwAlis\Http;

use Concrete\Core\Http\Client\Client as HttpClient;
use Concrete\Core\Support\Facade\Facade;

trait GetAlisDataTrait {

    public function getAlisData($url) {
        $app = Facade::getFacadeApplication();

        $httpClient = $app->make(HttpClient::class);
        $httpClient->setUri($url);
        try {
            $response = $httpClient->send();
        } catch (Exception $x) {
            \Log::addEntry(t('Requestfailed: %s', $x->getMessage()));
        }

        if (!$response->isSuccess()) {
            \Log::addEntry( t('Request failed with return code %s', sprintf('%s (%s)', $response->getStatusCode(), $response->getReasonPhrase())));
        } else {
            $responseBody = $response->getBody();
            $data = @json_decode($responseBody, true);
            if (
            !is_array($data)
            ) {
                \Log::addEntry(t('Malformed data received (%s)', $responseBody));
            } else {
                return $data;
            }
        }
    }
}