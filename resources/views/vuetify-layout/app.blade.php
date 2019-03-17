<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"> -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
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
          app>
          <v-list>
            <v-list-tile>
              <v-list-tile-action>
                <v-icon>dashboard</v-icon>
              </v-list-tile-action>
              <v-list-tile-title>Dashboard</v-list-tile-title>
            </v-list-tile>

            <v-list-group
              prepend-icon="assignment"
              value="true"
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
                  v-for="(application, i) in applications"
                  :key="i"
                  @click=""
                >
                  <v-list-tile-title v-text="application[0]"></v-list-tile-title>
                  <v-list-tile-action>
                    <v-icon v-text="application[1]"></v-icon>
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
            v-if="primaryDrawer.type !== 'permanent'"
            @click.stop="primaryDrawer.model = !primaryDrawer.model"
          ></v-toolbar-side-icon>
          <v-toolbar-title>
            <v-img
              src="http://209.188.93.46/~lovesparkil/wp-content/uploads/2019/02/lp-logo.png"
              height="70"
              width="185">
            </v-img>
          </v-toolbar-title>
          <v-toolbar-items class="hidden-sm-and-down">
          <v-autocomplete
            v-model="select"
            :loading="loading"
            :items="items"
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
          >
            <v-avatar 
              color="indigo" 
              size="40">
                <v-icon dark>account_circle</v-icon>
            </v-avatar>

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

            <v-avatar size="40">
              <img
                src="https://cdn.vuetifyjs.com/images/john.jpg"
                alt="John"
              >
            </v-avatar>            
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