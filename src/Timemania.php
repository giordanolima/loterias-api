<?php

namespace GiordanoLima\LoteriasApi;

class Timemania extends LoteriasApi {

    public function getResultado()
    {
        $retorno = [];

        if($this->json && array_key_exists("resultadoOrdenado", $this->json))
            $retorno["resultado"] = $this->json["resultadoOrdenado"];
            
        if($this->json && array_key_exists("timeCoracao", $this->json))
            $retorno["time-coracao"] = $this->json["timeCoracao"];

        return $retorno;
    }

    public function getGanhadores() {
        $retorno = [];

        if($this->json && array_key_exists("qt_RATEIO_FAIXA_1", $this->json))
            $retorno["acertos7"] = $this->json["qt_RATEIO_FAIXA_1"];
            
        if($this->json && array_key_exists("qt_RATEIO_FAIXA_2", $this->json))
            $retorno["acertos6"] = $this->json["qt_RATEIO_FAIXA_2"];

        if($this->json && array_key_exists("qt_RATEIO_FAIXA_3", $this->json))
            $retorno["acertos5"] = $this->json["qt_RATEIO_FAIXA_3"];

        if($this->json && array_key_exists("qt_RATEIO_FAIXA_4", $this->json))
            $retorno["acertos4"] = $this->json["qt_RATEIO_FAIXA_4"];

        if($this->json && array_key_exists("qt_RATEIO_FAIXA_5", $this->json))
            $retorno["acertos3"] = $this->json["qt_RATEIO_FAIXA_5"];

        if($this->json && array_key_exists("qt_GANHADOR_TIME_CORACAO", $this->json))
            $retorno["time-coracao"] = $this->json["qt_GANHADOR_TIME_CORACAO"];

        return $retorno;
    }

    public function getPremio() {
        $retorno = [];

        if($this->json && array_key_exists("vr_RATEIO_FAIXA_1", $this->json))
            $retorno["acertos7"] = $this->json["vr_RATEIO_FAIXA_1"];
            
        if($this->json && array_key_exists("vr_RATEIO_FAIXA_2", $this->json))
            $retorno["acertos6"] = $this->json["vr_RATEIO_FAIXA_2"];

        if($this->json && array_key_exists("vr_RATEIO_FAIXA_3", $this->json))
            $retorno["acertos5"] = $this->json["vr_RATEIO_FAIXA_3"];

        if($this->json && array_key_exists("vr_RATEIO_FAIXA_4", $this->json))
            $retorno["acertos4"] = $this->json["vr_RATEIO_FAIXA_4"];

        if($this->json && array_key_exists("vr_RATEIO_FAIXA_5", $this->json))
            $retorno["acertos3"] = $this->json["vr_RATEIO_FAIXA_5"];

        if($this->json && array_key_exists("vr_RATEIO_TIME_CORACAO", $this->json))
            $retorno["time-coracao"] = $this->json["vr_RATEIO_TIME_CORACAO"];

        return $retorno;
    }

    public function getConcursoAtual() {
        if($this->json && array_key_exists("nu_CONCURSO", $this->json))
            return $this->json["nu_CONCURSO"];
    }

    public function getData() {
        if($this->json && array_key_exists("dt_APURACAOStr", $this->json))
            return $this->json["dt_APURACAOStr"];
    }

    public function getDataProximoConcurso() {
        if($this->json && array_key_exists("dt_PROXIMO_CONCURSOStr", $this->json))
            return $this->json["dt_PROXIMO_CONCURSOStr"];
    }

    public function getPremioAcumulado() {
        if($this->json && array_key_exists("vr_ACUMULADO_FAIXA_1", $this->json))
            return $this->json["vr_ACUMULADO_FAIXA_1"];
    }

    public function getCidade() {
        if($this->json && array_key_exists("no_CIDADE", $this->json))
            return $this->json["no_CIDADE"];
    }

    public function getUf() {
        if($this->json && array_key_exists("sg_UF", $this->json))
            return $this->json["sg_UF"];
    }

    public function getValorEstimado() {
        if($this->json && array_key_exists("vr_ESTIMATIVA_FAIXA_1", $this->json))
            return $this->json["vr_ESTIMATIVA_FAIXA_1"];
    }
    
    public function getUrlData() {
        return 'http://www.loterias.caixa.gov.br/wps/portal/loterias/landing/timemania';
    }

}