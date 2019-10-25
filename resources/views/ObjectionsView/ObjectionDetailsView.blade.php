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
                              פרטי ערעור שנוצר ע״י  :  {{ $res[0]->name }}
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
                                      <td >{{ $res[0]->name_req }}</td>
                                  </tr>   
                                  
                                  <tr>
                                      <td > מספר גוש :</td>
                                      <td >{{ $res[0]->block_number }}</td>
                                  </tr>   
                                  <tr>
                                      <td >תאור :</td>
                                      <td >{{ $res[0]->cause_text   }}</td>
                                  </tr>   
                                  
                                  <tr>
                                      <td > מספר מודעה:</td>
                                      <td >{{ $res[0]->announcement_id }}</td>
                                  </tr>  

                                  <tr>
                                      <td > טופל / לא טופל:</td>
                                      <td>
                                                @switch($res[0]->processed)
                                                @case(0)
                                                      <input type="checkbox" id="status_of_obj" name="status_of_obj" value=" {{  $res[0]->processed   }}"><span class='tobalText'>לא טופל</span><br>
                                                    @break
                                            
                                                @case(1)
                                                     <input type="checkbox" id="status_of_obj" checked name="status_of_obj" value=" {{  $res[0]->processed   }}"><span class='tobalText'>טופל</span><br>
                                                    @break
                                            @endswitch


                                      </td>
                                  </tr>   
                                 
                                  <tr>
                                      <td >  תאריך ערעור:</td>
                                      <td >
                                          
                                        {{date('Y-m-d', strtotime($res[0]->created_at))}}  
                                          
                                      </td>
                                  </tr>    
                                  <tr>
                                      <td > החלטה </td>
                                      <td >
                                          
                                         {{-- <button type="submit"  class="btn btn-primary" onclick="objectionTobal({{$res[0]->id}})">
                                             
                                           מאושר                        
                                             
                                          </button>   --}}
                                        <textarea style="width:100%;" type="text" name="hahlata" id="hahlata" > {{$res[0]->hahlata}}</textarea>    
                                      </td>
                                  </tr>    
                                  <tr>
                                      <td >  </td>
                                      <td >
                                          <input type="hidden" id="idObj" value="{{$res[0]->id}}"/>
                                        <button type="submit"  class="btn btn-primary" id="objectionHahlata">
                                             
                                          עדכן                        
                                            
                                         </button> 
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

