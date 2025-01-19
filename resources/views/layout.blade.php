<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/index.css">
    <link rel="stylesheet" href="/styles/css/fontawesome.min.css">
    <link rel="stylesheet" href="/styles/css/all.min.css">
    <link rel="stylesheet" href="/styles/login.css">
    <link rel="stylesheet" href="/styles/accounts.css">
    <link rel="stylesheet" href="/styles/dashboard.css">
    <link rel="stylesheet" href="/styles/expenses.css">
    <link rel="stylesheet" href="/styles/spend.css">
    <title>Budgeter | Increase your savings by making right decisions.</title>
</head>
<body>
   @if(Session::has("NewSession"))
   <div class="header border-bottom">
        <div class="logo">
            <span class="logoIcon fas fa-sack-dollar"></span>
            <span class="logoTitle">Budgeter</span>
        </div>
        <div class="auth-buttons" align="right">
            <button type="button" class="noti-button" onclick="document.getElementById('notiBar').style.display='block'">                
                <span class="fas fa-bell"></span>
            </button>
            <div class="profile-button">
                <span class="far fa-user"></span>
                <span class="gar-text fw-1">Eric</span>
            </div>
            <a href="{{url('/logout')}}" class="logout-btn">logout</a>
        </div>
   </div>

   <div class="contents">
        @yield("contents")
   </div>
   @else
   <div class="header">
        <div class="logo">
            <a href="{{url('/')}}" class="logo-link decoration-none">
                <span class="logoIcon fas fa-sack-dollar"></span>
                <span class="logoTitle">Budgeter</span>
            </a>
        </div>
        <div class="auth-buttons" align="right">
            <a href="{{url('/login')}}" class="auth-btn">
                Sign In
            </a>
            <a href="{{url('/login')}}" class="auth-btn">
                Plan Now
            </a>
        </div>
   </div>

   <div class="contents">
        @yield("contents")
   </div>
   <div class="footer border-top">
        <div class="copyright">
            <span class="fas fa-copyright gr-text"></span>
            Eric 2025, Allrights reserved.
        </div>
   </div>

   @endif

   <script src="/scripts/index.js"></script>
</body>
</html>