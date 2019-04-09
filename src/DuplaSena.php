<?php

namespace GiordanoLima\LoteriasApi;

class DuplaSena extends LoteriasApi {

    public function getGanhadores() {
        $retorno = [];
        if($this->json && array_key_exists("ganhadores_sena1", $this->json))
            $retorno["sena1"]["sena"] = $this->json["ganhadores_sena1"];
        if($this->json && array_key_exists("qt_ganhador_quina_faixa1", $this->json))
            $retorno["sena1"]["quina"] = $this->json["qt_ganhador_quina_faixa1"];
        if($this->json && array_key_exists("qt_ganhador_quadra_faixa1", $this->json))
            $retorno["sena1"]["quadra"] = $this->json["qt_ganhador_quadra_faixa1"];
        if($this->json && array_key_exists("qt_ganhador_terno_faixa1", $this->json))
            $retorno["sena1"]["terno"] = $this->json["qt_ganhador_terno_faixa1"];
            
        if($this->json && array_key_exists("ganhadores_sena2", $this->json))
            $retorno["sena2"]["sena"] = $this->json["ganhadores_sena2"];
        if($this->json && array_key_exists("ganhadores_quina2", $this->json))
            $retorno["sena2"]["quina"] = $this->json["ganhadores_quina2"];
        if($this->json && array_key_exists("ganhadores_quadra2", $this->json))
            $retorno["sena2"]["quadra"] = $this->json["ganhadores_quadra2"];
        if($this->json && array_key_exists("qt_ganhador_terno_faixa2", $this->json))
            $retorno["sena2"]["terno"] = $this->json["qt_ganhador_terno_faixa2"];
        return $retorno;
    }

    public function getResultado()
    {
        $retorno = [];
        if($this->json && array_key_exists("resultadoOrdenadoSorteio1", $this->json))
            $retorno["sena1"] = $this->json["resultadoOrdenadoSorteio1"];

        if($this->json && array_key_exists("resultadoOrdenadoSorteio2", $this->json))
            $retorno["sena2"] = $this->json["resultadoOrdenadoSorteio2"];
        return $retorno;
    }

    public function getDataProximoConcurso() {
        if($this->json && array_key_exists("data_proximo_concurso", $this->json)){
            $date = new \DateTime();
            $date->setTimestamp((int)$this->json["data_proximo_concurso"]);
            return $date;
        }
    }

    public function acumulado(){
        $retorno = [];
        if($this->json && array_key_exists("acumulado_sena1", $this->json))
            $retorno["sena1"] = $this->json["acumulado_sena1"];

        if($this->json && array_key_exists("acumulado_sena2", $this->json))
            $retorno["sena2"] = $this->json["acumulado_sena2"];

        return $retorno;
    }

    public function getPremio() {
        $retorno = [];
        if($this->json && array_key_exists("valor_sena1", $this->json))
            $retorno["sena1"] = $this->json["valor_sena1"];

        if($this->json && array_key_exists("vr_quina_faixa1", $this->json))
            $retorno["quina1"] = $this->json["vr_quina_faixa1"];

        if($this->json && array_key_exists("vr_quadra_faixa1", $this->json))
            $retorno["quadra1"] = $this->json["vr_quadra_faixa1"];
            
        if($this->json && array_key_exists("vr_terno_faixa1", $this->json))
            $retorno["terno1"] = $this->json["vr_terno_faixa1"];

        if($this->json && array_key_exists("valor_sena2", $this->json))
            $retorno["sena2"] = $this->json["valor_sena2"];

        if($this->json && array_key_exists("valor_quina2", $this->json))
            $retorno["quina2"] = $this->json["valor_quina2"];

        if($this->json && array_key_exists("valor_quadra2", $this->json))
            $retorno["quadra2"] = $this->json["valor_quadra2"];
            
        if($this->json && array_key_exists("vr_terno_faixa1", $this->json))
            $retorno["terno2"] = $this->json["vr_terno_faixa2"];

        return $retorno;
    }

    public function getPremioAcumulado() {
        $retorno = [];
        if($this->json && array_key_exists("valor_acumulado_sena1", $this->json))
            $retorno["sena1"] = $this->json["valor_acumulado_sena1"];

        if($this->json && array_key_exists("acumulado_sena2", $this->json))
            $retorno["sena2"] = $this->json["acumulado_sena2"];

        return $retorno;
    }

    public function getUrlData() {
        return 'http://www.loterias.caixa.gov.br/wps/portal/loterias/landing/duplasena';
    }

}