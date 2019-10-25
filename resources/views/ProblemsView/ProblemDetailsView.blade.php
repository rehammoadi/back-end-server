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
                           
                              @if ( count( $res ) > 0 )
                             פרטי תקלה  :  {{ $res[0]->name }}
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
                                      <td >שם המדווח  :</td>
                                      <td >{{ $res[0]->full_name }}</td>
                                  </tr>   
                                  
                                 
                                                                 <tr>
                                      <td > מספר מודעה:</td>
                                      <td >{{ $res[0]->id_announcement }}</td>
                                  </tr>  


                                  <tr>
                                      <td > התקלה  :</td>
                                      <td >{{ $res[0]->problem_text }}</td>
                                  </tr>   


                                  <tr>
                                      <td > טופל / לא טופל:</td>
                                      <td>
                                                @switch($res[0]->status)
                                                @case(0)
                                                      <input type="checkbox" id="status_of_problem" name="status_of_problem" value=" {{  $res[0]->status   }}"><span class='tobalText'>לא טופל</span><br>
                                                    @break
                                            
                                                @case(1)
                                                     <input type="checkbox" id="status_of_problem" checked name="status_of_problem" value=" {{  $res[0]->status   }}"><span class='tobalText'>טופל</span><br>
                                                    @break
                                            @endswitch


                                      </td>
                                  </tr>   
                             



                                  <tr>
                                      <td >  תאריך תקלה:</td>
                                      <td >
                                          
                                        {{date('Y-m-d', strtotime($res[0]->created_at))}}  
                                          
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

