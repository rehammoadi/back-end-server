@extends('layouts.app')
@extends('layouts.header')
@section('content')
<div class="container">



    <div class="row">

       <div class="col-md-12 col-md-offset-0">

           <div class="panel panel-default">
                <div class="panel-heading">פרטי מודעה</div>

               <div class="row">
                                <div class="col-md-10 col-md-offset-1">

                                        <h2 class="">פרטי משתמש</h2>
                                    @if ( count( $details ) > 0 )
                                       <h2>{{$details[0]->email }}</h2>
                                       <h2>{{$details[0]->name }}</h2>
                                       <h2>{{$details[0]->created_at }}</h2>
                                    @endif


                                    <form method="POST" action="/update_announcement" class="needs-validation" novalidate>
                                        {{ csrf_field() }}
{{--                                        <input type="hidden" name="announcement_id" id="announcement_id" value="{{$data[0]->id}}">--}}
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>

                                    </form>

                                </div>
               </div>

               <div class="space-20"></div>

               </div>

                </div>

            </div>


        </div>

       </div>
    </div>


    </div>
@endsection
