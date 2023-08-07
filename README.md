
<div class="ui container" style="padding-top: 10px; width:100% !important;">
            <div class="ui segments raised">
                <div class="ui segment">
                    <h1>Laravel Version: 10x Usando Laravel Sail</h1>
                </div>
                <div class="ui segment">
                    <h1>Doctors Api</h1>
                </div>
                <br>
                <div class="ui segment secondary form">
                    <table class="ui table very compact celled selectable small blue">
                        <thead>
                            <tr>
                                <th class="active">Entidade</th>
                                <th>Listar</th>
                                <th>Cadastrar</th>
                                <th>Atualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cidade</td>
                                <td><i class="icon check large green "></i> Público</td>
                                <td><i class="icon close red large"></i>X</td>
                                <td><i class="icon close red large"></i> X</td>
                            </tr>
                            <tr>
                                <td>Médico</td>
                                <td><i class="icon check large green"></i>Público </td>
                                <td><i class="icon lock black large"></i> JWT </td>
                                <td><i class="icon close red large"></i>X</td>
                            </tr>
                            <tr>
                                <td>Paciente</td>
                                <td><i class="icon lock black large"></i> JWT</td>
                                <td><i class="icon lock black large"></i> JWT</td>
                                <td><i class="icon lock black large"></i> JWT</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <table class="ui table very compact celled selectable small blue">
                                <thead>
                                    <tr>
                                        <td>Público, sem necessidade de autenticação</td>
                                        <td>X, Não necessário no projeto</td>
                                        <td>JWT, apenas usuário autenticado</td>
                                    </tr>
                                </thead>
                     </table>
                    <div class="ui segment">
                        <div class="ui header">
                        Link documentação / Endpoints:
                            <a target="_blank" href="https://www.postman.com/nova-versao-fc-teste/workspace/teste-facil-consulta/documentation/23818071-1ee3f4ef-d351-45e2-a38f-1b4940c3ad58?entity=&branch=&version="> https://www.postman.com/nova-versao-fc-teste/workspace/teste-facil-consulta/documentation/23818071-1ee3f4ef-d351-45e2-a38f-1b4940c3ad58?entity=&branch=&version=</a>
                    </div>
                    </div>
                </div>
                <br>
                <div class="ui segment">
                    <h1>Instalaçao</h1>
                     <strong> Download do projeto:</strong> <br>
                     no terminal execute o seguinte comando: <strong>git clone https://github.com/codekbr/DoctorsApiv1.git</strong>
                </div>
                <br>
                <div class="ui segment">
                     1º Criar o arquivo .env <br>
                       <strong> - Copiar o .env.example da raiz do projeto laravel e renomea-lo para .env <br></strong> <br>
                     2º Configurar a conexão com MySQL do projeto no arquivo .env <br>
                     <p>
                          <strong>- Abra o .env e adicone a seguintes linhas. <br></strong>
                         <h6>
                            DB_CONNECTION=mysql <br>
                            DB_HOST=mysql <br>
                            DB_PORT=3306 <br>
                            DB_DATABASE=doctorsapi <br>
                            DB_USERNAME=sail <br>
                            DB_PASSWORD=password
                         </h6>
                     </p>
                     3º Installando as Dependências necessárias no projeto: <br>
                         <strong>- Execute o comando no terminal:  composer install <br></strong>
                     4º Subir o Container do projeto usando o Sail <br>
                        <strong>- Execute o comando no terminal: ./vendor/bin/sail up</strong> <br>
                     5º Gerando chave no env para o Laravel <br>
                         <strong>- Execute o comando no terminal: ./vendor/bin/sail artisan key:generate <br></strong>
                     6º Gerando a chave no env para o JWT <br>
                         <strong>- Execute o comando no terminal: ./vendor/bin/sail artisan jwt:secret <br></strong>
                     7º Gerando a Base de Dados e Tabelas no Banco de Dados MySQL usando Migrations do Laravel <br>
                        <strong>- Execute o comando no terminal: ./vendor/bin/sail artisan migrate</strong> <br>
                     8º Gerando registros fictício usando factory e seeder <br>
                         <strong>- Execute o comando no terminal: ./vendor/bin/sail artisan db:seed</strong>  <br>
                </div>
            </div>
        </div>
