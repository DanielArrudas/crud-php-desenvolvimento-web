# CRUD de Clientes em PHP com MVC

Este repositório contém um projeto acadêmico completo de um sistema **CRUD (Create, Read, Update, Delete)** para gerenciamento de clientes, desenvolvido para a disciplina de Desenvolvimento Web.

O projeto foi construído utilizando **PHP puro**, seguindo as boas práticas de **Programação Orientada a Objetos (POO)** e a arquitetura **Model-View-Controller (MVC)** para garantir um código organizado, manutenível e escalável.

![gif-crud](https://github.com/user-attachments/assets/b91d2662-a0d4-4610-ad88-63046d00cbb8)

## Funcionalidades

-   **Create:** Cadastro de novos clientes com validação de dados, incluindo CPF e campos únicos.
-   **Read:** Listagem de todos os clientes cadastrados em uma tabela organizada.
-   **Update:** Edição das informações de um cliente existente com o formulário pré-preenchido.
-   **Delete:** Remoção de um cliente do banco de dados com confirmação de segurança.
-   **Validação de Dados:** As regras de negócio, como validação de CPF e verificação de duplicatas, são tratadas no _Model_.
-   **Feedback ao Usuário:** Mensagens de sucesso e erro são exibidas de forma clara após cada operação.

## Arquitetura MVC

O projeto é estritamente organizado no padrão Model-View-Controller:

-   **`index.php` (Front Controller / Roteador):**
    É o ponto de entrada único da aplicação. Ele captura todas as requisições e, com base no parâmetro `action` da URL, decide qual método do `Controller` deve ser executado.

-   **`/controllers/ClientsController.php` (Controller):**
    Atua como o maestro da aplicação. Ele recebe as requisições do Front Controller, solicita os dados ao `Model`, trata a entrada do usuário (sanitização) e decide qual `View` deve ser renderizada para o usuário, passando os dados necessários para ela.

-   **`/models/ClientModel.php` (Model):**
    Toda a lógica de negócio, incluindo validações (CPF, campos obrigatórios, etc.) e a comunicação com o banco de dados (usando PDO e _prepared statements_ para segurança), está encapsulada aqui.

-   **`/views/` (View):**
    Camada de apresentação. Contém os arquivos PHP/HTML responsáveis por exibir a interface para o usuário, como formulários e a lista de clientes. Ela apenas exibe os dados que o `Controller` lhe entrega.

-   **`/configuration/connect.php` (Configuração):**
    Centraliza a configuração e a lógica de conexão com o banco de dados (MySQL), utilizando PDO.

## Tecnologias Utilizadas

-   **Backend:** PHP 8
-   **Banco de Dados:** MySQL
-   **Frontend:** HTML5, CSS3
-   **Bibliotecas JS:** jQuery e jQuery Mask (para aplicar máscaras de formatação nos campos CPF e telefone).
-   **Padrões:** Programação Orientada a Objetos (POO), Arquitetura MVC, Front Controller.

## Como Executar o Projeto

Para executar este projeto em um ambiente local, siga os passos abaixo.

### Pré-requisitos

-   Um ambiente de desenvolvimento PHP/MySQL (XAMPP, Laragon, WAMP, etc.).
-   PHP 8 ou superior.
-   MySQL ou MariaDB.

### Passos

1.  **Clone o repositório:**

    ```bash
    git clone https://github.com/DanielArrudas/crud-php-desenvolvimento-web.git
    ```

2.  **Importe o Banco de Dados:**

    -   Crie um novo banco de dados no seu servidor MySQL com o nome `loja`.
    -   Importe o arquivo `loja.sql` (localizado na raiz do projeto) para criar a tabela `clients` com a estrutura correta.

3.  **Configuração da Conexão:**

    -   Abra o arquivo `configuration/connect.php`.
    -   Verifique se as constantes `SERVERNAME`, `USERNAME`, `PASSWORD` e `DBNAME` correspondem às configurações do seu ambiente de banco de dados local.

4.  **Execute o Projeto:**
    -   Mova a pasta do projeto para o diretório raiz do seu servidor local (ex: `htdocs` no XAMPP ou `www` no Laragon).
    -   Abra seu navegador e acesse o `index.php` do projeto (ex: `http://localhost/crud-php-desenvolvimento-web/`).

O sistema estará pronto para uso.

## Autor

**Daniel Arrudas**
