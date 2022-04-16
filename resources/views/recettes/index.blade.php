@extends('main')
@push('style')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush
@section('contents')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session()->has('message'))
                    <p class="btn btn-success btn-block btn-sm custom_message text-left">{{ session()->get('message') }}
                    </p>
                @endif

                <legend style="color: green; font-weight: bold;">LISTE DES DEPENSES
                    <a href="{{ route('recette.create') }}"
                        style="float: right; display: block;color: white; background-color: green; padding: 1px 5px 1px 5px; text-decoration: none; border-radius: 5px; font-size: 17px;">
                        AJOUT DEPENSES</a>
                </legend>

                <table id="example1" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Montant</th>
                            <th class="text-center">Motif depense</th>
                            <th class="text-center">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recettes as $recette)
                            <tr class="text-center">
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td class="text-center">{{ $recette->nom }}</td>
                                <td class="text-center">{{ $recette->montant }}</td>
                                <td class="text-center">{{ $recette->motif_depense }}</td>
                                <td class="text-center">
                                    <a href="{{ route('recette.edit', $recette->id) }}"
                                        class="btn btn-sm btn-info py-0">Edit</a>
                                    <a class="btn btn-sm btn-success py-0">View</a>
                                    <a href=""
                                        onclick="if(confirm('Do you want to delete this recette?'))event.preventDefault(); document.getElementById('delete-{{ $recette->slug }}').submit();"
                                        class="btn btn-sm btn-danger py-0">Delete</a>
                                    <form id="delete-{{ $recette->slug }}" method="post"
                                        action="{{ route('recette.delete', $recette->id) }}" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <p> No product found!</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
