<h1>Progetto mercato online</h1>

<h3>Per far partire l'applicativo</h3>
<p>una volta fatta la clone del repository e importato il progetto

esegui le seguenti righe nella cartella del  terminale del progetto nel ide:
composer --version

composer install

cp .env.example .env

modifica informazioi nel .env 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= il nome del db
DB_USERNAME= la tua username
DB_PASSWORD= la tua password del db

php artisan key:generate

scrivi nel terminale "php artisan migrate" per creare le tabelle

infine nel terminale del progetto scrivi "php artisan serve"
</p>



<h3>Funzionalità</h3>

____________________________________________________________________________________________________________________________________________________________________________________________________________________

<ul>
    <li>Login e Registrazione: Per creare un account.</li>
    <li>Navbar: Puoi accedere a Home, Cerca, Vendi, Messaggi, e Account.</li>
    <li>Home: Possibilità di inserire l'oggetto di cui hai bisogno e la posizione.</li>
    <li>Cerca: Mostra tutti gli oggetti pubblicati; puoi anche cercare oggetti specifici. Gli oggetti vengono visualizzati verticalmente con varie informazioni. Accanto ci sono filtri per affinare la ricerca.</li>
    <li>Cliccando su un oggetto, verrai reindirizzato alla sua scheda con tutte le descrizioni e un pulsante "Contatta" per aprire la chat con il venditore.</li>
    <li>Vendi: Modulo semplice per inserire oggetti in vendita.</li>
    <li>Messaggi: Visualizza le chat con gli utenti. Cliccando su una conversazione, si apre la chat.</li>
    <li>Account: Visualizza tutti gli annunci pubblicati dall'account, con la possibilità di modificarli o eliminarli. È presente anche un menù per eliminare l'account o modificare la password.</li>
</ul>



____________________________________________________________________________________________________________________________________________________________________________________________________________________

<h1>Tecnologie usate</h1>

<ul>
    <li>Frontend: Laravel e Bootstrap</li>
    <li>Backend: Laravel </li>
    <li>Database: MySQL</li>
</ul>
