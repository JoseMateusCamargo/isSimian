# isSimian

# REST - PHP

A REST para o aplicativo de exemplo é descrita abaixo:

Os teste podem ser realizados, utilizando:

<i>Postman</i> <a>https://www.getpostman.com/</a> ou linha de comando <i>curl</i> <a>https://curl.haxx.se/</a>


# Descrição do projeto

Esse projeto tem como objetivo a validação de uma sequência de DNA para (símio ou humano) utilizando PHP como API e python como validador em uma matrix NxN, no python foi utilizado a busca por palavra em grid (horizontal, vertical e diagonal), complexibilidade de O(R*C*N).


in <i><b>Nodejs</i></b> (em desenvolvimento)

O projeto em <i><b>Nodejs</i></b> conta com as mesmas premissas na parte de processo de resolução da sequencia de DNA, utilizando banco de dados MySQL.
Ressaltando a utilização de frameworks como <i>(Memcached)</i> - sistema de caching de objetos em memória, entre outras. <i>Features</i>


## Validação de DNA 

http://jmcleva.com.br/cgi-bin/simian/
```
POST /simian/
```

Neste serviço é recebido uma sequência de DNA através de <i><b>HTTP POST</b></i> com <i><b>JSON</b></i>, comandos e exemplos abaixo:

OBS: Caso o DNA sejá identificado como um símio, será retornado <i><b>HTTP 200-OK</b></i>, caso contrário um <i><b>HTTP 403-FORBIDDEN</b></i>

Formanto exemplo do JSON:
{
"dna": ["CTGAGA", "CTAAGC", "ATTTGT", "ACCCCG", "CTCCTA", "CTCCTG"]
}

### Solicitação usando postman

Return False (HTTP 403-FORBIDDEN):

![](https://i.ibb.co/f9jc0mG/2.png)


Return True (HTTP 200-OK):

![](https://i.ibb.co/8BSB3Rc/23.png)

OBS: Caso o DNA já foi cadastro no banco o mesmo não será recadastrado e a requisição tera um retorno (DNA ja cadastrado), exemplo abaixo:


Return (DNA ja cadastrado)

![](https://i.ibb.co/b3zjqbC/sdfasdf.png)


OBS01: As letras da da sequência de DNA somente podem conter <i><b>(A, T, C, G)</i></b>, que representa cada base nitrogenada do DNA. Caso a sequência DNA contenha outro caractere o retorno será (DNA invalido)

Return (DNA invalido)

![](https://i.ibb.co/pwrBX71/asdfasdfasdf.png)


## Obter status dos registros no banco de dados

http://jmcleva.com.br/cgi-bin/stats/
```
GET /stats/
```

Este serviço responde um <i><b>HTTP GET</b></i> retornando um <i><b>JSON</b></i> com as estatísticas de verificações de DNA, informando a quantidade de DNA’s símios, quantidade de DNA’s humanos, e a proporção de símios para a população humana, comandos e exemplos abaixo:

### Solicitação
```
curl -i -H 'Accept: application/json' http://jmcleva.com.br/cgi-bin/stats/
```
### Resposta
```
curl: (6) Could not resolve host: application
HTTP/1.1 200 OK
Date: Mon, 27 Jan 2020 02:22:53 GMT
Server: Apache
Access-Control-Allow-Headers: "Origin, X-Requested-With, Content-Type, Accept"
Access-Control-Allow-Origin: *
Connection: close
Transfer-Encoding: chunked
Content-Type: application/json

"{\"count_mutant_dna\": 1, \"count_human_dna\": 0, \"ratio\": INF}"
```

### Solicitação usando postman

![](https://i.ibb.co/sVJ32F2/Sem-t-tulo.png)
