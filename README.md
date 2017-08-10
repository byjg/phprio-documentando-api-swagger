# Código fonte da apresentação Documentando com o Swagger

## Install

```bash
composer install
./vendor/bin/swagger --output web/docs/ --exclude vendor   # Gera a documentação
./vendor/bin/phpunit                                       #Roda o teste unitário 
./run.sh   # Roda o Docker com o servidor Web na porta 7000
```

## Diretórios

* web - Pasta Raiz exposta publicamente
* src - Código fonte do projeto
* src/Rest - Código fonte da API Rest
* src/Model - Código fonte do Model
