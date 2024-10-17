@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Cadastro de Slide</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Painel</a></div>
                <div class="breadcrumb-item"><a href="{{ route('vendedor-perfil.index') }}">Listar</a></div>
                <div class="breadcrumb-item active">Perfil do Vendedor</div>
            </div>
        </div>

        <div class="section-body">
            @include('components.alert')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Perfil do Vendedor</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-primary"> Ajuda?</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('vendedor-perfil.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="image">Imagem(1920x500px)</label>
                                    <input type="file" name="banner" id="image" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Fone/Whatsapp</label>
                                    <input type="text" name="fone" class="form-control"
                                        value="{{ old('fone') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">E-mail</label>
                                    <input type="text" name="email" class="form-control"
                                        value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Facebook</label>
                                    <input type="url" name="facebook_link" class="form-control" value="{{ old('facebook_link') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Instagram</label>
                                    <input type="url" name="instagram_link" class="form-control" value="{{ old('instagram_link') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">You Tube</label>
                                    <input type="url" name="youtube_link" class="form-control" value="{{ old('youtube_link') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">X</label>
                                    <input type="url" name="x_link" class="form-control" value="{{ old('x_link') }}" required>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="">Descrição</label>
                                        <textarea type="text" name="descricao" class="summernote"></textarea>
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
