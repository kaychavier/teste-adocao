<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
  <table>
    <tr>
      <td width="28">Solicitante</td>
      <td width="28">Animal</td>
      <td width="28">CPF</td>
      <td width="28">Celular</td>
      <td width="28">Email</td>
      <td width="28">Data de nascimento</td>
      <td width="28">Data de envio</td>
    </tr>
    @forelse($adoptions as $adoption)
    <tr>
      <td width="28">{{ $adoption->name }}</td>
      <td width="28">{{ $adoption->animal->name }}</td>
      <td width="28">{{ $adoption->document }}</td>
      <td width="28">{{ $adoption->phone }}</td>
      <td width="28">{{ $adoption->email }}</td>
      <td width="28">{{ $adoption->birth_date->format('d/m/Y') }}</td>
      <td width="28">{{ $adoption->created_at->format('d/m/Y') }}</td>
    </tr>
    @empty
    <tr>
      <td colspan="7">Nenhuma adoção encontrada!</td>
    </tr>
    @endforelse
  </table>
</body>
</html>