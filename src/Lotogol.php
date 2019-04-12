<?php

namespace GiordanoLima\LoteriasApi;

class Lotogol extends LoteriasApi {

    public function getResultado() {
        $retorno = [];
        $json = (array)$this->json;
        if(count($json) > 0) {
            foreach ($json as $key => $j) {
                $retorno["jogo" . $j["ic_jogo"]] = [
                    "time1" => $j["time1"],
                    "time2" => $j["time2"],
                    "time1gols" => $j["qt_gol_time1"],
                    "time2gols" => $j["qt_gol_time2"],
                ];
            }
        }
        return $retorno;
    }

    public function getPremio(){
        $retorno = [];
        $json = (array)$this->json;
        if(count($json) > 0) {
            $json = array_shift($json);
            if(array_key_exists("vr_rateio_faixa1", $json))
                $retorno["acertos5"] = $json["vr_rateio_faixa1"];

            if(array_key_exists("vr_rateio_faixa2", $json))
                $retorno["acertos4"] = $json["vr_rateio_faixa2"];

            if(array_key_exists("vr_rateio_faixa3", $json))
                $retorno["acertos3"] = $json["vr_rateio_faixa3"];
        }
        return $retorno;                        
    }
    public function getGanhadores(){
        $retorno = [];
        $json = (array)$this->json;
        if(count($json) > 0) {
            $json = array_shift($json);
            if(array_key_exists("qt_ganhador_faixa1", $json))
                $retorno["acertos5"] = $json["qt_ganhador_faixa1"];

            if(array_key_exists("qt_ganhador_faixa2", $json))
                $retorno["acertos4"] = $json["qt_ganhador_faixa2"];

            if(array_key_exists("qt_ganhador_faixa3", $json))
                $retorno["acertos3"] = $json["qt_ganhador_faixa3"];
        }
        return $retorno;
    }

    public function getConcursoAnterior() {
        $json = (array)$this->json;
        if(count($json) > 0) {
            $json = array_shift($json);
            if(array_key_exists("concursoAnterior", $json))
                return $json["concursoAnterior"];
        }
    }

    public function getProximoConcurso() {
        $json = (array)$this->json;
        if(count($json) > 0) {
            $json = array_shift($json);
            if(array_key_exists("proximoConcurso", $json))
                return $json["proximoConcurso"];
        }
    }

    public function getConcursoAtual() {
        $json = (array)$this->json;
        if(count($json) > 0) {
            $json = array_shift($json);
            if(array_key_exists("co_concurso", $json))
                return $json["co_concurso"];
        }
    }

    public function getData() {
        $json = (array)$this->json;
        if(count($json) > 0) {
            $json = array_shift($json);
            if(array_key_exists("dt_apuracaoStr", $json))
                return $json["dt_apuracaoStr"];
        }
    }

    public function getDataProximoConcurso() {
        $json = (array)$this->json;
        if(count($json) > 0) {
            $json = array_shift($json);
            if(array_key_exists("dt_proximo_concursoStr", $json))
                return $json["dt_proximo_concursoStr"];
        }
    }

    public function acumulado(){
        $json = (array)$this->json;
        if(count($json) > 0) {
            $json = array_shift($json);
            if(array_key_exists("sorteioAcumulado", $json))
                return $json["sorteioAcumulado"];
        }
    }

    public function getPremioAcumulado() {
        $json = (array)$this->json;
        if(count($json) > 0) {
            $json = array_shift($json);
            if(array_key_exists("vr_ACUMULADO_FAIXA1", $json))
                return $json["vr_ACUMULADO_FAIXA1"];
        }
    }

    public function getCidade() {
        return null;
    }

    public function getUf() {
        return null;
    }

    public function getValorEstimado() {
        $json = (array)$this->json;
        if(count($json) > 0) {
            $json = array_shift($json);
            if(array_key_exists("vr_estimativa", $json))
                return $json["vr_estimativa"];
        }
    }
    
    public function getUrlData() {
        return 'http://www.loterias.caixa.gov.br/wps/portal/loterias/landing/lotogol';
    }

}