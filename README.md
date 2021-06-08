# Short URL

<h3 align="center">
   Aplicação utilizada para encurtar URLS. O serviço recebe como parâmetro uma URL, uma nova url é gerada a partir de um hash sendo acessível por um mês.
   <br><br>
</h3>

### Tecnologias
-   [PHP 7.3](https://www.php.net/)
-   [MySQL](https://www.mysql.com/)
-   [Laravel 8](https://laravel.com/)
-   [Laravel Passport](https://laravel.com/docs/8.x/passport)
-   [Laradock](https://laradock.io/)
-   [Docker](https://www.docker.com/)


## Instalação

Clone da Aplicação
  `git clone https://github.com/cleberbonifacio/make-transactions.git`

Criar .env na raiz do projeto utilizando o .env.example como referência

Fazer a instalação do Laradock
  `cd laradock`
  `git clone https://github.com/laradock/laradock.git`
  
Criar .env na raiz de Laradock utilizando o .env.example como referência

Criar Containers
  `cd laradock`
  `docker-compose up -d nginx mysql phpmyadmin`

Rodar migrations do Banco de dados
  `php artisan migrate`

### Telas
  
  <img src="https://github.com/cleberbonifacio/shorturl/blob/main/prints/register.PNG">
  <img src="https://github.com/cleberbonifacio/shorturl/blob/main/prints/login.PNG">
  <img src="https://github.com/cleberbonifacio/shorturl/blob/main/prints/userDetail.PNG">
  <img src="https://github.com/cleberbonifacio/shorturl/blob/main/prints/cadastro.PNG">
  <img src="https://github.com/cleberbonifacio/shorturl/blob/main/prints/sucesso.PNG">
 <img src="https://github.com/cleberbonifacio/shorturl/blob/main/prints/vencida.PNG">
<img src="https://github.com/cleberbonifacio/shorturl/blob/main/prints/erro.PNG">
  
  


