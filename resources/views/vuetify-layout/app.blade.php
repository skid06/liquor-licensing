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
          app
          style="background:#A88442"
        ></v-navigation-drawer>
        <v-toolbar :clipped-left="primaryDrawer.clipped" app absolute >
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
        </v-toolbar>
        <v-content>
          <!-- <v-container fluid>
            <v-layout align-center justify-center>
              <v-flex xs10>
                <v-card>
                  <v-card-text>
                    <v-layout row wrap>
                      <v-flex xs12 md6>
                        <span>Scheme</span>
                        <v-switch v-model="dark" primary label="Dark"></v-switch>
                      </v-flex>
                      <v-flex xs12 md6>
                        <span>Drawer</span>
                        <v-radio-group v-model="primaryDrawer.type" column>
                          <v-radio
                            v-for="drawer in drawers"
                            :key="drawer"
                            :label="drawer"
                            :value="drawer.toLowerCase()"
                            primary
                          ></v-radio>
                        </v-radio-group>
                        <v-switch v-model="primaryDrawer.clipped" label="Clipped" primary></v-switch>
                        <v-switch v-model="primaryDrawer.floating" label="Floating" primary></v-switch>
                        <v-switch v-model="primaryDrawer.mini" label="Mini" primary></v-switch>
                      </v-flex>
                      <v-flex xs12 md6>
                        <span>Footer</span>
                        <v-switch v-model="footer.inset" label="Inset" primary></v-switch>
                      </v-flex>
                    </v-layout>
                  </v-card-text>
                  <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn flat>Cancel</v-btn>
                    <v-btn flat color="primary">Submit</v-btn>
                  </v-card-actions>
                </v-card>
              </v-flex>
            </v-layout>
          </v-container> -->
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