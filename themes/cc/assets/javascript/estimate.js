var rooms = getRequest('https://dev.ultimatemoving.us/api/v1/rooms')
  .then(data => console.log(data)) // Result from the `response.json()` call
  .catch(error => console.error(error));

var inventory = getRequest('https://dev.ultimatemoving.us/api/v1/inventory')
  .then(data => console.log(data)) // Result from the `response.json()` call
  .catch(error => console.error(error));

var sizes = getRequest('https://dev.ultimatemoving.us/api/v1/move-sizes')
  .then(data => console.log(data)) // Result from the `response.json()` call
  .catch(error => console.error(error));

var states = getRequest('https://dev.ultimatemoving.us/api/v1/states')
  .then(data => console.log(data)) // Result from the `response.json()` call
  .catch(error => console.error(error));


function getRequest(url) {
  return fetch(url, {
    method: 'GET', // 'GET', 'PUT', 'DELETE', etc.
    //body: JSON.stringify(data), // Coordinate the body type with 'Content-Type'
    headers: new Headers({
      'Authorization': 'eCLk7RvaJfYSnQaneUoH',
      'Content-Type': 'application/json'
    }),
  })
  .then(response => response.json())
}

function postRequest(url) {
  return fetch(url, {
    method: 'POST', // 'GET', 'PUT', 'DELETE', etc.
    //body: JSON.stringify(data), // Coordinate the body type with 'Content-Type'
    headers: new Headers({
      'Authorization': 'eCLk7RvaJfYSnQaneUoH',
      'Content-Type': 'application/json'
    }),
  })
  .then(response => response.json())
}