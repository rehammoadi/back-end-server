@extends('layouts.app')
@extends('layouts.header')
@section('content')
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title ">פרטי המודעה</h4>
                    <p class="card-category"> </p>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                        @if ( count( $errors ) > 0 )
                        @foreach ($errors->all() as $error)
                            <p style="color: red;">{{$error}}</p>
                        @endforeach
                      @endif
                        <form method="POST" action="/update_announcement" class="needs-validation" novalidate enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <input type="hidden" name="announcement_id" id="announcement_id" value="{{$data[0]->id}}">
                              <table class="table">
                                  @if ( count( $data ) > 0 )
                                        <tbody>
                                        
                                            <tr>
                                                <td>
                                                    כותרת
                                                </td>
                                                <td>
                                                   
                                                    <input type="text" class="form-control" id="title" name="title" value=" {{$data[0]->title}}" required>
                                                </td>
                                                
                                              </tr>

                                              <tr>
                                                  <td>
                                                      מספר תוכנית
                                                  </td>
                                                  <td>
                                                      
                                                      <input type="number" class="form-control" id="number"  name="number" value="{{$data[0]->mespar_tokhnet}}" required>
                                                  </td>
                                                  
                                                </tr>
                                                <tr>
                                                    <td>
                                                       מחוז
                                                       
                                                    </td>
                                                    <td>
                                                        
                                                        <input  type="text" class="form-control" id="area" name="area" value="{{$data[0]->area}}" required>
                                                    </td>
                                                    
                                                  </tr>


                                                  <tr>
                                                      <td>
                                                        מרחב תכנון
                                          
                                                      </td>
                                                      <td>
                                                          
                                                          <input  type="text" class="form-control" id="merhav_tekhnon" name="merhav_tekhnon" value="{{$data[0]->merhav_tekhnon}}"  required>
                                                      </td>
                                                      
                                                    </tr>



                                                    <tr>
                                                        <td>
                                                         עיר
                                         
                                                        </td>
                                                        <td>
                                                            
                                                            <input  type="text" class="form-control" id="city" name="city" value="{{$data[0]->city}}" required>
                                                        </td>
                                                        
                                                      </tr>

                                                    <tr>
                                                        <td>
                                                         כתובת
                                           
                                         
                                                        </td>
                                                        <td>
                                                            
                                                            <input  type="text" class="form-control" id="address" name="address"  value="{{$data[0]->address}}"  required>
                                                        </td>
                                                        
                                                      </tr>
                                                    <tr>
                                                        <td>
                                                          מספר תיק
                                                    
                                           
                                         
                                                        </td>
                                                        <td>
                                                            
                                                            <input  type="text" class="form-control" id="doc_number" name="doc_number"  value="{{$data[0]->doc_number}}"  required>
                                                        </td>
                                                        
                                                      </tr>
                                                    <tr>
                                                        <td>
                                                          מספר גוש
                                                           
                                           
                                         
                                                        </td>
                                                        <td>
                                                            
                                                            <input type="text" class="form-control" id="block_number" name="block_number"  value="{{$data[0]->block_number}}"  required>
                                                        </td>
                                                        
                                                      </tr>
                                                    <tr>
                                                        <td>
                                                           מספר חלקה
                                                           
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" id="helka" name="helka"  value="{{$data[0]->helka}}"  required>
                                                        </td>
                                                        
                                                      </tr>
                                                
                                                    <tr>
                                                        <td>
                                                           תאור כללי
                                                          
                                                        </td>
                                                        <td>
                                                            <textarea  class="form-control" id="description" rows="5" name="description"> {{$data[0]->description}} </textarea>
                                                        </td>
                                                        
                                                      </tr>
                                                    <tr>
                                                        <td>
                                                           הערות
                                         
                                                        </td>
                                                        <td>
                                                            <textarea  class="form-control" id="note" rows="5" name="note"> {{$data[0]->note}} </textarea>
                                                        </td>
                                                        
                                                      </tr>
                                                
                                                    <tr>
                                                        <td>
                                                            תמונה
                                                            
                                         
                                                        </td>
                                                        <td>

                                                         @isset($data[0]->pic_full_name)
                                                         <img src="/images/thumbnail/{{$data[0]->pic_full_name}}" />
                                                         @endisset
                                                            
                                                        <input type="file" class="form-control" name="image" id="image" enctype="multipart/form-data">    
                                                        </td>
                                                        
                                                      </tr>
                                                    <tr>
                                                        <td>
                                                           
                                                        </td>
                                                        <td>
                                                            <button type="submit"  class="btn btn-primary">עדכן</button>
                                                        </td>
                                                        
                                                      </tr>
                                                
                                        </tbody>
                                        @endif
                              </table>
                        </form>
                    </div>
                  </div>
                </div>
              </div>

        </div>
  
      </div>
      @endsection

      @extends('layouts.footer')

   