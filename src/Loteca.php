<?php

namespace GiordanoLima\LoteriasApi;

class Loteca extends LoteriasApi {

    public function getGanhadores() {
        $retorno = [];
        if($this->json && array_key_exists("qtGanhadorFaixa1", $this->json))
            $retorno["acertos14"] = $this->json["qtGanhadorFaixa1"];

        if($this->json && array_key_exists("qtGanhadorFaixa2", $this->json))
            $retorno["acertos13"] = $this->json["qtGanhadorFaixa2"];

        return $retorno;
        
    }

    public function getPremio() {
        $retorno = [];
        if($this->json && array_key_exists("vrRateioFaixa1", $this->json))
            $retorno["acertos14"] = $this->json["vrRateioFaixa1"];

        if($this->json && array_key_exists("vrRateioFaixa2", $this->json))
            $retorno["acertos13"] = $this->json["vrRateioFaixa2"];

        return $retorno;
    }

    public function getResultado() {
        $retorno = [];
        if($this->json && array_key_exists("jogos", $this->json)){
            $jogos = (array)$this->json["jogos"];
            foreach ($jogos as $key => $j) {

                $resultado = null;
                if($j["colunaUm"])
                    $resultado = "coluna-um";
                if($j["colunaDois"])
                    $resultado = "coluna-dois";
                if($j["colunaMeio"])
                    $resultado = "coluna-meio";

                $retorno["jogo" . $j["icJogo"]] = [
                    "time1" => $j["noTime1"],
                    "time2" => $j["noTime2"],
                    "resultado" => $resultado
                ];
            }
        }

        return $retorno;
    }

    public function getData() {
        if($this->json && array_key_exists("dtApuracaoStr", $this->json))
            return $this->json["dtApuracaoStr"];
    }

    public function getPremioAcumulado() {
        if($this->json && array_key_exists("vrAcumuladoFaixa1", $this->json))
            return $this->json["vrAcumuladoFaixa1"];
    }

    public function getCidade() {
        return null;
    }

    public function getUf() {
        return null;
    }

    public function getValorEstimado() {
        if($this->json && array_key_exists("vrEstimativa", $this->json))
            return $this->json["vrEstimativa"];
    }
    
    public function getUrlData() {
        return 'http://www.loterias.caixa.gov.br/wps/portal/loterias/landing/loteca';
    }

}