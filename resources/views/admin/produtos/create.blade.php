@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Cadastro de Produtos</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Painel</a></div>
                <div class="breadcrumb-item"><a href="{{ route('produtos.index') }}">Listar</a></div>
                <div class="breadcrumb-item active">Cadastrar Produto</div>
            </div>
        </div>

        <div class="section-body">
            @include('components.alert')
            <div class="row">
                <form action="{{ route('produtos.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Informações do Produto</h4>
                                <div class="card-header-action">
                                    <a href="#" class="btn btn-primary"> Ajuda?</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12 col-md-6 col-lg-12">
                                        <label>Capa (600x360 px)</label>
                                        <input type="file" name="imagemCapa" id="image" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-group col-6 col-md-6 col-lg-6">
                                        <label>Nome</label>
                                        <input type="text" name="nome" class="form-control"
                                            value="{{ old('nome') }}" required>
                                    </div>
                                    <div class="form-group col-2">
                                        <label>Sku</label>
                                        <input type="text" name="sku" class="form-control"
                                            style="text-transform: uppercase;" value="{{ old('sku') }}">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Marca</label>
                                        <select name="marca" class="form-control segmento-form-marca select2" required>
                                            <option disabled selected>Selecione</option>
                                            @foreach ($data['marcas'] as $marca)
                                                <option value="{{ $marca->id }}"> {{ $marca->id }} -
                                                    {{ $marca->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-1">
                                        <label>Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="custom-switch mt-2">
                                            <input type="checkbox" name="exibir-switch-checkbox" id="exibir-switch" class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Personalizar périodo de exibição do produto</span>
                                        </label>
                                    </div>
                                    <div class="form-group col-2">
                                        <label>Inicio ativação:</label>
                                        <input type="text" name="ativacaoInicio" disabled
                                            class="form-control datetimepicker" value="{{ old('ativacaoInicio') }}">
                                    </div>
                                    <div class="form-group col-2">
                                        <label>Final ativação:</label>
                                        <input type="text" class="form-control datetimepicker" disabled
                                            name="ativacaoFinal" value="{{ old('ativacaoInicio') }}">
                                    </div>
                                    <div class="form-group col-2">
                                        <label>Cor</label>
                                        <input type="text" name="cor" class="form-control"
                                            style="text-transform: uppercase;" value="{{ old('cor') }}">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Codigo Barras</label>
                                        <input type="text" name="codigo_barra" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" value="{{ old('codigo_barra') }}">

                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label for="">Descrição Curta</label>
                                        <textarea type="text" name="descricaoCurta" class="summernote"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label for="">Descrição Longa</label>
                                        <textarea type="text" name="descricaoLonga" class="summernote"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Associar a categorias</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-3">
                                        <label>Categoria</label>
                                        <select class="form-control categoria-form select2" required>
                                            <option value="" disabled selected>Selecione</option>
                                            @foreach ($data['categorias'] as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->id }} -
                                                    {{ $categoria->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Subcategoria</label>
                                        <select class="form-control subcategoria-form select2"
                                            required>
                                            <option disabled selected>Selecione</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Segmento</label>
                                        <select class="form-control segmento-form select2" required>
                                            <option disabled selected>Selecione</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-3" style="text-align: center">
                                        <label>Adicionar categoria ao produto</label><br>
                                        <button type="button" id="adicionar-categoria" class="btn btn-primary"><i class='ion-plus-circled'></i></button>
                                    </div>
                                    <div class="col-12">
                                        <table class="table" style="display: none" id="table-adicao-categoria-produto">
                                            <thead>
                                              <tr>
                                                <th scope="col">Categoria</th>
                                                <th scope="col">Subcategoria</th>
                                                <th scope="col">Segmento</th>
                                                <th scope="col">Apagar</th>
                                              </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                          </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Multimídia</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label>Link Video</label>
                                        <input type="url" name="video" class="form-control" value="{{ old('cor') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-lg btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        //Selected subcategoria pela categoria
        $(document).ready(function() {
            $('body').on('change', '.categoria-form', function() {
                //recupera o id da categoria
                $('.segmento-form').html('<option value="">Selecione</option>');
                let id_categoria_master = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('get-subcategorias') }}",
                    data: {
                        id_categoria_master: id_categoria_master
                    },
                    success: function(data) {
                        $('.subcategoria-form').html('<option value="">Selecione</option>');
                        $.each(data, function(i, item) {
                            $('.subcategoria-form').append(
                                `<option value="${item.id}">${item.id} - ${item.name}</option>`
                            );
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
            //Selected segmento pela subcategoria
            $('body').on('change', '.subcategoria-form', function() {
                //recupera o id da categoria
                let id_sub_categoria = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('get-segmento') }}",
                    data: {
                        id_sub_categoria: id_sub_categoria
                    },
                    success: function(data) {
                        $('.segmento-form').html('<option value="">Selecione</option>');
                        $.each(data, function(i, itemSub) {
                            $('.segmento-form').append(
                                `<option value="${itemSub.id}">${itemSub.id} - ${itemSub.name}</option>`
                            );
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        });
        $(document).ready(function() {
            $('body').on('change', '#exibir-switch', function() {
                if ($(this).is(':checked')) {
                    $('.datetimepicker').prop('disabled', false);
                } else {
                    $('.datetimepicker').prop('disabled', true);
                }
            })
        })
    </script>
    <script
        src="{{ asset('backend/assets/js/page/cadastro-produto/adicao-categoria.js') }}">
    </script>
@endpush
