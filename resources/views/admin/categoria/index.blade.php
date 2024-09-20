@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Categorias</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Painel</a></div>
                <div class="breadcrumb-item active">Categoria</div>
            </div>
        </div>

        <div class="section-body">
            @include('components.alert')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Categorias do Site</h4>
                            <div class="card-header-action">
                                <a href="{{ route('categoria.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Novo</a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
