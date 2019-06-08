  @extends('layouts.app')
  @extends('layouts.header')
  @section('content')
  <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
              <a class="navbar-brand" href="#pablo">בקשות<div class="ripple-container"></div></a>
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

              <div class="col-lg-12 col-md-12">
                  <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                      <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                          <span class="nav-tabs-title">בקשות שהתקבלו</span>
                        
                        </div>
                      </div>
                    </div>
                    
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                          <table id="usersRequestsTbl" class="table display" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>שם מלא</th>
                                      <th>ת״ז</th>
                                      <th>מספר חלקה</th>
                                      <th>מספר גוש</th>
                                      <th>כמות מטרים</th>
                                      <th>תקציר הבקשה</th>
                                      <th>תאריך הבקשה</th>
                                      <th>פרטים נוספים</th>
                                      
                                  </tr>
                              </thead>
                            <tbody>
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

     