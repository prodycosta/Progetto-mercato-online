<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Inserisci questo nel tag head -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sell.css">
    <script src="{{ asset('js/sell.js') }}"></script>
    <title>La Tua Piattaforma di Annunci</title>

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
<div class="sell-container">

    @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <h3>Inserisci il tuo annuncio in pochi minuti</h3>
        <h5>Vendi online quello che non usi più e comincia a guadagnare</h5>

        <div class="sell-form">
            <h4>Scrivi l'oggetto del tuo annuncio</h4>
            <p>Inserisci l'annuncio cliccando il bottone</p>
            <button id='Open-overlay' class="Open-overlay"  type="button" onclick="openOverlay()">Pubblica annuncio</button>
        </div>

    </div>



    <form action="{{url('/sell')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="overlay">
    <div class="sell-form">
        <div class="sell-form-container">
            <div class="form-column">

                <div class="form-group">
                    <label for="title">Titolo:</label>
                    <input type="text" id="title" name='title' placeholder="Titolo dell'annuncio" required>
                </div>

                <div class="form-group">
                    <label for="images" class="form-label">Carica le immagini:</label>
                    <input type="file" id="images" name="images[]" multiple accept="image/*" class="form-control-file" required>
                </div>

                <div class="form-group">
                    <label for="adType">Tipo di annuncio:</label>
                    <select id="adType" name="adType">
                        <option value="sale">In vendita</option>
                        <option value="gift">In regalo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Descrizione:</label>
                    <textarea id="description" name="description" placeholder="Inserisci la descrizione" required></textarea>
                </div>
            </div>

            <div class="form-column">
                <div class="form-group">
                    <label for="condition">Condizione dell'oggetto:</label>
                    <select id="condition" name="condition">
                        <option value="new">Nuovo</option>
                        <option value="likeNew">Come nuovo</option>
                        <option value="excellent">Ottimo</option>
                        <option value="good">Buono</option>
                        <option value="damaged">Danneggiato</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Prezzo:</label>
                    <input type="number" id="price" name="price" placeholder="Inserisci il prezzo" required>
                </div>

                <div class="form-group">
                    <label for="position">Posizione:</label>
                    <input type="text" id="position" name="position" placeholder="Inserisci la posizione" oninput="mostraSuggerimenti()" required>
                    <ul id="suggerimenti"></ul>
                    <div id="erroreNumeri" class="errore"></div>
                </div>
            </div>

            <div class="button-group">
                <button type="button" id="continuaButton" onclick="openSecondDropdown()">Continua</button>
                <button class="close-button" type="button" onclick="closeOverlay()">Chiudi</button>
            </div>
        </div>
    </div>
</div>

<div id="secondDropdown" class="second-dropdown">
    <div class="second-dropdown-content">
        <p>Aggiungi qui il contenuto desiderato...</p>
        <div class="button-wrapper">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <button type="submit" onclick="publishAd()">Pubblica</button>
            <button type="button"  onclick="closeSecondDropdown()">Chiudi</button>
        </div>
    </div>
</div>
</form>


<script>
    document.getElementById('adType').addEventListener('change', function() {
    var adTypeValue = this.value;
    var priceInput = document.getElementById('price');

    if (adTypeValue === 'gift') {
        priceInput.value = '0';
        priceInput.disabled = true;
    } else {
        priceInput.value = '';
        priceInput.disabled = false;
    }
});
</script>
<script>
    function openSecondDropdown() {

        var secondDropdown = document.getElementById("secondDropdown");


        if (secondDropdown) {

            secondDropdown.style.display = "block";
        } else {
            console.error("Elemento secondDropdown non trovato.");
        }
    }
</script>



</body>
</html>
