## App UOL BoaCompra

Essa aplicação calcula o custo para o envio de brindes de acordo com a distância do ganhador e o peso do brinde.
A mesma disponibiliza uma api com endpoints para consultar quais as empresas e produtos cadastros, e
também uma listagem do cálculo do custo da distância que cada empresa irá cobrar.
Além disso, possui uma página web onde você também pode visualizar o menor custo para o envio do brindes.
    
Dependências
-------------
* [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
* [Symfony Framework](https://symfony.com)
* PHP 7.4
* [Docker](https://docs.docker.com/)


Instalação
-------------
* É necessário que tenha o docker e o docker-compose instalado na sua máquina.
Para mais informações acesse a [documentação](https://docs.docker.com/get-docker/)


- Primeiramente clone o repositório na sua máquina
```console
git clone git@github.com:andre-bahia/app-boa-compra.git
cd app-boa-compra/
```

- Faça o download e o build dos containers
```console
docker-compose up
```

Para acessar o terminal dentro do container execute o comando:

```console
docker exec -it CONTAINER_ID sh
```

Depois que o todos os containers estiverem prontos você pode pegar 
o CONTAINER_ID com o comando:
```console
docker ps
```

A partir de agora todos esses comandos são executados dentro do container.

- Cria o banco da aplicação
```console
php bin/console doctrine:schema:create
```

- Popula o banco de dados
````console
php bin/console doctrine:fixtures:load --no-interaction
````

- Calcula o custo para envio de cada brinde
````console
php bin/console app:calculate-distance-cost
````

- Executar testes
```
./vendor/bin/phpunit
```

- Acesse [http://localhost:8081](http://localhost:8081)

Api endpoints
-------------
 
 | Method  | Path                |   
 |---------|---------------------|
 | GET     | /api/company        |   
 | GET     | /api/product        |   
 | GET     | /api/distance-cost  |
 
 - O endpoint `/api/distance-cost` aceita dois parâmetros:
    - `company`: ID da empresa 
    - `product`: ID do produto  