import axios from 'axios';
const URL = 'http://localhost:8080/api/';

var config = {
    headers: {
       'Content-Type': 'application/json',
       //'Authorization': 'Bearer ' + token
    }
  };


function GetPost() {
    return axios.get(URL + 'posts', config)
            .then(function(response){
                console.log(response.data);
                return response.data;
            })
}

function Login(user) {
    return axios.post(URL + 'login', user, config)
        .then(function(response){
            //console.log(response);
            return response.data;
        })
}

export {
    Login
}
