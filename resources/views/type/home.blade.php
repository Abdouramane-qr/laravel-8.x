@extends('main')

@section('title')
    Types
@endsection
@section('contents')
    <div class="row">

        <div class="col-md-6">
            <div class="widget">
                <div class="widget-header transparent">


                </div>
                <div class="widget-content">
                    <div class="table-responsive">
                        <table data-sortable class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th scope="col">Prix unitaire </th>
                                    <th>Stock Minimal</th>
                                    <th>Stock actuel</th>
                                    <th>Crée à</th>
                                    <th>modifié à</th>
                                </tr>
                            </thead>

                            <tbody>
                                
                                @foreach ($types as $type)
                                    <tr>
                                        {{-- donnée id --}}
                                        <td>
                                            {{ $type->id }}
                                        </td>

                                        {{-- Donnée Nom --}}
                                        <td>
                                            <a href="{{ route('single.type', $type->id) }}">{{ $type->name }}</a>
                                        </td>
                                        {{-- donnée du prix --}}

                                        <td>
                                            <a href="{{ route('single.type', $type->id) }}">{{ $type->price }}</a>
                                        </td>
                                        {{-- donnée du StockMini --}}

                                        <td>
                                            <a href="{{ route('single.type', $type->id) }}">{{ $type->stockMin }}</a>
                                        </td>
                                        {{-- donnée du Stock_actuel --}}
                                        <td>
                                            <a
                                                href="{{ route('single.type', $type->id) }}">{{ $type->Current_stock }}</a>
                                        </td>


                                        <td>
                                            {{ date('d/m/Y H:i', strtotime($type->created_at)) }}
                                        </td>

                                        <td>
                                            {{ date('d/m/Y H:i', strtotime($type->updated_at)) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="widget clearfix">
                <div class="widget-header transparent clearfix">
                    <h2 class="text-center"><strong>Ajouter</strong> Types</h2>

                </div>
                <div class="widget-content padding clearfix">
                    <div id="basic-form">
                        <form action="{{ route('post.types') }}" method="POST" role="form">
                            <div class="col-md-8 col-md-offset-2">

                                {{-- Input du nom --}}
                                <strong><span>Nom</span></strong>
                                <div class="form-group @if ($errors->has('name')) has-error @endif">
                                <strong><input type="text" class="form-control" name="name" placeholder=" nom du produit"></strong>                                </div>

                                {{-- input du prix --}}
                                <strong><span>Prix</span></strong>
                                <div class="form-group @if ($errors->has('price')) has-error @endif">
                                <strong><input type="number" class="form-control" placeholder="Entrez le prix" name="price"></strong>                                </div>

                                {{-- Input du stock minimal --}}
                                <strong><span>Stock Minimal</span></strong>
                                <div class="form-group @if ($errors->has('stockMin')) has-error @endif">
                                <strong><input type="number" class="form-control" placeholder="Stock Minimal" name="stockMin"></strong>                                </div>

                                {{-- Input du stock actuel --}}
                                <strong><span>Stock Actuel</span></strong>
                                <div class="form-group @if ($errors->has('Current_stock')) has-error @endif">
                                <strong><input type="number" class="form-control" placeholder="Stock Actuel" name="Current_stock"></strong>                                </div>

                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success pull-left">Enregistrer</button>
                        </form>
                    </div>
                </div>




            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#active-type').addClass('active');

    </script>
@endsection
