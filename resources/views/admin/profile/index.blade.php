@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Meus dados</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard.admin') }}">Painel</a></div>
                <div class="breadcrumb-item">Perfil</div>
            </div>
        </div>
        <div class="section-body">
            @include('components.alert')
            <div class="row mt-sm-4">
                {{-- Bloco 1 --}}
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        {{-- Sem o atributo enctype="multipart/form-data" não enviao arquivos --}}
                        <form action="{{ route('profile.admin.update') }}" method="post" class="needs-validation"
                            novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Atualizar perfil</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group  col-12">
                                        <div class="mb-3">
                                            @if (Auth::user()->image == null)
                                                <img src="{{ asset('uploads/imageProfile/padrao.png') }}" alt="{{ Auth::user()->name }}" class="img-fluid" style="width:  80px; height:auto; object-fit:cover; border-radius:50%">
                                            @else
                                                <img src="{{Auth::user()->image}}" alt="{{ Auth::user()->name }}" class="img-fluid" style="width:  80px; height:auto; object-fit:cover; border-radius:50%">
                                            @endif
                                        </div>
                                        <label>Imagem de Perfil</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ Auth::user()->name }}" required="">
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ Auth::user()->email }}" required="">
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Bloco 2 --}}
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        {{-- Sem o atributo enctype="multipart/form-data" não enviao arquivos --}}
                        <form action="{{ route('profile.admin.password.update') }}" method="post" class="needs-validation"
                            novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Atualizar Senha </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="form-group col-12">
                                        <label>Senha atual</label>
                                        <input type="password" class="form-control" name="current_password" required="">
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label>Nova Senha</label>
                                        <input type="password" class="form-control" name="password" required="">
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label>Confirme a senha</label>
                                        <input type="password" class="form-control" name="password_confirmation" required="">
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
