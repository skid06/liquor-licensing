<template>
  <div class="row">
    <div class="col-md-12" style="margin-bottom:10px;">
      <div class="actions">
        <div class="btn-group">
          <a class="btn green btn-circle btn-sm" title="Advance Search" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"><span class="filter-button">
                                      <i class="fa fa-filter" aria-hidden="true"></i> Filter</span>

                                  </a>
          <ul class="dropdown-menu filter dropdown-menu-default"><a title="Advance Search" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"></a>
              <li>
                  <a title="Advance Search" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"></a>                                    
                  <a class="onclickrefresh" @click="filterDate('day', 1)" href="#">Today</a>
              </li>                                
              <li>
                  <a class="onclickrefresh" @click="filterDate('day', 2)" href="#">Yesterday</a>
              </li>
              <li>
                  <a class="onclickrefresh" @click="filterDate('day', 7)" href="#">Past 7 Days</a>
              </li>
              <li>
                  <a class="onclickrefresh" @click="filterDate('month', 1)" href="#">This month</a>
              </li>
              <li>
                  <a class="onclickrefresh" @click="filterDate('month', 3)" href="#">Past 3 months</a>
              </li>
              <li>
                  <a class="onclickrefresh" @click="filterDate('month', 6)" href="#">Past 6 months</a>
              </li>
              <li>
                  <a class="onclickrefresh" @click="filterDate('year', 1)" href="#">This year</a>
              </li>
              <li>
                  <a class="onclickrefresh" @click="filterDate('year', 1)" href="#">Last year</a>
              </li>                                
              <li>
                  <a class="onclickrefresh" @click="filterDate()" href="#">All Time</a>
              </li>
              <li>
                  <a href="#">Custom: <input class="homepage-date-input" type="text" name="daterange" value="01/01/2015 - 01/31/2015"></a>
              </li>

          </ul>
        </div>
      </div>  
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
        <div class="dashboard-stat blue">
            <div class="visual">
                <i class="fa fa-briefcase fa-icon-medium"></i>
            </div>
            <div class="details">
                <div class="number"> ${{ totalSales }} </div>
                <div class="desc"> Total Sales </div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat red">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number"> {{ processedCount }}  </div>
                <div class="desc"> Processed Applications </div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat green">
            <div class="visual">
                <i class="fa fa-group fa-icon-medium"></i>
            </div>
            <div class="details">
                <div class="number"> {{ completedCount }}  </div>
                <div class="desc"> Completed Applications </div>
            </div>
            <a class="more" href="javascript:;"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>

    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share font-blue"></i>
                    <span class="caption-subject font-blue bold uppercase">Overview</span>
                    <span class="caption-helper">report overview...</span>
                </div>
                <div class="actions">
                    <div class="btn-group">
                        <a class="btn green btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:;"> All Project </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="javascript:;"> AirAsia </a>
                            </li>
                            <li>
                                <a href="javascript:;"> Cruise </a>
                            </li>
                            <li>
                                <a href="javascript:;"> HSBC </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="javascript:;"> Pending
                                    <span class="badge badge-danger"> 4 </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;"> Completed
                                    <span class="badge badge-success"> 12 </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;"> Overdue
                                    <span class="badge badge-warning"> 9 </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs">
                        <li class="">
                            <a href="#overview_all" data-toggle="tab" aria-expanded="false"> All Applications </a>
                        </li>
                        <li class="active">
                            <a href="#overview_processed" data-toggle="tab" aria-expanded="true"> Processed </a>
                        </li>
                        <li>
                            <a href="#overview_completed" data-toggle="tab"> Completed </a>
                        </li>
                        <li>
                            <a href="#overview_expired" data-toggle="tab" aria-expanded="false"> Expired
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <!-- <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="#overview_4" data-toggle="tab">
                                        <i class="icon-bell"></i> Latest 10 Orders </a>
                                </li>
                                <li>
                                    <a href="#overview_4" data-toggle="tab">
                                        <i class="icon-info"></i> Pending Orders </a>
                                </li>
                                <li>
                                    <a href="#overview_4" data-toggle="tab">
                                        <i class="icon-speech"></i> Completed Orders </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#overview_4" data-toggle="tab">
                                        <i class="icon-settings"></i> Rejected Orders </a>
                                </li>
                            </ul> -->
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="overview_all">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th> Corporate Name </th>
                                            <th> Owner </th>
                                            <th> Status </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="application in applications.data" :key="application.id">
                                            <td>
                                                <a href="javascript:;"> {{ application.corporate_name }} </a>
                                            </td>
                                            <td> $20.00 </td>
                                            <td> {{ application.status }} </td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-sm btn-default">
                                                    <i class="fa fa-search"></i> View </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li v-bind:class="[{disabled: !applications.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="getApplications(applications.prev_page_url, 'all')">Previous</a></li>

                                        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ applications.current_page }} of {{ applications.last_page }}</a></li>
                                    
                                        <li v-bind:class="[{disabled: !applications.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="getApplications(applications.next_page_url, 'all')">Next</a></li>
                                    </ul>
                                </nav>  
                            </div>
                        </div>
                        <div class="tab-pane active" id="overview_processed">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th> Corporate Name </th>
                                            <th> Owner </th>
                                            <th> Status </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="processed in processedApplications.data" :key="processed.id">
                                            <td>
                                                <a href="javascript:;"> {{ processed.corporate_name }} </a>
                                            </td>
                                            <td> $20.00 </td>
                                            <td> {{ processed.status }} </td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-sm btn-default">
                                                    <i class="fa fa-search"></i> View </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li v-bind:class="[{disabled: !processedApplications.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="getApplications(processedApplications.prev_page_url, 'processed')">Previous</a></li>

                                        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ processedApplications.current_page }} of {{ processedApplications.last_page }}</a></li>
                                    
                                        <li v-bind:class="[{disabled: !processedApplications.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="getApplications(processedApplications.next_page_url, 'processed')">Next</a></li>
                                    </ul>
                                </nav>                                 
                            </div>
                        </div>
                        <div class="tab-pane" id="overview_completed">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th> Corporate Name </th>
                                            <th> Owner </th>
                                            <th> Status </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr v-for="completed in completedApplications.data" :key="completed.id">
                                            <td>
                                                <a href="javascript:;"> {{ completed.corporate_name }} </a>
                                            </td>
                                            <td> $20.00 </td>
                                            <td> {{ completed.status }} </td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-sm btn-default">
                                                    <i class="fa fa-search"></i> View </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li v-bind:class="[{disabled: !completedApplications.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="getApplications(completedApplications.prev_page_url, 'completed')">Previous</a></li>

                                        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ completedApplications.current_page }} of {{ completedApplications.last_page }}</a></li>
                                    
                                        <li v-bind:class="[{disabled: !completedApplications.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="getApplications(completedApplications.next_page_url, 'completed')">Next</a></li>
                                    </ul>
                                </nav>                               
                            </div>
                        </div>
                        <div class="tab-pane" id="overview_expired">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th> Corporate Name </th>
                                            <th> Owner </th>
                                            <th> Date </th>
                                            <th> Status </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <tr v-for="expired in expiredApplications.data" :key="expired.id">
                                            <td>
                                                <a href="javascript:;"> {{ expired.corporate_name }} </a>
                                            </td>
                                            <td> $20.00 </td>
                                            <td> {{ expired.status }} </td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-sm btn-default">
                                                    <i class="fa fa-search"></i> View </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li v-bind:class="[{disabled: !expiredApplications.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="getApplications(expiredApplications.prev_page_url, 'expired')">Previous</a></li>

                                        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ expiredApplications.current_page }} of {{ expiredApplications.last_page }}</a></li>
                                    
                                        <li v-bind:class="[{disabled: !expiredApplications.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="getApplications(expiredApplications.next_page_url, 'expired')">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
  </div>  
