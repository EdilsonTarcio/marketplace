@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Segmento de Categoria</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('dashboard.admin') }}">Painel</a></div>
                <div class="breadcrumb-item active">Segmento de Categoria</div>
            </div>
        </div>

        <div class="section-body">
            @include('components.alert')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Segmento de Categoria do Site</h4>
                            <div class="card-header-action">
                                <a href="{{ route('categoria-segmento.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Novo</a>
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
<script>
    $(document).ready(function(){
        $('body').on('click', '.atualiza-status', function(){
            let checando = $(this).is(':checked');
            let id = $(this).data('id');

            $.ajax({
                url: "{{ route('atualiza.status.categoria-segmento') }}",
                method: 'PUT',
                data: {
                    status: checando,
                    id: id
                },
                success: function(data){

                },
                error: function(xhr, status, error){
                    console.log(error);
                }
            });
        });
    });
</script>
@endpush
