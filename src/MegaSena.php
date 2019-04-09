<?php

namespace GiordanoLima\LoteriasApi;

class MegaSena extends LoteriasApi {

    public function getGanhadores() {
        $retorno = [];
        if($this->json && array_key_exists("ganhadores", $this->json))
            $retorno["sena"] = $this->json["ganhadores"];
        if($this->json && array_key_exists("ganhadores_quina", $this->json))
            $retorno["quina"] = $this->json["ganhadores_quina"];
        if($this->json && array_key_exists("ganhadores_quadra", $this->json))
            $retorno["quadra"] = $this->json["ganhadores_quadra"];

        return $retorno;
        
    }

    public function getPremio() {
        $retorno = [];
        if($this->json && array_key_exists("valor", $this->json))
            $retorno["sena"] = $this->json["valor"];
        if($this->json && array_key_exists("valor_quina", $this->json))
            $retorno["quina"] = $this->json["valor_quina"];
        if($this->json && array_key_exists("valor_quadra", $this->json))
            $retorno["quadra"] = $this->json["valor_quadra"];

        return $retorno;
    }
    
    public function getUrlData() {
        return 'http://loterias.caixa.gov.br/wps/portal/loterias/landing/megasena';
    }

}