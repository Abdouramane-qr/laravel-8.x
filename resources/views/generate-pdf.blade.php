
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bon de commande Client</title>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

h2 {
  text-align: center;
}

#ou{
  text-align: center;
  padding-right: 10%;
}

#dat{
  text-align: right;
  padding-left:5%;
 white-space: pre;
}

span {
  text-align: right;
  padding-left:5%;
 white-space: pre;
}

#nom {
  text-align: right;
  padding-left:15%;
 white-space: pre;

}

#add {
  text-align: right;
  padding-left:30%;
 white-space: pre;
  
}

 p  {
  text-align: center;
  
}

footer{
  text-align: center;
  padding-bottom: 20%;
  padding-top: 30%;
}


 





</style>
</head>
<body>
<h1 style="text-align: center">BON DE COMMANDE</h1>
  <p><div style="float&#58;start"> <h1>Ets Pengd-wendé</div> </p>

  <div>
    <span id="ou" style="float&#58;right"> <h3>Ouaga le:..................</h3> </span>
    <span id="dat" style="float&#58;right"> <h3>Date:{{ date('d/m/Y') }}</h3> </span>
</div>

<p>

</p>
<br>
<div>
  <h3>COMMERCE GENERALE</h3>
  <h4>01 BP 602 Ouagadougou 01 <br>Tél:25 30 83 73 BURKINA FASO</h4>
</div>

<div>
   <h3>
     <div  style="float&#58;left" >BON DE COMMADE N°:...........................................</div>
     <div  style="float&#58;right" >CAISSE N°:.................</div>
   </h3>
</div>


<div>
<h4>  <div style="float&#58;left" >Nom du client:...............................</div> 
  <div style="float&#58;right" >Adresse:......................................................................</div>
</h4>
</div> 
  

  

<table id="customers">

  <tr>
    <th scope="col">REF</th>
    <th scope="col">DESIGNATION</th>
    <th scope="col">QUANTITE</th>
    <th scope="col">PRIX UNITAIRE</th>
    <th scope="col">PIX TOTAL</th>
    <th scope="col" style="color: green">DATE</th>
    
  </tr>
  
  
  
  </tr>@foreach ($commandes as $commande)
           <tr style="cursor: pointer">
                <th scope="row">{{$commande->id}}</th>
                <td><a >{{$commande->article}}</a></td>
                <td><a >{{$commande->quantite}}</a></td>
                <td><a >{{$commande->price}}</a></td>
                <td><a href="{{route('commande.show',['id'=>$commande->id])}}"></a></td>
                
                <td style="color: green">{{$commande->created_at}}</td>
              </tr>
            @endforeach
</table>

 
 <h3>
  <div style="float&#58;left">Vendeur</div> 
  <div style="float&#58;right">TOTAL: {{$prixTotalCom}} FCFA</div>
  
 </h3>

 <footer >
  <strong>Copyright &copy; 2021 <a href="kassbth.net">QUOREICH-FONDATION</a>.</strong>
  tout droit réservé

</footer>
</body>

  



</html>






