# General Laravel App Template

## Informações gerais
### Descrição
{{ Informar a descrição detalhada da aplicação, resumindo seu propósito e suas principais características }}

### Escopo
{{ Informar o objetivo da aplicação, o que ela é e não é capaz de fazer, quais são seus principais recursos, sua abrangêcia e suas limitações }}

### Alvo
{{ Informar o tipo de público que é e não é target para consumo da aplicação }}

### Acesso
{{ Informar instruções para solicitações de acesso à aplicação por consumidores internos ou externos }}

### Características
{{ Informar lista não numerada das principais características desta aplicação, que esclareça o motivo que tornem interessante o seu consumo }}

## Contrato
### Composição

| Ambiente | URL                                             |
|----------|-------------------------------------------------|
| DEV      | { Informar url do ambiente de desenvolvimento } |
| HOM      | { Informar url do ambiente de homologação }     |
| PROD     | { informar url do ambiente de produção }        |

{{ Informar todos os endpoints disponíveis nesta aplicação, de acordo com o modelo abaixo }}

### POST • /end-points/{id}
{{ Informar breve descrição do endpoint e suas entradas e saídas correspondentes }}

#### Entradas

<style>
.general-doc-table th{text-align: left;}
.general-doc-table td{vertical-align: top;}
.general-doc-table td.td-name{font-weight: bold;}
.general-doc-table th.th-name{width:25%;}
.general-doc-table th.th-type{width:5%;text-align: center;}
.general-doc-table th.th-required{width:5%;text-align: center;}
.general-doc-table th.th-example{width:25%;}
</style>

<details><summary>Header</summary>
<table class="general-doc-table">
    <thead>
        <th class="th-name">Nome</th>
        <th class="th-description">Descrição</th>
        <th class="th-type">Tipo</th>
        <th class="th-required">Obrigatório</th>
        <th class="th-example">Exemplo</th>
    </thead>
    <tbody>
        <tr>
            <td class="td-name">CorrelationId</td>
            <td class="td-description">Identificador único da requisição para reateamento de correlacionado</td>
            <td class="td-type">string (Uuid)</td>
            <td class="td-required">Sim</td>
            <td class="td-example"><i>b72645e9-3bfb-4423-b983-0e7d47c425a5</i></td>
        </tr>
    </tbody>
</table>
</details>

<details><summary>Path</summary>
<table class="general-doc-table">
    <thead>
        <th class="th-name">Nome</th>
        <th class="th-description">Descrição</th>
        <th class="th-type">Tipo</th>
        <th class="th-required">Obrigatório</th>
        <th class="th-example">Exemplo</th>
    </thead>
    <tbody>
        <tr>
            <td class="td-name">id</td>
            <td class="td-description">Id do registro da coleção</td>
            <td class="td-type">string (Uuid)</td>
            <td class="td-required">Sim</td>
            <td class="td-example"><i>f3269126-6861-40b4-98ce-5cfbca94aff1</i></td>
        </tr>
    </tbody>
</table>
</details>

<details><summary>Query</summary>
<table class="general-doc-table">
    <thead>
        <th class="th-name">Nome</th>
        <th class="th-description">Descrição</th>
        <th class="th-type">Tipo</th>
        <th class="th-required">Obrigatório</th>
        <th class="th-example">Exemplo</th>
    </thead>
    <tbody>
        <tr>
            <td class="td-name">filtro1</td>
            <td class="td-description">Filtro adicional para a rota</td>
            <td class="td-type">boolean</td>
            <td class="td-required">Não</td>
            <td class="td-example">true</td>
        </tr>
    </tbody>
</table>
</details>

<details><summary>Body</summary>
<table class="general-doc-table">
    <thead>
        <th class="th-name">Nome</th>
        <th class="th-description">Descrição</th>
        <th class="th-type">Tipo</th>
        <th class="th-required">Obrigatório</th>
        <th class="th-example">Exemplo</th>
    </thead>
    <tbody>
        <tr>
            <td class="td-name">description</td>
            <td class="td-description">Descrição para o novo registro</td>
            <td class="td-type">string</td>
            <td class="td-required">Sim</td>
            <td class="td-example">**</td>
        </tr>
    </tbody>
</table>
</details>

#### Saídas

## Integrações
{{ Informar lista não numerada de todos os serviços externos ou internos utilizados pela aplicação }}

## Links úteis
{{  Informar links adicionais, como outras documentações por exemplo, que auxiliem nos esclarecimentos sobre esta aplicação }}

- [Instalação](../README.md)
- [Testes integrados](../tests/README.md)
- [Cadastro de massas](.)
- [Collections do Insomnia](.)
- [Collections do Postman](.)
