<div>

    <div class="row">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert alert-success">
                {{ session('message') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger">
                {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

@if($registerForm)
<p class="login-card-description">Regristro</p>

<form >
        <div class="col-12">
            <div class="form-group">
                <label>Nombre :</label>
                <input type="text" wire:model="name" class="form-control" placeholder="Escribe tu nombre">
                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label>Email :</label>
                <input type="email" wire:model="email" class="form-control" placeholder="Escribe tu correo">
                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label>Password :</label>
                <input type="password" wire:model="password" class="form-control" placeholder="Escribe tu contraseña">
                @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-12 text-center text-white">

            <button class="btn btn-block btn-success text-reset" wire:click.prevent="registerStore">Registrarse</button>

        </div>

        <p class="login-card-footer-text mt-5">
            ¡Ya tengo una cuenta!
            <a class="btn btn-outline-dark text-reset" wire:click.prevent="register">Login</a>
        </p>
</form>

@else
<p class="login-card-description">Iniciar sesión</p>

<form>
        <div class="col-12">
            <div class="form-group">
                <label>Email :</label>
                <input type="text" wire:model="email" class="form-control">
                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label>Password :</label>
                <input type="password" wire:model="password" class="form-control">
                @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="col-12 text-center">

            <button class="btn btn-block login-btn mb-4" wire:click.prevent="login">Login</button>
        </div>

        <a href="#!" class="forgot-password-link">¿Se te olvidó tu contraseña?</a>

        <p class="login-card-footer-text">
            ¿No tienes una cuenta?
            <a class="btn btn-outline-dark text-reset" wire:click.prevent="register">Registrarse aqui</a>
        </p>

</form>
@endif

