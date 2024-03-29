Projeto de Desenv. Back-End - Sistema de login e cadastro !

// Passos de uso ------------------------------------------------------------------------------

    - Ter pré-instalado XAMPP, para rodar MySQL e PHP

    - Iniciar Xampp-Control e estartar Apache e MySQL

    - Os arquivos da pasta zipada estão embutidos em uma pasta chamada login-cadastro

    - Mover a pasta login-cadastro, para dentro de C:\xampp\htdocs

    - Para abrir o projeto, digite na url do navegador:  http://localhost/login-cadastro/index.php
    
------------------------------------------------------------------------------------------------

// Quais tecnologias foram usadas -------------------------------------------------------------

    - Neste projeto de desenvolvimento web e back-end, foi desenvolvido utilizando HTML como a 
linguagem de marcação principal para definir a estrutura e o conteúdo da página   |   HTML

    - Já o CSS foi utilizado na estilização da interface do projeto, deixando o link para cadastro, botões 
e visual tematizado e intuitivo   |   CSS

    - O uso de JavaScript é relacionado à configuração e funcionamento na animação na página, efeito 
parallax com movimento do mouse   |   JavaScript

    - O PHP teve maior importancia no projeto, visando entregar segurança ao sistema, integração das 
tecnologias, além de fazer conexões entre arquivos e o banco, e também surgimento e ocultação de 
blocos de códigos, tornando a página mais dinâmica   |   PHP

    - A linguagem SQL foi utilizada para fazer o banco de dados do sistema   |   SQL

// Qual a propósta do projeto ----------------------------------------------------------------
    - O projeto visava primordialmente a integração do front-end com o back-end, a partir do uso 
de PHP que faria a ponte entre as estruturas de linguagem. Foi proposto o desenvolvimento de três 
telas: login, cadastro e uma tela inicial pós-login. A tela de login contém os campos necessários 
formatados em um formulário para enviar parâmetros (dados) e fazer requisições via POST, 
consultando o banco de dados, verificando a existência do usuário, certificando se a senha coincide 
com a cadastrada e realizando o redirecionamento à página inicial, que por sua vez tem uma breve tela 
que apresenta o nome de usuário cadastrado e uma botão de controle para encerramento de sessão 
(método de segurança). 

   - Enquanto isso, a tela de cadastro também conta com um formulário, e verifica: disponibilidade de 
nome de usuário, disponibilidade de endereço de e-mail, se a senha contém o mínimo de 8 caracteres 
exigidos e se o nome de usuário excede o máximo de 12 caracteres permitidos. E para cada situação, 
é disponibilizado avisos na tela, de forma que fique claro o motivo do não cadastramento ou o sucesso 
da ação.