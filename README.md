# Gerenciador de Tarefas

Este é um sistema de gerenciamento de tarefas construído com Laravel, permitindo que os usuários cadastrem responsáveis, categorias e tarefas. O sistema também possibilita iniciar, pausar e finalizar tarefas, mantendo um registro do tempo gasto.

## Tecnologias Utilizadas

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white)
### Pré-requisitos

Antes de começar, certifique-se de que você tem:

- PHP (>= 7.3)
- Composer
- MySQL ou outro banco de dados suportado pelo Laravel

### Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/gerenciador-de-tarefas.git
   ```
2. Acesse o diretório do projeto:
    ```bash
    cd gerenciador-de-tarefas
    ```
3. Instale as dependências:
    ```bash
    composer install
    ``` 
4. Crie um arquivo .env a partir do .env.example:
   ```bash
   cp .env.example .env
    ```
5. Configure seu banco de dados no arquivo .env
6. Gere a chave de aplicativo:
   ```bash
   php artisan key:generate
    ```
7. Execute as migrações:
    ```bash
    php artisan migrate
    ```
