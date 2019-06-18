<template>
  <div class="text-xs-center">
    <v-dialog
      v-model="dialog"
      width="500"
    >
      <template v-slot:activator="{ on }">
        <v-btn
          color="red lighten-1"
          dark
          v-on="on"
          style="position: fixed; bottom: 50px; right: 200px; "
          
        >
          Notes &nbsp;
          <v-icon dark>edit</v-icon>         
        </v-btn>
      </template>
      <div class="modal-content mt-element-list">
        <div class="modal-header mt-list-head list-simple ext-1 font-white bg-green-sharp">
          <div class="list-head-title-container">
            <h3 class="modal-title list-title" style="color: white;">Notes</h3>
          </div>
        </div>
        <div class="modal-body mt-element-list">
          <div class="mt-list-container list-simple ext-1">
            <ul>
              <li class="mt-list-item done" v-for="log in messages" :key="log.id">
                <div class="list-icon-container">
                  <span style="font-size:10px;"> {{ log.admin_id == null ? 'You' : 'Admin' }}  </span>
                </div>
                <div class="list-datetime"> {{ log.created_at | moment("from", "now") }} </div>
                <div class="list-item-content">
                  <p class="body-message">
                    <a href="javascript:;">{{ log.message }}</a>
                  </p>
                </div>
              </li>
            </ul>
          </div>
          <div class="form-group mt">
            <textarea class="form-control" id="message" v-model="form.message" placeholder="Enter New Message"></textarea>
          </div>
          <v-btn
            class="success"
            style="font-size:12px"
            flat
            @click="postNote()"
          >
            Add Note
          </v-btn>           
          <div :class="{'form-group': true, 'alert-danger': withError}" style="">
            <ul>
              <li v-for="error in errors.message" :key="error">{{ error }}</li>
            </ul>
          </div>

          <div :class="{ hide: isHide, 'alert': true, 'alert-success': true }" style="float: left">
              {{ success_message }}
          </div>           
        </div>
        <div class="modal-footer">               
          <v-btn
            class="primary"
            flat
            @click="process(app_id)"
            v-if="userType == 'admin'"
            style="font-size:12px"
          >
            Processed
          </v-btn>
          <v-btn
            class="error"
            style="font-size:12px"
            flat
            @if="processBtn"
            @click="dialog = false"
          >
            Close
          </v-btn>
        </div>
      </div>
    </v-dialog>
  </div>   
</template>
<script>
export default {
  data() {
    return {
      dialog: false,
      isHide: true,
      success_message: '',
      messages: [],
      withError: false,
      errors: [],
      form: {
        message: ''
      },
      processBtn: false,
      userType: null,
      id: ''
    }
  },
  props:['app_id'],
  methods: {
    getNotes(){
      axios
        .get(`/user/applications/${this.app_id}/notes`)
        .then(response => {
          console.log(response.data)
          this.messages = response.data
        })
    },
    postNote(){
      this.isHide = true
      axios
        .post(`/user/applications/${this.app_id}/notes`, { message: this.form.message })
        .then(response => {
          this.messages.push(response.data.note)
          console.log(response.data)
          this.form = {}
          this.errors = []
          this.withError = false
          this.isHide = false
          this.success_message = response.data.message
        })
        .catch(err => {
          // this.$store.commit("login_failed", 'Wrong email or password.')
          this.errors = err.response.data.errors
          this.withError = true
          this.isHide = true
          console.log({err})
        })        
    },
    process(id){
      axios
        .post(`/user/applications/${id}/processed`)
        .then(response => {
          console.log(response)
          this.isHide = false
          this.success_message = "You have successfully processed this application."
        })
    },
    getUserType(){
      axios
        .get('/user/type')
        .then( (response) => this.userType = response.data.type)
    }           
  },
  mounted(){
    this.getNotes()
    this.getUserType()
    this.id = this.app_id
  }
}
</script>
<style scoped>
.hide{
    display: none
}
.alert-danger {
  display: block;
  margin-top: 10px;
  background: none
}
.uppercase{
  text-align: center !important;
}
.form-group.mt{
  margin-top:50px;
}
.mt-element-list .list-default.ext-1.mt-list-container ul>.mt-list-item:hover{background-color:#e5e5e5
}
.btn-default {
  color: #333;
  background-color: #fff;
  border-color: #ccc;
}
.mt-element-list .list-simple.mt-list-container ul>.mt-list-item>.list-datetime {
  text-align: right !important;
  float: right !important;
  width: 91px !important;
  font-size: 10px !important;
}
.mt-element-list .list-simple.mt-list-head {
    padding: 15px;
}
.modal .modal-header {
 border-bottom: 1px solid #EFEFEF;
}
.mt-list-head{
  background: #2ab4c0!important;
}
.mt-list-container{
  border-left: 1px solid;
  border-right: 1px solid;
  border-bottom: 1px solid;
  border-color: #e7ecf1;
}
.mt-list-container ul{
  margin-bottom: 0;
  padding: 0;
}
.modal .modal-header .close {
  margin-top: 0!important;
}
button.close {
  padding: 0;
  cursor: pointer;
  background: 0 0;
  border: 0;
  -webkit-appearance: none;
}
.mt-element-list .list-simple.ext-1.mt-list-container ul>.mt-list-item.done{
  border-color: #26C281 #26C281 #e7ecf1;
}
.mt-element-list .list-simple.ext-1.mt-list-container ul>.mt-list-item{
  padding: 15px;
  border-left: 3px solid;
}
.mt-element-list .list-simple.mt-list-container ul>.mt-list-item {
  list-style: none;
  border-bottom: 1px solid;
}
.mt-element-list .list-simple.mt-list-container ul>.mt-list-item>.list-icon-container {
  font-size: 14px;
  float: left;
}
li [class*=" icon-"], li [class^=icon-] {
  top: 1px;
  position: relative;
}
.icon-check:before {
  content: "\E080";
}
.mt-element-list .list-simple.mt-list-container ul>.mt-list-item>.list-datetime {
  text-align: right;
  float: right;
  width: 60px;
}
.mt-element-list .list-simple.mt-list-container ul>.mt-list-item>.list-item-content {
  padding: 0 75px 0 60px;
}
.list-item-content a{
  text-shadow: none;
  color: #337ab7;
}
.mt-element-list .list-simple.mt-list-head .list-title {
  margin: 0;
  padding-right: 85px;
}
.modal .modal-header h3 {
  font-weight: 300;
  color: white;
}
.modal-title {
  line-height: 1.42857;
}
.btn-popup{
  position:fixed; 
  bottom: 50px; 
  right: 200px; 
  color: #fff; 
  background-color: #e12330; 
  border-color: #e12330;
}
.hide{
  display: none;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}
.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}
.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}
input:checked + .slider {
  background-color: #2196F3;
}
input:focus + .slider {
  -webkit-box-shadow: 0 0 1px #2196F3;
          box-shadow: 0 0 1px #2196F3;
}
input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}
.slider.round:before {
  border-radius: 50%;
}
</style>
