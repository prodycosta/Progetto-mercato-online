<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/account.css">
    <script src="{{ asset('js/account.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>La Tua Piattaforma di Annunci</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/1f4c0029b5.js" crossorigin="anonymous"></script>


</head>
<body>

<nav>
    <ul>
        <li>
            <a href="{{ route('index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-lightning" viewBox="0 0 16 16">
                    <path d="M5.52.359A.5.5 0 0 1 6 0h4a.5.5 0 0 1 .474.658L8.694 6H12.5a.5.5 0 0 1 .395.807l-7 9a.5.5 0 0 1-.873-.454L6.823 9.5H3.5a.5.5 0 0 1-.48-.641zM6.374 1 4.168 8.5H7.5a.5.5 0 0 1 .478.647L6.78 13.04 11.478 7H8a.5.5 0 0 1-.474-.658L9.306 1z"/>
                </svg>
            </a>
            <span class="d-block">Home</span>
        </li>
        <li>
            <a href="{{route('search.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
            </a>
            <span class="d-block">Cerca</span>
        </li>
        <li>
            <a href="{{route('sell.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                </svg>
            </a>
            <span class="d-block">Vendi</span>
        </li>
        <li>
            <a href="{{route('messages.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                </svg>
            </a>
            <span class="d-block">Messaggi</span>
        </li>
        <li>
            <a href="{{ route('account.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
            </a>
            <span class="d-block">Account</span>
        </li>
    </ul>
</nav>
<body class="@guest not-authenticated @endguest">
<div id="loginSection">
    @guest
    <h3>Accedi a Storm</h3>
    <h5>Compra e vendi in una community con milioni di utenti</h5>
    <p>Per accedere alle funzioni personalizzate, effettua il login o registrati.</p>
    <div class="button-container">
        <a href="{{ route('login') }}"><button>Accedi</button></a>
        <a href="{{ route('register') }}"><button>Registrati</button></a>
    </div>

    @else
        <div id="userSection">
            <button id="dropdownBtn">Menu</button>
            <div class="dropdown-content" id="dropdownContent">
                <ul>
                    <li><button onclick="confirmDeleteAccount()">EliminaAccount</button></li>
                    <li><a href="{{ route('account.change-password') }}">
                    Modifica Password
                    </a></li>
                        <form id="logoutForm"  action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    @endguest
</div>
<div id="accountInfoSection">
    @auth
    <div class="center-content">
        <div class="user-info">

            <div class="info-item">

                <p class="username">{{ Auth::user()->name }}</p>
            </div>

        </div>
    </div>

</div>


    <h2 style="text-align: center;">I tuoi annunci</h2>
    <div class="annunci-container">
        @forelse(Auth::user()->annunci ?? [] as $annuncio)
            <div class="card">
                @if($annuncio->images)
                <div class="mb-3">
                    @foreach ($annuncio->fotos as $foto)
                        <img src="{{ asset($foto->nome_file) }}" alt="Immagine annuncio">
                    @endforeach
                </div>
                @endif
                <div class="card-body">
    <h5 class="card-title">{{ $annuncio->title }}</h5>
    <p class="card-text">{{ $annuncio->description }}</p>
    @if ($annuncio->price && $annuncio->price > 0)
        <p class="card-text">Prezzo: {{ $annuncio->price }} €</p>
    @else
        @php
            $adTypes = [
                'sale' => 'In vendita',
                'gift' => 'In regalo'
            ];
            $adTypeTranslation = $adTypes[$annuncio->adType] ?? $annuncio->adType;
        @endphp
        <p class="card-text">Annuncio: {{ ucfirst($adTypeTranslation) }}</p>
    @endif
                    <a href="{{ route('annunci.show', ['annuncio' => $annuncio]) }}" class="btn">
    <i class="fa-solid fa-circle-info" style="font-size: 1.7em; margin-top: 6px;"></i>
</a>
                    <button onclick="deleteAnnuncio('{{ $annuncio->id }}')" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-trash red-icon" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                    </button>
                    <button onclick="editAnnuncio('{{ $annuncio->id }}')" class="btn btn-primary edit-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-pencil blue-icon" viewBox="0 0 16 16">
                        <path d="M12.293 0.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414L2.707 15.707a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 0-1.414L12.293 0.293zM15 3.586L12.414 1 11 2.414 13.586 5 15 3.586zm-2.121 2.122L5 13.414 3.828 12.2 12.172 3.878l.707.708z"/>
                        </svg>
                    </button>
                </div>
            </div>
        @empty
            <p>Non hai ancora pubblicato alcun annuncio.</p>
        @endforelse
    </div>
@else
@endauth

</body>
</html>
