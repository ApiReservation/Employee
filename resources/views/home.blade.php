<!DOCTYPE HTML>
<html>
   <head>
      <title>Employee</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="assets/css/main.css" />
   </head>
   <body class="landing">
      <!-- Banner -->
      <section id="banner">
         <h2>Employees</h2>
      </section>
      <!-- One -->
      <section id="one" class="wrapper style1">
         <div class="inner">
            @if(isset($users))
            <?php $i=1; ?>
            @foreach($users as  $users)
            <article class= "{{ $i%2 == 0 ? 'feature right' : 'feature left' }} ">
               <span class="image"><img src="{{$users->image}}" alt="{{ $users->first_name}} {{ $users->last_name}}" /></span>
               <div class="content">
                  <h2>{{ $users->title}} {{ $users->first_name}} {{ $users->last_name}} </h2>
                  <span>{{$users->date_of_birth}}</span><br>
                  <span>{{$users->address}}</span>
                  <span> {{$users->country}}</span><br>
                  <span>{{$users->email}} </span><br>
                  <span>{{$users->rating}} </span> <br>
                  <p>{{$users->bio}}</p>
               </div>
            </article>
            <?php $i++;?>
            @endforeach
           

              @else
              <article >
                  <p class="center">No records were found!</p>
         
            </article>
            @endif
         </div>
      </section>
      <!-- Footer -->
      <footer id="footer">
         <div class="inner">
         </div>
      </footer>
   </body>
</html>