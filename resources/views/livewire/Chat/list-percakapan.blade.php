<div>

    <div class="container">
    <h3 class=" text-center">Chat</h3>
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

                {{--
                   foreach ini hanya untuk looping data 
                  percakapan yang diambil data users saja seperti ( nama, email, dll )  
                  note: sambil liat model percakapan
                --}}
                @foreach ($percakapans as $item)

                @php
                    // for random image
                    $string = mt_rand(15, 20);

                    $date = date(now());

                @endphp

              {{ dd(auth()->id()) }}
                    
                <div class="chat_list {{ $item->id === $pilihanPesan->id ? 'active_chat' : '' }}" style="cursor: pointer">

                  <div class="chat_people" wire:click.prevent='viewPesan({{ $item->id }})'>
                    <div class="chat_img"> <img src="https://randomuser.me/api/portraits/women/{{ $string }}.jpg" alt="sunil"> </div>
                    <div class="chat_ib">

                    @if (!is_null($item->pesan->first()))
                                           
                     <h5>{{ $item->penerima->name }} <span class="chat_date">{{ $date = now() ?  'Today ' : 'Yesterday ' }}{{ $item->pesan->first()->created_at->format($date ? 'H:i' : 'd/m/Y H:i') }}</span></h5>
                     <p>{{$item->pesan->last()->body}}</p>

                     @endif 

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

                  @if (!is_null($pilihanPesan))
                      
                      @foreach ($pilihanPesan->pesan as $message)
                      <div class="received_msg">
                        <div class="received_withd_msg">
                          <p>{{$message->body}}</p>
                          <span class="time_date">{{$message->created_at->format('H:i:s')}}</span></div>
                        </div>
                        @endforeach

                    @endif

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
    