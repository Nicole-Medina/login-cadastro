Projeto de Desenv. Back-End - Sistema de login e cadastro
=========================================================

## Índice

1. Passos de uso
2. Como criar o banco de dados
3. Quais tecnologias foram usadas
4. Qual a proposta do projeto

## Passos de uso

1. Certifique-se de ter o XAMPP pré-instalado para executar o MySQL e o PHP.
2. Abra o XAMPP-Control e inicie os serviços do Apache e do MySQL.
3. Extraia os arquivos da pasta zipada e mova a pasta 'login-cadastro' para dentro de 'C:\xampp\htdocs'.
4. Para acessar o projeto, digite o seguinte URL em seu navegador: http://localhost/login-cadastro/index.php

## Como criar o banco de dados

1. Abra seu navegador e acesse o phpMyAdmin: http://localhost/phpmyadmin.
2. Na parte superior, selecione a aba 'SQL'.
3. Copie todo o código presente no arquivo 'bd.sql' na pasta 'login-cadastro' e cole no bloco SQL. 
4. Pressione 'Ctrl+Enter' ou o equivalente 'Executar' logo abaixo do bloco de código.
5. Agora o banco no arquivo está correlacionado com o bd.sql e o p

## Quais tecnologias foram usadas

- HTML: Utilizado para definir a estrutura e o conteúdo da página, como os formulários e div's.
- CSS: Responsável pela estilização da interface do projeto.
- JavaScript: Utilizado para configuração e funcionamento de animações na página, como o efeito parallax.
- PHP: Desempenhou um papel crucial no projeto, fornecendo segurança ao sistema, integração entre tecnologias e conexões com o banco de dados, além de tornar a página mais dinâmica com o surgimento e ocultação de blocos de código.
- MySQL: Utilizado para a criação do banco de dados do sistema.

## Qual a proposta do projeto

O objetivo principal do projeto era integrar o front-end com o back-end, utilizando o PHP como ponte entre as linguagens. Foram desenvolvidas três telas principais: login, cadastro e uma tela inicial pós-login. Na tela de login, os usuários podem inserir seus dados e, após a autenticação, são redirecionados para a tela inicial, que exibe o nome do usuário cadastrado e um botão para encerrar a sessão. A tela de cadastro possui validações para garantir a disponibilidade de nome de usuário, a conformidade com o limite máximo de 12 caracteres e endereço de e-mail, além de verificar se a senha atende aos requisitos mínimos. Na interface de ambas as telas, é fornecido um feedback claro sobre o resultado das ações.