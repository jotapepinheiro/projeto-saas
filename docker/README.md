# DOCKER
> Voltar para [instruções do projeto][l-Doc-Projeto]

---
- PHP v7.3.21
- Mysql v8.0.17
- Nginx
- Redis
- Redis Web-UI

___ 

### *Importante* 
- Instalar [Docker >= v19][l-Docker]
- Instalar [Docker Compose >= v1.27][l-Docker-Compose]
- Adicionar [Permissões para Docker][l-Docker-Permissoes]
___ 

### Executar na raiz do projeto
> cp .env.docker .env 

### Gerar app secret

> php artisan key:generate

### Gerar jwt secret

> php artisan jwt:secret

### Iniciar containers, na raiz do projeto

> docker-compose up -d

### Desligar containers, na raiz do projeto

> docker-compose down

### Rebuild Container

> docker-compose build nginx
> docker-compose up --build php-fpm

### Rebuild Todos Container

> docker-compose down && docker-compose up -d --build

### Rebuild Sem Cache de um Container

> docker-compose build --no-cache nginx

### Reload Nginx

> docker exec -it apinotas-nginx nginx -s reload

### Listar Containers

> docker ps -a

### Entrar em um Container

> docker-compose exec php-fpm bash

### Redis Web-UI

> <http://redis:9987>

___

### EDITAR ARQUIVO HOSTS
> No Windows: C:\Windows\System32\drivers\etc\hosts

> No Linux/Mac: /etc/hosts

```text
127.0.0.1       loja.local
127.0.0.1       redis
127.0.0.1       mysql
```

___

### CONFIGURAR XDEBUG NO LINUX
> https://stackoverflow.com/questions/46263043/how-to-setup-docker-phpstorm-xdebug-on-ubuntu-16-04

- Instalar o ifconfig
> sudo apt-get install net-tools

- Copiar o nome parecido com wlp4s0 e adicionar a linha de baixo
> sudo ip addr add 10.254.254.254/24 brd + dev wlp4s0 label wlp4s0:1

- Usar o ip 10.254.254.254 em sua configuração do PhpStorm/VSCode

___

> docker-compose exec php-fpm bash
___

### LIMPAR PROJETO LARAVEL SEM ALIAS

```shell script
composer dump-autoload
php artisan clear-compiled
php artisan config:cache
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan queue:restart
chmod -R 777 storage bootstrap/cache
```

___

### Alias de acesso facil via terminal

```shell script
# Iniciar/Parar Docker do Projeto
alias d-up-loja='cd $HOME/Dev/www/pessoal/loja-saas && docker-compose up -d'
alias d-down-loja='cd $HOME/Dev/www/pessoal/loja-saas && docker-compose down'

# Executar limpeza do projeto laravel dentro do Docker
limpar-loja() {
  echo -e "\033[1;32m Limpando Loja Saas... \033[0m"
  docker exec -ti loja-php sh -c "cd loja \
  && composer dump-autoload \
  && php artisan config:cache \
  && php artisan config:clear \
  && php artisan clear-compiled \
  && php artisan cache:clear \
  && php artisan view:clear \
  && php artisan queue:restart \
  && chmod -R 777 storage bootstrap/cache"

  echo -e "\033[1;36m Limpo! \033[0m"
}
```

[l-Doc-Projeto]: ../README.md
[l-Docker]: https://docs.docker.com/engine/install/ubuntu/
[l-Docker-Compose]: https://docs.docker.com/compose/install
[l-Docker-Permissoes]: https://docs.docker.com/engine/install/linux-postinstall
