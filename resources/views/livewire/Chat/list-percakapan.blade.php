<div>

    <div class="container">
    <h3 class=" text-center">Messaging</h3>
    <div class="messaging">
          <div class="inbox_msg">
            <div class="inbox_people">
              <div class="headind_srch">
                <div class="recent_heading">
                  <h4>Recent</h4>
                </div>
                <div class="srch_bar">
                  <div class="stylish-input-group">
                    <input type="text" class="search-bar"  placeholder="Search" >
                    <span class="input-group-addon">
                    <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                    </span> </div>
                </div>
              </div>
              <div class="inbox_chat">

                @foreach ($percakapans as $item)

                @php
                    $string = mt_rand(15, 20);

                    $date = date(now());

                    if ($date = now()) {
                      echo 'today';
                    } else {
                      $date;
                    }
                @endphp
                    
                <div class="chat_list active_chat">
                  <div class="chat_people">
                    <div class="chat_img"> <img src="https://randomuser.me/api/portraits/women/{{ $string }}.jpg" alt="sunil"> </div>
                    <div class="chat_ib">
                      <h5>{{ $item->Penerima->name }} <span class="chat_date">{{ $item->created_at->format($date->created_at) }}</span></h5>
                      <p>Test, which is a new approach to have all solutions 
                        astrology under one roof.</p>
                    </div>
                  </div>
                </div>
                  @endforeach

                  
              </div>
            </div>
            
            <div class="mesgs">
                
              <div class="msg_history">

                <div class="incoming_msg">
                  <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                  <div class="received_msg">
                    <div class="received_withd_msg">
                      <p>Test which is a new approach to have all
                        solutions</p>
                      <span class="time_date"> 11:01 AM    |    June 9</span></div>
                  </div>
                </div>
                <div class="outgoing_msg">
                  <div class="sent_msg">
                    <p>Test which is a new approach to have all
                      solutions</p>
                    <span class="time_date"> 11:01 AM    |    June 9</span> </div>
                </div>
                

              </div>
              
              <div class="type_msg">
                <div class="input_msg_write">
                  <input type="text" class="write_msg" placeholder="Type a message" />
                  <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </div>
              </div>
            </div>
          </div>
          
          
          <p class="text-center top_spac"> Design by <a target="_blank" href="https://www.linkedin.com/in/sunil-rajput-nattho-singh/">Sunil Rajput</a></p>
          
        </div>
    </div>
    {{-- <h1>Test</h1> --}}
    
    
    </div>
    