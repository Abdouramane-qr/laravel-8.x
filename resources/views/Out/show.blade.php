@extends('main')
@section('title')
    Sorties
@endsection


@section('contents')
    <div class="row">

        <div class="col-md-12">
            <div class="widget">
                <div class="widget-header">
                    <h2><strong>Default</strong> DataTable</h2>
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Adresse</label>
                                <input type="text" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Tele</label>
                                <input type="text" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>
                    </form>

                    <div class="additional-btn">
                        <a href="{{ route('get_add_sorties') }}"><button
                                class="btn btn-success pull-right">Ajouter</button></a>
                    </div>
                </div>
                <div class="widget-content">
                    <br>
                    <div class="table-responsive">
                        <form class='form-horizontal' role='form'>
                            <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Article</th>
                                        <th>Date</th>
                                        <th>Quantite</th>
                                        <th>Prix Unitaire</th>
                                        <th>solde</th>
                                        <th>Options</th>>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($types as $type)
                                        <tr id="article{{ $type->id }}">
                                            <td>{{ $type->id }}</td>
                                            <td>{{ $type->name }}</td>
                                            <td>{{ date('d/m/Y', strtotime($type->created_at)) }}</td>
                                            {{-- <!-- <td>{{ $type->nfacture }}</td> --> --}}
                                            <td>{{ $type->Current_stock }}</td>
                                            <td>{{ $type->price }}</td>
                                            <td><a href="{{ route('single.client', $type->id) }}">{{ $type->name }}</a>
                                            </td>
                                            <td>{!! $type->solde = $type->Current_stock * $type->price !!}</td>
                                            <td>
                                                <div class="btn-group btn-group-xs">

                                                    <span
                                                        onclick="select3({{ $type->id }}, '{{ $type->name }}', {{ $type->Current_stock }}, {{ $type->price }}, '{{ $type->name }}', {{ $type->price }})"
                                                        class="btn btn-info"><i class="fa fa-cart"></i>Ajouter
                                                    </span>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach


                                    @foreach ($sorties as $sortie)
                                        <tr>

                                            <td>{{ $sortie->type->name }}</td>
                                            <td>{{ date('d/m/Y', strtotime($sortie->date)) }}</td>
                                            <td>{{ $sortie->nfacture }}</td>
                                            <td>{{ $sortie->quantite }}</td>
                                            <td>{{ $sortie->prix_uni }}</td>
                                            <td>{{ $sortie->fourni }}</td>
                                            <td>{!! $sortie->solde = $sortie->quantite * $sortie->prix_uni !!}</td>
                                            <td>
                                            <td></td>
                                            <div class="btn-group btn-group-xs">
                                                <a href="{{ route('get_edit_sorties', $sortie->id) }}"
                                                    class="btn btn-default"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('destroy.sorties', $sortie->id) }}"
                                                    class="btn btn-default"><i class="fa fa-trash"></i></a>

                                            </div>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </form>


                        <div class="table-responsive">
                            <form class='form-horizontal' method="POST" action="{{ route('commande.store') }}"
                                role='form' id="addNewDataForm">
                                {{ csrf_field() }}
                                <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>Nom Client</th>
                                            <th>Article</th>
                                            <th>Quantite</th>
                                            <th>Prix Unitaire</th>
                                            <th>solde</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>


                                    <tbody id="panier">



                                    </tbody>
                                </table>
                                <h3>
                                    <div style="float&#58;left">Vendeur</div>

                                    <div id style="float&#58;right">TOTAL: <span id="grt">{{ $prixTotalCom }}</span> FCFA
                                    </div>
                                </h3>
                                <blockquote>
                                    <div>
                                        <li class="btn align-center">
                                            <button id="action" class="btn btn-success" type="submit">Valider</button>
                                            <a href="{{ route('generate-pdf') }}" class="btn btn-success"
                                                type="button">telecharger</a>
                                        </li>
                                    </div>
                                </blockquote>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- Page Specific JS Libraries -->
    <script src="{{ URL::to('assets/libs/jquery-datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/jquery-datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ URL::to('assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}">
    </script>
    <script src="{{ URL::to('assets/js/pages/datatables.js') }}"></script>
    <script>
        $('#active-sorties-table').addClass('active');
    </script>
@endsection
