## Api Pedidos (VipComerce)

### Requisitos

    php: "^7.3|^8.0"
    Composer:  "^2.1.*"
    Laravel Framework 8.*
    MySQL

## Instalação

Clone o projeto com o comando abaixo:

    git clone https://github.com/OtavioCostaLima/api-pedidos.git

Entre na pasta do projeto com o terminal e digite o comando:

    composer install 

Agora crie um bando de dados no MySQL com o nome de sua preferencia e configure o arquivo `.env` com as credenciais do banco de dados e do serviço de email de sua preferencia.

Para gerar as tabelas do banco de dados rode o comando:

    php artisan migrate
    
Você pode rodar a aplicação usando o comando `php artisan serve` ou atraves de um servidor web.

`Para fazer o download da Postman Collection` [Clique Aqui](https://www.getpostman.com/collections/2902791b5b5df1198692) 

`Para fazer o download da Postman API` [Clique Aqui](https://documenter.getpostman.com/view/5217365/UVJkBt3r) 

## Rotas
 POST     | api/v1/clientes              
GET|HEAD  | api/v1/clientes             
GET|HEAD  | api/v1/clientes/{cliente}   
PUT|PATCH | api/v1/clientes/{cliente}    
DELETE    | api/v1/clientes/{cliente}    
GET|HEAD  | api/v1/pedidos               
POST      | api/v1/pedidos              
POST      | api/v1/pedidos/{id}/report   
POST      | api/v1/pedidos/{id}/sendmail 
PUT|PATCH | api/v1/pedidos/{pedido}     
DELETE    | api/v1/pedidos/{pedido}      
GET|HEAD  | api/v1/pedidos/{pedido}     
GET|HEAD  | api/v1/produtos              
POST      | api/v1/produtos              
PUT|PATCH | api/v1/produtos/{produto}    
DELETE    | api/v1/produtos/{produto}    
GET|HEAD  | api/v1/produtos/{produto}    
