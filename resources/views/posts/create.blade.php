
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 30px 15px;
            color: #333;
        }

        .container {
            max-width: 650px;
            margin: 0 auto;
            padding: 25px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #1a365d;
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin: 15px 0 6px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            display: block;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
            font-family: inherit;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #1a365d;
        }

        textarea {
            resize: vertical;
        }

        .checkbox {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 20px 0;
        }

        .checkbox input {
            width: 16px;
            height: 16px;
        }

        .checkbox label {
            margin: 0;
        }

        button,
        .back-link {
            display: inline-block;
            padding: 11px 16px;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background-color: #1a365d;
            color: white;
        }

        button:hover {
            background-color: #274c77;
        }

        .back-link {
            margin-top: 15px;
            background-color: #e5e7eb;
            color: #222;
        }

        .errors {
            padding: 10px 20px;
            margin-bottom: 20px;
            color: #991b1b;
            background-color: #fee2e2;
            border-radius: 5px;
        }

        .errors ul {
            margin: 5px 0;
        }

        .success {
            padding: 12px;
            margin-bottom: 20px;
            color: #166534;
            background-color: #dcfce7;
            border-radius: 5px;
        }

        .field-error {
            color: #b91c1c;
            font-size: 13px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">

        <h1>Ajouter un article</h1>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="errors">
                <strong>Veuillez corriger les erreurs suivantes :</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <label for="title">Titre :</label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
                maxlength="255"
                required
            >
            @error('title')
                <div class="field-error">{{ $message }}</div>
            @enderror

            <label for="slug">Slug :</label>
            <input
                type="text"
                id="slug"
                name="slug"
                value="{{ old('slug') }}"
                placeholder="mon-premier-article"
                pattern="[a-z0-9-]+"
                maxlength="255"
                required
            >
            @error('slug')
                <div class="field-error">{{ $message }}</div>
            @enderror

            <label for="excerpt">Résumé :</label>
            <textarea
                id="excerpt"
                name="excerpt"
                rows="3"
                maxlength="255"
            >{{ old('excerpt') }}</textarea>
            @error('excerpt')
                <div class="field-error">{{ $message }}</div>
            @enderror

            <label for="body">Contenu :</label>
            <textarea
                id="body"
                name="body"
                rows="6"
                required
            >{{ old('body') }}</textarea>
            @error('body')
                <div class="field-error">{{ $message }}</div>
            @enderror

            <div class="checkbox">
                <input
                    type="checkbox"
                    id="is_published"
                    name="is_published"
                    value="1"
                    {{ old('is_published') ? 'checked' : '' }}
                >
                <label for="is_published">
                    Publier l'article
                </label>
            </div>

            <button type="submit">
                Enregistrer l'article
            </button>
        </form>

        <a class="back-link" href="{{ route('posts.index') }}">
            Retour aux articles
        </a>

    </div>
</body>
</html>
