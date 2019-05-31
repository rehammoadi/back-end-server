@extends('layouts.app')
@extends('layouts.header')
@section('content')
<div class="container">



    <div class="row">


        <div class="col-md-12 col-md-offset-0">



            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif




                <div class="row">

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <a type="button" class="btn btn-primary" href="/new_announcement">מודעה חדשה</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <a type="button" class="btn btn-primary" href="/list_announcement">רשימת מודעות</a>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <a type="button" class="btn btn-primary" href="/settings">הגדרות</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <a type="button" class="btn btn-primary" href="/settings">בקשות חדשות</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                </div>


                </div>

            </div>


        </div>




    </div>
</div>
@endsection
