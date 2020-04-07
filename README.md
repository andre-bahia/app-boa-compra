## App Uol BoaCompra

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
php bin/console doctrine:fixtures:load --no-interaction
````

- Apaga o banco da aplicação
````console
php bin/console doctrine:schema:drop --force
````