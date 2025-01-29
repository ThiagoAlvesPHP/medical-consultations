# Medical Consultions

Tecnologias usadas no projeto:

* PHP 8.4
* Composer 2.8.3
* MySQL 8.0
* Docker

## Para Iniciar o Projeto

```bash
  git clone https://github.com/ThiagoAlvesPHP/medical-consultations.git
```

* Ambiente:
  - É necessário que o docker esteja instalado para uma instalação rápida
  - É necessário ter o composer (Existe um arquivo composer.phar na raiz do projeto)

      * Instalação:
      - Instale as dependências do projeto na raiz do mesmo com o seguinte comando:
      ```bash
        composer install
      ```
    
      - No arquivo `.env` adicione as seguintes configurações:
      ```bash
        DB_CONNECTION=mysql
        DB_HOST=mysql
        DB_PORT=3306
        DB_DATABASE=laravel
        DB_USERNAME=sail
        DB_PASSWORD=password
      ```
  
      - Rode o comando para iniciar o projeto:
      ```bash
        ./vendor/bin/sail up -d
      ```

      - Para parar o projeto:
      ```bash
        ./vendor/bin/sail down
      ```

      - Parar e remover tudo, incluindo volumes (dados persistentes serão perdidos):
      ```bash
        ./vendor/bin/sail down -v
      ```
    
      - Rode as migrations e seeders
      ```bash
        ./vendor/bin/sail art migrate --seed
      ```
    
      - Gere as chaves de autenticação
      ```bash
        ./vendor/bin/sail art key:generate
      ```

      - Gere a chave de criptográfia do jwt
      ```bash
        ./vendor/bin/sail art jwt:secret
      ```

     - Observação: verifique se o `AUTH_GUARD` está definido no `.env`
      ```bash
        AUTH_GUARD=api
      ```

Uso:
- Para acessar o projeto basta [Clicar Aqui](http://localhost/)
- Para acessar o phpmyadmin basta [Clicar Aqui](http://localhost:8080)

* Observações
    - Certifique-se de que as portas configuradas no arquivo docker-compose.yml não estejam em uso antes de rodar o Docker. Caso contrário, podem ocorrer erros de conflito de portas.
