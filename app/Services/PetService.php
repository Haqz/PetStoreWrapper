<?php

namespace App\Services;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class PetService
{

    private $petStoreUrl = "https://petstore.swagger.io/v2/pet";
    public function store(array $data)
    {
        try{
            $response = Http::post($this->petStoreUrl, $data);
            return $response->json();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function getAll(array $data)
    {
        try{
            $query = $this->formatArrayToQuery((object)['status' => $data['status']]);
            $url = $this->petStoreUrl. "/findByStatus" . "?". $query;
            $response = Http::get($url);
            return $response->json();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function getOne(int $id)
    {
        try{
            $response = Http::get($this->petStoreUrl.'/'.$id);
            return $response->json();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function update(int $id, array $data)
    {
        try{
            $response = Http::put($this->petStoreUrl.'/'.$id, $data);
            return $response->json();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function delete(int $id)
    {
        try{
            $response = Http::delete($this->petStoreUrl.'/'.$id);
            return $response->json();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    private function formatArrayToQuery(object $array)
    {

        $query = http_build_query($array);
        return preg_replace("/%5B\d+%5D/i", "",$query);
    }
}
