<?php

namespace GiordanoLima\LoteriasApi;

class Lotofacil extends LoteriasApi {

    public function getGanhadores() {
        $retorno = [];
        if($this->json && array_key_exists("qt_ganhador_faixa1", $this->json))
            $retorno["acertos15"] = $this->json["qt_ganhador_faixa1"];
            
        if($this->json && array_key_exists("qt_ganhador_faixa2", $this->json))
            $retorno["acertos14"] = $this->json["qt_ganhador_faixa2"];

        if($this->json && array_key_exists("qt_ganhador_faixa3", $this->json))
            $retorno["acertos13"] = $this->json["qt_ganhador_faixa3"];

        if($this->json && array_key_exists("qt_ganhador_faixa4", $this->json))
            $retorno["acertos12"] = $this->json["qt_ganhador_faixa4"];

        if($this->json && array_key_exists("qt_ganhador_faixa5", $this->json))
            $retorno["acertos11"] = $this->json["qt_ganhador_faixa5"];

        return $retorno;
    }

    public function getPremio() {
        $retorno = [];
        if($this->json && array_key_exists("vr_rateio_faixa1", $this->json))
            $retorno["acertos15"] = $this->json["vr_rateio_faixa1"];
            
        if($this->json && array_key_exists("vr_rateio_faixa2", $this->json))
            $retorno["acertos14"] = $this->json["vr_rateio_faixa2"];

        if($this->json && array_key_exists("vr_rateio_faixa3", $this->json))
            $retorno["acertos13"] = $this->json["vr_rateio_faixa3"];

        if($this->json && array_key_exists("vr_rateio_faixa4", $this->json))
            $retorno["acertos12"] = $this->json["vr_rateio_faixa4"];

        if($this->json && array_key_exists("vr_rateio_faixa5", $this->json))
            $retorno["acertos11"] = $this->json["vr_rateio_faixa5"];

        return $retorno;
    }

    public function getData() {
        if($this->json && array_key_exists("dt_apuracaoStr", $this->json))
            return $this->json["dt_apuracaoStr"];
    }

    public function getDataProximoConcurso() {
        if($this->json && array_key_exists("dtProximoConcursoStr", $this->json))
            return $this->json["dtProximoConcursoStr"];
    }

    public function getPremioAcumulado() {
        if($this->json && array_key_exists("vrAcumuladoFaixa1", $this->json))
            return $this->json["vrAcumuladoFaixa1"];
    }

    public function getConcursoAtual() {
        if($this->json && array_key_exists("nu_concurso", $this->json))
            return $this->json["nu_concurso"];
    }
    
    public function getUrlData() {
        return 'http://www.loterias.caixa.gov.br/wps/portal/loterias/landing/lotofacil';
    }

}