<template>

                <!-- <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                            <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                        </a>
                </li> -->


 <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">{{transaksi.length + message.length }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div style="padding: 10px; overflow: scroll; height: 300px;">

              <a v-for="msg in message" v-bind:href="'/administrator/view-order-lihatpendaki/'+msg.token"  class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nama Pengirim {{msg.id_order}}
                      <span class="float-right text-sm text-success"><i class="fas fa-search-dollar"></i></span>
                    </h3>
                    <p class="text-sm">Bank: {{msg.bank}} || Token {{ msg.token }}</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>

               <a v-for="trens in transaksi" v-bind:href="'/administrator/view-order-lihatpendaki/'+trens.token_pendakian"  class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nama Pengirim {{ trens.nama_pengirim }}
                      <span class="float-right text-sm text-success"><i class="fas fa-search-dollar"></i></span>
                    </h3>
                    <p class="text-sm">Bank  {{ trens.bank }} || Token {{ trens.token_pendakian }}</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
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