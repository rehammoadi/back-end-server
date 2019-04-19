@extends('layouts.app')
@extends('layouts.header')
@section('content')
<div class="container">



    <div class="row">

       <div class="col-md-12 col-md-offset-0">

           <div class="panel panel-default">
                <div class="panel-heading">Add New Announcements</div>

               <div class="row">
                                <div class="col-md-10 col-md-offset-1">

                                        <h2 class="">בבקשה למלות שדות חובה</h2>
                                        <h2 class="">
                                            @if ( count( $errors ) > 0 )

                                                @foreach ($errors->all() as $error)

                                                @endforeach
                                            @endif

                                        </h2>


                                        <form method="POST" action="new_announcement" class="needs-validation" novalidate>
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="title">כותרת</label>
                                                <input type="text" class="form-control" id="title" name="title" required>
                                            </div>



                                            <div class="form-group">
                                                <label for="uname">מספר תוכנית</label>
                                                <input type="number" class="form-control" id="number"  name="number" required>

                                            </div>



                                            <div class="form-group">
                                                <label  for="area">מחוז</label>
                                                <input dir="rtl" type="text" class="form-control" id="area" name="area" required>
                                            </div>

                                            <div class="form-group">
                                                <label  for="area">מרחב תכנון</label>
                                                <input dir="rtl" type="text" class="form-control" id="merhav_tekhnon" name="merhav_tekhnon" required>
                                            </div>

                                            <div class="form-group">
                                                <label  for="area">עיר</label>
                                                <input dir="rtl" type="text" class="form-control" id="city" name="city" required>
                                            </div>

                                            <div class="form-group">
                                                <label  for="area">כתובת</label>
                                                <input dir="rtl" type="text" class="form-control" id="address" name="address" required>
                                            </div>

                                            <div class="form-group">
                                                <label  for="area">מספר תיק</label>
                                                <input dir="rtl" type="text" class="form-control" id="doc_number" name="doc_number" required>
                                            </div>



                                            <div class="form-group">
                                                <label  for="area">מספר גוש</label>
                                                <input dir="rtl" type="text" class="form-control" id="block_number" name="block_number" required>
                                            </div>



                                            <div class="form-group">
                                                <label  for="area">מספר חלקה</label>
                                                <input dir="rtl" type="text" class="form-control" id="helka" name="helka" required>
                                            </div>




                                          {{--  <div class="form-group">
                                                <label for="exampleFormControlSelect1">Example select</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="exampleFormControlSelect1">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Example multiple select</label>
                                                <select multiple class="form-control" id="exampleFormControlSelect2" name="exampleFormControlSelect2">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>--}}
                                            <div class="form-group">
                                                <label for="description">תאור כללי</label>
                                                <textarea dir="rtl" class="form-control" id="description" rows="5" name="description"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="note">הערות</label>
                                                <textarea dir="rtl" class="form-control" id="note" rows="5" name="note"></textarea>
                                            </div>



                                            <button type="submit"  class="btn btn-primary">Submit</button>
                                        </form>
                                        {{--End of Form--}}



                                </div>
                </div>

                </div>

            </div>


        </div>




    </div>
@endsection
