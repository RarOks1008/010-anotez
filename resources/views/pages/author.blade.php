
@extends('layouts.index')
@section('title_part')
    Author
@endsection
@section('middle_part')
    <h2>Author:</h2>
    <h3 class="author_center">Nikola Nedeljkovic</h3>
    <h3 class="author_center">2/17</h3>
	<a href="{{ asset('documentation.pdf') }}" class="documentation_holder"><span class="fas fa-file-pdf"></span></a>
    <div class="author_game" id="author_game">
    </div>
    <p class="error_text author_error_text" id="error_text">
        <a href="https://www.linkedin.com/in/nikola-nedeljkovic-8110b5150/">Visit me on linkedIn</a>
    </p>
    <script type="text/javascript" src="{{ asset('author_game.js') }}"></script>
@endsection
