@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">
            <b-card title="{{ __('Registrarse') }}" >
                @if ($errors->any())
                    <b-alert variant="danger" show>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </b-alert>
                 @else
                    <b-alert variant="success" show>Ingrese sus datos</b-alert>
                 @endif
                     
                    <b-form method="POST" action="{{ route('register') }}">
                        @csrf
                        <b-form-group 
                                  label="Nombre"
                                  label-for="name">
                            <b-form-input type="text"
                                  id="name" name="name"
                                  value="{{ old('name') }}" required autofocus
                                  >
                            </b-form-input>
                        </b-form-group>
                        <b-form-group 
                                  label="Correo electronico:"
                                  label-for="email"
                                  description="Nunca compartiremos tu correo electronico.">
                            <b-form-input type="email"
                                  id="email" name="email"
                                  value="{{ old('email') }}" >
                            </b-form-input>
                        </b-form-group>
                        
                        <b-form-group 
                                  label="Contraseña:"
                                  label-for="password">
                            <b-form-input type="password"
                                  id="password" name="password"
                                  required >
                            </b-form-input>
                        </b-form-group>

                        <b-form-group 
                                  label="Confirmar contraseña:"
                                  label-for="password_confirmation">
                            <b-form-input type="password"
                                  id="password-confirm" name="password_confirmation"
                                  required >
                            </b-form-input>
                        </b-form-group>
                                                
                        <b-form-group>
                            <b-button type="submit" variant="primary">        
                                {{ __('Registrar') }}
                            </b-button>
                            
                        </b-form-group>
                       
                       
                    </b-form>
                
            </b-card>
        </b-col>
    </b-row>
</b-container>

@endsection
