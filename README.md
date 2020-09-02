# Crud - Repository

![Code](./code.jpg)

Orientações Gerais

__Aplicação App Lista Tarefas: CRUD com PHP__

Esse é um código mais simples.

__Passo a passo para ser executado:__

Acesse o repositório da aplicação no GitHub.
Para executar a aplicação, é possível fazer uso de um servidor local através do WAMP ou XAMPP.
Na minha máquina, já usei ambos, porém uso hoje em dia apenas o WAMP. É necessário instalar o WAMP na sua máquina para podermos acessar nosso localhost juntamente com o MySQL.

Usando o WAMP como exemplo, a pasta app_lista_tarefas_public da aplicação App Lista Tarefas deve estar na pasta do WAMP chamada “www”. Já a pasta app_lista _tarefas da aplicação deve estar um nível acima, fora da pasta “www”, que é uma pasta pública. Essa medida se justifica para proteger scripts e dados sensíveis.
Nesse ponto, é necessário executar o WAMP com um duplo clique.

É necessário executar o arquivo SQL “estrutura” dentro do PHPMyAdmin, que criará nossa database (podemos acessar o PHPMyAdmin a partir de localhost : http://localhost/phpmyadmin/   , em geral, o usuário é setado como “root” e a senha fica vazia).
Neste ponto, podemos acessar http://localhost/app_lista_tarefas_public/.  A aplicação deverá estar rodando.
Ressalte-se que a aplicação está também disponível no seguinte endereço:
http://webdevelopmentaddress.infinityfreeapp.com/
ou
http://developmentaddress.epizy.com/ (versão de testes)

OBS: O arquivo tarefa_controllerprotected gerencia as rotas da aplicação, direcionando o usuário para a rota correta de acordo com o serviço que foi requerido. Não é um arquivo do gênero “routes.js”. Nessa aplicação, dada sua simplicidade, as operações de CRUD estão bem evidenciadas(em tarefa.service.php).

__Aplicação Gestão de Clientes: CRUD com Django__

Aqui usamos o framework web Django.

__Passo a passo para ser executado:__

O site oficial do Django disponibiliza um tutorial de instalação neste link: https://docs.djangoproject.com/en/3.1/intro/install/ .
Alternativamente, siga este passo a passo:
No Windows, instale o Python em sua máquina. Este é o link: https://www.python.org/downloads/release/python-385/ . Não esquecer de adicionar o Python ao PATH quando abrir o cliente de instalação (é a opção “Add Python to PATH”, marque o box).
Instale o PyCharm na sua máquina. Link: https://www.jetbrains.com/pt-br/pycharm/download/#section=windows . Escolha a versão Community, que é gratuita.
Marque a opção 64-bit launcher (para o Create desktop shortcut) e create associations - .py .
Digite “python” no CMD para verificar se a instalação teve êxito.
O pip é um instalador de pacotes para o python. Ele já vem instalado nas versões Python 2 >=2.7.9 ou Python 3 >=3.4 . Estamos na versão 3.8, logo já  temos o pip. Para verificar se ele está mesmo instalado, podemos digitar “pip” no CMD. O retorno conterá informações gerais sobre o pip. Digite “pip -V” no CMD para verificar sua versão do pip. Caso o pip não esteja instalado, acesse para instalá-lo manualmente: https://pip.pypa.io/en/stable/installing/ .
Acesse o repositório da aplicação no GitHub. Salve os arquivos e os abra como projeto no PyCharm (abra o PyCharm e clique em open, localize o arquivo e abra “projetoDjango”).
Ative a venv(do diretório projetoDjango, digite no terminal do PyCharm: venvFinal\Scripts\activate). Essa venv ajudará a isolar nosso projeto Django do resto de nossa máquina, é dizer, de outros projetos ou de qualquer coisa instalada que possa causar interferência indesejada.

_OBS: Como saber se a venv está ativada?_ A venv está ativa quando surge um (venv) no seu CMD. Exemplo: (minhavenv) C:\Users\natha\djangoSalvus\minhavenv> .

_OBS: Como abrir o terminal do PyCharm?_ No canto inferior esquerdo da tela do PyCharm, clique na opção “Terminal” ou pressione ALT + F12 (ou ALT+Fn+F12 se aplicável).

Instale todos os módulos presentes em requirements-dev.txt (Como? Exemplo: pip install Pillow).

Entre na pasta gestaoClientes pelo terminal. Execute “python manage.py runserver”. O PyCharm subirá um servidor local e a aplicação poderá ser acessada.

OBS: o arquivo urls.py da pasta gestaoClientes gerencia as rotas da aplicação, fazendo o direcionamento conforme inputs do usuário.

Ressalte-se que a aplicação está também disponível no seguinte endereço:
https://app-gestao-clientes-django.herokuapp.com/
Trata-se de uma versão de testes (para testar o deploy no Heroku).
