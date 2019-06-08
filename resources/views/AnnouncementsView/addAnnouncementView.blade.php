@extends('layouts.app')
@extends('layouts.header')
@section('content')
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title ">הוספת מודעה חדשה</h4>
                    <p class="card-category"> </p>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                        <form method="POST" action="new_announcement" class="needs-validation" novalidate enctype="multipart/form-data">
                          {{ csrf_field() }}

                          
                                @if ( count( $errors ) > 0 )

                                    @foreach ($errors->all() as $error)
                                        <p style="color: red;">{{$error}}</p>
                                    @endforeach
                                @endif
                              <table class="table">
                                 
                                        <tbody>
                                        
                                            <tr>
                                                <td>
                                                    כותרת
                                                </td>
                                                <td>
                                                   
                                                    <input type="text" class="form-control" id="title" name="title" required>
                                                </td>
                                                
                                              </tr>

                                              <tr>
                                                  <td>
                                                      מספר תוכנית
                                                  </td>
                                                  <td>
                                                      
                                                      <input type="number" class="form-control" id="number"  name="number" required>
                                                  </td>
                                                  
                                                </tr>
                                                <tr>
                                                    <td>
                                                        מחוז
                                                       
                                                    </td>
                                                    <td>
                                                        
                                                        <input  type="text" class="form-control" id="area" name="area" required>
                                                    </td>
                                                    
                                                  </tr>


                                                  <tr>
                                                      <td>
                                                          מרחב תכנון
                                          
                                                      </td>
                                                      <td>
                                                          
                                                          <input  type="text" class="form-control" id="merhav_tekhnon" name="merhav_tekhnon"  required>
                                                      </td>
                                                      
                                                    </tr>



                                                    <tr>
                                                        <td>
                                                           עיר
                                         
                                                        </td>
                                                        <td>
                                                            
                                                            <input  type="text" class="form-control" id="city" name="city" required>
                                                        </td>
                                                        
                                                      </tr>

                                                    <tr>
                                                        <td>
                                                        כתובת
                                           
                                         
                                                        </td>
                                                        <td>
                                                            
                                                            <input  type="text" class="form-control" id="address" name="address"  required>
                                                        </td>
                                                        
                                                      </tr>
                                                    <tr>
                                                        <td>
                                                          מספר תיק
                                                    
                                           
                                         
                                                        </td>
                                                        <td>
                                                            
                                                            <input  type="text" class="form-control" id="doc_number" name="doc_number" required>
                                                        </td>
                                                        
                                                      </tr>
                                                    <tr>
                                                        <td>
                                                           מספר גוש
                                                        </td>
                                                        <td>
                                                            
                                                            <input type="text" class="form-control" id="block_number" name="block_number"  required>
                                                        </td>
                                                        
                                                      </tr>
                                                    <tr>
                                                        <td>
                                                           מספר חלקה
                                                           
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" id="helka" name="helka"  required>
                                                        </td>
                                                        
                                                      </tr>
                                                
                                                    <tr>
                                                        <td>
                                                           תאור כללי
                                                          
                                                        </td>
                                                        <td>
                                                            <textarea  class="form-control" id="description" rows="5" name="description"> </textarea>
                                                        </td>
                                                        
                                                      </tr>
                                                    <tr>
                                                        <td>
                                                           הערות
                                         
                                                        </td>
                                                        <td>
                                                            <textarea  class="form-control" id="note" rows="5" name="note"> </textarea>
                                                        </td>
                                                        
                                                      </tr>
                                                
                                                    <tr>
                                                        <td>
                                                        תמונה
                                                            
                                         
                                                        </td>
                                                        <td>

                                                        <input type="file" class="form-control" name="image" id="image" enctype="multipart/form-data">   
                                                        
                                                        </td>
                                                        
                                                      </tr>
                                                    <tr>
                                                        <td>
                                                           
                                                        </td>
                                                        <td>
                                                            <button type="submit"  class="btn btn-primary">הוספת מודעה חדשה</button>
                                                        </td>
                                                        
                                                      </tr>
                                                
                                        </tbody>
                                      
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

   