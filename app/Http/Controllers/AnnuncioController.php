<?php

namespace App\Http\Controllers;

use App\Models\Annuncio;
use App\Models\Foto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AnnuncioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'adType' => 'required|in:sale,gift',
            'description' => 'required',
            'condition' => 'required|in:new,likeNew,excellent,good,damaged',
            'price' => 'nullable|numeric',
            'position' => 'nullable|string',
            'user_id' => 'required',
        ]);
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('/sell')
                ->withErrors($validator)
                ->withInput();
        }

        $imagesPaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');

                $foto = Foto::create([
                    'nome_file' => $path,
                    'descrizione' => 'Descrizione opzionale',
                ]);

                $imagesPaths[] = $foto->id;
            }
        }


        $user_id = auth()->check() ? auth()->id() : null;
        $price = $request->has('price') && $request->input('price') !== '' ? $request->input('price') : null;
        $annuncio = Annuncio::create([
            'title' => $request->input('title'),
            'images' => json_encode($imagesPaths),
            'adType' => $request->input('adType'),
            'description' => $request->input('description'),
            'condition' => $request->input('condition'),
            'price' => $price,
            'position' => $request->input('position'),
            'user_id' => $user_id,
        ]);

        $annuncio->fotos()->attach($imagesPaths);

        return view('frontend.sell');
    }

    public function index()
    {
        $annunci = Annuncio::all();
        return view('frontend.index', compact('annunci'));
    }

    public function showPhoto($id)
    {
        $foto = Foto::find($id);

        if (!$foto) {
            return redirect()->back()->with('error', 'Foto non trovata.');
        }



        $annunci = Annuncio::all();

        return view('frontend.search', compact('annunci'));
    }

    public function showAnnuncio(Annuncio $annuncio)
    {
        $annuncio->load('user');
        return view('annunci.show', compact('annuncio'));
    }
    public function show($id)
    {
        $annuncio = Annuncio::findOrFail($id);
        $user = auth()->user();

        return view('annunci.show', compact('annuncio', 'user'));
    }



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function destroy($id)
    {
        $annuncio = Annuncio::findOrFail($id);


        if (auth()->user()->id != $annuncio->user_id) {
            abort(403, 'Accesso negato');
        }


        $annuncio->delete();



        return response()->json(['message' => 'Annuncio eliminato con successo']);
    }


    public function edit($id)
    {

        if (!auth()->check()) {
            abort(403, 'Accesso negato');
        }


        $annuncio = Annuncio::find($id);


        if (!$annuncio) {
            abort(404);
        }


        if (auth()->user()->id != $annuncio->user_id) {
            abort(403, 'Accesso negato');
        }


        return view('annunci.edit', compact('annuncio'));
    }

    public function update(Request $request, Annuncio $annuncio)
    {

        if (auth()->user()->id != $annuncio->user_id) {
            abort(403, 'Accesso negato');
        }


        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);


        $annuncio->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('account.index', ['annuncio' => $annuncio])->with('success', 'Annuncio modificato con successo');
    }

    public function showMessaggioForm($receiverId, Annuncio $annuncio)
    {
        $user = Auth::user();
        $receiver = User::find($receiverId);


        if (!$receiver || $user->id != $receiver->id) {
            abort(403, 'Accesso negato');
        }

        // Verifica se l'annuncio esiste
        $annuncio = Annuncio::findOrFail($annuncio->id);

        return view('chat.messaggio', compact('receiver', 'annuncio'));
    }
}




