#Repositório do Projeto BrasilTur

Next Step - Empresa Júnior do Curso de Sistemas de Informação da UFVJM
Esse projeto é conduzido pela Equipe Kepler
Diamantina - MG

#Configuração básica

Esse projeto usa o *Composer* como gerenciador de bibliotecas adicionais

O artigo abaixo explica seu uso
<http://tableless.com.br/composer-para-iniciantes/>

Se você usa Windows eu recomendo a instalação do PowerShell. Para instalá-lo siga o link abaixo
<http://msdn.microsoft.com/pt-br/powershell/scripting/setup/installing-windows-powershell>

Ainda para os usuários de Windows recomendo que conheçam o Chocolately
<http://chocolatey.org/>. Com ele você instala pacotes adicionais pelo terminal no Windows, como se estivesse no Linux. Ele instala pacotes como o `git` ou `docker` a partir de fontes seguras e realiza tudo de forma automatizada.

#### Passo 1 - Acesse a pasta raiz do projeto

Dependendo do seu sistema isso funciona de maneira diferente.

######Windows PowerShell:
```shellscript
cd c:\xammp\htdocs\Projeto_BT
```
######Terminal Linux:
```shellscript
cd /var/www/html/Projeto-BT
```    
#### Passo 2 - Atualize seu repositório
```shellscript
composer.phar update
```    
Ele baixa as dependências automaticamente no seu espaço de trabalho. E não se preocupe com o seu commit, pois o git já está configurado para ignorar o diretório `vendor` que será criado.

> :no_entry_sign: Não altere os arquivos dentro da pasta `vendor`.
