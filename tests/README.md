# Testes integrados
Neste pacote estão configurados todos os testes funcionais integrados à aplicação. Eles serão utilizados para validar a integridade da aplicação nos ambientes, através de automação.

Este projeto usa o Behat para implementar e executar todos os cenários mapeados. Após a execução, um relatório é gerado e pode ser usado para criar um histórico de execução dos testes.

Vale ressaltar que, para que os testes sejam executados corretamente, a aplicação deve estar habilitada no mesmo ambiente onde está o pacote de testes.

[Confira na documentação da aplicação como inicializá-la.](../README.md)

# Execução
> **Warning**
>
> Para execução dos testes integrados, é necessário ter executado a instalação da aplicação com o Docker.

É possível executar todos os testes de uma vez ou cada feature/cenário individualmente.

Use o comando abaixo para baixar as dependências do pacote de testes:
```
docker exec -it general_laravel_app_template sh -c "cd /home/tests && composer install"
```

Use o comando abaixo para executar todos os testes:
```
docker exec -it general_laravel_app_template sh -c "cd /home/tests && composer run test-integration"
```

# Links úteis
- [Documentação do Behat](https://behat-docs.readthedocs.io/en/mvp1.0/)
- [Documentação da aplicação](../README.md)
