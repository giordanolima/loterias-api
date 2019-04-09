<?php

namespace GiordanoLima\LoteriasApi;

class Lotomania extends LoteriasApi {

    public function getGanhadores() {
        $retorno = [];
        if($this->json && array_key_exists("qtGanhadoresFaixa1", $this->json))
            $retorno["acertos20"] = $this->json["qtGanhadoresFaixa1"];

        if($this->json && array_key_exists("qtGanhadoresFaixa2", $this->json))
            $retorno["acertos19"] = $this->json["qtGanhadoresFaixa2"];

        if($this->json && array_key_exists("qtGanhadoresFaixa3", $this->json))
            $retorno["acertos18"] = $this->json["qtGanhadoresFaixa3"];

        if($this->json && array_key_exists("qtGanhadoresFaixa4", $this->json))
            $retorno["acertos17"] = $this->json["qtGanhadoresFaixa4"];

        if($this->json && array_key_exists("qtGanhadoresFaixa5", $this->json))
            $retorno["acertos16"] = $this->json["qtGanhadoresFaixa5"];

        if($this->json && array_key_exists("qtGanhadoresFaixa7", $this->json))
            $retorno["acertos15"] = $this->json["qtGanhadoresFaixa7"];

        if($this->json && array_key_exists("qtGanhadoresFaixa6", $this->json))
            $retorno["acertosZero"] = $this->json["qtGanhadoresFaixa6"];

        return $retorno;
        
    }

    public function getPremio() {
        $retorno = [];
        if($this->json && array_key_exists("vrRateioFaixa1", $this->json))
            $retorno["acertos20"] = $this->json["vrRateioFaixa1"];

        if($this->json && array_key_exists("vrRateioFaixa2", $this->json))
            $retorno["acertos19"] = $this->json["vrRateioFaixa2"];

        if($this->json && array_key_exists("vrRateioFaixa3", $this->json))
            $retorno["acertos18"] = $this->json["vrRateioFaixa3"];

        if($this->json && array_key_exists("vrRateioFaixa4", $this->json))
            $retorno["acertos17"] = $this->json["vrRateioFaixa4"];

        if($this->json && array_key_exists("vrRateioFaixa5", $this->json))
            $retorno["acertos16"] = $this->json["vrRateioFaixa5"];

        if($this->json && array_key_exists("vrRateioFaixa7", $this->json))
            $retorno["acertos15"] = $this->json["vrRateioFaixa7"];

        if($this->json && array_key_exists("vrRateioFaixa6", $this->json))
            $retorno["acertosZero"] = $this->json["vrRateioFaixa6"];

        return $retorno;
    }

    public function getData() {
        if($this->json && array_key_exists("dtApuracaoStr", $this->json))
            return $this->json["dtApuracaoStr"];
    }

    public function getDataProximoConcurso() {
        if($this->json && array_key_exists("dtProximoConcursoStr", $this->json))
            return $this->json["dtProximoConcursoStr"];
    }

    public function getCidade() {
        if($this->json && array_key_exists("noCidade", $this->json))
            return $this->json["noCidade"];
    }

    public function getPremioAcumulado() {
        if($this->json && array_key_exists("vrAcumuladoFaixa1", $this->json))
            return $this->json["vrAcumuladoFaixa1"];
    }
    
    public function getUrlData() {
        return 'http://www.loterias.caixa.gov.br/wps/portal/loterias/landing/lotomania';
    }

}