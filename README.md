# Documentação do Projeto de Organização de Preços de Produtos




https://github.com/LaraGb/external-sorting/assets/89605044/9d3dd35f-5f35-4b30-9fd8-470dd1d220cf






## Descrição do Projeto

Este projeto é um script PHP para ordenar produtos conforme o preço, usando a técnica de ordenação externa (external sorting). Ele lida com arquivos grandes que podem exceder a memória do servidor. O script permite ordenar em ordem ascendente ou descendente. O código é escrito em PHP puro, sem frameworks.

## Requisitos para Utilização do Código

1. **Servidor Web (opcional)**: Um servidor web como Apache ou Nginx com suporte para PHP.
2. **PHP**: PHP versão 7.0 ou superior instalado e configurado no servidor.
3. **Permissões de Arquivo**: Certifique-se de que o servidor web tem permissões de leitura e escrita nos diretórios `data/`.



## Estrutura de Diretórios e Arquivos

| Diretório/Arquivo             | Descrição                                                 |
|------------------------------|-----------------------------------------------------------|
| **data/**                    | Contém os arquivos JSON de entrada e saída.               |
| - input.json                  | Arquivo de entrada com os dados não ordenados.            |
| - output.json                 | Arquivo de saída com os dados ordenados.                  |
| **src/**                     | Diretório principal do código-fonte.                       |
| - **utils/**                  | Diretório com utilitários para manipulação de arquivos.   |
|   - save_array_to_json.php    | Script para salvar arrays em formato JSON.                |
| - external_sort.php           | Script principal para a ordenação externa dos dados.      |
| - input_generator.php         | Script para geração dos dados de entrada.                 |
| **index.html**               | Página HTML principal para interação com o usuário.       |
| **process.php**              | Script PHP para processamento do formulário e ordenação.  |
| **assets/**                  | Diretório opcional contendo a imagem do index.html.|



## Funcionamento

1. **index.html**: Página inicial onde o usuário seleciona a ordem de ordenação da entrada e saída dos preços.
2. **process.php**: Script PHP que recebe os dados do formulário, gera os dados de entrada, realiza a ordenação externa e exibe uma mensagem de conclusão.
3. **src/external_sort.php**: Implementa a lógica de ordenação externa dos dados.
4. **src/input_generator.php**: Gera os dados de entrada com produtos e preços aleatórios.
5. **src/utils/save_array_to_json.php**: Função utilitária para salvar arrays em formato JSON.

## Utilização

1. Abra o arquivo `index.html` em um navegador web.
2. Selecione a ordem desejada para a ordenação da entrada e saída.
3. Clique no botão "Ordenar" para iniciar o processo.
4. Após a ordenação, verifique o arquivo `output.json` no diretório `data/` para os dados ordenados.




