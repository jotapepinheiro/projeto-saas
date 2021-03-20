### Projeto Loja SAAS
https://www.seismicpixels.com/creating-a-laravel-saas-framework/

```sql
CREATE DATABASE IF NOT EXISTS tenancy;
CREATE USER IF NOT EXISTS tenancy@localhost IDENTIFIED BY 'someRandomPassword';
GRANT ALL PRIVILEGES ON *.* TO tenancy@localhost WITH GRANT OPTION;
```
```shell
# Instalar todos os pacotes necessários para executar o backend do projeto
> composer install
ou
> composer install --ignore-platform-reqs

** Caso tenha falha de memória com php local, use: **
> COMPOSER_MEMORY_LIMIT=-1 composer install

# Instalar todos os pacotes necessários para executar o frontend do projeto
> npm install
 
# Crie o arquivo .env e defina o seu APP_TIMEZONE e banco de dados.
> cp .env.example .env

# Gerar app secret
> php artisan key:generate

# Criar as tabelas necessárias no seu banco de dados
# Nota: Lembre-se de criar o banco de dados antes de executar este comando!
> php artisan migrate

# Criar arquivo migrate.sql com todas as tabelas de migrations
> php artisan migrate --pretend --no-ansi > migrate.sql

# Executar migrations somente do sistema
php artisan migrate:fresh --database=system

# Alimentar nosso banco de dados com dados necessários
> php artisan db:seed

# Recriar os dados de nosso banco de dados
# ATENÇÃO - Isto irá recriar todo o banco de dados
> php artisan migrate:fresh --seed
```

## NOVO TENANT
```bash
php artisan tenant:create pedro "Pedro Ricardo" pedro@example.com
-- y85Ng8glQ1Ty0aWW

php artisan tenant:create edson "Edson Luis" edson@example.com
-- 2UZGTJYNyhn5L9WE
```

## Stripe
https://stripe.com/en-br/pricing

https://stripe.com/docs/testing

## Planos Stripe
Plano Básico Mensal - plan_H36ofy5qgrq4II
Plano Padrão Mensal - plan_H36r0V25JNUMnk
Plano Premium Mensal - plan_H36sQiEXOWydsp

## Paypal SandBox https://sandbox.paypal.com
joaopinheiro.ti-buyer@gmail.com
joaopinheiro.ti-facilitator@gmail.com
