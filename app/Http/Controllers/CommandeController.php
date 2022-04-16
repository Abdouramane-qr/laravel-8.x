<?php

namespace App\Http\Controllers;

use App\Commande;
use App\type;
use Illuminate\Http\Request;
use PDF;

class CommandeController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'article' => 'required',
            'nom' => 'required',
            'quantite' => 'required',
            'price' => 'required',
            'solde' => 'required',
            'adresse' => 'required',
             'email' => 'required',
             'telephone' => 'required',
        ]);

        for ($i = 0; $i < count($request->solde); ++$i) {
            'App\Commande'::create(
                [
                'nom' => $request->nom[$i],
                'article' => $request->article[$i],
                'quantite' => $request->quantite[$i],
                'price' => $request->price[$i],
                'solde' => $request->quantite[$i] * $request->price[$i],
                'adresse' => $request->adresse[$i],
                'email' => $request->email[$i],
                'telephone' => $request->telephone[$i],
                ]
            );
        }
        // dd('on reprend');
        // 'App\Models\Commande'::create($request->all());

        return back()->with('success', 'Les données ont été enregistrées avec succès.');
    }

    public function generatePDF(Request $request)
    {
        $commandes = Commande::all();
        // $command = Commande::find();
        $types = type::all();
        $prixTotalCom = 0;
        // foreach ($commandes as $commands) {
        //     $prixTotalCom += $commands->total();
        // }
        view()->share('commandes', $commandes);
        view()->share('prixTotalCom', $prixTotalCom);
        view()->share('types', $types);
        // view()->share('command', $command);

        $pdf = PDF::loadView('generate-pdf', [
            'prixTotalCom' => $prixTotalCom,
            'commandes' => $commandes,
            'types' => $types,
        ]);

        return $pdf->download('commande.pdf');
    }

    public function download()
    {
        $commandes = Commande::all();
        $types = type::all();

        $prixTotalCom = 0;
        foreach ($commandes as $commands) {
            $prixTotalCom += $commands->total();
        }

        $pdf = app('dompdf.wrapper');

        $pdf->loadView('generate-pdf', [
            'prixTotalCom' => $prixTotalCom,
            'commandes' => $commandes,
            'types' => $types,
        ])->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->stream();
    }
}
