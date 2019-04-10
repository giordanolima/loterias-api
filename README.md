# Loterias API
[![Latest Stable Version](https://poser.pugx.org/giordanolima/loterias-api/v/stable)](https://packagist.org/packages/giordanolima/loterias-api) [![Total Downloads](https://poser.pugx.org/giordanolima/loterias-api/downloads)](https://packagist.org/packages/giordanolima/loterias-api) [![License](https://poser.pugx.org/giordanolima/loterias-api/license)](https://packagist.org/packages/giordanolima/loterias-api)

## Importante!
> Esta biblioteca é um web crawler do site da Caixa Econômica Federal, podendo parar de responder por alterações na estrutura da página. Se você identificar um erro de acesso a um dos dados, favor abrir uma issue para solução da mesma.

## Instalação
Instalação feita via Composer
```bash
composer require giordanolima/loterias-api
```

### Uso
Para acessar, basta instanciar uma das classes dos respectivos jogos disponíveis:

```php
$api = new \GiordanoLima\LoteriasApi\DiaDeSorte();
$api = new \GiordanoLima\LoteriasApi\DuplaSena();
$api = new \GiordanoLima\LoteriasApi\Federal();
$api = new \GiordanoLima\LoteriasApi\Loteca();
$api = new \GiordanoLima\LoteriasApi\Lotofacil();
$api = new \GiordanoLima\LoteriasApi\Lotogol();
$api = new \GiordanoLima\LoteriasApi\Lotomania();
$api = new \GiordanoLima\LoteriasApi\MegaSena();
$api = new \GiordanoLima\LoteriasApi\Quina();
$api = new \GiordanoLima\LoteriasApi\Timemania();
```

Por padrão, o biblioteca irá buscar os dados do último concurso da respectiva loteria. Caso deseja buscar os dados de um concurso específico, basta determinar qual concurso deseja no construtor da classe:

```php
$api = new \GiordanoLima\LoteriasApi\MegaSena(2139);
```

Uma vez instanciada, a classe oferece os seguintes métodos:

> Os valores retornados irão mudar de loteria para loteria, respeitanto a natureza de cada um delas.

| Método | Descrição |
| ------ | ------ |
| ```$api->getResultado() ``` | Retorna o resultado da loteria (números sorteados, etc). |
| ```$api->getConcursoAnterior() ``` | Retorna o número do concurso anterior ao atual. Este valor poderá ser utilizado no construtor da classe para buscar os respectivos dados. |
| ```$api->getProximoConcurso() ``` | Retorna o número do próximo concurso ao atual. Este valor poderá ser utilizado no construtor da classe para buscar os respectivos dados. |
| ```$api->getData() ``` | Retorna a data de realização do sorteio. |
| ```$api->getDataProximoConcurso() ``` | Retorna a data do próximo sorteio. |
| ```$api->acumulado() ``` | Indica se o prêmio foi acumulado ou não. |
| ```$api->getPremioAcumulado() ``` | Retorna o valor acumulado do prêmio. |
| ```$api->getCidade() ``` | Indica a cidade de realização do sorteio. |
| ```$api->getUf() ``` | Indica o estado de realização do sorteio. |