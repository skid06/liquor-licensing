<template>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8 col-md-offset-2">
              <div class="card">
                  <div class="card-header">My Applications</div>            
                  <div class="card-body">
                      <ul>
                          <li class="mb-10"><h3><a href="/applications/processed">Processed Applications ({{ $bat }})</a> </h3></li>
                          <li class="mb-10"><h3><a href="/applications/pending">Pending Applications ({{ $bat }})</a> </h3></li>
                          <li class="mb-10"><h3><a href="/application/current">Current Application ({{ $bat }})</a> </h3></li>
                      </ul>                  
                  </div>
              </div>
          </div>
      </div>
  </div>  
</template>
<script>
export default {
  
}
</script>