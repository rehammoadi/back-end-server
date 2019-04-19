@extends('layouts.app')
@extends('layouts.header')

@section('content')
<div class="container">


    <div class="row">

       <div class="col-md-12 col-md-offset-0">

           <div class="panel panel-default">
                <div class="panel-heading">List of Announcements</div>
            </div>



           <div class="row">
               <div class="col-md-12 col-md-offset-0">
                   <table id="table_id" class="display">
                       <thead>
                       <tr>
                           <th>Title</th>
                           <th>Area</th>
                           <th>City</th>
                           <th>Action</th>
                       </tr>
                       </thead>

                   </table>

               </div>
           </div>
       </div>
    </div>
</div>
@endsection
