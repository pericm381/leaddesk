import axios from 'axios';

const instance = axios.create({
  baseURL: 'https://leaddesk.marko-peric.com/api/api/'
});

export default instance;
