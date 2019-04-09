<?php

namespace GiordanoLima\LoteriasApi;

class Federal extends LoteriasApi {

    public function getGanhadores() {
        return [];
    }

    public function getPremio() {
        $retorno = [];
        if($this->json && array_key_exists("premios", $this->json)){
            $premios = ((array)$this->json["premios"]);
            foreach ($premios as $key => $p) {
                $retorno["premio" . ($key+1)] = $p["valor"];
            }

        }
        return $retorno;
    }

    public function getDataProximoConcurso() {
        return null;
    }

    public function getData() {
        if($this->json && array_key_exists("data", $this->json))
            return $this->json["data"];
    }

    public function getCidade() {
        if($this->json && array_key_exists("cidade", $this->json))
            return $this->json["cidade"];
    }

    public function getResultado() {
        $retorno = [];
        if($this->json && array_key_exists("premios", $this->json)){
            $premios = ((array)$this->json["premios"])[0];

            if(array_key_exists("premio1", $premios))
                $retorno["premio1"] = $premios["premio1"];
                
            if(array_key_exists("premio2", $premios))
                $retorno["premio2"] = $premios["premio2"];

            if(array_key_exists("premio3", $premios))
                $retorno["premio3"] = $premios["premio3"];

            if(array_key_exists("premio4", $premios))
                $retorno["premio4"] = $premios["premio4"];

            if(array_key_exists("premio5", $premios))
                $retorno["premio5"] = $premios["premio5"];
        }

        return $retorno;
    }
    
    public function getUrlData() {
        return 'http://www.loterias.caixa.gov.br/wps/portal/loterias/landing/federal';
    }

}