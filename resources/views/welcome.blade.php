<!DOCTYPE html>
<html>
<head>
    <title>Bienvenue à la base de connaissance de votre entreprise</title>
    <style>
        body {
            background-image: url("background.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Roboto', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        
        .card {
            width: 500px;
            height: 400px;
            background: Black;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            transform: translateX(70%);
        }
        
        .card h1 {
            font-size: 36px;
            margin-top: 0;
            margin-bottom: 20px;
            background: linear-gradient(to right, #ffffff, #ffffff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            color: white; /* Couleur du texte en blanc */
        }
        
        .card p {
            font-size: 18px;
            color: #666;
            margin-bottom: 30px;
        }
        
        .cssbuttons-io-button {
            background-image: linear-gradient(19deg, #178BFD 0%, #2113FD 100%);
            color: white;
            font-family: inherit;
            padding: 0.35em;
            padding-left: 1.2em;
            font-size: 17px;
            border-radius: 10em;
            border: none;
            letter-spacing: 0.05em;
            display: flex;
            align-items: center;
            overflow: hidden;
            position: relative;
            height: 2.8em;
            padding-right: 3.3em;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: 500;
            box-shadow: 0 0 1.6em rgba(183, 33, 255,0.3),0 0 1.6em hsla(191, 98%, 56%, 0.3);
            transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
            text-decoration: none;
            margin: 100px auto 0;
        }
        
        .cssbuttons-io-button .icon {
            background: white;
            margin-left: 1em;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 2.2em;
            width: 2.2em;
            border-radius: 10em;
            right: 0.3em;
            transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
        }
        
        .cssbuttons-io-button:hover .icon {
            width: calc(100% - 0.6em);
        }
        
        .cssbuttons-io-button .icon svg {
            width: 1.1em;
            transition: transform 0.3s;
            color: #B721FF;
        }
        
        .cssbuttons-io-button:hover .icon svg {
            transform: translateX(0.1em);
        }
        
        .cssbuttons-io-button:active .icon {
            transform: scale(0.9);
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Bienvenue sur la base de connaissance de votre entreprise</h1>
        
        <a href="{{ route('login') }}" class="cssbuttons-io-button">
            Se connecter
            <div class="icon">
                <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path></svg>
            </div>
        </a>
        
        <footer>
            &copy; 2023 Votre entreprise. Tous droits réservés.
        </footer>
    </div>
</body>
</html>
