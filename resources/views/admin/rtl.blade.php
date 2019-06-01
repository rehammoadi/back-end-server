  @extends('layouts.app')
  @extends('layouts.header')
  @section('content')
  <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
              <a class="navbar-brand" href="#pablo">מסך ראשי<div class="ripple-container"></div></a>
            </div>

          
      
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                      <li>
                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              התנתק
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form> 
                      </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                 
                  <p class="card-category">מודעות</p>
                  <h3 class="card-title"> 
                  @if ( count( $res ) > 0 )
                    {{$res['number_of_notices']}}
                  @endif
                    <small> מודעות</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">add</i>
                    <a href="/new_announcement">הוספת מודעה חדשה</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">כמות משתמים</p>
                  <h3 class="card-title">  
                    @if ( count( $res ) > 0 )
                      {{$res['number_of_users']}}
                    @endif</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">בחירה</p>
                  <h3 class="card-title">0</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">בחירה</p>
                  <h3 class="card-title">0</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i>
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
                          <span class="nav-tabs-title">מודעות אחרונות שנוספו על ידי עובדים</span>
                        
                        </div>
                      </div>
                    </div>
                    
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                          <table class="table">
                            <tbody>

                              @if ( count( $res ) > 0 )
                                @foreach ($res['last_notices'] as $noti)
                                  <tr>
                                      <td style="width: 100%;">{{ $noti->title }}</td>
                                    

                                      <td class="td-actions" style="float: left;" >
                                      
                                        <a href="/view_announcement/{{ $noti->id }}" type="button" rel="tooltip" class="btn btn-primary btn-link btn-sm">
                                            עריכה <i class="material-icons">edit</i>
                                        </a>
                                    
                                      </td>
                                    </tr>


                                 @endforeach
                              @endif
                              

                              
                                
                                
                            </tbody>
                          </table>
                        </div>
                        
                      
                      </div>
                    </div>
                  </div>
                </div>





                <div class="col-lg-6 col-md-12">
                    <div class="card">
                      <div class="card-header card-header-tabs card-header-primary">
                        <div class="nav-tabs-navigation">
                          <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">משתמשים אחרונים שנרשמו למערכת</span>
                          
                          </div>
                        </div>
                      </div>
                      
                      <div class="card-body">
                        <div class="tab-content">
                          <div class="tab-pane active" id="profile">
                            <table class="table">
                              <tbody>
                               
                                 <tr>
                                  <td>משתמש א</td>
                                  <td class="td-actions" style="float: left;">
                                    <button type="button" rel="tooltip" class="btn btn-primary btn-link btn-sm text-left">
                                      <i class="material-icons">edit</i>
                                    </button>
                                
                                  </td>
                                </tr>
                                  
                                  
                              </tbody>
                            </table>
                          </div>
                          
                        
                        </div>
                      </div>
                    </div>
                  </div>
       
          </div>
    
        </div>
        @endsection

        @extends('layouts.footer')