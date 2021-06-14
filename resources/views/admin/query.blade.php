
@extends('layouts.app')

<title>{{ __('Admin - Query') }}</title>

@section('content')

    <div class="container">
        <h2 class="mt-5 text-center text-muted">Retrieve all Users and Companies</h4>
            <div class="row mt-5">
                <div class="col-lg-6">        
                    <h2 class="text-center">User:</h2>
                    @foreach ($users as $user)
                        <ul class="list-group  text-center">
                            <li class="list-group-item ">{{$user->name}} {{$user->lastname}}</li>
                        </ul>
                    @endforeach
                </div>
        
                <div class="col-lg-6">        
                    <h2 class="text-center">Company:</h2> 
                    @foreach ($companies as $company)
                        <ul class="list-group  text-center">
                            <li class="list-group-item ">{{$company->company_name}}</li>
                        </ul>
                    @endforeach   
                </div>
            </div>
    </div>

    <div class="container">
        <h2 class="mt-5 text-center column text-muted">Given a company, return all Users associated</h4>
        <div class="row mt-5">
            <div class="col-lg-6">        
                <h2 class="text-center">Company:</h2>
                @foreach ($usersOfCompany as $userOfCompany)
                    <ul class="list-group  text-center">
                        <li class="list-group-item ">{{$userOfCompany->company_name}}</li>
                    </ul>
                @endforeach 
            </div>
        
            <div class="col-lg-6">        
                <h2 class="text-center">User:</h2>    
                @foreach ($usersOfCompany as $userOfCompany)
                    <ul class="list-group  text-center">
                        <li class="list-group-item ">{{$userOfCompany->name}} {{$userOfCompany->lastname}}</li>
                    </ul>
                @endforeach 
            </div>
        </div>
    </div>
   

@endsection