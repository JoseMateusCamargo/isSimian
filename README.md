# isSimian

# API REST - PHP

A API REST para o aplicativo de exemplo é descrita abaixo.

Os teste podem ser realizados via postman <a>https://www.getpostman.com/</a>


## Validação de DNA 

http://jmcleva.com.br/cgi-bin/simian/
```
POST /simian/
```

Neste serviço é recebido uma sequencia de DNA através de um <i><b>HTTP POST</b></i> com <i><b>JSON</b></i>, comandos e exemplos abaixo:

OBS: Caso o DNA seja identificado como um símio, você deve retornar um <i><b>HTTP 200-OK</b></i>, caso contrário um <i><b>HTTP 403-FORBIDDEN</b></i>

Formanto exemplo do JSON:
{
"dna": ["CTGAGA", "CTAAGC", "ATTTGT", "ACCCCG", "CTCCTA", "CTCCTG"]
}

### Solicitação usando postman

Usando postman, return False (HTTP 403-FORBIDDEN):

![](https://i.ibb.co/f9jc0mG/2.png)


Usando postman, return True (HTTP 200-OK):

![](https://i.ibb.co/8BSB3Rc/23.png)

Caso o DNA já foi cadastro do banco o mesmo não será recadastrado, e a requisição tera um retorno (DNA já cadastrado), exemplo abaixo:


Usando postman, return (DNA já cadastrado)

![](https://i.ibb.co/b3zjqbC/sdfasdf.png)


## Obter status dos registros no banco de dados

http://jmcleva.com.br/cgi-bin/stats/
```
GET /stats/
```

Este serviço responde um <i><b>HTTP GET</b></i> retornando um <i><b>JSON</b></i> com as estatísticas de verificações de DNA, informando aa quantidade de DNA’s símios, quantidade de DNA’s humanos, e a proporção de símios para a população humana, comandos e exemplos abaixo:

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

![:+1: via postman:](https://i.ibb.co/sVJ32F2/Sem-t-tulo.png)
