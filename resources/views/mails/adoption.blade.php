<h1>DADOS DO FORMULÁRIO DE ADOÇÃO:</h1>

<h2>Nome: {{ $adoption->name }}</h2>
<h2>Animal: {{ $adoption->animal->name }}</h2>
<h2>Email: {{ $adoption->email }}</h2>
<h2>Celular: {{ $adoption->phone }}</h2>
<h2>CPF: {{ $adoption->document }}</h2>
<h2>Data de nascimento: {{ $adoption->birth_date->format('d/m/Y') }}</h2>
<h2>Data de preenchimento: {{ $adoption->created_at->format('d/m/Y') }}</h2>



