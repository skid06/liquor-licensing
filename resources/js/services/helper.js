export function getApplications(url){
  return new Promise((resolve, reject) => {
    axios.get(url)
      .then(response => {
        console.log(response.data)
        resolve(response.data.applications)
      })
      .catch(err => {
        console.log(err)
        reject("Invalid parameters.")
      })
  })  
  // axios.get(url)
  // .then(response => {
  //   console.log(response.data)
  //   applications = response.data.processed
  // })
  // .catch(err => console.log(err))
}   