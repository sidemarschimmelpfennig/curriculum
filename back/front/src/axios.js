// src/axios.js
import axios from 'axios';

const instance = axios.create({
  baseURL: 'http://127.0.0.1:8000/api/v1',
  headers: {
    'Access-Control-Allow-Origin': 'http://localhost:8080'
  }
});

export default instance;
