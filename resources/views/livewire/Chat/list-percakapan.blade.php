<div>

    <div class="container" wire:poll>
    <h3 class=" text-center">Chat</h3>
    <div class="messaging">
          <div class="inbox_msg">
            <div class="inbox_people">
              <div class="headind_srch">
                <div class="recent_heading">
                  <h4>Recent {{ Auth::user()->name }}</h4>
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
                    
                    @if (!is_null($item->pesan->first()))    

                         <div class="chat_list {{ $item->id === $pilihanPesan->id ? 'active_chat' : '' }}" style="cursor: pointer">

                          <div class="chat_people" wire:click.prevent='viewPesan({{ $item->id }})'>
                            <div class="chat_img"> <img src="https://randomuser.me/api/portraits/women/{{ $string }}.jpg" alt="sunil"> </div>
                            <div class="chat_ib">

                            <h5>{{ $item->pengirim_id === auth()->id() ? $item->penerima->name : $item->pengirim->name }} 
                              <span class="chat_date">
                                {{ $date = now() ?  'Today ' : 'Yesterday ' }}{{ $item->pesan->first()->created_at->format($date ? 'H:i' : 'd/m/Y H:i') }}
                              </span>
                            </h5>
                            <p>{{$item->pesan->last()->body}}</p>

                            </div>
                          </div>
                        </div>
                    

                    @endif 

                @endforeach

                  
              </div>
            </div>
            
            <div class="mesgs">
                
              <div class="msg_history">

                {{-- Jika tidak ada pesan --}}
                @if (!is_null($pilihanPesan))
                      
                  @foreach ($pilihanPesan->pesan as $message)

                  {{-- Kondisi untuk penerima dan pengirim --}}
                      @if ($message->users_id === auth()->id())
                      <div class="outgoing_msg">
                        <div class="sent_msg">
                          <p>{{$message->body}}</p>
                          <span class="time_date"> {{$message->created_at->format('H:i:s')}} </span>
                        </div>
                      </div>

                      @else
                    
                        <div class="incoming_msg">
                          <div class="incoming_msg_img">
                          </div>

                              <div class="received_msg">
                                <div class="received_withd_msg">
                                  <p>{{$message->body}}</p>
                                  <span class="time_date">{{$message->created_at->format('H:i:s')}}</span>
                                </div>
                              </div>

                        </div>   
                      @endif
  
                  @endforeach

                @endif

              </div>

              
                
              <div class="type_msg">

                {{-- input message --}}
                <form class="input_msg_write" autocomplete="off" wire:submit.prevent="isiChat">

                  <input type="text" class="write_msg" placeholder="Type a message" wire:model.defer="body" />
                  <button class="msg_send_btn" type="submit">
                    <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                  </button>

                </form>
              </div>
            </div>
          </div>
          
          
          <p class="text-center top_spac"> Design by <a target="_blank" href="https://www.linkedin.com/in/sunil-rajput-nattho-singh/">Sunil Rajput</a></p>
          
        </div>
    </div>
    {{-- <h1>Test</h1> --}}
    
-    
    </div>
    