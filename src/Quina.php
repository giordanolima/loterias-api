<?php

namespace GiordanoLima\LoteriasApi;

class Quina extends LoteriasApi {

    public function getGanhadores() {
        $retorno = [];
        if($this->json && array_key_exists("ganhadores", $this->json))
            $retorno["quina"] = $this->json["ganhadores"];
        if($this->json && array_key_exists("ganhadores_quadra", $this->json))
            $retorno["quadra"] = $this->json["ganhadores_quadra"];
        if($this->json && array_key_exists("ganhadores_terno", $this->json))
            $retorno["terno"] = $this->json["ganhadores_terno"];
        if($this->json && array_key_exists("qt_ganhador_duque", $this->json))
            $retorno["duque"] = $this->json["qt_ganhador_duque"];

        return $retorno;
        
    }

    public function getPremio() {
        $retorno = [];
        if($this->json && array_key_exists("valor", $this->json))
            $retorno["quina"] = $this->json["valor"];
        if($this->json && array_key_exists("valor_quadra", $this->json))
            $retorno["quadra"] = $this->json["valor_quadra"];
        if($this->json && array_key_exists("valor_terno", $this->json))
            $retorno["terno"] = $this->json["valor_terno"];
        if($this->json && array_key_exists("vr_rateio_duque", $this->json))
            $retorno["duque"] = $this->json["vr_rateio_duque"];

        return $retorno;
    }

    public function getDataProximoConcurso() {
        if($this->json && array_key_exists("dtProximoConcursoStr", $this->json))
            return $this->json["dtProximoConcursoStr"];
    }

    public function getPremioAcumulado() {
        if($this->json && array_key_exists("vrAcumulado", $this->json))
            return $this->json["vrAcumulado"];
    }
    
    public function getUrlData() {
        return 'http://www.loterias.caixa.gov.br/wps/portal/loterias/landing/quina';
    }

}