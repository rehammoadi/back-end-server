  @extends('layouts.app')
  @extends('layouts.header')
  @section('content')
          <div class="row">

              <div class="col-lg-12 col-md-12">
                  <div class="card">
                    <div class="card-header card-header-tabs card-header-primary">
                      <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                          <span class="nav-tabs-title">משתמשים</span>
                        
                        </div>
                      </div>
                    </div>
                    
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                          <table id="appUsersListTbl" class="table display" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>שם מלא</th>
                                      <th>דוא״ל</th>
                                      <th>מספר טלפון</th>
                                      <th>שם משתמש</th>
                                      <th>פעיל/לא פעיל</th>
                                      <th>תאריך הרשמה</th>
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

     