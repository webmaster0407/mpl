@extends('layout.reset')

@section('content')
<section id="section-talentcategories" class="d-flex flex-column justify-content-center">
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <form action="{{ route('forget.password.post') }}" method="POST">
            @csrf
            <label for="email_address">E-Mail Address</label>
            <div class="form-group">
                <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-secondary">Send Password Reset Link</button>
        </form>
    </div>
</section>
@endsection