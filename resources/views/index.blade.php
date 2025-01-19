@extends('layout')

@section('contents')
   <div class="contents">
       <div class="plan-intro">
            <span class="fas fa-coins intro-icon"></span>
            <h1>Start Planning your <span class="gr-text">Future</span> Now.</h1>
            <p>Manage your incomes and expenses by one click.</p>
            <a href="{{url('/login')}}">
                <button type="button" class="plan-now">Plan Now</button>
            </a>
      </div>
      <div class="plan-intro">
            <span class="fas fa-sack-dollar intro-icon"></span>
            <h1>Set your monthly budget not to exceed.</h1>
            <p>you can increase your monthly savings by 30% through managing your expenses with budgeter.</p>
            <a href="{{url('/login')}}">
                <button type="button" class="plan-now">Start Planning</button>
            </a>
      </div>
@endsection
