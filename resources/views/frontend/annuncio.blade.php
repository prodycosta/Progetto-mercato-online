<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        body {
            background-color: rgb(255, 255, 255);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            top: 0;
            position: fixed;
            background-color: rgb(42, 10, 72);
            display: flex;
            justify-content: center;
            height: 100px;
            width: 100%;
            z-index: 1000;
        }

        ul {
            list-style: none;
            display: flex;
            align-items: flex-end;
            margin-bottom: 20px;
        }

        li {
            margin: 0 35px;
        }

        a {
            text-decoration: none;
            color: white;
            font-size: 18px;
        }

        .fa {
            font-size: 24px;
            margin-right: 15px;
        }

        nav a {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: inherit;
            cursor: pointer;
            color: aliceblue;
        }

        nav span {
            font-size: 14px;
            margin-top: 10px;
            color: aliceblue;
        }


        .container {
            margin-top: 10%;
            padding: 20px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .announcement-info {
            display: flex;
            align-items: flex-start;
        }

        .image-container {
            width: 40%;
            margin-right: 20px;
            overflow: hidden;
        }

        .announcement-image {
            width: auto;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
            margin-top: 17%;
        }

        .no-image-placeholder {
            width: 100%;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 8px;
            background-color: #f0f0f0;
            border: 2px dashed #ccc;
        }

        .no-image-placeholder p {
            color: #888;
            font-style: italic;
            color: #888;
        }

        .announcement-details {
            flex-grow: 1;
        }

        .announcement-details h2 {
            margin-top: 0;
            font-size: 35px;
            color: #333;


        }

        .details-grid {
            margin-top: 20px;
            padding: 8px;
            font-size: 23px;

        }

        .details-grid p {
            margin: 5px 0;
            color: #555;
        }

        .seller-details {
            margin-top: 20px;
        }

        .seller-details h4 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }

        .login-message {
            margin-top: 20px;
            color: #888;
        }

        .chat-section {
    text-align: center;
}

.chat-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: rgb(42, 10, 72);
    color: white;

    border-radius: 5px;
    transition: background-color 0.3s ease;

}

.chat-button:hover {
    background-color: rgb(54, 1, 106);
    text-decoration: none;
    color: white;
}
    </style>
    </style>
    <script src="{{ asset('js/annuncio.js') }}"></script>
    <title>Dettagli Annuncio</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="{{ route('index')}}"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-lightning" viewBox="0 0 16 16">
            <path d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641zM6.374 1 4.168 8.5H7.5a.5.5 0 0 1 .478.647L6.78 13.04 11.478 7H8a.5.5 0 0 1-.474-.658L9.306 1z"/>
            </svg>
            </a>
            <span class="d-block">Home</span>
        </li>
        <li><a href="{{route('search.index')}}"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
            </a>
            <span class="d-block">Cerca</span>
        </li>
        <li><a href="{{route('sell.index')}}"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
            </a>
            <span class="d-block">Vendi</span>
        </li>
        <li><a href="{{route('messages.index')}}"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
            <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
            </svg>
            </a>
            <span class="d-block">Messaggi</span>
        </li>
        <li><a href="{{ route('account.index') }}"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
            </a>
            <span class="d-block">Account</span>
        </li>
    </ul>
</nav>
<div class="container">

    <div class="announcement-info">
    <div class="image-container">
    @if ($annuncio->fotos->first())
        <div class="announcement-image">
            <img src="{{ asset($annuncio->fotos->first()->nome_file) }}" alt="Immagine annuncio">
        </div>
    @else
        <div class="no-image-placeholder">
            <p>Immagine non disponibile</p>
        </div>
    @endif
</div>
        <div class="announcement-details">
            <h2>{{ $annuncio->title }}</h2>
            <div class="details-grid">
    @if ($annuncio->position)
        <p><i class="fas fa-map-marker-alt"></i> Posizione: {{ $annuncio->position }}</p>
    @endif

    <p><i class="far fa-clock"></i> Creato il: {{ $annuncio->created_at->format('d/m/Y H:i:s') }}</p>

    @if ($annuncio->price && $annuncio->price != 0)
        <p><i class="fas fa-coins"></i> Prezzo: {{ $annuncio->price }} €</p>
    @endif

    @php
        $condition_translation = [
    'new' => 'Nuovo',
    'likeNew' => 'Come nuovo',
    'excellent' => 'Ottimo',
    'good' => 'Buono',
    'damaged' => 'Danneggiato',

];

$adType_translation = [
    'sale' => 'Vendita',
    'gift' => 'In regalo',

];
    @endphp

    @if ($annuncio->condition)
        <p><i class="fas fa-info-circle"></i> Condizione: {{ $condition_translation[$annuncio->condition] }}</p>
    @endif

    @if ($annuncio->adType)
        <p><i class="fas fa-tag"></i> Tipo di Annuncio: {{ $adType_translation[$annuncio->adType] }}</p>
    @endif

    @if ($annuncio->user->name)
        <p><i class="fas fa-user"></i> Venduto da: {{ $annuncio->user->name }}</p>
    @endif
</div>
            <div class="seller-details">
                @auth

                @else
                    <p class="login-message">Per inviare un messaggio, effettua l'accesso.</p>
                @endauth
            </div>
        </div>
    </div>

    <div class="description-section">
    <p style=" font-size: 18px; margin-top:5%"><strong>Descrizione:</strong> {{ $annuncio->description }}</p>
</div>

    @if(Auth::check())
    <div class="chat-section">
    <form id="chat-form">
        @csrf
        <a href="{{ route('chat.messaggio-form', ['receiver' => $annuncio->user->id, 'annuncio' => $annuncio->id]) }}" class="chat-button" data-identifier="{{ $annuncio->identifier }}">Contatta il venditore</a>
    </form>
</div>
    @endif
</div>

<script>


var chatForm = document.getElementById('chat-form');


var chatIdentifier = chatForm.querySelector('a').getAttribute('data-identifier');




</script>

</body>
</html>




