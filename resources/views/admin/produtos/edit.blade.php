@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Atualização de Marca</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Painel</a></div>
                <div class="breadcrumb-item"><a href="{{ route('marcas.index') }}">Listar</a></div>
                <div class="breadcrumb-item active">Atualizar Marca {{ $marca->name }}</div>
            </div>
        </div>

        <div class="section-body">
            @include('components.alert')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Atualizar Marca {{ $marca->name }}</h4>
                            <div class="card-header-action">
                                <a href="#" class="btn btn-primary"> Ajuda?</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('marcas.update', $marca->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="">Logo atual</label>
                                        <br>
                                        <img src="{{ asset($marca->logo) }}" alt="{{ $marca->name }}" style="width:150px; height:auto">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="">Logo (600x360 px)</label>
                                        <input type="file" name="logo" id="image" class="form-control" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="">Nome</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $marca->name) }}">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="">Status</label>
                                        <select name="destacada" class="form-control">
                                            <option value="1" {{$marca->destacada == 1 ? 'selected': null  }}>Sim</option>
                                            <option value="0" {{$marca->destacada == 0 ? 'selected': null  }}>Não</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{$marca->status == 1 ? 'selected': null  }}>Ativo</option>
                                            <option value="0" {{$marca->status == 0 ? 'selected': null  }}>Inativo</option>
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
