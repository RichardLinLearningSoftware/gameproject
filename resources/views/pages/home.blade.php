@extends('layouts.index')

@section('title')
    {{ "Home" }}
@endsection

@section('content')
    <div class="home-main">
        <h2>
            Title woww
        </h2>

        @auth
            <h3>Welcome {{ Auth::user()->name }}</h3>
            <h3>Email: {{ Auth::user()->email }}</h3>
            <h3>id: {{ Auth::id() }}</h3>
        @endauth
        <p>
            Quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.
        </p>
    </div>
@endsection