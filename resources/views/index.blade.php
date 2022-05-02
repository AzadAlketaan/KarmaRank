<!DOCTYPE html>
<html lang="en">
<head>
  <title>Karma Ranking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- Image and text -->
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="/images/1024px-Eo_circle_red_white_letter-k.svg.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Karma Ranking
  </a>
  <button onclick=" window.open('{{ route('GenerateFakeData') }}','_blank')" type="button" class="btn btn-info" target="_blank">Generate Fake Data</button>
</nav>

</head>
<body>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Position</th>
      <th scope="col">Name</th>
      <th scope="col">Score</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $key => $user)
    <tr>
      <th>{{ $key }}</th>
      <td>{{ $user->position }}</td>
      <td>
        <img src="{{$user->Image_URL}}" width="30" height="30" class="d-inline-block align-top" alt="">
        {{$user->username}}
      </td>
      <td>{{ $user->karma_score }}</td>
    </tr>   
    @endforeach
  </tbody>
</table>

</div>

</body>
</html>
