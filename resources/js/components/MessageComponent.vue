<template>

                <!-- <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                            <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                        </a>
                </li> -->

                <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell-outline noti-icon"></i>

                    <span class="badge badge-pill badge-danger noti-icon-badge">{{transaksi.length + message.length }}</span>
                    
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-10">
                        <!-- item-->
                        <h6 class="dropdown-item-text">
                                Notifications
                            </h6>
                        <div class="slimscroll notification-item-list" style="overflow: hidden;width: auto;height: 400px;">
                            <!-- item-->

                            
                            <!-- <message-component></message-component> -->
                      
                          <a v-for="msg in message" v-bind:href="'/administrator/view-order-lihatpendaki/'+msg.token" class="dropdown-item notify-item active">
                                                          <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                                          <p class="notify-details"><b> Nama Pengirim {{msg.id_order}}</b><span class="text-muted">
                                                            Bank: {{msg.bank}} || {{ msg.token }}
                                                          </span></p>
                          </a>

                      
                                <a v-for="trens in transaksi" v-bind:href="'/administrator/view-order-lihatpendaki/'+trens.token_pendakian" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details"><b> Nama Pengirim {{ trens.nama_pengirim }}</b><span class="text-muted">
                                      Token Pendakian {{ trens.bank }} {{ trens.token_pendakian }}</span></p>
                                </a>
                        </div>
                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center notify-all text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                    </div>
                </li>
    
    <!-- <h6 style="color: #fff">
      {{message.length}} |||
      {{transaksi.length}} + {{message.length}} |||
      {{transaksi.length + message.length }}
    </h6> -->
    <!-- <p v-for="msg in message">
    <a href="#" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details"><b> Nama Pengirim {{msg.user}}</b><span class="text-muted">
                                      Token Pendakian {{msg.message}}
                                      {{message.length}}
                                    </span></p>
    </a>
    </p> -->
</template>
<script>
export default {
  // props: ['message1'],
  data() {
    return {
      message: [],
      transaksi : [],
    }
  },
  created(){
    axios
    .get("/administrator/transaksi-count")
    .then(response => {
      this.transaksi = response.data;
    })
  },
  mounted(){
//    console.log("Mounted app message");
//    // Enable pusher logging - don't include this in production
//     Pusher.logToConsole = true;
//     const APP_KEY = 'XXXXXXXXXXXXXXXXXXXX'
//     var pusher = new Pusher(APP_KEY, {
//       cluster: 'us2',
//       forceTLS: true
//     });
//     const self = this
//     var channel = pusher.subscribe('channel-tutofox');
//     channel.bind('event-pusher', function(data) {
//       // app.messages.push(JSON.stringify(data));
//       const message = self.message
//       message.push(data.data)
//     }); 
    console.log("Mounted component meessag");

    Pusher.logToConsole = true;

    var pusher = new Pusher('a4edc754362cd87376e4', {
      cluster: 'ap1',
      forceTLS: true
    });
    const this2 = this
    // const this3 = this
    var channel = pusher.subscribe('channel-tutofox');
    channel.bind('event-pusher', function(data) {
    //   app.messages.push(JSON.stringify(data));
    console.log(data);
    const message = this2.message
    // const message1 = this3.message
    message.push(data.data)
    // message1.push(data.data)
    });

    // Vue application
    // const app = new Vue({
    //   el: '#app',
    //   data: {
    //     messages: [],
    //   },
    // });
  }
}
</script>