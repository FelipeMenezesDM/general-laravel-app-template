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
{{ Informar breve descrição do endpoint e suas entradas e saídas correspondentes, removendo os que não são necessários }}

#### Entradas
<details><summary>Header</summary>
<table>
    <thead align="left">
        <th width="25%">Nome</th>
        <th>Descrição</th>
        <th width="5%">Tipo</th>
        <th width="5%">Obrigatório</th>
        <th width="25%">Exemplo</th>
    </thead>
    <tbody valign="top" align="left">
        <tr>
            <td><b>CorrelationId</b></td>
            <td>Identificador único da requisição para reateamento de correlacionado</td>
            <td align="center">string (Uuid)</td>
            <td align="center">Sim</td>
            <td><i>b72645e9-3bfb-4423-b983-0e7d47c425a5</i></td>
        </tr>
    </tbody>
</table>
</details>
<details><summary>Path</summary>
<table>
    <thead align="left">
        <th width="25%">Nome</th>
        <th>Descrição</th>
        <th width="5%">Tipo</th>
        <th width="5%">Obrigatório</th>
        <th width="25%">Exemplo</th>
    </thead>
    <tbody valign="top" align="left">
        <tr>
            <td><b>id</b></td>
            <td>Id do registro da coleção</td>
            <td align="center">string (Uuid)</td>
            <td align="center">Sim</td>
            <td><i>f3269126-6861-40b4-98ce-5cfbca94aff1</i></td>
        </tr>
    </tbody>
</table>
</details>
<details><summary>Query</summary>
<table>
    <thead align="left">
        <th width="25%">Nome</th>
        <th>Descrição</th>
        <th width="5%">Tipo</th>
        <th width="5%">Obrigatório</th>
        <th width="25%">Exemplo</th>
    </thead>
    <tbody valign="top" align="left">
        <tr>
            <td><b>filtro1</b></td>
            <td>Filtro adicional para a rota</td>
            <td align="center">boolean</td>
            <td align="center">Não</td>
            <td>true</td>
        </tr>
    </tbody>
</table>
</details>
<details><summary>Body</summary>
<table>
    <thead align="left">
        <th width="25%">Nome</th>
        <th>Descrição</th>
        <th width="5%">Tipo</th>
        <th width="5%">Obrigatório</th>
        <th width="25%">Exemplo</th>
    </thead>
    <tbody valign="top" align="left">
        <tr>
            <td><b>description</b></td>
            <td>Descrição para o novo registro</td>
            <td align="center">string</td>
            <td align="center">Sim</td>
            <td>***</td>
        </tr>
    </tbody>
</table>
</details>

#### Saídas
<details open>
<summary>200 OK</summary>

\color{red}Red}

```json
{
    "description": "Descrição do registro"
}
```
</details>
<details>
<summary>200 NO CONTENT</summary>

```
EMPTY
```
</details>

## Integrações
{{ Informar lista não numerada de todos os serviços externos ou internos utilizados pela aplicação }}

## Links úteis
{{  Informar links adicionais, como outras documentações por exemplo, que auxiliem nos esclarecimentos sobre esta aplicação }}

- [Instalação](../README.md)
- [Testes integrados](../tests/README.md)
- [Cadastro de massas](.)
- [Collections do Insomnia](.)
- [Collections do Postman](.)
