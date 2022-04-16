@extends('main')
@section('title')
    Sorties
@endsection


@section('contents')
    <div class="row">

        <div class="col-md-12">
            <div class="widget">
                <div class="widget-header">
                    <h2 class="text-center"><strong>Entres</strong></h2>

                    <div class="additional-btn">
                        <a href="{{ route('get_add_entres') }}"><button
                                class="btn btn-success pull-right">Ajouter</button></a>
                    </div>
                </div>

                <form class="form-row" method="POST" action="{{ route('commande.store') }}">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Name</label>
                        <input type="text" name="nom[]" class="form-control" id="inputEmail4" placeholder="Entrez Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Adresse</label>
                        <input type="text" name="adresse[]" class="form-control" id="inputPassword4"
                            placeholder="Entrez adresse">
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" name="email[]" class="form-control" id="inputEmail4"
                                placeholder="Entrez Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Telephone</label>
                            <input type="text" name="telephone[]" class="form-control" id="inputPassword4"
                                placeholder="Entrez Telephone ">
                        </div>
                    </div>



                    <div class="widget-content">
                        <br>
                        <div class="table-responsive">

                            <div>
                            </div>
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
                                        <th>Options</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($types as $type)
                                        <tr id="article{{ $type->id }}">
                                            <td>{{ $type->id }}</td>
                                            <td>{{ $type->name }}</td>
                                            <td>{{ date('d/m/Y', strtotime($type->created_at)) }}</td>
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

                                    @foreach ($entres as $entre)
                                        <tr id="article{{ $entre->id }}">
                                            <td>{{ $entre->id }}</td>
                                            <td>{{ $entre->type->name }}</td>
                                            <td>{{ date('d/m/Y', strtotime($entre->date)) }}</td>
                                            <td>{{ $entre->quantite }}</td>
                                            <td>{{ $entre->prix_uni }}</td>
                                            <td><a
                                                    href="{{ route('single.client', $entre->id) }}">{{ $entre->fourni }}</a>
                                            </td>
                                            <td>{!! $entre->solde = $entre->quantite * $entre->prix_uni !!}</td>
                                            <td>
                                                <div class="btn-group btn-group-xs">

                                                    <span
                                                        onclick="select3({{ $entre->id }}, '{{ $entre->type->name }}', {{ $entre->quantite }}, {{ $entre->prix_uni }},  {{ $entre->prix_uni }})"
                                                        class="btn btn-info"><i class="fa fa-cart"></i>Ajouter
                                                    </span>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                        <fieldset>

                            <div class="table-responsive">
                                <form class='form-horizontal' method="POST" action="{{ route('commande.store') }}"
                                    role='form' id="addNewDataForm">
                                    {{ csrf_field() }}
                                    <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
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

                                        <div id style="float&#58;right">TOTAL: <span id="grt">{{ $prixTotalCom }}</span>
                                            FCFA
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
                </form>
                </fieldset>
            </div>
        </div>
    </div>
    </div>
    <!-- <td id="factur">${facture}</td> <input type="hidden" value="${type}" name="nom[]"> -->
    <!-- <td  id="qt">${qte} </td> -->

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
        $('#active-entres-table').addClass('active');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <script>
        var panier = [];

        function select3(id, type, qte, pu, solde) {
            panier.push({
                id: id,
                type: type,
                pu: pu,
                solde: solde,
            });
            var tr = `<tr id="ligne${id}" style="cursor: pointer">
                @csrf

                                                         <td id="types"> ${type} </td><input type="hidden" value="${type}" name="article[]">


                                                         <td> <input type="number"  id="qte${id}" onchange="calcule(${id})"  palceholder="Entrez Quantité" value="1" name="quantite[]" ></td>

                                                         <td id="pu${id}">${pu}</td><input type="hidden" value="${pu}" name="price[]">

                                                         <td class="solde" id="solde${id}">${solde}</td><input type="hidden" value="${solde}" name="solde[]">
                                                          
                                                          <td ><div id="demoDialog" title="My Dialog Box" data-closable>
 
  <button   class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&times;</span>
  </button>
</div></td>

                                                          
                                    </tr>`;
            $('#panier').append(tr);
            $('#article' + id).hide();
        }


        function calcule(id) {

            var quantite = $('#qte' + id + '').val();
            var pu = parseInt($('#pu' + id + '').text());
            if (quantite < 1) {
                quantite = 1;
                $('#qte' + id + '').val(1);
            }
            $('#solde' + id).text(quantite * pu);

            total();
        }


        function total() {

            var T = 0;

            $('.solde').each(function() {

                var sld = parseInt($(this).text());
                T += sld;


                $('#grt').text(T);

            });
        }

        $(document).ready(function() {
            $("#demoDialog").dialog();
        });
    </script>
@endsection
