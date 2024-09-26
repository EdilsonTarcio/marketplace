@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Cadastro de Subcategoria</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Painel</a></div>
                <div class="breadcrumb-item"><a href="{{ route('subcategoria.index') }}">Listar</a></div>
                <div class="breadcrumb-item active">Cadastrar Slide</div>
            </div>
        </div>

        <div class="section-body">
            @include('components.alert')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Criar Subcategoria</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-primary"> Ajuda?</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('subcategoria.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Selecione o Icone</label>
                                    <div>
                                        <button
                                        style="text-align: left; width:100%; padding:15px; text-align: center"
                                        class="btn btn-primary"
                                        data-selected-class="btn-danger"
                                        data-selected-class="btn-primary"
                                        data-iconset="fontawesome5"
                                        data-icon="fas fa-award"
                                        role="iconpicker"
                                        data-rows="5"
                                        data-cols="7"
                                        name="icon"
                                        ></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="">Titulo</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('titulo') }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
