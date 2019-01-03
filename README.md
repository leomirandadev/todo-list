# Todo list project

O projeto consiste no desenvolvimento de um software que permite o usuário cadastrar e gerenciar suas tarefas.

## Getting Started

Baixe o projeto em sua máquina e siga as instruções abaixo:

#1 instale o Banco de dados que está na pasta doc
#2 Acesse o arquivo /app/json/config.json e altere o link da api para onde seu projeto ficará
#3 Acesse o arquivo /api/libs/dataManagerV2.1/DataCenter.php e altere

```
private $dsn = "mysql:dbname=nome_do_banco; host=seu_host";
private $user = 'seu_usuario';
private $pass = 'seu_senha';

```

## O usuário conselhe:

# Adicionar novas tarefas;
# Marcar e desmarcar o status de concluído;
# Editar o conteúdo da task;
# Deletar uma task (os dados permanecem no banco de dados);

Obs.: Na pasta /doc/ existe um video para melhor exemplificar a usabilidade do projeto.

## Tecnologias utilizadas

# Framework Slim PHP - Para desenvolvimento e organização da API
# Jquery AJAX - Escolhido para a comunicação do frontend com a API
# Conjunto Jquery UI - Utilizado para a construção do efeito Drag' on Drop
# Bootstrap - Para auxilio na estilização de janelas, grids e modais
# Composer - Utilizado para o controle de pacotes do PHP
# Banco de dados Mysql 
# Git

Obs.: Não foi utilizado nenhuma divisão por Branches pois o projeto foi feito em menos de 24 horas.
