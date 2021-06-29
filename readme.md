## sgeIFSP
Sistema de gerenciamento de eventos da fábrica de software do IFSP Campus Itapetininga

## Requisitos

1. Você precisa ter o [composer](https://getcomposer.org/download/) instalado, ele é um gerenciador de pacotes PHP que permite o uso e instalação do Laravel.

## Para clonar
1. `git clone`
2. `crie uma cópia do .env.example com o nome .env`
3. `composer install && composer update`

Se tiver problemas com a versão do php, você pode tentar rodar o comando: `composer install --ignore-platform-reqs` para ignorar os requisitos específicos de versão

Verificar se MySQL está instalado e configurado com usuário e senha.
Configurar o arquivo .env com os dados de conexão para seu banco, alterando usuário e senha

5. `php artisan migrate`
6. `php artisan key:gen`
7. php artisan storage:link
8. `php artisan serve`

## Para subir o servidor
### Com o artisan
É possível subir a aplicação Backend com o próprio Laravel (sem precisar de um servidor terceiro), utilizando `php artisan serve`. Observe que no terminal, após rodar o comando a porta e localização do aplicativo rodando serão exibidas.

### Com apache
Para subir o servidor com o apache em Windows pode-se utilizar o [Xampp](https://www.apachefriends.org/pt_br/index.html) na versão portable ou não e apenas colocar os arquivos da aplicação dentro da raiz do diretório e o acessar através da pasta `public`. 

Também é válido considerar a configuração do apache para Laravel caso sejam enfrentados problemas na execução. [Link com mais explicações](https://phpraxis.wordpress.com/2016/08/02/steps-for-configuring-laravel-on-apache-http-server/).

## Teste 123
