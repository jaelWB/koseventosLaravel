
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{(empty($user->created_at))?route('user.store'):route('user.update',$user)}}">
                        @csrf
                         @if ($user->created_at)
        @method('PATCH')
    @endif

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"><b>Rol *</b></label>


                           <div class="col-md-6 mt-1">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input required type="radio" id="customRadioInline1s" name="rol" class="custom-control-input" value="adm" {{($user->rol == 'adm')?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInline1s">Administrador</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input required type="radio" id="customRadioInline2s" name="rol" class="custom-control-input" value="validador" {{($user->rol == 'validador')?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInline2s">Validador</label>
                                </div>
                           </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><b>Nombre *</b></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name',$user->name)}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><b>Correo *</b></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email',$user->email)}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><b>Contraseña *</b></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><b>Confirmar contraseña *</b></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"><b>Estado *</b></label>


                           <div class="col-md-6 mt-1">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input required type="radio" id="customRadioInline1" name="estado" class="custom-control-input" value="Activo" {{($user->estado == 'Activo')?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInline1">Activo</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input required type="radio" id="customRadioInline2" name="estado" class="custom-control-input" value="Inactivo" {{($user->estado == 'Inactivo')?'checked':''}}>
                                    <label class="custom-control-label" for="customRadioInline2">Inactivo</label>
                                </div>
                           </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

