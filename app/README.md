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

<details><summary>Header</summary>
<p>
<table style="vertical-align: top;">
    <thead>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Tipo</th>
        <th>Obrigatório</th>
        <th>Exemplo</th>
    </thead>
    <tbody>
        <td>CorrelationId</td>
        <td>Identificador único da requisição para reateamento de correlacionado</td>
        <td>string (Uuid)</td>
        <td>Sim</td>
        <td><i>b72645e9-3bfb-4423-b983-0e7d47c425a5</i></td>
    </tbody>
</table>
</details>

<details><summary>Path</summary>
<p>
<table>
    <thead>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Tipo</th>
        <th>Obrigatório</th>
        <th>Exemplo</th>
    </thead>
    <tbody>
        <td>{id}</td>
        <td>Id do registro da coleção</td>
        <td>string (Uuid)</td>
        <td>Sim</td>
        <td><i>f3269126-6861-40b4-98ce-5cfbca94aff1</i></td>
    </tbody>
</table>
</details>

<details><summary>Query</summary>
<p>
<table>
    <thead>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Tipo</th>
        <th>Obrigatório</th>
        <th>Exemplo</th>
    </thead>
    <tbody>
        <td>filtro1</td>
        <td>Filtro adicional para a rota</td>
        <td>boolean</td>
        <td>Não</td>
        <td>true</td>
    </tbody>
</table>
</details>

<details><summary>Body</summary>
<p>
<table>
    <thead>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Tipo</th>
        <th>Obrigatório</th>
        <th>Exemplo</th>
    </thead>
    <tbody>
        <td>description</td>
        <td>Descrição para o novo registro</td>
        <td>string</td>
        <td>Sim</td>
        <td>**</td>
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
