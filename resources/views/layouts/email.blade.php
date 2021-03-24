
<div class="col-md-2 col-md-offset-5">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group ">
                <label for="email" class=" col-form-label text-md-right">{{ __('Ваш E-Mail ') }}</label>


                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

            </div>
            <div >
                <button type="submit" class="btn btn-primary">
                    {{ __('Отправить ссылку на сброс пароля') }}
                </button>
            </div>
        </form>
    </div>
</div>




