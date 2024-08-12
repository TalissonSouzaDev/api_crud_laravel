@component("components.header")  @endcomponent
@component("components.sidebar")  @endcomponent
<div class="content-body mode">
    <div class="page-titles mode">
        <ol class="breadcrumb">
            <li><h5 class="bc-title">CRUD</h5></li>
            <li class="breadcrumb-item"><a href="{{route('home')}}">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Home </a>
            </li>
            <li class="breadcrumb-item active"><a href="{{route('home')}}">CRUD Padrão</a></li>
        </ol>

        <div class="darkmode">
            <strong>Dark Mode</strong>
            <i class="fa-solid fa-toggle-off" id="darkmodebuttonoff"></i>
            <i class="fa-solid fa-toggle-on" id="darkmodebuttonon"></i>
        </div>
    </div>

    <div class="container-fluid mode">
        <div class="col-xl-12 col-lg-12 bst-seller">
            <div class="card h-auto">
                <div class="card-body mode">



        </div>
            </div>
               </div>

    </div>
    <div class="container-fluid mode">
        <div class="row">
            <!-- Seção de cadastro -->
            <div class="col-xl-12 bst-seller">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h4 class="heading mb-0">Novo atendimento</h4>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 bst-seller">
                <div class="card h-auto">
                    <div class="card-body mode">
                        <!-- Formulário de cadastro/edição -->
                        <form action="" id="form">
                            @csrf
                            <div class="row">
                                <input type="hidden" id="id">
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label required">Nome</label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label required">Whatsapp</label>
                                    <input type="text" class="form-control" name="whatsapp" id="whatsapp" required placeholder="(00) 00000-0000">
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label required">Telefone</label>
                                    <input type="text" class="form-control" name="telefone" id="telefone" required placeholder="(00) 00000-0000">
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label required">CPF</label>
                                    <input type="text" class="form-control" name="cpf" id="cpf" required>
                                </div>
                                <div class="col-sm-6 m-b30">
                                    <label class="form-label required">CEP</label>
                                    <input type="text" class="form-control" name="cep" id="cep" required>
                                </div>

                                <div class="col-sm-6 m-b30">
                                    <label class="form-label required">Como ficou sabendo da empresa?</label>
                                    <select class="form-control form-select" name="opcao" id="opcao" data-live-search="true" required>
                                        <option value="">Selecione</option>
                                        <option value="Instagram">Instagram</option>
                                        <option value="Facebook">Facebook</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 30px;">
                                <div id="button-container" class="col-sm-12">
                                    <button id="btn-submit" class="btn btn-success btn-block" type="submit">Salvar</button>
                                </div>
                                <div id="edit-button-container" class="col-sm-9" >
                                    <button id="btn-submit-edit" class="btn btn-primary btn-block" type="submit">Editar</button>
                                </div>
                                <div id="delete-button-container" class="col-sm-3">
                                    <button id="btn-delete" class="btn btn-danger btn-block" type="button">Excluir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Seção de visualização -->
        <div class="row">
            <div class="col-xl-12 bst-seller mode">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h4 class="heading mb-0">Visualização</h4>
                </div>
                <div class="card h-auto">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1 dt-filter exports mode">
                            <div class="tbl-caption mode"></div>
                            <table id="customer-tbl" class="table shorting">
                                <thead>
                                    <tr>
                                        <th>Editar</th>
                                        <th>Nome</th>
                                        <th>WhatsApp</th>
                                        <th>CPF</th>
                                        <th>CEP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop através dos registros do banco de dados e exibe-os na tabela -->
                                    @foreach($cruds as $crud)
                                        <tr>
                                            <td>
                                                <div class="form-check custom-checkbox">
                                                    <input type="checkbox" class="form-check-input user-checkbox" name="customCheckBoxname" id="customCheckBox" value="{{$crud->id}}">
                                                    <label class="form-check-label" for="customCheckBox{{$crud->id}}"></label>
                                                </div>
                                            </td>
                                            <td><span>{{$crud->name}}</span></td>
                                            <td><span>{{$crud->phone}}</span></td>
                                            <td><span>{{$crud->cpf}}</span></td>
                                            <td><span>{{$crud->cep}}</span></td>
                                        </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@component("components.footer")  @endcomponent

<script>
     $(document).ready(function(){
         $('#whatsapp').mask('(00) 00000-0000');
         $('#telefone').mask('(00) 00000-0000');
         $('#cpf').mask('000.000.000-00');
       });
</script>
