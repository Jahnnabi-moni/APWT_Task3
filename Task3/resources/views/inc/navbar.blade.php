<nav class="navbar navbar-light bg-success">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{route('Home')}}">Job For All</a>
    </div>
    <ul class="nav navbar-nav">
     
      
      
      <?php if(Session::has('corporate_id')) {?>
 

         <li><a href="{{route('Home')}}" class="btn btn-light" role="button"> Home</a></li>
         <li><a href="{{route('corporateDash')}}" class="btn btn-light" role="button"> Dashboard</a></li>
         <li><a href="{{route('logout')}}" class="btn btn-light" role="button"> Logout</a></li>
      <?php    
    
      }
      else if(Session::has('admin_id')) { ?>
 
      <li><a href="{{route('Home')}}" class="btn btn-light" role="button"> Home</a></li>

      <li><a href="{{route('userList')}}" class="btn btn-light" role="button"> User List</a></li>

        <li><a href="{{route('AdminDash')}}" class="btn btn-light" role="button">Admin Profile</a></li>


        <li><a href="{{route('logout')}}" class="btn btn-light" role="button"> Log out</a></li>
      <?php    
    
      }
       else  {?>
       <li><a href="{{route('Home')}}" class="btn btn-light" role="button"> Home</a></li>

       <li class="nev-item dropdown">

<a class="nav-link dropdown-toggle btn-sm" class="btn btn-light" href="#" id="NavbarDropdown" role="button" data-toggle="dropdown">Registration</a>
<div class="dropdown-menu " aria-labelledby="navbarDropdown">

<a class="dropdown-item btn btn-secondary" href="{{route('admin.registration')}}">Admin</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item btn btn-secondary" href="{{route('Registration')}}">Corporate Employer</a>
</div>

       <li><a href="{{route('login')}}" class="btn btn-success" color='black' role="button"> Log In</a></li>
    
        <?php } ?>







</li>


    </ul>
  </div>
</nav>