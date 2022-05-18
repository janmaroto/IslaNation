import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';


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
  getCountriesList() {
    return this.http.get('https://restcountries.com/v3.1/all');
  }
  editIsland(data, x_api_key) {
    let headers = new HttpHeaders().set('x-api-key', x_api_key);
    return this.http.put('http://islanation.local/island', data, {headers: headers});
  }
  deleteIsland(data, x_api_key) {
    let headers = new HttpHeaders().set('x-api-key', x_api_key);
    return this.http.delete('http://islanation.local/island' + data.island, {headers: headers});
  }
}
