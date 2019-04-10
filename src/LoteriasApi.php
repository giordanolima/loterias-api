<?php

namespace GiordanoLima\LoteriasApi;

abstract class LoteriasApi {

    protected $client;
    protected $base = null;
    protected $url = null;
    protected $urlCompleta = null;
    protected $json = null;
    protected $concurso = null;

    public function __construct($concurso = null)
    {
        $this->concurso = $concurso;
        $this->client = new \GuzzleHttp\Client(['cookies' => true]);
        $response = $this->client->request('GET', $this->getUrlData());
        
        $doc = new \DOMDocument();
        @$doc->loadHTML((string)$response->getBody());
        
        // Base
        $tag = $doc->getElementsByTagName('base');
        if($tag->length  == 0 ) {
            throw new \Exception("Não foi possível encontrar a tag <base>");
        }
        $this->base = $tag->item(0)->getAttribute("href");
        
        // Url
        $tags = $doc->getElementsByTagName('input');
        if($tags->length  == 0 ) {
            throw new \Exception("Não foi possível encontrar a tag <input>");
        }
        foreach ($tags as $tag) {
            if($tag->getAttribute("ng-model") == "urlBuscarResultado") {
                $this->url = $tag->getAttribute("value");
                break;
            }
        }
        $this->urlCompleta = $this->base . $this->url . "?timestampAjax=" . time();
        if($this->concurso)
            $this->urlCompleta .= '&concurso=' . $this->concurso;

        $response = $this->client->request('GET', $this->urlCompleta);
        $this->json = json_decode((string)$response->getBody(), TRUE);
    }

    public function getResultado() {
        if($this->json && array_key_exists("resultadoOrdenado", $this->json))
            return $this->json["resultadoOrdenado"];
    }

    public function getConcursoAtual() {
        if($this->json && array_key_exists("concurso", $this->json))
            return $this->json["concurso"];
    }

    public function getConcursoAnterior() {
        if($this->json && array_key_exists("concursoAnterior", $this->json))
            return $this->json["concursoAnterior"];
    }

    public function getProximoConcurso() {
        if($this->json && array_key_exists("proximoConcurso", $this->json))
            return $this->json["proximoConcurso"];
    }

    public function getData() {
        if($this->json && array_key_exists("dataStr", $this->json))
            return $this->json["dataStr"];
    }

    public function getDataProximoConcurso() {
        if($this->json && array_key_exists("dt_proximo_concursoStr", $this->json))
            return $this->json["dt_proximo_concursoStr"];
    }

    public function acumulado(){
        if($this->json && array_key_exists("sorteioAcumulado", $this->json))
            return $this->json["sorteioAcumulado"];
    }

    public function getPremioAcumulado() {
        if($this->json && array_key_exists("valor_acumulado", $this->json))
            return $this->json["valor_acumulado"];
    }

    public function getCidade() {
        if($this->json && array_key_exists("no_cidade", $this->json))
            return $this->json["no_cidade"];
    }

    public function getUf() {
        if($this->json && array_key_exists("sg_uf", $this->json))
            return $this->json["sg_uf"];
    }

    public function getValorEstimado() {
        if($this->json && array_key_exists("vr_estimativa", $this->json))
            return $this->json["vr_estimativa"];
    }

    public function check()
    {
        dump($this->json);
        $fields = [
            "concurso",
            "resultadoOrdenado",
            "concursoAnterior",
            "proximoConcurso",
            "dataStr",
            "dt_proximo_concursoStr",
            "sorteioAcumulado",
            "valor_acumulado",
            "no_cidade",
            "sg_uf",
            "vr_estimativa",
            ];
        foreach ($fields as $f) {
            dump($f . ": " . array_key_exists($f, $this->json));
        }
    }

    abstract public function getPremio();
    abstract public function getGanhadores();
    abstract public function getUrlData();

}