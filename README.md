## Instalação

Passos para rodar o projeto clonado:
1. copie o .env.example,cole e renome para .env
2. dê o comando ``composer install``
3. dê o comando ``php artisan key:generate``

criação do banco de dados:
1. crie um novo banco de dados
2. vá no arquivo .env e altere o DB_DATABASE
 para o nome do banco criado anteriormente
3. dê o comando ``php arisan migrate``
4. verifique se as tabelas foram criadas
 no banco de dados criado no primeiro passo
