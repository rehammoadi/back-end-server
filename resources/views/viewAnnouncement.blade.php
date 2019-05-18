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

                                        <h2 class="">פרטי מודעה</h2>

                                    @if ( count( $data ) > 0 )


                                    <form method="POST" action="/update_announcement" class="needs-validation" novalidate enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="announcement_id" id="announcement_id" value="{{$data[0]->id}}">
                                        <div class="form-group">
                                            <label for="title">כותרת</label>
                                            <input type="text" class="form-control" id="title" name="title" value=" {{$data[0]->title}}" required>
                                        </div>



                                        <div class="form-group">
                                            <label for="uname">מספר תוכנית</label>
                                            <input type="number" class="form-control" id="number"  name="number" value="{{$data[0]->mespar_tokhnet}}" required>

                                        </div>



                                        <div class="form-group">
                                            <label  for="area">מחוז</label>
                                            <input  type="text" class="form-control" id="area" name="area" value="{{$data[0]->area}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label  for="area">מרחב תכנון</label>
                                            <input  type="text" class="form-control" id="merhav_tekhnon" name="merhav_tekhnon" value="{{$data[0]->merhav_tekhnon}}"  required>
                                        </div>

                                        <div class="form-group">
                                            <label  for="area">עיר</label>
                                            <input  type="text" class="form-control" id="city" name="city" value="{{$data[0]->city}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label  for="area">כתובת</label>
                                            <input  type="text" class="form-control" id="address" name="address"  value="{{$data[0]->address}}"  required>
                                        </div>

                                        <div class="form-group">
                                            <label  for="area">מספר תיק</label>
                                            <input  type="text" class="form-control" id="doc_number" name="doc_number"  value="{{$data[0]->doc_number}}"  required>
                                        </div>



                                        <div class="form-group">
                                            <label  for="area">מספר גוש</label>
                                            <input type="text" class="form-control" id="block_number" name="block_number"  value="{{$data[0]->block_number}}"  required>
                                        </div>



                                        <div class="form-group">
                                            <label  for="area">מספר חלקה</label>
                                            <input type="text" class="form-control" id="helka" name="helka"  value="{{$data[0]->helka}}"  required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">תאור כללי</label>
                                            <textarea  class="form-control" id="description" rows="5" name="description"> {{$data[0]->description}} </textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="note">הערות</label>
                                            <textarea  class="form-control" id="note" rows="5" name="note"> {{$data[0]->note}} </textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="pic">תמונה</label>
                                            <img src="/images/thumbnail/{{$data[0]->pic_full_name}}" />
                                            <input type="file" class="form-control" name="image" id="image" enctype="multipart/form-data">    
                                        </div>



                                        <button type="submit"  class="btn btn-primary">Update</button>
                                    </form>
                                    {{--End of Form--}}
                                    @endif
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
