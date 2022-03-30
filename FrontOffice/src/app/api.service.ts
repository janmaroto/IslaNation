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

  signUp(data) {
    return this.http.post('http://islanation.local/register', data);
  }
}
