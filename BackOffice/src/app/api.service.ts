import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';


@Injectable({
  providedIn: 'root'
})
export class ApiService {

  constructor(
    public http: HttpClient
  ) { }

  userLogin(data) {
    return this.http.post('http://islanation.local/login', data);
  }
  userRegister(data) {
    return this.http.post('http://islanation.local/register', data);
  }
  showAllIslands(data) {
    return this.http.get('http://islanation.local/island/all', data);
  }
  showFilteredIslands(data) {
    console.log(data.key);
    console.log(data.value);
    return this.http.get('http://islanation.local/island' + data.key + data.value);
  }
}