</template>

<script>
import axios from 'axios'
// import {getApplications} from '../../services/helper.js'

export default {
  data(){
    return {
        totalSales: 0.00,
        totalApplications: null,
        processedApplications: [],
        completedApplications: [],
        expiredApplications: [],
        applications: [],
        totalUsers: null,
        processedCount: 0,
        completedCount: 0,
        full: null
    }
  },
  methods: {
    async filterDate(scope, count){

        const totalSales = await axios.get(`/admin/filter/payment/${scope}/${count}`)
        const processed = await axios.get(`/admin/filter/applications/${scope}/${count}/processed`)
        const completed = await axios.get(`/admin/filter/applications/${scope}/${count}/completed`)
        const expired = await axios.get(`/admin/filter/applications/${scope}/${count}/expired`)
        const applications = await axios.get(`/admin/filter/applications/${scope}/${count}/all`)

        await Promise.all([totalSales, applications, processed, completed, expired])
                .then(response => {
                    this.totalSales = response[0].data
                    this.applications = response[1].data.applications
                    this.processedApplications = response[2].data.applications
                    this.completedApplications = response[3].data.applications
                    this.expiredApplications = response[4].data.applications
                    this.processedCount = response[2].data.applications.total 
                    this.completedCount = response[3].data.applications.total              
                })

        console.log(this.totalSales)
        console.log(this.processedApplications)
        
    },
    getApplications(page,status){
      let url
      if (page == null) {
        url = '/user/applications'
      } else {
        // url = `/user/applications?page=${page}`
        url = page
      }
      axios.get(url)
        .then(response => {
            console.log(response.data)
            if(status == 'processed'){
                this.processedApplications = response.data.applications
            }
            else if(status == 'completed'){
                this.completedApplications = response.data.applications
            }
            else if(status == 'expired'){
                this.expiredApplications = response.data.applications
            }        
            else if(status == 'all'){
                this.applications = response.data.applications
            }

        })
        .catch(err => console.log(err))
    },   
  },
  mounted(){
      this.filterDate('year', 1)
  }  
}
</script>
