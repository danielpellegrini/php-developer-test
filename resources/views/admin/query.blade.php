
@extends('layouts.app')

<title>{{ __('Admin - Query') }}</title>

@section('content')

    <div class="container">
        <h2 class="mt-5 text-center">Given a company, return all Users associated</h4>
    
        <h4>Company name: </h4>               
        @foreach ($user->companies as $company)
            <h5>{{$company->company_name}}</h5>    
        @endforeach 
        <br>
        <h4>User name: </h4>   
        @foreach ($company->users as $user)
            <h5>{{$user->name}} {{$user->lastname}}</h5>    
        @endforeach 
    </div>
   

@endsection