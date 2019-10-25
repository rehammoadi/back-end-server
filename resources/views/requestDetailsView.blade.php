  @extends('layouts.app')
  @extends('layouts.header')
  @section('content')

                  
          <div class="row">

              <div class="col-lg-6 col-md-12">
                 
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                      <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                          <span class="nav-tabs-title"> 
                            <input type="hidden" value="{{ csrf_token() }}" id="_token" />
                            <input type="hidden" value="{{ $res[0]->id }}" id="req_id" />
                              @if ( count( $res ) > 0 )
                              פרטי משתמש :  {{ $res[0]->name }}
                              @endif
                          
                          
                          </span>
                        
                        </div>
                      </div>
                    </div>
                    
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                          <table class="table">
                            <tbody>

                              @if ( count( $res ) > 0 )
                                
                                  <tr>
                                      <td > שם  :</td>
                                      <td >{{ $res[0]->name }}</td>
                                  </tr>   
                                  
                                  <tr>
                                      <td > ת.ז :</td>
                                      <td >{{ $res[0]->user_ID }}</td>
                                  </tr>   
                                  <tr>
                                      <td >מספר חלקה :</td>
                                      <td >{{ $res[0]->mespar_helka   }}</td>
                                  </tr>   
                                  <tr>
                                      <td >מספר גוש :</td>
                                      <td >{{ $res[0]->mespar_gosh   }}</td>
                                  </tr>   
                                   
                                  
                                  <tr>
                                      <td >גודל במטרים :</td>
                                      <td >{{ $res[0]->size   }}</td>
                                  </tr>   
                                  
                                 
                                  
                                  
                                  <tr>
                                      <td >  תאריך הרשמה:</td>
                                      <td >
                                          
                                        {{date('Y-m-d', strtotime($res[0]->created_at))}}  
                                          
                                      </td>
                                  </tr>    
                                    
                                  
                                  <tr>
                                    <td >תאור:</td>
                                    <td >{{ $res[0]->description   }}</td>
                                </tr>  
                             
                                <tr>
                                  <td >סטטוס:</td>
                                  <td >

                                      @switch($res[0]->status)
                                      @case(0)
                                            <input type="checkbox" id="status_of_req" name="status_of_req" value=" {{  $res[0]->status   }}"><span id='status_text'>לא טופל</span><br>
                                          @break
                                  
                                      @case(1)
                                           <input type="checkbox" id="status_of_req" checked name="status_of_req" value=" {{  $res[0]->status   }}"><span id='status_text'>טופל</span><br>
                                          @break
                                  @endswitch
                                     
                                    
                                   
                                  
                                  </td>
                              </tr>  


                              @endif
                              

                              
                                
                                
                            </tbody>
                          </table>
                        </div>
                        
                      
                      </div>
                    </div>
                  </div>
                </div>



                  </div>
       
          </div>
    
        </div>
        @endsection

        @extends('layouts.footer')