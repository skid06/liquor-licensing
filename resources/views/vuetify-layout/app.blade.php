<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>City of Love's Park</title>

        <!-- Fonts -->
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <style>
        .invoice{
            border:1px solid rgba(0, 0, 0, 0.125);
            background: white;
        }
        .spacer {
            margin-bottom: 24px;
        }
        .v-image__image--cover{background-size: 100% !important}
        .primary, .v-toolbar__content{
          background-color:#21B8EB !important
        }
        a{
          color: #21B8EB !important
        }
        .v-avatar img{
          border-radius: 25px;
        }
        /**
            * The CSS shown here will not be introduced in the Quickstart guide, but shows
            * how you can use CSS to style your Element's container.
            */
        .StripeElement {
            background-color: white;
            padding: 10px 12px;
            border-radius: 4px;
            border: 1px solid #ccd0d2;
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }
        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }
        .StripeElement--invalid {
            border-color: #fa755a;
        }
        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
        #card-errors {
            color: #fa755a;
        }        
      </style>
      <script src="https://js.stripe.com/v3/"></script>        
    </head>
    <body> 
      <div id="app">
        <v-app>
          <v-navigation-drawer
            v-model="primaryDrawer.model"
            :permanent="primaryDrawer.type === 'permanent'"
            :temporary="primaryDrawer.type === 'temporary'"
            :clipped="primaryDrawer.clipped"
            :floating="primaryDrawer.floating"
            :mini-variant="primaryDrawer.mini"
            absolute
            overflow
            class="grey lighten-4"
            v-if="getType != null"
            app>
            <v-list>
              <v-list-tile @click="goTo(getType == 'admin' ? '/admin' : '/applications/paid')">
                <v-list-tile-action>
                  <v-icon>dashboard</v-icon>
                </v-list-tile-action>
                <v-list-tile-title v-if="getType == 'admin'"> Admin Dashboard</v-list-tile-title>
                <v-list-tile-title v-if="getType == 'user'">User Dashboard</v-list-tile-title>
                <v-list-tile-title v-if="getType == 'official'">Official Dashboard</v-list-tile-title>
              </v-list-tile>

              <v-list-tile v-if="getType == 'admin'" @click="goTo(`/admin/payments`)">
                <v-list-tile-action>
                  <v-icon>transform</v-icon>
                </v-list-tile-action>
                <v-list-tile-title>Transactions</v-list-tile-title>
              </v-list-tile>            

              <v-list-group
                prepend-icon="assignment"
                value="true"
                v-if="getType == 'user'"
              >
                <template v-slot:activator>
                  <v-list-tile>
                    <v-list-tile-title>Licensing Applications</v-list-tile-title>
                  </v-list-tile>
                </template>
                <v-list-group
                  no-action
                  sub-group
                  value="true"
                >
                  <template v-slot:activator>
                    <v-list-tile>
                      <v-list-tile-title>Liquor</v-list-tile-title>
                    </v-list-tile>
                  </template>

                  <v-list-tile
                    v-for="(application, i) in applicationLinks"
                    :key="i"
                    @click="goTo(application.link)"
                  >
                    <v-list-tile-title v-text="application.text" style="color:#115c76 !important"></v-list-tile-title>
                    <v-list-tile-action>
                      <v-icon v-text="application.icon"></v-icon>
                    </v-list-tile-action>
                  </v-list-tile>
                </v-list-group>

                <v-list-group
                  sub-group
                  no-action
                >
                  <template v-slot:activator>
                    <v-list-tile>
                      <v-list-tile-title>Restaurant</v-list-tile-title>
                    </v-list-tile>
                  </template>
                  <v-list-tile
                    v-for="(crud, i) in cruds"
                    :key="i"
                    @click=""
                  >
                    <v-list-tile-title v-text="crud[0]"></v-list-tile-title>
                    <v-list-tile-action>
                      <v-icon v-text="crud[1]"></v-icon>
                    </v-list-tile-action>
                  </v-list-tile>
                </v-list-group>
              </v-list-group>
            </v-list>        
          </v-navigation-drawer>
          <!-- @include('vuetify-layout.partials.navigation-drawer') -->
          <v-toolbar :clipped-left="primaryDrawer.clipped" color="#404041" app absolute >
            <v-toolbar-side-icon
              v-if="primaryDrawer.type !== 'permanent' && getType !== null "
              @click.stop="primaryDrawer.model = !primaryDrawer.model"
            ></v-toolbar-side-icon>
            <v-toolbar-title style="background-size: 100%">
              <v-img
                src="http://civicsimple.com/wp-content/uploads/2019/06/civicsimple-logo-white.png"
                height="70"
                width="220"
                >
              </v-img>
            </v-toolbar-title>
            <v-toolbar-items class="hidden-sm-and-down" v-if="getType != null">
            <v-autocomplete
              v-model="select"
              :search-input.sync="search"
              cache-items
              :items="['test', 'test2', 'fd']"
              class="mt-2 ml-5"
              flat
              hide-no-data
              hide-details
              label="Search Applications..."
              solo-inverted
              dark
            ></v-autocomplete>
            <v-btn icon>
              <v-icon>more_vert</v-icon>
            </v-btn>
            </v-toolbar-items>          
            <v-spacer></v-spacer>
            <v-layout
              justify-space-around
              wrap
              v-if="getType != null"
            >
              <!-- <v-badge overlap>
                <template v-slot:badge>
                  <span>3</span>
                </template>

                <v-avatar
                  color="purple red--after"
                  size="40"
                >
                  <v-icon dark>notifications</v-icon>
                </v-avatar>
              </v-badge> -->

              <!-- <v-btn class="show-overflow" icon dark @click="logout(getType == 'admin' ? 'admin' : 'user')">
                <v-avatar 
                  color="indigo" 
                  size="40">
                    <v-icon dark>account_circle</v-icon>
                </v-avatar>           
              </v-btn> -->

              <div class="text-xs">
                <v-menu
                  v-model="menu"
                  :close-on-content-click="false"
                  :z-index="3"
                  :nudge-top="40"
                >
                  <template v-slot:activator="{ on }">
                    <v-btn
                      icon
                      dark
                      v-on="on"
                      class="show-overflow" 
                      
                    >
                      <v-avatar 
                        color="" 
                        size="40">
                          <!-- <v-icon dark>account_circle</v-icon> -->
                          <img src="/storage/avatars/cs-icon.png">
                      </v-avatar>  
                    </v-btn>
                    <v-toolbar-items style="display: inline-block !important;">
                      <span flat class="v-btn__content ml-4" style="font-size: 20px; font-family:'Montserrat', sans-serif !important; color: white !important;top: 7px; left: -20px;">Loves Park, Illinois</span>
                    </v-toolbar-items>                    
                  </template>

                  <v-card>
                    <v-list style="height:40px !important;">
                      <v-list-tile avatar>
                        <v-list-tile-avatar>
                          <img :src="`/storage/${getUser.image}`">
                        </v-list-tile-avatar>
                      </v-list-tile>
                    </v-list>

                    <v-divider></v-divider>

                    <v-list>
                      <v-list-tile avatar>
                        <v-list-tile-avatar>
                          
                        </v-list-tile-avatar>

                        <v-list-tile-content color="primary">
                          <v-list-tile-title v-text="getUser.name"></v-list-tile-title>
                          <v-list-tile-sub-title>
                            <a href="/profile" v-if="getType == 'user'">Edit Profile</a>
                            <a href="/admin/profile" v-if="getType == 'admin'">Edit Profile</a>
                          </v-list-tile-sub-title>
                        </v-list-tile-content>

                        <v-list-tile-action>
                          <v-btn
                            :class="fav ? 'red--text' : ''"
                            icon
                            @click="fav = !fav"
                          >
                            <!-- <v-icon>favorite</v-icon> -->
                          </v-btn>
                        </v-list-tile-action>
                      </v-list-tile>                      
                      <!-- <v-list-tile>
                        <v-list-tile-action>
                          <v-switch v-model="message" color="purple"></v-switch>
                        </v-list-tile-action>
                        <v-list-tile-title>Enable messages</v-list-tile-title>
                      </v-list-tile> -->

                      <v-list-tile @click="logout((getType == 'admin') ? 'admin' : 'user')">
                        <v-list-tile-action>
                          <v-switch v-model="hints" color="purple"></v-switch>
                        </v-list-tile-action>
                        <v-list-tile-title>Logout</v-list-tile-title>
                      </v-list-tile>
                    </v-list>

                    <!-- <v-card-actions>
                      <v-spacer></v-spacer>

                      <v-btn flat @click="menu = false">Cancel</v-btn>
                      <v-btn color="primary" flat @click="menu = false">Save</v-btn>
                    </v-card-actions> -->
                  </v-card>
                </v-menu>
              </div>              
            </v-layout>            
          </v-toolbar>
          <v-content>
            <v-container>
             
              @yield('content')
              
            </v-container>
          </v-content>
          <v-footer :inset="footer.inset" app style="background-color: #115c76">
            <div style="margin: 0 auto; color: white">Powered by Civic Simple © 2019 | All Rights Reserved</div>
          </v-footer>
        </v-app>
      </div>
      <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>