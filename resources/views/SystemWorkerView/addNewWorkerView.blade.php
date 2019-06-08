@extends('layouts.app')
@extends('layouts.header')
@section('content')
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title ">הוספת עובד חדשה</h4>
                    <p class="card-category"> </p>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                        <form method="POST" action="new_worker" class="needs-validation" novalidate enctype="multipart/form-data">
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
                                                    שם עובד
                                                </td>
                                                <td>
                                                   
                                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                                </td>
                                                
                                              </tr>

                                              <tr>
                                                  <td>
                                                    דוא״ל
                                                  </td>
                                                  <td>
                                                      
                                                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                                  </td>
                                                  
                                                </tr>
                                                <tr>
                                                    <td>
                                                        מספר טלפון
                                                       
                                                    </td>
                                                    <td>
                                                        <input id="phone" class="form-control" name="phone" value="{{ old('phone') }}">
      
                                                        @if ($errors->has('phone'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                            </span>
                                                        @endif
                                                    </td>
                                                    
                                                  </tr>


                                                  <tr>
                                                      <td>
                                                        סיסמה
                                          
                                                      </td>
                                                      <td>
                                                          <input id="password" type="password" class="form-control" name="password" required>
      
                                                          @if ($errors->has('password'))
                                                              <span class="help-block">
                                                                  <strong>{{ $errors->first('password') }}</strong>
                                                              </span>
                                                          @endif
                                                      </td>
                                                      
                                                    </tr>
                                                  <tr>
                                                      <td>
                                                        אימות סיסמה
                                          
                                                      </td>
                                                      <td>
                                                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
      
                                                          @if ($errors->has('password'))
                                                              <span class="help-block">
                                                                  <strong>{{ $errors->first('password') }}</strong>
                                                              </span>
                                                          @endif
                                                      </td>
                                                      
                                                    </tr>

                                                      <tr>
                                                          <td>
                                                          הרשאות
                                           
                                                          </td>
                                                          <td>
                                                              
                                                              <select name="level">
                                                                  <option value="admin">מנהל</option>
                                                                  <option value="worker">עובד</option>
                                                                </select>
                                                        
                                                          </td>
                                                          
                                                        </tr>



                                                        <tr>
                                                            <td>
                                                          
                                                            </td>
                                                            <td>
                                                                <button type="submit"  class="btn btn-primary">הוספת עובד</button>
                                                          
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

   