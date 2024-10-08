@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Cadastro de Segmento Categoria</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Painel</a></div>
                <div class="breadcrumb-item"><a href="{{ route('categoria-segmento.index') }}">Listar</a></div>
                <div class="breadcrumb-item active">Cadastrar Segmento Categoria</div>
            </div>
        </div>

        <div class="section-body">
            @include('components.alert')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Criar Segmento de Categoria</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-primary"> Ajuda?</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('categoria-segmento.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Categoria</label>
                                    <select name="id_categoria" class="form-control categoria-form">
                                        <option>Selecione</option>
                                        @foreach ($categorias as $categoria )
                                            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Subcategoria</label>
                                    <select name="id_subcategoria" class="form-control subcategoria-form">
                                        <option value="">Selecione</option>
                                    </select>
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('change', '.categoria-form', function(){
                //recupera o id da categoria
                let id_categoria_master = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('get-subcategorias') }}",
                    data: {
                        id_categoria_master: id_categoria_master
                    },
                    success: function(data) {
                        $('.subcategoria-form').html('<option value="">Selecione</option>');
                        $.each(data, function(i, item){
                            $('.subcategoria-form').append(`<option value="${item.id}">${item.name}</option>`);
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }

                })
            })
        });
    </script>
@endpush
