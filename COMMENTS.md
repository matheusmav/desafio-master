# Sistema

-   Para desenvolver o sistema escolhi uma ferramenta de desenvolvimento rápido, robusto e maduro,
    o Laravel, framework desenvolvido em PHP que já está a 11 anos no mercado.

-   O primeiro passo foi instalar o banco de dados sqlite3, escolhido por ser simples de usar,
    e armazena seus dados em um único arquivo dentro da raiz do projeto.

-   O segundo passo foi instalar o framework Laravel.

-   Para rodar a aplicação é preciso ter o php 8, e o composer para instalar as dependencias, alem das extensoes 'sqlite3' e 'pdo_sqlite' ativadas no arquivo php.ini; o banco de dados e a .env já estáo configurados.

-   Instalação da aplicação:
    Dentro de Sistema/aplicacao-de-comentarios rode
    $ composer install

    Para iniciar a aplicação:
    $ php artisan serve

    A aplicação irá iniciar no endereço http://localhost:8000/

**Regras de negócio**

1. É possivel registrar um email e um comentário que será enviado por POST para uma rota que valida e registra o comentário no banco de dados, em cada noticia é possível recuperar os comentários de acordo com a notícia, paginados de 20 em 20;

2. Através do email informado a aplicação busca a imagem de perfil cadastrada no Gravatar, caso não tenha, é retornada uma imagem padrão;

3. A aplicação utiliza proteção CSRF, protegendo contra falsificação de solicitação entre sites;

4. A aplicação é perfeitamente escalável, podendo garantir grande volume de requisições em um curto espaço de tempo;

5. A página Home da aplicação lista as noticias mostrando a quantidades de comentários por notícia; cada notícia é clicável,
   facilitando a navegação na página.

6. Foi utilizado um template [bootstrap](https://getbootstrap.com/docs/5.2/examples/) para facilitar o desenvolvimento, porem,
   a aplicação poderia ter sido desenvolvida sem a utilização de templates, para uma maior controle de sua personalização.

# Logica

-   Para rodar o programa basta rodar "npm install" e executar o arquivo load.balance.js dentro da pasta
    /Logica/Load Balance

    $ npm install
    $ node load.balance.js
