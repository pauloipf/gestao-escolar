# Gestão Escolar

Este projeto é um sistema de gestão escolar desenvolvido com Laravel, Blade e Bootstrap.

## Requisitos

- **PHP** 8.x ou superior
- **Composer**
- **Node.js** e **npm**
- **MySQL Server** (deve estar rodando antes de executar as migrations)
- Extensão `pdo_mysql` habilitada no PHP

## Instalação do Projeto

1. **Clone o repositório**
   ```bash
   git clone https://github.com/pauloipf/gestao-escolar.git
   cd gestao-escolar
    ```
2. Instale as dependências do PHP
    ```bash
    composer install
    ```
3. Instale as dependências do Node.js
    ```bash
    npm install
    ```
    
## Configuração do Banco de Dados

Antes de iniciar o projeto, certifique-se de que o servidor MySQL está rodando e configure o arquivo `.env` com as informações de conexão:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=gestao_escolar
    DB_USERNAME=root
    DB_PASSWORD=
    ```

## Inicializando o Servidor MySQL

Certifique-se de que o MySQL está ativo:

- No macOS (Homebrew):
    ```bash
    brew services start mysql
    ```

- No Linux:
    ```bash
    sudo service mysql start
    ```

ou
    ```bash
    sudo systemctl start mysql
    ```

- No Windows: Utilize o painel de controle do MySQL ou o XAMPP para iniciar o serviço MySQL.

## Comandos Artisan para Rodar com Seeds

1. Limpe e recache as configurações (opcional, mas recomendado):
    ```bash
    php artisan config:clear
    php artisan config:cache
    ```

2. Executar as Migrations e Seeders:
    ```bash
    php artisan migrate:fresh --seed
    ```
Esse comando recria o banco de dados, executa todas as migrations e popula com os dados de seed.

### Credenciais de Login (User Seed)

Os seeders criam usuários de exemplo para teste:

- Professor
    - Email: professor@ifsc.edu.br
    - Senha: professor

- Estudante
    - Email: estudante@example.com
    - Senha: estudante

## Inicializando o Projeto

Após configurar o banco de dados e executar as migrations com seeders, inicie o servidor de desenvolvimento do Laravel:
```bash
php artisan serve
```

Abra o navegador em http://127.0.0.1:8000 para acessar o sistema.