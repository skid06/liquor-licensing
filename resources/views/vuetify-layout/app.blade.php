<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Laravel</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"> -->
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
          v-if="userType != null"
          app>
          <v-list>
            <v-list-tile @click="goTo(userType == 'admin' ? '/admin' : '/applications/paid')">
              <v-list-tile-action>
                <v-icon>dashboard</v-icon>
              </v-list-tile-action>
              <v-list-tile-title v-if="userType == 'admin'">Admin Dashboard</v-list-tile-title>
              <v-list-tile-title v-if="userType == 'user'">User Dashboard</v-list-tile-title>
            </v-list-tile>

            <v-list-tile v-if="userType == 'admin'" @click="goTo(`/admin/payments`)">
              <v-list-tile-action>
                <v-icon>transform</v-icon>
              </v-list-tile-action>
              <v-list-tile-title>Transactions</v-list-tile-title>
            </v-list-tile>            

            <v-list-group
              prepend-icon="assignment"
              value="true"
              v-if="userType == 'user'"
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
                  <v-list-tile-title v-text="application.text"></v-list-tile-title>
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
        <v-toolbar :clipped-left="primaryDrawer.clipped" color="#A88442" app absolute >
          <v-toolbar-side-icon
            v-if="primaryDrawer.type !== 'permanent' && type !== null "
            @click.stop="primaryDrawer.model = !primaryDrawer.model"
          ></v-toolbar-side-icon>
          <v-toolbar-title>
            <v-img
              src="http://209.188.93.46/~lovesparkil/wp-content/uploads/2019/02/lp-logo.png"
              height="70"
              width="185">
            </v-img>
          </v-toolbar-title>
          <v-toolbar-items class="hidden-sm-and-down" v-if="userType != null">
          <v-autocomplete
            v-model="select"
            :search-input.sync="search"
            cache-items
            class="mt-2 ml-5"
            flat
            hide-no-data
            hide-details
            label="Search Applications..."
            solo-inverted
          ></v-autocomplete>
          <v-btn icon>
            <v-icon>more_vert</v-icon>
          </v-btn>
          </v-toolbar-items>          
          <v-spacer></v-spacer>
          <v-layout
            justify-space-around
            wrap
            v-if="userType != null"
          >
            <v-badge overlap>
              <template v-slot:badge>
                <span>3</span>
              </template>

              <v-avatar
                color="purple red--after"
                size="40"
              >
                <v-icon dark>notifications</v-icon>
              </v-avatar>
            </v-badge>

            <v-btn class="show-overflow" icon dark @click="logout(userType == 'admin' ? 'admin' : 'user')">
              <v-avatar 
                color="indigo" 
                size="40">
                  <v-icon dark>account_circle</v-icon>
              </v-avatar>           
            </v-btn>

            <!-- <v-avatar size="40">
              <img
                src="https://cdn.vuetifyjs.com/images/john.jpg"
                alt="John"
              >
            </v-avatar>             -->
          </v-layout>            
        </v-toolbar>
        <v-content>
          <v-container>

            @yield('content')
            
          </v-container>
        </v-content>
        <v-footer :inset="footer.inset" app>
          
        </v-footer>
      </v-app>
      </div>
      <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>