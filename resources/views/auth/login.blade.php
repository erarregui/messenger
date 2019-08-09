@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">
            <b-card title="Inicio de sesión" >
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
                     
                    <b-form method="POST" action="{{ route('login') }}">
                        @csrf
                        <b-form-group 
                                  label="Correo electronico:"
                                  label-for="email"
                                  description="Nunca compartiremos tu correo electronico.">
                            <b-form-input type="email"
                                  id="email" name="email"
                                  value="{{ old('email') }}" required autofocus
                                  placeholder="Enter email">
                            </b-form-input>
                        </b-form-group>
                        
                        <b-form-group 
                                  label="Contraseña:"
                                  label-for="password">
                            <b-form-input type="password"
                                  id="password" name="password"
                                  value="{{ old('password') }}" required >
                            </b-form-input>
                        </b-form-group>

                        <b-form-group>
                            <b-form-checkbox
                                  name="remember"
                                  {{ old('remember') ? 'checked="true"' : '' }}>
                                  Recordar sesión
                            </b-form-checkbox>
                        </b-form-group>    
                        
                        <b-form-group>
                            <b-button type="submit" variant="primary">        
                                {{ __('Ingresar') }}
                            </b-button>

                            <b-button href="{{ route('register') }}" variant="link">        
                                {{ __('No estas registrado?') }}
                            </b-button>
                        </b-form-group>

                        
                       
                    </b-form>
                
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
