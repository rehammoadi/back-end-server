  @extends('layouts.app')
  @extends('layouts.header')
  @section('content')

          <div class="row">
           
           
           
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">מודעות שהוסיף</p>
                  <h3 class="card-title">0</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i>  <a href="/new_announcement">פרטים נוספים</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                      <i class="material-icons">feedback </i>
                  </div>
                  <p class="card-category"> מענה על תקלות </p>
                  <h3 class="card-title">0</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> <a href="/new_announcement">פרטים נוספים</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
          
          <div class="row">

              <div class="col-lg-6 col-md-12">
                 
                <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                      <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                          <span class="nav-tabs-title"> 
                              @if ( count( $details ) > 0 )
                              פרטי משתמש :  {{ $details[0]->name }}
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

                              @if ( count( $details ) > 0 )
                                
                                  <tr>
                                      <td > שם  :</td>
                                      <td >{{ $details[0]->name }}</td>
                                  </tr>   
                                  
                                  <tr>
                                      <td > דוא״ל :</td>
                                      <td >{{ $details[0]->email }}</td>
                                  </tr>   
                                  <tr>
                                      <td >טלפון :</td>
                                      <td >{{ $details[0]->phone   }}</td>
                                  </tr>   
                                  
                                 
                                  
                                  
                                  <tr>
                                      <td >  תאריך הרשמה:</td>
                                      <td >
                                          
                                        {{date('Y-m-d', strtotime($details[0]->created_at))}}  
                                          
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