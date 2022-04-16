@extends('main')

@push('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush
@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

          @if(session()->has('message'))
            <p class="btn btn-success btn-block btn-sm custom_message text-left">{{ session()->get('message') }}</p>
          @endif

          <legend style="color: green; font-weight: bold;">ENREGISTREMENT DES DEPENSES
           <a href="{{ route('recette.view') }}" style="float: right; display: block;color: white; background-color: green; padding: 1px 5px 1px 5px; text-decoration: none; border-radius: 5px; font-size: 17px;"> DEPENSES LIST</a>
          </legend>

          <form action="{{ route('recette.create') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" name="nom" value="{{ old('nom') }}" placeholder="Enter name">
              <font style="color:red"> {{ $errors->has('nom') ?  $errors->first('nom') : '' }} </font>
            </div>

            <div class="form-group">
              <label for="">Montant</label>
              <input type="number" class="form-control" name="montant" value="{{ old('montant') }}" placeholder="Enter montant">
              <font style="color:red"> {{ $errors->has('montant') ?  $errors->first('montant') : '' }} </font>
            </div>

            <div class="form-group">
                <label for="">Motif De</label>
                <input type="text" class="form-control" name="motif_depense" value="{{ old('motif_depense') }}" placeholder="Enter motif">
                <font style="color:red"> {{ $errors->has('motif_depense') ?  $errors->first('motif_depense') : '' }} </font>
              </div>
            
            <div class="form-group" style="margin-top: 24px;">
              <input type="submit" class="btn btn-primary" value="Submit">
            </div>

          </form>
        </div>
    </div>
</div>
@endsection