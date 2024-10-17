<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invia un Messaggio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Custom CSS for styling */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Align container to the top */
            height: 90vh; /* Adjusted height */
        }
        .form-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 60px; /* Increased padding */
            width: 700px; /* Increased width */
            max-width: 90%;
            margin-top: 50px; /* Adjusted margin */
        }
        .form-header {
            text-align: center;
            margin-bottom: 40px; /* Increased margin */
        }
        .form-group {
            margin-bottom: 30px; /* Decreased margin */
        }
        label {
            font-weight: bold;
            color: #333;
        }
        textarea {
            height: 150px;
            min-height: 200px; /* Increased height */
            resize: none;
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 15px;
            width: 100%;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        textarea:focus {
            border-color: #007bff;
        }
        button[type="submit"] {
            width: 30%; /* Adjusted width */
            margin: 0 auto; /* Centered */
            display: block; /* Ensures it's centered */
            background-color: rgb(42, 10, 72);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px 0; /* Adjusted padding */
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px; /* Decreased font size */
            letter-spacing: 1px;
        }
        button[type="submit"]:hover {
            background-color: rgb(67, 0, 130);
        }
        button[type="submit"]:focus {
            outline: none;
        }
    </style>

</head>
<body>

<div class="container">
    <div class="form-container">
        <div class="form-header">
            <h2>Invia un Messaggio</h2>
        </div>
        <form method="POST" action="{{ route('chat.store', ['receiver' => $receiver->id, 'annuncio' => $annuncio->id]) }}">
            @csrf
            <div class="form-group">
                <label for="message">Messaggio:</label>
                <textarea id="message" class="form-control" name="message" placeholder="Scrivi il tuo messaggio qui..." required></textarea>
            </div>
            <input type="hidden" name="article_id" value="{{ $annuncio->id }}">
            <div class="form-group">
                <button type="submit">Invia Messaggio</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
